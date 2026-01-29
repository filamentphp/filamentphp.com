# Filament v4 SaaS Invoicing System - Implementation Plan

## Overview

Build a complete invoicing system using Filament v4 on Laravel 12 with:

- Customer management
- Product catalog
- Invoice creation with line items
- Invoice sending workflow
- Payment tracking

---

## 1. Domain Model & Database Schema

### Entity Relationships

```
Customer ──< Invoice ──< InvoiceItem >── Product
                │
                └──< Payment
```

### Models & Migrations

| Model           | Key Fields                                                                                                                        | Relationships                                            |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------- |
| **Customer**    | name, email, phone, company, billing address fields                                                                               | hasMany Invoice                                          |
| **Product**     | name, sku, description, unit_price, unit, is_active                                                                               | hasMany InvoiceItem                                      |
| **Invoice**     | invoice_number, status, invoice_date, due_date, subtotal, tax_rate, tax_amount, total, amount_paid, balance_due, sent_at, paid_at | belongsTo Customer, hasMany InvoiceItem, hasMany Payment |
| **InvoiceItem** | description, quantity, unit_price, amount, sort_order                                                                             | belongsTo Invoice, belongsTo Product (nullable)          |
| **Payment**     | amount, payment_date, payment_method, reference_number, notes                                                                     | belongsTo Invoice                                        |

### Enums

**InvoiceStatus** (`app/Enums/InvoiceStatus.php`):

- `Draft` (gray) → `Sent` (blue) → `Partial` (yellow) → `Paid` (green)
- Also: `Void` (red), `Cancelled` (red)

**PaymentMethod**: Cash, Check, CreditCard, BankTransfer, Other

---

## 2. Filament Resource Structure

### CustomerResource

