# SaaS Invoicing System - Filament v4 Implementation Plan

## Overview

A single-tenant admin panel for managing customers, products, invoices with line items, and tracking payments. All authenticated users can access all data.

**Key decisions:**
- Single-tenant (all authenticated users see all data)
- Manual invoice sending (mark as sent, no email automation)
- Partial payments supported (multiple payments until balance = 0)
- In-app Filament notifications only

---

## User Flows

### Flow 1: Creating an Invoice
1. User navigates to Invoices → Create
2. User selects a Customer (searchable dropdown)
3. User sets invoice date and due date
4. User adds line items via Repeater:
    - Select Product (searchable, shows name + price)
    - Enter quantity
    - Line total auto-calculates (quantity × unit_price)
5. Tax rate is entered (percentage)
6. Subtotal, tax amount, and total auto-calculate
7. Invoice saves as Draft status with auto-generated invoice number

### Flow 2: Sending an Invoice
1. User views a Draft invoice
2. User clicks "Mark as Sent" action
3. Confirmation modal appears
4. On confirm: status → Sent, sent_at → now()
5. Success notification shown

### Flow 3: Recording a Payment
1. User views a Sent invoice (or Overdue)
2. User clicks "Record Payment" action
3. Modal form appears with:
    - Amount (defaults to balance due, validates ≤ balance)
    - Payment method (select)
    - Reference (optional)
    - Payment date
4. On submit: Payment record created
5. If total payments ≥ invoice total: status → Paid, paid_at → now()
6. Success notification shown

### Flow 4: Viewing Invoice Status
1. User navigates to Invoices list
2. Table shows status badges (Draft/Sent/Paid/Overdue/Cancelled)
3. User can filter by status, customer, date range
4. User can search by invoice number or customer name

---

## Commands

Run these in order:

```bash
# 1. Create models with migrations and factories
php artisan make:model Customer -mf --no-interaction
php artisan make:model Product -mf --no-interaction
php artisan make:model Invoice -mf --no-interaction
php artisan make:model InvoiceItem -mf --no-interaction
php artisan make:model Payment -mf --no-interaction

# 2. Create Filament panel provider
php artisan make:filament-panel admin --no-interaction

# 3. Create resources
php artisan make:filament-resource Customer --view --soft-deletes --no-interaction
php artisan make:filament-resource Product --view --soft-deletes --no-interaction
php artisan make:filament-resource Invoice --view --soft-deletes --no-interaction

# 4. Create relation managers
php artisan make:filament-relation-manager InvoiceResource payments amount --no-interaction
php artisan make:filament-relation-manager CustomerResource invoices invoice_number --no-interaction
```

---

## Models

### Enum: InvoiceStatus

```
Enum: InvoiceStatus
  Location: App\Enums\InvoiceStatus
  Implements: HasLabel, HasColor, HasIcon
  Imports:
    - Filament\Support\Contracts\HasLabel
    - Filament\Support\Contracts\HasColor
    - Filament\Support\Contracts\HasIcon
    - Filament\Support\Icons\Heroicon
  Cases:
    - Draft: label "Draft", color "gray", icon Heroicon::PencilSquare
    - Sent: label "Sent", color "info", icon Heroicon::PaperAirplane
    - Paid: label "Paid", color "success", icon Heroicon::CheckCircle
    - Overdue: label "Overdue", color "danger", icon Heroicon::ExclamationTriangle
    - Cancelled: label "Cancelled", color "warning", icon Heroicon::XCircle
```

### Enum: PaymentMethod

```
Enum: PaymentMethod
  Location: App\Enums\PaymentMethod
  Implements: HasLabel
  Imports:
    - Filament\Support\Contracts\HasLabel
  Cases:
    - Cash: label "Cash"
    - Check: label "Check"
    - BankTransfer: label "Bank Transfer"
    - CreditCard: label "Credit Card"
    - Other: label "Other"
```

### Model: Customer

```
Model: Customer
  Table: customers
  Attributes:
    - id: bigint, primary
    - name: string, required
    - email: string, required
    - phone: string, nullable
    - address_line_1: string, nullable
    - address_line_2: string, nullable
    - city: string, nullable
    - state: string, nullable
    - postal_code: string, nullable
    - country: string, nullable
    - notes: text, nullable
    - created_at: timestamp
    - updated_at: timestamp
    - deleted_at: timestamp, nullable
  Relationships:
    - hasMany: Invoice via customer_id
  Traits:
    - SoftDeletes
```

