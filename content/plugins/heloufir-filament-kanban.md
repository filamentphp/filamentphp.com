---
anystack_id: 9a833198-82cc-42db-836d-a62aaf9e0a15
name: Filament Kanban
slug: heloufir-filament-kanban
author_slug: heloufir
categories: [filament]
description: Integrates Kanban into Filament projects, simplifying task management, progress tracking, and team collaboration, enhancing productivity and organization.
docs_url: https://gist.github.com/heloufir/05a86302f871fa1a81ac05d693d9c9d9
github_repository: heloufir/filament-kanban
has_dark_theme: true
has_translations: false
versions: [3]
publish_date: 2023-11-02
---

# Filament Kanban

- [Introduction](#introduction)
    - [Key Features in the First Version](#key-features-in-the-first-version)
        - [1. Status-Based Visualization](#1-status-based-visualization)
        - [2. Status Management](#2-status-management)
        - [3. Status Sorting](#3-status-sorting)
        - [4. Record Interaction](#4-record-interaction)
- [Installation](#installation)
    - [Requirements](#requirements)
    - [Installing with Composer](#installing-with-composer)
    - [Configuration](#configuration)
- [How to Use It](#how-to-use-it)
    - [Statuses](#statuses)
    - [Records](#records)
    - [Record progress bar](#record-progress-bar)
    - [Record Modal](#record-modal)
    	- [Create a new record action](#create-a-new-record-action)
    - [Events](#events)
        - [Record Dragged & Sorted array](#record-dragged--sorted-array)
        - [Record Clicked array](#record-clicked-array)
- [Customization](#customization)
- [Project Board](#project-board)
    - [How to Use the Project Board](#how-to-use-the-project-board)
- [Questions or Need Help?](#questions-or-need-help)


# Introduction

**Simplify Project Workflow with Kanban**

Filament Kaban is your essential tool for effortlessly integrating Kanban board functionality into your Filament project. In its initial version, Filament Kaban offers streamlined records visualization within status columns, ensuring a clean and organized overview of your tasks. This version will also empower you to handle status changes, sort statuses as needed, and click on records to trigger Livewire events for a more efficient project management experience.

## Key Features in the First Version

### 1. Status-Based Visualization

With the first version of Filament Kaban, you can visualize your project records in a Kanban-style layout, categorizing them into status columns. This provides a clear and concise view of your work at hand, making it easy to track progress and prioritize tasks.

### 2. Status Management

Effortlessly manage the status of your records. Change the status of your tasks with a few simple drag and drop behaviour, ensuring that your project reflects the most up-to-date information at all times.

### 3. Status Sorting

Tailor the order of status columns to suit your project's workflow. Arrange them in the way that best aligns with your process and preferences, providing you with flexibility and control.

### 4. Record Interaction

Click on records within the Kanban board to trigger Livewire events, enabling seamless interactions and updates without navigating away from the board. This feature simplifies the management of tasks and enhances your overall project workflow.

## Installation

[GET THE PACKAGE](https://checkout.anystack.sh/filament-kanban)

First of all thank you for purchasing Filament Kanban!

Below you'll find extensive documentation on installing and using this plugin. Of course, if you have any questions, find a bug, need support, or have a feature request, please don't hesitate to reach out to me at eloufirhatim@gmail.com.

### Requirements

Filament Kanban requires the following:

- `PHP 8.1+`
- `Filament 3+`

### Installing with Composer

To install Filament Keycloak you'll need to add the package via repositories to your  `composer.json`  file:

```json
{
	"repositories": [  
		 {
			 "type": "composer",  
			 "url": "https://filament-kanban.composer.sh"  
		 }  
	]
}
```

Once the repository has been added to your composer.json file, you can install Filament Kanban like any other composer package using the composer require command:

```bash
composer require heloufir/filament-kanban
```

Next, you will be prompted to provide your username and password.

```bash
Loading  composer  repositories  with  package  information
Authentication  required  (filament-kanban.composer.sh):
Username:  [license-email]
Password:  [license-key]
```

Here you need to type your email address (used to purchase the package) and for the password it will be your purchased package License Key.

### Configuration

Now that you have the package installed in your project, you need to follow the below steps to make it works:

-   **Publish configurations**: the package use a configuration file to manage some properties, so if you wanna some customization you can publish it with the following command:

```bash
php artisan vendor:publish --tag=filament-kanban-config
```

This will publish the following file `config/filament-kanban.php`.

-   **Publish translations**: to customize the package translations you can publish it using the following command:

```bash
php artisan vendor:publish --tag=filament-kanban-translations
```

-   **Enable plugin**: to enable the plugin in your Filament application, you only need to add the following to your  `Panel`  provider:


```php
// imports
use Heloufir\FilamentKanban\FilamentKanbanPlugin;

// panel method
public function panel(Panel $panel): Panel  
{  
	return $panel
		//...
		->plugins([  
			new FilamentKanbanPlugin()  
		]);
}
```

## How to use it

Filament Kanban is simply a Filament Page implementing some magic to show a Kanban Board with your statuses (as columns) and your tasks (as records).

So basically, if you want to add a new Kanban Board to your project you need to create a new Filament page and do the following steps:

-   **Create a Filament Page**: you can have more details about creating Filament Pages here [Filament Docs](https://filamentphp.com/docs/panels/pages)

```bash
php  artisan  make:filament-page  MyKanban
``` 

-   **Remove Filament Page view**: this package use it's own view, so you can delete the Blade view created by the above command `resources/views/filament/pages/my-kanban.blade.php`

-   **Configure Filament Page component**: go to the Filament Page component `app/Filament/Pages/MyKanban.php` and make the following changes:

```php
<?php  
  
namespace App\Filament\Pages;  
  
use Heloufir\FilamentKanban\Livewire\Kanban;  
  
class MyKanban extends Kanban // <- Extends from Kanban Instead of Page
{  
	protected static ?string $navigationIcon = 'heroicon-o-document-text';

	// Remove $view variable
}
```

-   **Configure statuses and record**: before you can use the page, you need to configure only 2 things:

### Statuses

The statuses are the Kanban Board columns, here is an example:

```php
public array $statuses = [  
	['id' => 1, 'name' => 'Draft', 'color' => 'gray', 'draggable' => true],  
	['id' => 2, 'name' => 'Submitted', 'color' => 'blue', 'draggable' => false],  
	['id' => 3, 'name' => 'Changes requested', 'color' => 'orangered', 'draggable' => true],  
	['id' => 4, 'name' => 'Published', 'color' => 'green', 'draggable' => true],  
];
``` 

> You can use the setter `setStatuses(array $statuses)` instead to do some logic retrieving your statuses

```php
public function myFunction() {
	$this->setStatuses(
		MyStatusModel::select('id', 'name', 'color', 'draggable')
			->get()
			->toArray();
	);
}
``` 

Here is the fields that you need to know:

| Field | Type | Required | Description | Description |
|--|--|--|--|--|
| id | int | yes |  | The status id (must be unique) |
| name | string | yes |  | The status name (will be the column's title) |
| color | string | no | `"gray"` | The color that will be used to identify the column (can be string, hex, rgb, rgba) |
| draggable | bool | no | `true` | If set to `false` all the status records cannot be *dragged* or *sorted* |


### Records

The records are the Kanban Board tasks that will be visible inside columns, here is an example:

```php
public array $records = [
        ['id' => 1, 'status' => 2, 'title' => 'Record 1 Col 2', 'subtitle' => 'filament-kanban #12', 'sort' => 0, 'draggable' => true, 'click' => true, 'progress' => 20],
        ['id' => 2, 'status' => 3, 'title' => 'Record 1 Col 3', 'subtitle' => 'filament-kanban #13', 'sort' => 0, 'draggable' => true, 'click' => true, 'progress' => 30],
        ['id' => 3, 'status' => 3, 'title' => 'Record 2 Col 3', 'subtitle' => 'filament-kanban #23', 'sort' => 1, 'draggable' => false, 'click' => true],
        ['id' => 4, 'status' => 3, 'title' => 'Record 3 Col 3', 'subtitle' => 'filament-kanban #33', 'sort' => 2, 'draggable' => true, 'click' => false],
        ['id' => 5, 'status' => 3, 'title' => 'Record 4 Col 3', 'subtitle' => 'filament-kanban #43', 'sort' => 3, 'draggable' => true, 'click' => true, 'progress' => 35],
        ['id' => 6, 'status' => 4, 'title' => 'Record 1 Col 4', 'subtitle' => 'filament-kanban #14', 'sort' => 0, 'draggable' => true, 'click' => true, 'progress' => 40],
        ['id' => 7, 'status' => 4, 'title' => 'Record 2 Col 4', 'subtitle' => 'filament-kanban #24', 'sort' => 1, 'draggable' => true, 'click' => true, 'progress' => 50],
        ['id' => 8, 'status' => 4, 'title' => 'Record 3 Col 4', 'subtitle' => 'filament-kanban #34', 'sort' => 2, 'draggable' => true, 'click' => true],
        ['id' => 9, 'status' => 4, 'title' => 'Record 4 Col 4', 'subtitle' => 'filament-kanban #44', 'sort' => 3, 'draggable' => true, 'click' => true, 'progress' => 100],
        ['id' => 10, 'status' => 4, 'title' => 'Record 5 Col 4', 'subtitle' => 'filament-kanban #54', 'sort' => 4, 'draggable' => true, 'click' => true, 'progress' => 80],
        ['id' => 11, 'status' => 4, 'title' => 'Record 6 Col 4', 'subtitle' => 'filament-kanban #64', 'sort' => 5, 'draggable' => true, 'click' => true, 'progress' => 75],
        ['id' => 12, 'status' => 4, 'title' => 'Record 7 Col 4', 'subtitle' => 'filament-kanban #74', 'sort' => 6, 'draggable' => true, 'click' => true, 'progress' => 90],
        ['id' => 13, 'status' => 4, 'title' => 'Record 8 Col 4', 'subtitle' => 'filament-kanban #84', 'sort' => 7, 'draggable' => true, 'click' => true, 'progress' => 85],
        ['id' => 14, 'status' => 4, 'title' => 'Record 9 Col 4', 'subtitle' => 'filament-kanban #94', 'sort' => 8, 'draggable' => true, 'click' => true],
        ['id' => 15, 'status' => 4, 'title' => 'Record 10 Col 4', 'subtitle' => 'filament-kanban #104', 'sort' => 9, 'draggable' => true, 'click' => true],
        ['id' => 16, 'status' => 1, 'title' => 'Record 1 Col 1', 'subtitle' => 'filament-kanban #11', 'sort' => 0, 'draggable' => true, 'click' => true, 'progress' => 0],
        ['id' => 17, 'status' => 1, 'title' => 'Record 2 Col 1', 'subtitle' => 'filament-kanban #21', 'sort' => 1, 'draggable' => true, 'click' => true, 'progress' => 10],
    ];
``` 

> You can use the setter `setRecords(array $records)` instead to do some logic retrieving your records

```php
public function myFunction() {
	$this->setRecords(
		MyRecordModel::select('id', 'status', 'title', 'subtitle', 'sort', 'draggable', 'click', 'progress')
			->get()
			->toArray();
	);
}
``` 

Here is the fields that you need to know:

| Field | Type | Required | Description | Description |
|--|--|--|--|--|
| id | int | yes |  | The record id (must be unique) |
| status | int | yes |  | The record status, used to show the record in the right column |
| title | string | yes |  | The record title, where the user can click to fire the click event |
| subtitle | string | yes |  | Will be visible above the title (can be the record uuid, ...) |
| sort | int | yes |  | Will be used to order the records inside the column |
| draggable | bool | no | `true` | If set to `false` the record cannot be *dragged* or *sorted* |
| click | bool | no | `true` | If set to `false` the record cannot be clicked |
| progress | float | no | 0 | If set and the progress can be shown then a progress bar will be visible inside the record |

**That's it!** You can already see your Kanban Board working, the results will be as the following: 

![image](https://user-images.githubusercontent.com/6197875/280329685-e9f0badf-1477-43ca-b25e-8a0239a4fa6b.png)

**Dark Theme**

![image](https://user-images.githubusercontent.com/6197875/280342133-ba41b7f7-dd69-4c59-8466-0a85753eb83c.png)

### Record progress bar

You can enable or disable the visibility of record progerss bas by overriding the following method inside your Filament Page extending package Kanban Page:

```php
protected function showProgress(): bool|array
{
	return true;
}
```

This method can return a `bool` or `array`, if you choose to return an `array` it must contain the statuses id where you want to enable progress bar

```php
protected function showProgress(): bool|array
{
	return [1, 3]; // Only statuses with id 1 and 3 will contains record with visible progress bar
}
```

### Record Modal

You can choose to handle your records click by listening to the Livewire event `filament-kanban.record-clicked` (see below for more information), or by opening a Filament Modal with an embedded form.

> By default the record click dispatch the Livewire event `filament-kanban.record-clicked`

To enable record modal handling, you need to override the following variable:

```php
class MyKanban extends Kanban  
{  
  
  protected static bool $handleRecordClickWithModal = true;

}
```

Now, when the user clicks on the record title, a `side-over` modal will be opened with a default form containing the following fields: `title`, `subtitle`, `status` and `progress`.

![image](https://user-images.githubusercontent.com/6197875/280395044-b408bcd0-ac72-44f7-865f-f6f5dca50638.png)

You can override this form by overriding the following method:

```php
class MyKanban extends Kanban  
{

	public function form(Form $form): Form  
	{  
		return $form->schema([
			  // Define your custom form schema here
		]);
	}

}
```

> You can check the Kanban `form(Form $form)` method to have an idea

**Important**: You need to define the record modal form submit action by overriding the following command:

```php
class MyKanban extends Kanban  
{

	public function submitRecord(): void  
	{  
		// You can get the form data by using:
		// $this->record  
		dd($this->record);

		// Don't forget to call the 'close-modal'
		// Livewire event to close the modal
		$this->dispatch('close-modal', id: 'filament-kanban.record-modal');
	}

}
```

#### Create a new record action

If you want to add a create action to your page, to show the record form modal, you can use the following variable:

```php
class MyKanban extends Kanban  
{  
  
  protected static bool $enableCreateAction = true;

}
```

This variable will add a Page action `Create a new record`, when clicked will open the same record form but empty.

![image](https://user-images.githubusercontent.com/6197875/280395178-0a2f5ca2-ae02-4993-8757-fe11dc34f9c0.png)

![image](https://user-images.githubusercontent.com/6197875/280395247-5d20184e-a5a4-49f5-8a60-21a246e2de53.png)


### Events

Filament Kanban provides 3 Livewire Events that you should use to interacts with your Drag&Drop, Sort and Click on records.

| Event name | Description | Parameters |
|--|--|--|
| `filament-kanban.record-dragged` | Fired when the record is dragged from a column to another | This event returns the following array: [Record Dragged & Sorted array](#events-objects) |
| `filament-kanban.record-sorted` | Fired when the record is sorted inside the same column | This event returns the following array: [Record Dragged & Sorted array](#events-objects) |
| `filament-kanban.record-clicked` | Fired when the user click on the record title | This event returns the following array: [Record Clicked array](#events-objects) |

#### Events objects

- **Record Dragged & Sorted array**

| Fields | Type | Description |
|--|--|--|
| record | int | The record dragged or sorted id |
| source | int | The record dragged or sorted from status id |
| target | int | The record dragged or sorted to status id |
| old_index | int | The record dragged or sorted from index |
| new_index | int | The record dragged or sorted to index |
| ordered_records | array | Contains the following fields (`record`, `old_index`, `new_index`) of the reordered records after the action has been made on the principal record (the record field above) |

Usage example:

```php
  
namespace App\Filament\Pages;  
  
use Heloufir\FilamentKanban\Livewire\Kanban;  
  
class MyKanban extends Kanban  
{

	// ...
	protected $listeners = [  
		'filament-kanban.record-dragged' => 'recordDragged'
		// Same object for the event 'filament-kanban.record-sorted'
	];

	public function recordDragged(array $event)  
	{  
		dd('record-dragged', $event);  
	}

	/*
		The $event will contains 
		[
			'record' => 1,
			'source' => 1,
			'target' => 2,
			'old_index' => 0,
			'new_index' => 1,
			'ordered_records' => [
				// Here the record with id 3 was in index 1 and after we
				// dragged the record with id 1 in it's place it was reordered
				// to index 2 inside it's column
				[
					'record' => 3,
					'old_index' => 1,
					'new_index' => 2
				],
				...
			],
		]
	*/

}
```

- **Record Clicked array**

| Fields | Type | Description |
|--|--|--|
| record | int | The record clicked id |

Usage example:

```php
  
namespace App\Filament\Pages;  
  
use Heloufir\FilamentKanban\Livewire\Kanban;  
  
class MyKanban extends Kanban  
{

	// ...
	protected $listeners = [  
		'filament-kanban.record-clicked' => 'recordClicked'
		// Same object for the event 'filament-kanban.record-sorted'
	];

	public function recordClicked(array $event)  
	{  
		dd('record-clicked', $event);
	}

	/*
		The $event will contains 
		[
			// The record clicked by the user was the 
			// record having the id equals to 1
			'record' => 1,
		]
	*/

}
```

## Customization

For the current version the only thing you can customize using the configuration file `config/filament-kanban.php` is the Kanban height.

The **Kanban height** is calculated by the package to fit the remaining screen height, but if ou want to specify the height in pixels you can change it inside this file, example:

```php
// config/filament-kanban.php
<?php  
  
return [  
  
	'kanban-height' => '900px' // To set the Kanban height to 900 pixels 
  
];
```

## Project Board

Our development progress, feature requests, and bug tracking are all transparently managed through our GitHub project board. This board provides you with insights into what's in the pipeline and what we're currently working on. It's also the place where you can suggest new features or report issues.

Project Board is accessible here: [Filament Kanban project board](https://github.com/users/heloufir/projects/5)

### How to Use the Project Board

**1. Explore Upcoming Features:** Check out the "To Do" and "In Progress" columns to see what we have planned and what we're actively working on.

**2. Report Issues:** If you encounter any problems, bugs, or have feature requests, please send me an email to me at [eloufirhatim@gmail.com](mailto:eloufirhatim@gmail.com).

**3. Feature Requests:** Have an idea for a new feature or improvement? Don't hesitate to reach out to me at [eloufirhatim@gmail.com](mailto:eloufirhatim@gmail.com), and I will consider it for future development.

### Questions or Need Help?

If you have questions or need assistance, join the package discord server: https://discord.gg/EHvzXEXH
