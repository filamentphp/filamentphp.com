---
title: Form Builder Pesting with Livewire Volt
slug: shaung-bhone-overriding-the-filament-panel-provider
author_slug: shaung-bhone
publish_date: 2024-6-15
categories: [form-builder]
type_slug: trick
---

## Introduction

Testing is a crucial phase in the software development life cycle, but it can be more challenging than expected. I'm curious about how to test with form builder and volt together. So I googled it, there are not so many topics that maybe it's not. To help, I've created a blog to share my insights. Today, I'll guide you on how to test your Form Builder using Livewire Volt, a class-based component. In this project my client idea is the customer to create an order from other e-commerce website, paste in the `url` field, take a screenshot and then make an order. I will not be covering the installation steps in this part of the guide. Let's start with creating an order.

## Creating Livewire Components

An Artisan command to create a new Volt component `livewire/order/create.blade.php`. A volt component create only blade file there is no `Livewire/Order/Create.php` file. That's different from filament form builder testing docs. Let's see the code.

```php
<?php

use Filament\Forms;
use Filament\Forms\Form;
use Livewire\Volt\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Livewire\Attributes\{Layout, Title};
use Filament\Forms\Concerns\InteractsWithForms;
use Livewire\Features\SupportRedirects\Redirector;

new
#[Layout('layouts.app')]
#[Title('Make An Order')]
class extends Component implements HasForms {
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('url')
                        ->url()
                        ->prefixIcon('heroicon-m-globe-alt'),

                    Forms\Components\FileUpload::make('screenshot')
                        ->required()
                        ->label(__('Screenshot'))
                        ->directory('transaction-images')
                        ->columnSpanFull(),
            ])
            ->statePath('data')
            ->model(App\Models\Order::class);
    }

    public function submit(): Redirector
    {
        abort_if(auth()->guest(), Response::HTTP_FORBIDDEN);

        $record = Auth::user()->orders()->create($this->form->getState());

        $this->form->model($record)->saveRelationships();

        return redirect()->route('dashboard');
    }
}; ?>

<div class="md:w-1/2 flex-auto md:pl-8 mt-5 md:mt-0">
    <form wire:submit.prevent="submit">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-5 flex justify-end">
            <x-primary-button class="ms-3">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</div>
```

## Creating a Pest

An Artisan command to create a new Pest file `tests/Feature/Order/CreateTest.php`. Firstly we need to check order create page is working or not.

```php
it('has order create page', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get('/order/create');

    $response->assertOk()->assertSeeVolt('order.create');
});
```

Ok. that's working for me. Next test if the user is create an order. Let's see the code.

```php
test('user can order the product', function () {
    $this->actingAs(User::factory()->create());

    $file = Illuminate\Http\UploadedFile::fake()->create('screenshot.jpg');

    livewire('order.create')
        ->set('data.screenshot', $file)
        ->fillForm([
            'data.url' => fake()->url(),
            'data.screenshot' => $file->hashName(),
        ])
        ->call('submit')
        ->assertHasNoFormErrors();
});
```

Ok. that's working for me. Let's break down what this code does step by step.

## 1. Creating a Fake File

```php
$file = Illuminate\Http\UploadedFile::fake()->create('screenshot.jpg');
```

The fake method is used to generate a fake file, in this case, a JPEG image. You can check [here](https://laravel.com/docs/11.x/http-tests#testing-file-uploads).

## 2. Interacting with the Livewire Component

```php
livewire('order.create')
    ->set('data.screenshot', $file)
    ->fillForm([
        'data.url' => fake()->url(),
        'data.screenshot' => $file->hashName(),
    ])
    ->call('submit')
    ->assertHasNoFormErrors();
```

Here, we are using the Livewire testing utilities to interact with the `order.create` component:
- You can use blade view directly in the livewire plugins `livewire('order.create')`
- We use the `set` method to assign the fake file to the `screenshot` properties.
- The `call('submit')` method simulates the form submission.
- Finally, `assertHasNoFormErrors` ensures that the form submission did not return any validation errors, confirming the process was successful.

## Conclusion
This test case demonstrates how to simulate a user ordering a product in a Laravel application using Livewire Volt. It covers user authentication, file uploads, and form submissions, ensuring that your component behaves as expected under these conditions. By writing thorough tests like this one, you can maintain high-quality code and provide a robust user experience. Thank you so much.