### Model: Product

```
Model: Product
  Table: products
  Attributes:
    - id: bigint, primary
    - name: string, required
    - sku: string, nullable, unique
    - description: text, nullable
    - unit_price: integer, required (stored in cents)
    - is_active: boolean, default:true
    - created_at: timestamp
    - updated_at: timestamp
    - deleted_at: timestamp, nullable
  Relationships:
    - hasMany: InvoiceItem via product_id
  Traits:
    - SoftDeletes
```

### Model: Invoice

```
Model: Invoice
  Table: invoices
  Attributes:
    - id: bigint, primary
    - customer_id: bigint, foreign(customers.id), required
    - invoice_number: string, required, unique
    - status: string, default:'draft' (uses InvoiceStatus enum)
    - invoice_date: date, required
    - due_date: date, required
    - subtotal: integer, default:0 (cents)
    - tax_rate: decimal(5,2), default:0
    - tax_amount: integer, default:0 (cents)
    - total: integer, default:0 (cents)
    - amount_paid: integer, default:0 (cents)
    - notes: text, nullable
    - sent_at: timestamp, nullable
    - paid_at: timestamp, nullable
    - created_at: timestamp
    - updated_at: timestamp
    - deleted_at: timestamp, nullable
  Relationships:
    - belongsTo: Customer via customer_id
    - hasMany: InvoiceItem via invoice_id
    - hasMany: Payment via invoice_id
  Traits:
    - SoftDeletes
  Accessors:
    - balance_due: total - amount_paid
  Methods:
    - generateInvoiceNumber(): string (format: INV-YYYYMM-XXXX)
    - recalculateTotals(): void (sum line items, apply tax)
    - markAsSent(): void
    - markAsPaid(): void
    - recordPayment(amount, method, reference, date): Payment
```

### Model: InvoiceItem

```
Model: InvoiceItem
  Table: invoice_items
  Attributes:
    - id: bigint, primary
    - invoice_id: bigint, foreign(invoices.id), required, onDelete:cascade
    - product_id: bigint, foreign(products.id), nullable
    - description: string, required
    - quantity: integer, required, default:1
    - unit_price: integer, required (cents)
    - total: integer, required (cents, quantity × unit_price)
    - sort_order: integer, default:0
    - created_at: timestamp
    - updated_at: timestamp
  Relationships:
    - belongsTo: Invoice via invoice_id
    - belongsTo: Product via product_id (nullable)
```

### Model: Payment

```
Model: Payment
  Table: payments
  Attributes:
    - id: bigint, primary
    - invoice_id: bigint, foreign(invoices.id), required, onDelete:cascade
    - amount: integer, required (cents)
    - method: string, required (uses PaymentMethod enum)
    - reference: string, nullable
    - payment_date: date, required
    - notes: text, nullable
    - created_at: timestamp
    - updated_at: timestamp
  Relationships:
    - belongsTo: Invoice via invoice_id
```

---

## Resources

### CustomerResource

```
Resource: CustomerResource
  Location: App\Filament\Resources\Customers\CustomerResource
  Docs: https://filamentphp.com/docs/4.x/panels/resources/overview
  RecordTitleAttribute: name
  GloballySearchableAttributes: [name, email]

  Navigation:
    Group: Sales
    Icon: Heroicon::Users
    Sort: 1

  Form:
    Columns: 1

    Section: Contact Information
      Columns: 2
      Fields:
        Field: name
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: required, max:255
          Config: ->maxLength(255)

        Field: email
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: required, email, max:255
          Config: ->email()->maxLength(255)

        Field: phone
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:50
          Config: ->tel()->maxLength(50)

    Section: Address
      Columns: 2
      Collapsible: true
      Fields:
        Field: address_line_1
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:255
          Config: ->label('Address Line 1')->maxLength(255)->columnSpanFull()

        Field: address_line_2
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:255
          Config: ->label('Address Line 2')->maxLength(255)->columnSpanFull()

        Field: city
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:100
          Config: ->maxLength(100)

        Field: state
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:100
          Config: ->maxLength(100)

        Field: postal_code
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:20
          Config: ->label('Postal Code')->maxLength(20)

        Field: country
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:100
          Config: ->maxLength(100)

    Section: Additional Information
      Collapsible: true
      Fields:
        Field: notes
          Component: Filament\Forms\Components\Textarea
          Docs: https://filamentphp.com/docs/4.x/forms/textarea
          Validation: nullable, max:5000
          Config: ->rows(4)->maxLength(5000)->columnSpanFull()

  Table:
    Column: name
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()

    Column: email
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()

    Column: phone
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()

    Column: invoices_count
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->counts('invoices')->label('Invoices')->sortable()

    Column: created_at
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)

    Filter: trashed
      Component: Filament\Tables\Filters\TrashedFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/trashed

  Infolist:
    Columns: 1

    Section: Contact Information
      Columns: 3
      Entries:
        Entry: name
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

        Entry: email
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->copyable()

        Entry: phone
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

    Section: Address
      Columns: 2
      Entries:
        Entry: address_line_1
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Address Line 1')->columnSpanFull()

        Entry: address_line_2
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Address Line 2')->columnSpanFull()

        Entry: city
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

        Entry: state
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

        Entry: postal_code
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Postal Code')

        Entry: country
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

  RelationManagers:
    - InvoicesRelationManager (see below)
```