- **Pages**: List, Create, Edit
- **Form**: Contact info section, billing address section (collapsible), notes
- **Table**: name, email, company, invoices_count
- **Relation Manager**: InvoicesRelationManager (shows customer's invoices)

### ProductResource

- **Pages**: List, Create, Edit
- **Form**: name, sku, description, unit_price, unit, is_active toggle
- **Table**: name, sku, unit_price, is_active
- **Filters**: Active/Inactive toggle

### InvoiceResource

- **Pages**: List, Create, Edit, View (optional)
- **Form**:
  - Header: invoice_number (auto-generated), customer select, status badge
  - Dates: invoice_date, due_date
  - **Line Items Repeater**: product select (auto-fills), description, quantity,
    unit_price, amount placeholder
  - Totals: subtotal, tax_rate, tax_amount, total (calculated placeholders)
  - Notes/terms textareas
- **Table**: invoice_number, customer.name, status (badge), invoice_date,
  due_date, total, balance_due
- **Filters**: status, customer, date range, overdue
- **Relation Manager**: PaymentsRelationManager

### PaymentResource (Read-only listing)

- **Pages**: List only (payments created via Invoice actions)
- **Table**: invoice.invoice_number, customer.name, amount, payment_date,
  payment_method

---

## 3. State Transitions & Actions

### Invoice Status Flow

```
┌─────────┐    Send     ┌─────────┐   Payment   ┌─────────┐   Full    ┌─────────┐
│  Draft  │ ──────────► │  Sent   │ ──────────► │ Partial │ ───────► │  Paid   │
└─────────┘             └─────────┘             └─────────┘          └─────────┘
     │                       │                       │
     │ Cancel                │ Void                  │ Void
     ▼                       ▼                       ▼
┌───────────┐           ┌─────────┐            ┌─────────┐
│ Cancelled │           │  Void   │            │  Void   │
└───────────┘           └─────────┘            └─────────┘
```

### Custom Actions

| Action                     | Location                 | From Status     | To Status    | Modal Form                              |
| -------------------------- | ------------------------ | --------------- | ------------ | --------------------------------------- |
| **SendInvoiceAction**      | Header, Table Row        | Draft           | Sent         | recipient_email, message, attach_pdf    |
| **RecordPaymentAction**    | Header, Relation Manager | Sent, Partial   | Partial/Paid | payment_date, amount, method, reference |
| **MarkAsPaidAction**       | Header, Table Row        | Sent, Partial   | Paid         | Confirmation only                       |
| **VoidInvoiceAction**      | Header                   | Any except Paid | Void         | void_reason                             |
| **DuplicateInvoiceAction** | Table Row                | Any             | Draft (new)  | None                                    |

---

## 4. User Flows

### Flow 1: Creating an Invoice

1. User navigates to **Invoices → New Invoice**
2. `CreateInvoice` page loads with `InvoiceForm` schema
3. Invoice number auto-generated via `Invoice::generateNextNumber()`
4. User selects customer (or creates inline via `createOptionForm`)
5. User adds line items via **Repeater**:
   - Select product → auto-fills description/price
   - Or manually enter custom item
   - Quantity × unit_price = amount (reactive calculation)
6. Dates default to today / +30 days
7. Optional: enter tax rate, notes, terms
8. Click **Create** → validation → save → redirect to Edit page

**Components**: `Select` with `relationship()`, `Repeater` with
`relationship()`, `DatePicker`, `Placeholder` for totals

### Flow 2: Sending an Invoice

1. User views invoice (Edit page, status = Draft)
2. Clicks **Send Invoice** header action
3. Modal opens with:
   - `recipient_email` (pre-filled from customer)
   - `message` textarea
   - `attach_pdf` checkbox
4. User clicks Submit
5. Action handler:
   - Queues `InvoiceSentNotification` to customer
   - Updates status to `Sent`, sets `sent_at`
   - Shows success notification
6. UI refreshes showing new status badge

**Components**: `Action::make('send')`, `requiresConfirmation()`, `form()`,
`action()`, `visible()`

### Flow 3: Recording a Payment

**Via Header Action:**

1. User on Edit page (status = Sent or Partial)
2. Clicks **Record Payment** action
3. Modal form:
   - `payment_date` (default: today)
   - `amount` (default: balance_due, max: balance_due)
   - `payment_method` select
   - `reference_number`, `notes`
4. Submit → creates Payment record
5. `Invoice::recalculatePayments()` updates:
   - `amount_paid`, `balance_due`
   - Status → Partial or Paid (if balance = 0)

**Via Relation Manager:**

1. User scrolls to Payments section on Edit page
2. Clicks **New Payment** in table header
3. Same modal form, same recalculation logic

### Flow 4: Viewing Payment History

**Single Invoice:**

- Edit Invoice page → PaymentsRelationManager table
- Columns: payment_date, amount, method, reference, notes
- Actions: Edit, Delete (both trigger recalculation)

**All Payments:**

- Navigate to Payments resource
- Filter by date range, customer, method
- Click invoice_number to navigate to invoice

---

## 5. Key Implementation Files

| File                                                                            | Purpose                                                                                |
| ------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `app/Models/Invoice.php`                                                        | Core model with `recalculateTotals()`, `recalculatePayments()`, `generateNextNumber()` |
| `app/Enums/InvoiceStatus.php`                                                   | Status enum with `HasLabel`, `HasColor`, `HasIcon`                                     |
| `app/Filament/Resources/Invoices/InvoiceResource.php`                           | Resource with form, table, header actions                                              |
| `app/Filament/Resources/Invoices/RelationManagers/PaymentsRelationManager.php`  | Payments table with create action                                                      |
| `app/Filament/Resources/Customers/RelationManagers/InvoicesRelationManager.php` | Customer's invoices table                                                              |

---

## 6. Implementation Sequence

### Phase 1: Foundation

- [ ] Create Customer, Product, Invoice, InvoiceItem, Payment models with
      migrations
- [ ] Create InvoiceStatus and PaymentMethod enums
- [ ] Create model factories
- [ ] Run migrations

### Phase 2: Basic Resources

- [ ] Generate CustomerResource with `--generate`
- [ ] Generate ProductResource with `--generate`
- [ ] Write tests for Customer and Product CRUD

### Phase 3: Invoice Resource

- [ ] Generate InvoiceResource
- [ ] Implement line items Repeater with reactive calculations
- [ ] Add status badges to table
- [ ] Implement `recalculateTotals()` in model
- [ ] Write Invoice CRUD tests

### Phase 4: Actions & Workflows

- [ ] Implement SendInvoiceAction with modal form
- [ ] Implement RecordPaymentAction
- [ ] Implement MarkAsPaidAction, VoidInvoiceAction
- [ ] Implement DuplicateInvoiceAction
- [ ] Write action tests

### Phase 5: Relation Managers

- [ ] Create PaymentsRelationManager for InvoiceResource
- [ ] Create InvoicesRelationManager for CustomerResource
- [ ] Write relation manager tests

### Phase 6: Polish

- [ ] Create InvoiceSentNotification
- [ ] Add dashboard widgets (stats, charts)
- [ ] Run full test suite

---

## 7. Verification Plan

### Manual Testing

1. Create a customer with full billing address
2. Create 2-3 products with different prices
3. Create invoice: select customer, add 3 line items, verify totals calculate
4. Send invoice: verify status changes, check email delivery
5. Record partial payment: verify balance updates, status = Partial
6. Record remaining payment: verify status = Paid
7. Create new invoice, void it: verify status = Void
8. Duplicate an invoice: verify new draft created

### Automated Tests

```bash
# Run all Filament resource tests
php artisan test --filter=Filament

# Run specific resource test
php artisan test tests/Feature/Filament/InvoiceResourceTest.php

# Run with coverage
php artisan test --coverage
```

### Key Test Cases

- Customer/Product CRUD operations
- Invoice creation with line items (Repeater)
- Invoice totals calculation (subtotal, tax, total)
- SendInvoiceAction changes status and sets sent_at
- RecordPaymentAction updates balance and status
- Payment deletion recalculates invoice
- Status badge displays correctly for each state
