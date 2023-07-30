---
title: Generate QR Code as a Filament Field and OnBoard Users Scanning it
slug: andreaskviby-qr-code-onboarding
author_slug: andreaskviby
publish_date: 2022-12-13
categories: [panel-builder, livewire, form-builder]
type_slug: trick
versions: [2, 3]
---

# Why do I write this?

Well, there was a user that thought it could be a cool thing to write about so I decided to give it a try.

## The idea

I wanted to have a Filament Field that would generate a QR code visible inside Filament on a record. Let's say we have a table with Customers and one with Places. Places is like offices inside a Customer.

## Use case

We have an app where people can register items in their office and to get all staff onboarded without have to register a lot of things they just print out the QR codes and tape them up in their coffee room and they scan it, gets onboard quickly and get started.

## The customers table

```php
Schema::create('customers', function (Blueprint $table) {
  $table->id();
  $table->string('name');
  $table->boolean('approved')->default(false);
  $table->string('domain');
  $table->timestamps();
});
```

It's just a standard customers table, except I can lock down new users when they register on the domain they enter as e-mail.

## The places table

```php
Schema::create('places', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('street_address')->nullable();
    $table->string('zipcode')->nullable();
    $table->string('city')->nullable();
    $table->string('extra_address')->nullable();
    $table->text('description')->nullable();
    $table->string('gps_lat',18)->nullable();
    $table->string('gps_lon',18)->nullable();
    
    $table
        ->foreignId('customer_id')
        ->index()
        ->constrained()
        ->cascadeOnDelete();
    
    $table->timestamps();
});
```

Nothing weird here that I can think of.

## The QR Connections table

So this is the trick, I create a new table called qr_connections and here we will store QR Codes for customers and places so they can onboard and get connected to the correct `customer_id` and `place_id` as soon as they have registered on the site.

```php
Schema::create('qr_connections', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->foreignIdFor(\App\Models\Customer::class, 'customer_id');
    $table->foreignIdFor(\App\Models\Place::class, 'place_id')->nullable();
    $table->bigInteger('views')->default(0);
    $table->timestamps();
});
```

As you can see I have foreign keys to customer and places, places is nullable because not all of they wants to connect to a place, some just to a customer.

## The Livewire component to handle the codes

First of all I register a new route inside `web.php` like below:

```php
Route::get('connect/{code}', \App\Http\Livewire\Connect\Register::class)
    ->name('connect');
```

So their will be a fully qualified url inside the QR codes and they will end with a unique code that is stored in the qr_connections table.

### The mounting of the above Register Component

```php
public function mount($code) {
    $this->code = $code;
    $app_code = QRConnection::where('code', $this->code)->first();
    if ($app_code) {
        $this->customer = $app_code->customer;
        $this->company = $this->customer->name;
        if ($app_code->place_id !== null) {
            $this->place = $app_code->place;
            $this->place_name = $this->place->name;
        }
        $app_code->views = $app_code->views + 1;
        $app_code->save();
    } else {
        throw ValidationException::withMessages(['company' => 'There is no valid code, contact your administrator']);
    }
}
```

As you can see we will get the code from the QR code they have scanned on their mobile. We check if the code exists, if it doesn't we throw back an error to the user on the field company. Now we will render the register form.

### The Livewire view tricks

In the view I can just show you something but not all.

```php
<div class="mt-6">
    <label for="company" class="block text-sm font-medium text-gray-700 leading-5">
        Company
    </label>

    <div class="mt-1 rounded-md shadow-sm">
        <input disabled wire:model.lazy="company" id="name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-teal focus:border-teal-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
    </div>

    @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

@if($place)
    <div class="mt-6">
        <label for="place_name" class="block text-sm font-medium text-gray-700 leading-5">
            Office
        </label>

        <div class="mt-1 rounded-md shadow-sm">
            <input disabled wire:model.lazy="place_name" id="name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-teal focus:border-teal-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
        </div>
    
        @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
@endif
```