### ProductResource

```
Resource: ProductResource
  Location: App\Filament\Resources\Products\ProductResource
  Docs: https://filamentphp.com/docs/4.x/panels/resources/overview
  RecordTitleAttribute: name
  GloballySearchableAttributes: [name, sku]

  Navigation:
    Group: Sales
    Icon: Heroicon::CubeTransparent
    Sort: 2

  Form:
    Columns: 1

    Section: Product Details
      Columns: 2
      Fields:
        Field: name
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: required, max:255
          Config: ->maxLength(255)

        Field: sku
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: nullable, max:100, unique:products,sku
          Config: ->maxLength(100)->label('SKU')

        Field: unit_price
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: required, integer, min:0
          Config: ->integer()->prefix('$')->label('Unit Price (cents)')->helperText('Enter price in cents (e.g., 1000 = $10.00)')

        Field: is_active
          Component: Filament\Forms\Components\Toggle
          Docs: https://filamentphp.com/docs/4.x/forms/toggle
          Validation: boolean
          Config: ->default(true)->label('Active')

        Field: description
          Component: Filament\Forms\Components\Textarea
          Docs: https://filamentphp.com/docs/4.x/forms/textarea
          Validation: nullable, max:5000
          Config: ->rows(4)->maxLength(5000)->columnSpanFull()

  Table:
    Column: name
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()

    Column: sku
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()->label('SKU')

    Column: unit_price
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->sortable()->label('Unit Price')

    Column: is_active
      Component: Filament\Tables\Columns\IconColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/icon
      Config: ->boolean()->label('Active')

    Column: created_at
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)

    Filter: is_active
      Component: Filament\Tables\Filters\TernaryFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/ternary
      Config: ->label('Active')

    Filter: trashed
      Component: Filament\Tables\Filters\TrashedFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/trashed

  Infolist:
    Columns: 2
    Entries:
      Entry: name
        Component: Filament\Infolists\Components\TextEntry
        Docs: https://filamentphp.com/docs/4.x/infolists/text-entry

      Entry: sku
        Component: Filament\Infolists\Components\TextEntry
        Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
        Config: ->label('SKU')

      Entry: unit_price
        Component: Filament\Infolists\Components\TextEntry
        Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
        Config: ->money('usd', divideBy: 100)->label('Unit Price')

      Entry: is_active
        Component: Filament\Infolists\Components\IconEntry
        Docs: https://filamentphp.com/docs/4.x/infolists/icon-entry
        Config: ->boolean()->label('Active')

      Entry: description
        Component: Filament\Infolists\Components\TextEntry
        Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
        Config: ->columnSpanFull()
```

### InvoiceResource

```
Resource: InvoiceResource
  Location: App\Filament\Resources\Invoices\InvoiceResource
  Docs: https://filamentphp.com/docs/4.x/panels/resources/overview
  RecordTitleAttribute: invoice_number
  GloballySearchableAttributes: [invoice_number, customer.name]

  Navigation:
    Group: Sales
    Icon: Heroicon::DocumentText
    Sort: 3

  Form:
    Columns: 1
    Imports:
      - Filament\Schemas\Components\Utilities\Get
      - Filament\Schemas\Components\Utilities\Set
      - App\Enums\InvoiceStatus

    Section: Invoice Details
      Columns: 2
      Fields:
        Field: customer_id
          Component: Filament\Forms\Components\Select
          Docs: https://filamentphp.com/docs/4.x/forms/select
          Validation: required, exists:customers,id
          Config: ->relationship('customer', 'name')->searchable()->preload()->createOptionForm([...customer form fields...])->label('Customer')

        Field: status
          Component: Filament\Forms\Components\Select
          Docs: https://filamentphp.com/docs/4.x/forms/select
          Validation: required
          Config: ->options(InvoiceStatus::class)->default(InvoiceStatus::Draft)->disabled()->hiddenOn('create')

        Field: invoice_date
          Component: Filament\Forms\Components\DatePicker
          Docs: https://filamentphp.com/docs/4.x/forms/date-time-picker
          Validation: required, date
          Config: ->default(now())->label('Invoice Date')

        Field: due_date
          Component: Filament\Forms\Components\DatePicker
          Docs: https://filamentphp.com/docs/4.x/forms/date-time-picker
          Validation: required, date, after_or_equal:invoice_date
          Config: ->default(now()->addDays(30))->label('Due Date')

    Section: Line Items
      ColumnSpan: full
      Fields:
        Field: items
          Component: Filament\Forms\Components\Repeater
          Docs: https://filamentphp.com/docs/4.x/forms/repeater
          Config: ->relationship('items')->orderColumn('sort_order')->reorderable()->collapsible()->cloneable()->itemLabel(fn (array $state): ?string => $state['description'] ?? 'New Item')
          Schema:
            Field: product_id
              Component: Filament\Forms\Components\Select
              Docs: https://filamentphp.com/docs/4.x/forms/select
              Validation: nullable, exists:products,id
              Config: ->relationship('product', 'name')->searchable()->preload()->live()->afterStateUpdated(fn (Set $set, Get $get, ?int $state) => self::updateItemFromProduct($set, $get, $state))->label('Product (optional)')

            Field: description
              Component: Filament\Forms\Components\TextInput
              Docs: https://filamentphp.com/docs/4.x/forms/text-input
              Validation: required, max:255
              Config: ->maxLength(255)->columnSpan(2)

            Field: quantity
              Component: Filament\Forms\Components\TextInput
              Docs: https://filamentphp.com/docs/4.x/forms/text-input
              Validation: required, integer, min:1
              Config: ->integer()->default(1)->live()->afterStateUpdated(fn (Set $set, Get $get) => self::updateLineTotal($set, $get))

            Field: unit_price
              Component: Filament\Forms\Components\TextInput
              Docs: https://filamentphp.com/docs/4.x/forms/text-input
              Validation: required, integer, min:0
              Config: ->integer()->prefix('$')->label('Unit Price (cents)')->live()->afterStateUpdated(fn (Set $set, Get $get) => self::updateLineTotal($set, $get))

            Field: total
              Component: Filament\Forms\Components\TextInput
              Docs: https://filamentphp.com/docs/4.x/forms/text-input
              Config: ->integer()->prefix('$')->disabled()->dehydrated()->label('Line Total (cents)')

    Section: Totals
      Columns: 4
      Fields:
        Field: subtotal
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Config: ->integer()->prefix('$')->disabled()->dehydrated()->label('Subtotal (cents)')

        Field: tax_rate
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Validation: required, numeric, min:0, max:100
          Config: ->numeric()->suffix('%')->default(0)->live()->afterStateUpdated(fn (Set $set, Get $get) => self::updateTotals($set, $get))->label('Tax Rate')

        Field: tax_amount
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Config: ->integer()->prefix('$')->disabled()->dehydrated()->label('Tax (cents)')

        Field: total
          Component: Filament\Forms\Components\TextInput
          Docs: https://filamentphp.com/docs/4.x/forms/text-input
          Config: ->integer()->prefix('$')->disabled()->dehydrated()->label('Total (cents)')

    Section: Notes
      Collapsible: true
      Fields:
        Field: notes
          Component: Filament\Forms\Components\Textarea
          Docs: https://filamentphp.com/docs/4.x/forms/textarea
          Validation: nullable, max:5000
          Config: ->rows(4)->maxLength(5000)->columnSpanFull()

  Table:
    Column: invoice_number
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()->label('Invoice #')

    Column: customer.name
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()->label('Customer')

    Column: status
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->badge()

    Column: invoice_date
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->date()->sortable()->label('Date')

    Column: due_date
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->date()->sortable()->label('Due')

    Column: total
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->sortable()->summarize(Sum::make()->money('usd', divideBy: 100))

    Column: balance_due
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->sortable()->label('Balance Due')->state(fn ($record) => $record->total - $record->amount_paid)

    Filter: status
      Component: Filament\Tables\Filters\SelectFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/select
      Config: ->options(InvoiceStatus::class)->multiple()

    Filter: customer
      Component: Filament\Tables\Filters\SelectFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/select
      Config: ->relationship('customer', 'name')->searchable()->preload()

    Filter: trashed
      Component: Filament\Tables\Filters\TrashedFilter
      Docs: https://filamentphp.com/docs/4.x/tables/filters/trashed

  Actions:
    Action: Mark as Sent
      Component: Filament\Actions\Action
      Docs: https://filamentphp.com/docs/4.x/actions/overview
      Location: table row, view page header
      Icon: Heroicon::PaperAirplane
      Color: info
      Visibility: only when status is Draft
      Confirmation: "Mark this invoice as sent? This will update the invoice status."
      Behavior:
        - Set status to Sent
        - Set sent_at to now()
      Notification: "Invoice marked as sent"

    Action: Record Payment
      Component: Filament\Actions\Action
      Docs: https://filamentphp.com/docs/4.x/actions/modals
      Location: table row, view page header
      Icon: Heroicon::CurrencyDollar
      Color: success
      Visibility: only when status is Sent or Overdue and balance_due > 0

      Modal:
        Heading: Record Payment
        Description: Record a payment for this invoice

        Field: amount
          Component: Filament\Forms\Components\TextInput
          Validation: required, integer, min:1, max:{balance_due}
          Config: ->integer()->prefix('$')->label('Amount (cents)')->default(fn ($record) => $record->total - $record->amount_paid)->helperText(fn ($record) => 'Balance due: $' . number_format(($record->total - $record->amount_paid) / 100, 2))

        Field: method
          Component: Filament\Forms\Components\Select
          Validation: required
          Config: ->options(PaymentMethod::class)->default(PaymentMethod::BankTransfer)

        Field: reference
          Component: Filament\Forms\Components\TextInput
          Validation: nullable, max:255
          Config: ->maxLength(255)->label('Reference/Check #')

        Field: payment_date
          Component: Filament\Forms\Components\DatePicker
          Validation: required, date
          Config: ->default(now())->label('Payment Date')

        Field: notes
          Component: Filament\Forms\Components\Textarea
          Validation: nullable, max:1000
          Config: ->rows(2)->maxLength(1000)

      Behavior:
        - Create Payment record with form data
        - Update invoice.amount_paid += payment amount
        - If amount_paid >= total: set status to Paid, set paid_at to now()
      Notification: "Payment recorded successfully"

    Action: Mark as Cancelled
      Component: Filament\Actions\Action
      Docs: https://filamentphp.com/docs/4.x/actions/overview
      Location: table row (grouped), view page header
      Icon: Heroicon::XCircle
      Color: danger
      Visibility: only when status is Draft or Sent
      Confirmation: "Are you sure you want to cancel this invoice? This action cannot be undone."
      Behavior:
        - Set status to Cancelled
      Notification: "Invoice cancelled"

  Infolist:
    Columns: 1
    Imports:
      - Filament\Support\Icons\Heroicon

    Section: Invoice Information
      Columns: 4
      Entries:
        Entry: invoice_number
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Invoice #')->copyable()

        Entry: status
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->badge()

        Entry: invoice_date
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->date()->label('Invoice Date')

        Entry: due_date
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->date()->label('Due Date')

    Section: Customer
      Columns: 3
      Entries:
        Entry: customer.name
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Name')

        Entry: customer.email
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Email')->copyable()

        Entry: customer.phone
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->label('Phone')

    Section: Totals
      Columns: 5
      Entries:
        Entry: subtotal
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->money('usd', divideBy: 100)

        Entry: tax_rate
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->suffix('%')->label('Tax Rate')

        Entry: tax_amount
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->money('usd', divideBy: 100)->label('Tax')

        Entry: total
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->money('usd', divideBy: 100)->weight('bold')

        Entry: balance_due
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->money('usd', divideBy: 100)->label('Balance Due')->state(fn ($record) => $record->total - $record->amount_paid)->color(fn ($state) => $state > 0 ? 'danger' : 'success')

    Section: Notes
      Collapsible: true
      Entries:
        Entry: notes
          Component: Filament\Infolists\Components\TextEntry
          Docs: https://filamentphp.com/docs/4.x/infolists/text-entry
          Config: ->columnSpanFull()

  RelationManagers:
    - PaymentsRelationManager (see below)
```