So as you can see we will disable the text input of they have that from the QR code and also if the QR code has a place. So they can register as a user on our site but the customer_id and place_id will be locked and preset from the code in the QR code they scan.

## The Filament Field

I am not an expert but a junior in creating custom fields in Filament. Follow their docs and create a new field called QRCode. You will get two files, one Livewire component and one view.

### The Livewire component

```php
<?php

namespace App\Forms\Components;

use App\Models\Customer;
use App\Models\Place;
use App\Models\QRConnection;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Concerns\HasExtraInputAttributes;
use Filament\Forms\Components\Field;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QRCode extends Field
{
    use HasExtraInputAttributes;

    protected string $view = 'forms.components.q-r-code';

    protected bool $customer = false;
    protected bool $place = false;

    public function getQRCode() {
       if ($this->place && !$this->customer) {
            $placeID = $this->getRecordId();

            $qrcode = QRConnection::where('customer_id', Auth::user()->customer->id)->where('place_id', $placeID)->first();
            if ($qrcode) {
                return $qrcode->code;
            } else {
                $qrcode = new QRConnection();// [tl! **]
                $qrcode->customer_id = Auth::user()->customer->id;// [tl! **]
                $qrcode->place_id = $placeID;// [tl! **]
                $qrcode->code = Str::random(6);// [tl! **]
                $qrcode->save();// [tl! **]
                return $qrcode->code;// [tl! **]
            }
       } elseif (!$this->place && $this->customer) {
            $customerID = $this->getRecordId();
            $qrcode = QRConnection::where('customer_id', $customerID)->whereNull('place_id')->first();
            if ($qrcode !== null) {
                return $qrcode->code;
            } else {
                $qrcode = new QRConnection();
                $qrcode->customer_id = $customerID;
                $qrcode->place_id = null;
                $qrcode->code = Str::random(6);
                $qrcode->save();
                return $qrcode->code;
            }
        }
    }

    public function showPlace()
    {
        $this->place = true;

        return $this;
    }

    public function showCustomer()
    {
        $this->customer = true;

        return $this;
    }
    private function getRecordId() {

        $url = explode('/',$_SERVER['REQUEST_URI'])[3] ?? null;
        if ($this->place) {
            $place = Place::where('id', $url)->first();
            if ($place) {
                return $place->id;
            }
        }
        if ($this->customer) {
            $customer = Customer::where('id',$url)->first();
            if ($customer) {
                return $customer->id;
            }
        }

        return null;

    }

}
```

I will not go through all code, you can see for yourself what I do. The most important thing is that I check if the code exist for the selected customer or place and if not I will make one. You should of course check if the code you create using Str::random(6) exists before you save it and keep on randomizing until you get a code that is unique.

### The view part of the custom field

```php
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div
        id="{{ $getId() }}"
        x-data="{ state: $wire.entangle('{{ $getQRCode() }}').defer }"
        class="justify-center mx-auto"
    >
        <img
            src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl={{ env('APP_URL') . '/connect/' . $getQRCode() }}&choe=UTF-8"
            alt="QR Code By GetZero"
        />
        <span class="ml-8" style="font-size: 48px">Kod: {{ $getQRCode() }}</span>
    </div>
    <span class="ml-8">URL: {{ ENV('APP_URL') . '/connect/' . $getQRCode() }}</span>
</x-dynamic-component>
```

So here we will just the code and use Google API to render the QR code, we also show the code and the fully qualified url if they want to text it or email it instead.

### How to use the field in a Filament Form

So when I want to show the QR code to the logged in admin in Filament I just open up the Resource and add a new field into the schema of the Form.

```php
 QRCode::make('qr_code')->label('QR Code')->showPlace()->helperText('Print QR Code or send the link to your employees')
->hiddenOn('create'),
```

As you can see I have it hidden onCreate so it just shows up on Edit. You can also see that I send the property showPlace() here on the PlaceResource and the showCustomer() on the CustomerResource.

## Summary

I hope that you liked my first little article, I believe we can do lots of cool things using Filament. We have built some really cool systems and apps using it.

Thank you!