### PaymentsRelationManager

```
RelationManager: PaymentsRelationManager
  Location: App\Filament\Resources\Invoices\RelationManagers\PaymentsRelationManager
  Relationship: payments (hasMany Payment)
  Title attribute: id
  Can create: no (use Record Payment action instead)
  Can edit: yes
  Can delete: yes

  Table:
    Column: payment_date
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->date()->sortable()->label('Date')

    Column: amount
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->sortable()->summarize(Sum::make()->money('usd', divideBy: 100))

    Column: method
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->badge()

    Column: reference
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()

    Column: created_at
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)

  Form:
    Field: amount
      Component: Filament\Forms\Components\TextInput
      Docs: https://filamentphp.com/docs/4.x/forms/text-input
      Validation: required, integer, min:1
      Config: ->integer()->prefix('$')->label('Amount (cents)')

    Field: method
      Component: Filament\Forms\Components\Select
      Docs: https://filamentphp.com/docs/4.x/forms/select
      Validation: required
      Config: ->options(PaymentMethod::class)

    Field: reference
      Component: Filament\Forms\Components\TextInput
      Docs: https://filamentphp.com/docs/4.x/forms/text-input
      Validation: nullable, max:255
      Config: ->maxLength(255)

    Field: payment_date
      Component: Filament\Forms\Components\DatePicker
      Docs: https://filamentphp.com/docs/4.x/forms/date-time-picker
      Validation: required, date
      Config: ->label('Payment Date')

    Field: notes
      Component: Filament\Forms\Components\Textarea
      Docs: https://filamentphp.com/docs/4.x/forms/textarea
      Validation: nullable, max:1000
      Config: ->rows(2)->maxLength(1000)
```

### InvoicesRelationManager (for CustomerResource)

```
RelationManager: InvoicesRelationManager
  Location: App\Filament\Resources\Customers\RelationManagers\InvoicesRelationManager
  Relationship: invoices (hasMany Invoice)
  Title attribute: invoice_number
  Can create: no (navigate to InvoiceResource instead)
  Can edit: no
  Can delete: no
  Can view: yes (link to InvoiceResource)

  Table:
    Column: invoice_number
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->searchable()->sortable()->label('Invoice #')

    Column: status
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->badge()

    Column: invoice_date
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->date()->sortable()->label('Date')

    Column: total
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->sortable()

    Column: balance_due
      Component: Filament\Tables\Columns\TextColumn
      Docs: https://filamentphp.com/docs/4.x/tables/columns/text
      Config: ->money('usd', divideBy: 100)->label('Balance')->state(fn ($record) => $record->total - $record->amount_paid)

  Actions:
    - ViewAction (link to InvoiceResource view page)
```

---

## Authorization

```
Authorization: All authenticated users
  - All resources accessible to any authenticated user
  - No role-based restrictions
  - Login required via Filament panel authentication
```

---

## Tests

### CustomerResource Tests

```
CustomerResource:
  Validation (use dataset pattern):
    - name: required, max:255
    - email: required, email, max:255
    - phone: nullable, max:50

  Component Config:
    - name column is searchable and sortable
    - email column is searchable and sortable
    - invoices_count column shows invoice count

  CRUD:
    - can render list page
    - can render create page
    - can create customer with valid data
    - can render edit page
    - can update customer
    - can render view page
    - can soft delete customer
    - can restore soft deleted customer
```

### ProductResource Tests

```
ProductResource:
  Validation (use dataset pattern):
    - name: required, max:255
    - sku: nullable, max:100, unique
    - unit_price: required, integer, min:0

  Component Config:
    - unit_price column displays as money
    - is_active column displays as boolean icon

  CRUD:
    - can render list page
    - can create product with valid data
    - can update product
    - can soft delete product
```

### InvoiceResource Tests

```
InvoiceResource:
  Validation (use dataset pattern):
    - customer_id: required, exists:customers,id
    - invoice_date: required, date
    - due_date: required, date, after_or_equal:invoice_date
    - items.*.description: required, max:255
    - items.*.quantity: required, integer, min:1
    - items.*.unit_price: required, integer, min:0

  Component Config:
    - status column displays as badge with correct colors
    - total column displays as money
    - balance_due column calculates correctly

  Actions:
    - Mark as Sent action:
      - is visible when status is Draft
      - is hidden when status is not Draft
      - sets status to Sent
      - sets sent_at timestamp
      - shows success notification

    - Record Payment action:
      - is visible when status is Sent and balance > 0
      - is visible when status is Overdue and balance > 0
      - is hidden when status is Draft
      - is hidden when balance is 0
      - creates Payment record with correct data
      - updates invoice amount_paid
      - sets status to Paid when fully paid
      - validates amount <= balance_due

    - Mark as Cancelled action:
      - is visible when status is Draft or Sent
      - is hidden when status is Paid
      - sets status to Cancelled

  Totals Calculation:
    - subtotal equals sum of line item totals
    - tax_amount equals subtotal * tax_rate / 100
    - total equals subtotal + tax_amount
    - line item total equals quantity * unit_price

  Invoice Number:
    - auto-generates unique invoice number on create
    - format matches INV-YYYYMM-XXXX pattern

  RelationManagers:
    - PaymentsRelationManager renders with correct payment records
    - payment amounts sum to amount_paid
```

---

## Verification

### Manual Testing Checklist

1. **Panel Access**
    - Navigate to `/admin` and verify login page appears
    - Log in and verify dashboard loads
    - Verify navigation shows Sales group with Customers, Products, Invoices

2. **Customer Flow**
    - Create a new customer with all fields
    - Edit the customer
    - View the customer details
    - Verify InvoicesRelationManager shows on view page

3. **Product Flow**
    - Create a new product with SKU and price
    - Verify unique SKU validation works
    - Toggle is_active and verify it saves

4. **Invoice Creation Flow**
    - Create new invoice, select customer
    - Add 3 line items using the repeater
    - Select a product for one item (verify auto-fill)
    - Verify line totals calculate automatically
    - Set tax rate and verify totals recalculate
    - Save and verify invoice number generated

5. **Invoice Status Flow**
    - View draft invoice, verify "Mark as Sent" action visible
    - Click "Mark as Sent", confirm, verify status changes
    - Verify "Record Payment" action now visible
    - Record partial payment, verify balance updates
    - Record remaining balance, verify status changes to Paid
    - Verify actions are now hidden

6. **Filters and Search**
    - Filter invoices by status
    - Filter invoices by customer
    - Search by invoice number
    - Search by customer name

### Automated Test Commands

```bash
# Run all tests
php artisan test --compact

# Run specific resource tests
php artisan test --compact --filter=CustomerResource
php artisan test --compact --filter=ProductResource
php artisan test --compact --filter=InvoiceResource

# Run with coverage
php artisan test --compact --coverage
```

---

## Files to Create/Modify

### New Files
- `app/Enums/InvoiceStatus.php`
- `app/Enums/PaymentMethod.php`
- `app/Models/Customer.php`
- `app/Models/Product.php`
- `app/Models/Invoice.php`
- `app/Models/InvoiceItem.php`
- `app/Models/Payment.php`
- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Filament/Resources/Customers/CustomerResource.php`
- `app/Filament/Resources/Customers/Pages/*.php`
- `app/Filament/Resources/Customers/RelationManagers/InvoicesRelationManager.php`
- `app/Filament/Resources/Products/ProductResource.php`
- `app/Filament/Resources/Products/Pages/*.php`
- `app/Filament/Resources/Invoices/InvoiceResource.php`
- `app/Filament/Resources/Invoices/Pages/*.php`
- `app/Filament/Resources/Invoices/RelationManagers/PaymentsRelationManager.php`
- `database/migrations/*_create_customers_table.php`
- `database/migrations/*_create_products_table.php`
- `database/migrations/*_create_invoices_table.php`
- `database/migrations/*_create_invoice_items_table.php`
- `database/migrations/*_create_payments_table.php`
- `database/factories/CustomerFactory.php`
- `database/factories/ProductFactory.php`
- `database/factories/InvoiceFactory.php`
- `database/factories/InvoiceItemFactory.php`
- `database/factories/PaymentFactory.php`
- `tests/Feature/CustomerResourceTest.php`
- `tests/Feature/ProductResourceTest.php`
- `tests/Feature/InvoiceResourceTest.php`
