---
name: Media Library Manager
slug: ralphjsmit-media-library-manager
author_slug: ralphjsmit
categories: [form-builder, form-field, spatie, panel-builder]
checkout_url: https://ralphjsmit.com/filament-plugins/filament-media-library-pro/configure?referer=filament
price: €49.00
description: Give your users a beautiful way to upload, manage and select media and images in Filament Admin. Integrates with Spatie Media Library.
discord_url: https://discord.com/channels/883083792112300104/961393209639067698
github_repository: ralphjsmit/laravel-filament-media-library
has_dark_theme: true
has_translations: true
versions: [2, 3]
publish_date: 2023-07-17
---

This package allows you to give your users a beautiful way to upload images to your application and manage their library. It integrates with and is based on [Spatie MediaLibrary](https://github.com/spatie/laravel-medialibrary), one of the most popular and widely used packages in the Laravel ecosystem.

**New: Package includes Filament V3 support!**

[**Upgrading from V1 to V2?**](#upgrading-from-v1-to-v2)<br>
[**Upgrading from V2 to V3?**](#upgrading-from-v2-to-v3)

### Features

- Media library page in your application.
- Custom field to select a media item.
- Multiselect **(NEW IN V2)**
- Folders **(NEW IN V2)**
- Table column to display a media library item **(NEW IN V2)**
- Custom forms when viewing/editing an image **(NEW IN V2)**
- Filament V3 Infolists entry to display a media library item **(NEW IN V3)**
- Integration with Spatie MediaLibrary.
- Bulk-upload images.
- Responsive images.
- Ability to add items outside of Filament Admin.
- Beautiful design & integration with Filament Admin.
- Support for dark mode. 🌚
- Can be easily translated with a language file.
- Can be used outside the admin panel, with only the Form Builder.
- Register your own media conversions.
- Upload images, SVGs, PDFs and videos.
- Support for policies.
- Search through image names and filenames.
- Support for all filesystem disks, both public and private, including S3.
- Performant UI **(IMPROVED IN V2)**
- Replace image **(NEW IN V2)**
- Ability to show upload box by default **(NEW IN V2)**
- Show a warning when there are unstored files in the upload box **(NEW IN V2)**
- Customisable button label for the media picker **(NEW IN V2)**
- Sorting files & folders **(NEW IN V2)**
- English, Dutch and Italian translated included & translatable in any language
- Global search for folders and files
- Integration with [TipTap editor](https://filamentphp.com/plugins/awcodes-tiptap-editor) **(NEW IN V3)**
- Bulk delete folders including all content **(NEW IN V3)**

[**View changelog**](https://changelog.anystack.sh/filament-media-library-pro)

### Screenshots

#### Library (light and dark mode)

The MediaLibrary page is the page where your users can view all their images. The complete package is compatible with both dark- and lightmode.

![Media Library page](https://ralphjsmit.com/storage/media/243/responsive-images/FilamentMediaLibrary___responsive_2749_1996.jpg)

![Media Library page Dark Mode](https://ralphjsmit.com/storage/media/247/responsive-images/FilamentMediaLibrary-Dark___responsive_2749_1996.jpg)

#### Upload & bulk upload

Users can drag-and-drop their images unto the upload component. Bulk uploads are allowed. You can use Laravel's queue processing feature to handle the process of generating responsive images in the background.

![Filament MediaLibrary regular upload](https://ralphjsmit.com/storage/media/251/responsive-images/FilamentMediaLibrary-Upload___responsive_2749_1996.jpg)

![Filament Media Library Bulk Upload](https://ralphjsmit.com/storage/media/244/responsive-images/FilamentMediaLibrary-BulkUpload___responsive_2749_1996.jpg)

![Media Library Bulk Upload](https://ralphjsmit.com/storage/media/245/responsive-images/FilamentMediaLibrary-BulkUpload-StoringFiles___responsive_2749_1996.jpg)

#### MediaPicker Field & modal

You can use the MediaPicker Field everywhere inside the admin panel where you want it: as a single field or in a repeater. It works everywhere.

![MediaPicker Field & modal](https://ralphjsmit.com/storage/media/242/responsive-images/Custom-field___responsive_1142_470.jpg)

When a user clicks on 'Choose image', he/she will see the following modal, which they can use to pick an image.

![Filament MediaPicker Modal](https://ralphjsmit.com/storage/media/249/responsive-images/FilamentMediaLibrary-Modal___responsive_2576_1726.jpg)

Users can also pick multiple images at the same time (V2-feature):

![Filament MediaPicker Modal Multiple](https://ralphjsmit.com/storage/media/248/responsive-images/FilamentMediaLibrary-Modal-Multiple___responsive_2576_1726.jpg)

#### Image detail

You can browse images using the UI:

![Filament MediaLibrary Browse library](https://ralphjsmit.com/storage/media/246/responsive-images/FilamentMediaLibrary-CreateFolder___responsive_865_678.jpg)

For each image, you can view the image, view rows of information (can add custom rows) and edit each item using a custom form:

![Image detail vertical](https://ralphjsmit.com/storage/media/256/responsive-images/MediaInfo---custom-forms___responsive_679_1925.jpg)

One of the use cases could be to allow adding tags to images:

![Custom form with tags](https://ralphjsmit.com/storage/media/254/responsive-images/MediaInfo-tags___responsive_600_458.jpg)

#### Default theme

By default Filament comes with its own CSS, which integrates neatly into the admin panel design. However, as I did in the above screenshots, it is just as beautiful if you integrate it with your own Filament theme.

![Filament MediaLibrary With Default Theme](https://ralphjsmit.com/storage/media/255/responsive-images/FilamentMediaLibrary-Page-DefaultTheme___responsive_2679_1901.jpg)

<br><br>

## Installation guide: A Convenient Media Library for Filament Admin

Thank you for purchasing the ultimate Media Library plugin for Filament Admin!

We tried to make the library as **easy-to-install** and **versatile** as possible. Nevertheless, if you still have a **question or a feature request**, please send an e-mail to **support@ralphjsmit.com**.

In this guide I'll show you **how to install the library**, so you **can start using it right away**.

### Prerequisites

For these installation instructions to work, you'll need to have the [Filament Admin](https://filament-admin.com) package installed and configured.

The package makes use of the [Spatie MediaLibrary](https://github.com/spatie/laravel-medialibrary) package. If you already have this package installed, you can skip this step.

We'll need to publish the required migration first by running the following Artisan command.

```shell
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations"
```

The package is supported on Laravel 8, Laravel 9 and Laravel 10. Please be aware though that support for security fixes for Laravel 8 has ended.

You'll also need to have the [ImageMagick PHP-extension](https://imagemagick.org) installed on your system for the image conversions to happen. This is a relatively common extension and required by the underlying Spatie media library plugin. If you are using Laravel Sail, check out the section below.

#### Installing ImageMagick on Laravel Sail

If you use Laravel Sail, installing ImageMagick requires a few additional steps. To get started, try the following steps:

1. First, run `php artisan sail:publish` to publish your DockerFiles.
2. Then, open the DockerFile that corresponds to your PHP version (e.g. `docker/8.1/docker/Dockerfile` for PHP 8.1).
3. Add the `php8.1-imagick` to the line with the PHP extensions (use the correct PHP version).
4. Run `php artisan sail build --no-cache`.
5. Restart the container and continue with the installation.

### Installation via Composer

To install the package you should add the following lines to your `composer.json` file in the `repositories` key in order to allow access to the private package:

```json
{
  "repositories": [
    {
      "type": "composer",
      "url": "https://satis.ralphjsmit.com"
    }
  ]
}
```

> If you have one of my other premium packages installed already, then you don't need to repeat these lines.

Next, you should require the package via the command line. You will be prompted for your username (which is your e-mail) and your password (which is your license key, e.g. `8c21df8f-6273-4932-b4ba-8bcc723ef500`).

```shell
composer require ralphjsmit/laravel-filament-media-library
```

If you want to use the plugin in Filament V2, please require the `'^2.0'` version. If you want to use the plugin in Filament V3, please require the `'^3.0'` version (which is the default).

After purchasing the plugin, you'll also be shown installation instructions with the appropriate credentials pre-filled.

Finally, you'll need to publish the migration and migrate the database:

```shell
php artisan vendor:publish --tag="filament-media-library-migrations"

php artisan migrate
```

### Add plugin Blade files to your custom theme `tailwind.config.js` (required)

Since this plugin registers new HTML, you need to make sure that the Tailwind CSS classes are generated. New in Filament V3 is that you need to create a custom theme in order to include CSS from plugins (in order to keep your panel as fast as possible). If you do not follow this step, you risk that the plugin pages/designs look weird, because CSS is missing.

First, make sure you are [using a custom theme](https://filamentphp.com/docs/3.x/panels/themes) for every panel that you want to use the media library in. Please check that you registered your theme in your panel provider(s) using `$panel->viteTheme('resources/css/filament/{nameOfTheme}/theme.css`)` for Vite or the method for Mix specified in the create theme command output.

Next, you'll need to instruct Tailwind to also purge the view-files for the media library. Add the following key to the `content` key of the `tailwind.config.js` file **for each of the themes you use the media library in**:

```js
content: [
    // Your other files
    './vendor/ralphjsmit/laravel-filament-media-library/resources/**/*.blade.php'
],
```

> NB. The `tailwind.config.js` you need to add this line to is not a possible `tailwind.config.js` file in your root project, but only in the `resources/css/filament/{nameOfTheme}/tailwind.config.js` file(s) of your theme(s).

### Configuring the plugin per-panel (Filament V3)

If you are using the plugin in Filament V3, you should register the plugin in each of the panels that you have in your project and would like to use the media library in:

```php
use RalphJSmit\Filament\MediaLibrary\FilamentMediaLibrary;

$panel
    ->plugin(FilamentMediaLibrary::make())
```

In the rest of the below documentation, if we refer to the `$plugin` variable, then we mean the `$plugin = FilamentMediaLibrary::make()`. This is not necessarily a variable, but it helps to keep the code examples shorter and simpler.

Therefore, the following code examples mean the same:

```php
$plugin
    ->diskVisibilityPrivate()
    ->someOtherMethod();
```

```php
use RalphJSmit\Filament\MediaLibrary\FilamentMediaLibrary;

$panel
    ->plugin(
        FilamentMediaLibrary::make()
            ->diskVisibilityPrivate()
            ->someOtherMethod()
    )
```

### Setting up the disk (& configuring S3)

The Filament Media library uses the [Spatie Medialibrary](https://spatie.be/docs/laravel-medialibrary/master/introduction) as underlying package. By default, the Spatie Medialibrary package will put your images on the `public` disk.

If you want to change the disk, publish the Spatie Medialibrary configuration file and update the `disk_name` value:

```bash
php artisan vendor:publish --provider='Spatie\MediaLibrary\MediaLibraryServiceProvider' --tag='config'
```

Then, configure the panel with your new disk in the `config/media-library.php`. This could be an S3 disk for example.

```php
/*
 * The disk on which to store added files and derived images by default. Choose
 * one or more of the disks you've configured in config/filesystems.php.
 */
'disk_name' => env('MEDIA_DISK', 'public'),
```

Finally, if your disk is a private disk (like S3), then you need to update the `filament-media-library.disk.visibility` value to “private”:

```php
// By default, this package assumes that the disk you are using is public. If your disk
// is private, use the below "diskVisibilityPrivate()" method to set it to "private".
$plugin
    ->diskVisibilityPrivate()
    // Alternative: ->diskVisbility('private')
```

Finally, you'll also need to replace the default `url_generator` in the `config/media-library` to use the custom generator. This is only necessary if you have set your disk visibility to private:

```php
/*
 * When urls to files get generated, this class will be called. Use the default
 * if your files are stored locally above the site root or on s3.
 */
'url_generator' => RalphJSmit\Filament\MediaLibrary\UrlGenerator\MediaLibraryUrlGenerator::class,
```

If you skip this step, then you risk that some images in the library are not displayed correctly.

## Usage

Using the media library is very simple. After installing it, you should see a new page in your sidebar called "Media library". On this page your users can upload images, view their other images, edit metadata and delete images.

### Technical details

It might be handy to know a bit about how the media library works under-the-hood. Each item in your media library is an instance of the `RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem` Eloquent model. This model is used to store metadata about the image.

For example, if you have 10 images in your library, you will also have 10 `MediaLibraryItem` models with metadata.

### Manually adding uploaded files

Adding an image can be done via the static `addUpload` method on the MediaLibraryItem class. This method accepts an instance of `Illuminate\Http\UploadedFile`.

```php
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem;

$uploadedFile = /** */;

$mediaItem = MediaLibraryItem::addUpload($uploadedFile);
```

You only need to know the above information if you want to manually add uploaded files.

The image files itself are being stored by the Spatie MediaLibrary package. The files are stored in a collection called `library`.

### Manually adding files from a path

Sometimes you don't have an instance of an `UploadedFile` ready, but you only have a path to the image. That situation is also possible, though it requires a little bit more work.


```php
$path = /** */;

$originalFileName = 'test.jpg';

$uploadedFile = UploadedFile::createFromBase(new \Symfony\Component\HttpFoundation\File\UploadedFile($path, $originalFileName));

MediaLibraryItem::addUpload($uploadedFile);
```

### Customizing page navigation details

If you want to customize the navigation details of the Media library page, you can configure it using the dedicated methods on the `$plugin` when configuring it:

```php
$plugin
    ->navigationGroup('Media')
    ->navigationSort(1)
    ->navigationLabel('Media Browser')
    ->navigationIcon('heroicon-o-camera')
    ->activeNavigationIcon('heroicon-s-camera')
    ->pageTitle('Media Browser')
    ->slug('media-browser')
```

### Customizing the page

If you want to customise or override other aspects of the page, you can create a new class in your project that extends the `\RalphJSmit\Filament\MediaLibrary\Media\Pages\MediaLibrary` page. In this class you can override everything you want to customize, like the title, navigation label or navigatin group.

Finally, you should register the new page in Filament by using the `->registerPages()` method:

```php
$plugin->registerPages([
    YourExtendedMediaLibraryPage::class,
])
```

### MediaPicker

This plugin comes with a custom Filament field called a `MediaPicker`. This field can be used to choose an image from the library. The field looks like this:

![MediaPicker Field & modal](https://ralphjsmit.com/storage/media/157/responsive-images/Custom-Field___responsive_1546_1556.jpg)


The field can be used anywhere you want: it behaves just like a normal field.

The field consists of two things:

1. A part that is always visible.
2. A modal to browse the actual media library.

Include the field like this:

```php
MediaPicker::make('image')
    ->label('Choose image')
    ->required(),
```

The value of the field will be the `id` of the MediaLibraryItem that is being selected.

#### Selecting multiple items in the media picker

You can use the `->multiple()` to select multiple items using the MediaPicker component:

```php
MediaPicker::make('images')
    ->label('Choose images')
    ->required()
    ->multiple(),
```

The value of the field will be an array with the `id`'s of the MediaLibraryItem's that are being selected.

#### Limiting the accepted file types (V3)

You can limit the `MediaPicker` to only allow selecting certain types of files. This works similar to the Filament `FileUpload` field by exposing an `->acceptedFileTypes()` method.

For example, in order to only allow selecting PDFs, you can use it like this:

```php
MediaPicker::make('brochure_id')
    ->label('Choose brochure')
    ->acceptedFileTypes(['application/pdf']),
```

The `->acceptedFileTypes()` function accepts the mimetypes of the files that you want to allow. You can use wildcards like `video/*` or `image/*`.

#### Opening the MediaPicker in a default folder

By default, the MediaPicker will open in the root folder. However, in some cases, you might want to open the MediaPicker in a specific default folder. You can do that using the `->defaultFolder()` function.

The `defaultFolder()` functions accepts a `MediaLibraryFolder` object as parameter. You can also pass a closure, and use that closure to retrieve the folder dynamically from e.g. the current record.

```php
MediaPicker::make('featured_image_id')
    ->defaultFolder(MediaLibraryFolder::find(99)),
```

Using a closure:

```php
MediaPicker::make('featured_image_id')
    ->defaultFolder(fn (Event $event) => $event->mediaLibraryFolder),
```

NB.: Please note that the media picker will now open this folder by default. However, users are still able to click to other folders and view them. If you have a need to disable this and only force a specific folder, please let me know via Discord or support@ralphjsmit.com.

#### Reordering multiple items in the media picker (V3)

If you are allowing your users to select multiple items, you can use the `->reorderable()` method to allow your users to reorder the images. This can be useful in situations where the order of the media matters, for example if you want to construct a slideshow or carousel.

```php
MediaPicker::make('images')
    ->label('Choose images')
    ->required()
    ->multiple()
    ->reorderable(),
```

The value of the field will be an array with the `id`'s of the MediaLibraryItem's that are being selected, in the order that they were selected.

If a user hovers over an image, the cursor will change into a “move” icon, so that it is clear that the media can be reordered.

### Displaying images on your site

The MediaPicker component will store the `id` of the `MediaLibraryItem` model. To display an image, you can use that `id` to find the appropriate model.

Each model has a related `Spatie\MediaLibrary\MediaCollections\Models\Media` model. You can use this `Media` model to retrieve URLs, paths & other properties. You can use [all the methods described in the Spatie MediaLibrary documentation](https://spatie.be/docs/laravel-medialibrary/v10/basic-usage/retrieving-media).

```php
$id = /** You stored this */

$mediaLibraryItem = MediaLibraryItem::find($id);

$spatieMediaModel = $mediaLibraryItem->getItem();

$url = $spatieMediaModel->getUrl();
$path = $spatieMediaModel->getPath();

//
```

We also provided support for the [responsive images feature](https://spatie.be/docs/laravel-medialibrary/v10/responsive-images/getting-started-with-responsive-images) from Spatie.

### Deleting an image

If you want to **delete an image**, please **delete the MediaLibraryItem** model and **not** Spatie's Media model. Spatie's Media model is automatically deleted when you delete the original MediaLibraryItem model.

### Adding custom forms for editing media library items (NEW IN V2)

By default, people can edit the caption and alt text of a media library item. If you want to add more fields or remove the default fields, you can do so by providing a callback to the `MediaLibrary::registerMediaInfoFormFields()`-method in the `boot()` method of a service provider.

This example will show you how to add a color picker to the form.

First, you need to create a migration to add the column in which we will save the hex-code:

```php
Schema::table('filament_media_library', function(Blueprint $table) {
    $table->string('main_color')->nullable()->after('alt_text');
});
```

```php
use Filament\Forms\Components\ColorPicker;
use RalphJSmit\Filament\MediaLibrary\Facades\MediaLibrary;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem;

MediaLibrary::registerMediaInfoFormFields(function (array $schema, MediaLibraryItem $mediaLibraryItem): array {
    return array_merge($schema, [
        ColorPicker::make('main_color')
            ->label('Main color'),
    ]);
});
```

You can also remove the default fields by not merging them with the new fields:

```php
MediaLibrary::registerMediaInfoFormFields(function (array $schema, MediaLibraryItem $mediaLibraryItem): array {
    return [
        ColorPicker::make('main_color')
            ->label('Custom field'),
    ];
});
```

If you want to hide all the fields, you can return an empty array:

```php
Facades\MediaLibrary::registerMediaInfoFormFields(function (array $schema, MediaLibraryItem $mediaLibraryItem): array {
    return [];
}, merge: false);
```

#### Adding tags to media library items (NEW IN V2)

This example will show you how to add tags to your media library items based on the [Filament Spatie Tags plugin](https://filamentphp.com/plugins/spatie-tags). I will assume you have already run the migrations. You can find the installation instructions [here](https://filamentphp.com/plugins/filament-spatie-media-library#installation).

Next, you need to prepare the Eloquent model for attaching tags. That means that we need to add a trait to the MediaLibraryItem Model. In order to achieve that, create a new file in your project with the name `MediaLibraryItem`, that extends the original `MediaLibraryItem` model and adds the `HasTags`-trait. You could do this in your own `app/Models` directory, but you are free to choose your own.

```php
class MediaLibraryItem extends \RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem
{
    use HasTags;
}
```

Then, register the tags input with the facade:

```php
MediaLibrary::registerMediaInfoFormFields(fn (array $schema): array => [
    ...$schema,
    SpatieTagsInput::make('tags'),
]);
```

This is how the end-result will look like:

![Custom form with tags](https://ralphjsmit.com/storage/media/224/responsive-images/MediaInfo-tags___responsive_816_538.jpg)

### Adding custom information rows to media items (NEW IN V2)

When viewing a media item in your library, you might notice that there are some extra rows of information displayed. You can overwrite the existing rows or add custom rows by providing a callback to the `MediaLibrary::registerMediaInfoInformationUsing()`.

```php
use RalphJSmit\Filament\MediaLibrary\Facades\MediaLibrary;
use RalphJSmit\Filament\MediaLibrary\Media\DataTransferObjects\MediaItemMeta;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem;

MediaLibrary::registerMediaInfoInformationUsing(function (array $information, MediaLibraryItem $mediaLibraryItem, MediaItemMeta $mediaItemMeta): array {
    return array_merge($information, [
        'ID' => $mediaLibraryItem->getKey(),
        'Thumb conversion generated' => $mediaLibraryItem->getItem()->hasGeneratedConversion('thumb') ? 'Yes' : 'No',
    ]);
});
```

### Policies

The media library package offers support for policies. This allows you to determine whether a user can **create** a new media library item/folder or **delete** an old item/folder.

#### Media library item

Supported checks for media library items are:

- `create`
- `delete`

First, create a policy (e.g. in `app/Policies`) with the following contents:

```php
<?php

namespace App\Policies;

class MediaLibraryItemPolicy
{
    public function create(User $user): bool
    {
        //
    }

    public function delete(User $user, MediaLibraryItem $mediaLibraryItem): bool
    {
        //
    }
}
```

Next, open up your `AuthServiceProvider` and register the policy for the model:

```php
protected $policies = [
    MediaLibraryItem::class => MediaLibraryItemPolicy::class,
];
```

Now you are ready and the `create` and `delete` actions are governed by a policy.

This will cause two new rows in the table to show up.

#### Media library folder (V2)

Supported checks for media library folders are:

- `create`
- `update`
- `delete`

First, create a policy (e.g. in `app/Policies`) with the following contents:

```php
<?php

namespace App\Policies;

class MediaLibraryFolderPolicy
{
    public function create(User $user): bool
    {
        //
    }

    public function delete(User $user, MediaLibraryFolder $mediaLibraryFolder): bool
    {
        //
    }
}
```

Next, open up your `AuthServiceProvider` and register the policy for the model:

```php
protected $policies = [
    MediaLibraryFolder::class => MediaLibraryFolderPolicy::class,
];
```

Now you are ready and the `create` and `delete` actions are governed by a policy.

### Registering custom media conversions

By default, the plugin registers four media conversions. The media conversions are:

1. `responsive`
2. `400` (known as `small`)
3. `800` (known as `medium`)
4. `thumb`

These conversions are used throughout the plugin, so you cannot remove them. However, you are free to register additional media conversions using the `MediaLibrary::registerMediaConversions()` function:

```php
use RalphJSmit\Filament\MediaLibrary\Facades\MediaLibrary;

MediaLibrary::registerMediaConversions(function (MediaLibraryItem $mediaLibraryItem, Media $media = null) {
    $mediaLibraryItem
        ->addMediaConversion('test');

    // ..
});
```

You should place the above code in the `boot()`-method of a service provider. For example, the `AppServiceProvider` or a custom provider, e.g. `MediaLibraryServiceProvider`.

You are free to register as many conversions as you like. However, be aware that each new conversion takes up more disk space.

### Changing the conversion for thumbnails

By default, the plugin generates a square media conversion called `thumb` that is used to display each media item in the library.

If you wish, you can change the conversion that is displayed in the library by using the `->thumbnailMediaConversion()` method in the panel service providers:

```php
// You can change the media conversion that is used to display the previews in the library.
// The default conversion is `thumb`. This conversion is a square conversion and generated
// automatically already. However, you can change the conversion to any other conversion.
// Please keep in mind that square conversions that aren't large work best.
$plugin->thumbnailMediaConversion('thumb');
```

### Changing the conversion for the media picker

By default, the plugin generates a square media conversion called `thumb` that is used to display each media item in the media picker.

If you wish, you can change the conversion that is displayed in the library by using the `->mediaPickerMediaConversion()` method in the panel service providers:

```php
// You can change the media conversion that is used to display the previews in the library.
// The default conversion is `thumb`. This conversion is a square conversion and generated
// automatically already. However, you can change the conversion to any other conversion.
// Please keep in mind that square conversions that aren't large work best.
$plugin->mediaPickerMediaConversion('thumb');
```

### Enable uploading videos & PDFs

The media library also has support for uploading videos & PDFs. By default, these options are disabled, because they might need the installation of an addition library.

You can enable video and PDF-support using the plugin configuration:

```php
  // You can specify the filetypes you want your users to be able to upload.
  $plugin
      // There is no additional configuration needed for accepting images.
      ->acceptImage()

      // In order to upload PDFs, you need to have the "spatie/pdf-to-image" package configured correctly.
      // This package is already required via Composer, but you need to make sure that the extension for
      // imagick has been installed and that Ghostscript is installed. Check out the following link:
      // https://github.com/spatie/pdf-to-image#requirements
      ->acceptPdf()

      // In order to let your users upload videos, you need to have the FFmpeg binary installed. See
      // the website of FFmpeg for installation instructions: https://ffmpeg.org/download.html.
      ->acceptVideo()
```

### Changing the width of the media picker modal

You can update the width of the media picker modal using the `->mediaPickerModalWidth()` method in the plugin configuration. The default width is `7xl`.

```php
$plugin->mediaPickerModalWidth('7xl');
```

### Showing the upload box by default (NEW IN V2)

It is possible to show the upload box by default instead of having to open the box first by clicking the 'upload'
button. Depending on your application, this might improve the user experience.

To enable this behaviour, use the `->showUploadBoxByDefault()` on the plugin configuration:

```php
$plugin->showUploadBoxByDefault();
```

### Showing a warning box when there are unstored files in the upload box (NEW IN V2)

When uploading files, it is required for the user to click the button "Store" in order to upload the files and push them to the server. The reason for this behaviour instead of auto-upload, is two-fold.

1. It will give the user the ability to remove a selected file and select a different file instead
2. Technically, auto-uploading won't work well with Livewire in situations where users bulk upload 3 or more files

This can be confusing for some users. Some users forget to click "Store" and therefore the uploaded files never reach your server.

In order to solve this problem and improve the UX, you can choose to enable a warning box when there are files in the upload box that are not stored yet. The warning will be "Don't forget to click 'store' to upload your file/files".

To enable the warning box, set the `->unstoredUploadsWarning()` to `true`:

```php
$plugin->unstoredUploadsWarning();
```

### Adding a custom button label to the media picker (NEW IN V2)

By default, the button of the media picker component will display "Choose image". You can override this by providing your own (dynamic) translation via the `->buttonLabel()` method:

```php
MediaPicker::make('hero_image_id')
    ->buttonLabel('Choose hero image'),
```

### Media table column

You can use the MediaColumn to display a preview of the media item in a table resource. For this to work, you need to have a relationship to the media library item in your model.

For example, consider a situation where you have a `thumbnail_id` on your Eloquent model. This `thumbnail_id` will contain the ID of the media library item that has been selected using the `MediaPicker::make('thumbnail_id')`. You then need to add the following relationship to your Eloquent model:

```php
public function thumbnail(): BelongsTo
{
    return $this->belongsTo(MediaLibraryItem::class, 'thumbnail_id');
}
```

Next, you can use the MediaColumn like this:

```php
use RalphJSmit\Filament\MediaLibrary\Tables\Columns\MediaColumn;

MediaColumn::make('thumbnail'),
```

All methods available on the `ImageColumn` class are also available on the `MediaColumn` class.

```php
MediaColumn::make('thumbnail')
    ->circular()
    ->size(40)
```

You only do not need to use the `->collection()`, `->conversion()` methods.

> If you are getting an error like `App\Models\Post::getMediaLibraryCollectionName()`, please check if the relationship is defined. For example, if you want to use a `thumbnail` relationship, check if there is a method called `thumbnail()` on your model that returns a relation.

You can also use the MediaColumn to display multiple images from a relationship. For example, consider that you have a `Post` model with a `thumbnail` relationship. Say that we also have an `Author` model. We could add an `HasManyThrough` relationship to the `Author` model to get the thumbnails of the posts from this author:

```php
class Author extends Model
{
    public function thumbnails(): HasManyThrough
    {
        return $this->hasManyThrough(
            MediaLibraryItem::class,
            Post::class,
            'author_id', // Foreign key on posts table
            'id', // Key on authors table
            'id', // Key on filament_media_library_items table
            'thumbnail_id', // Foreign key on posts table
        );
    }

    // ...
}
```

Next, we could use the MediaColumn to display the thumbnails of the posts from this author:

```php
MediaColumn::make('thumbnails')
    ->circular()
    ->stacked()
```

### Filament V3 Infolists entry (V3)

The plugin also includes a handy `MediaEntry` infolist component, that you can use to display media in your infolists.

This `MediaEntry` components works in exactly the same way as the `MediaColumn` component. Therefore, I'll assume the `thumbnail` and `thumbnails` relationships from above.

Next, you can use the `MediaColumn` like this:

```php
use RalphJSmit\Filament\MediaLibrary\Infolists\Components\MediaEntry;

MediaEntry::make('thumbnail'),
```

All methods available on the `ImageEntry` class are also available on the `MediaEntry` class.

```php
MediaEntry::make('thumbnail')
    ->circular()
    ->size(40)
```

> If you are getting an error like `App\Models\Post::getMediaLibraryCollectionName()`, please check if the relationship is defined. For example, if you want to use a `thumbnail` relationship, check if there is a method called `thumbnail()` on your model that returns a relation.

Next, we could use the `MediaEntry` to display the thumbnails of the posts from this author:

```php
MediaEntry::make('thumbnails')
    ->circular()
    ->stacked()
```

### Overriding custom classes

The plugin provides several configuration options to override the internal classes it uses. This can be handy in situations where you want to make a small tweak to a certain behaviour or design.

Make sure to always extend the original class.

```php
$plugin
    // Use the below methods to customize the model used for media library items.
    // This allows you to override the model for an iten and customize it.
    // Make sure to always extend the original model, so that you will not accidentally
    // lose functionality or forget to upgrade functions.
    ->modelItem(MediaLibraryItem::class)
    ->modelFolder(MediaLibraryFolder::class)
```

```php
// The resources and pages to enable in your application.
$plugin
    // From the below array, you can remove the pages you don't need.
    // If you want to modify a page yourself, you can extend the original page
    // and register your own class here that extends the page. In that way, you can
    // customize labels, titles, etc.
    ->registerPages([
        MediaLibrary::class,
    ])

    // The below three classes are the main Livewire-components. If you want to modify
    // one of the classes, you can create a new class that extends the original class
    // and update the configuration here accordingly.
    // NB.: Please note that I cannot guarantee that breaking changes will never happen
    // inside these classes, so be sure to check if your changes still work after each update.
    ->uploadMediaComponent(UploadMedia::class)
    ->mediaInfoComponent(MediaInfo::class)
    ->browseLibraryComponent(BrowseLibrary::class)
],
```

> NB.: Please note that I cannot guarantee that breaking changes will never happen inside these classes, so be sure to check if your changes still work after each update.

### Enabling global search in your panel (V3)

The media library allows you to add global search to your panel. Normally, Filament only allows to globally search Resources (and not pages), but you can quite easily accomplish a search by creating a custom `GlobalSearchProvider`.

Create a class somewhere in your project (an example could be `App/Filament/GlobalSearch/GlobalSearchProvider`). Add the following contents:

```php

namespace App\Filament\GlobalSearch;

use Filament\GlobalSearch\DefaultGlobalSearchProvider;
use Filament\GlobalSearch\GlobalSearchResult;
use Filament\GlobalSearch\GlobalSearchResults;
use RalphJSmit\Filament\MediaLibrary\FilamentMediaLibrary;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryFolder;

class GlobalSearchProvider extends DefaultGlobalSearchProvider
{
    public function getResults(string $query): ?GlobalSearchResults
    {
        $builder = parent::getResults($query);

        $this->addMediaLibraryFolderResults($builder, $query);

        return $builder;
    }

    protected function addMediaLibraryFolderResults(GlobalSearchResults $builder, string $query): void
    {
        $mediaLibraryFolders = FilamentMediaLibrary::get()->getModelFolder()::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->get();

        $globalSearchResults = $mediaLibraryFolders->map(function (MediaLibraryFolder $mediaLibraryFolder): GlobalSearchResult {
            return new GlobalSearchResult(
                title: $mediaLibraryFolder->name,
                url: \RalphJSmit\Filament\MediaLibrary\Media\Pages\MediaLibrary::getUrl(['folder' => $mediaLibraryFolder->getKey()]),
            );
        });

        $builder->category(\RalphJSmit\Filament\MediaLibrary\Media\Pages\MediaLibrary::getTitle(), $globalSearchResults);
    }
}
```

Next, register the custom global search provider in your panel provider(s) where you are using the media library:

```php
$panel
    ->globalSearch(\App\Filament\GlobalSearch\GlobalSearchProvider::class)
```

### TipTap Editor integration

The Media Library has support for the [TipTap Editor](https://filamentphp.com/plugins/awcodes-tiptap-editor) plugin to upload and/or choose images to insert into your text. The integration will replace the default media upload included in the editor.

To enable the integration, publish the config from the TipTap editor plugin if you didn't publish it yet:

```
php artisan vendor:publish --tag="filament-tiptap-editor-config"
```

Next, open the `config/filament-tiptap-editor.php` config and replace the `media_action` key with the following value:

```php
'media_action' => RalphJSmit\Filament\MediaLibrary\FilamentTipTap\Actions\MediaLibraryAction::class,
```

Now you are able to use the TipTap editor to upload and/or choose images from the media library.

## Using the MediaPicker outside the admin panel

It is also very easy to use the `MediaPicker` component outside the admin panel. To enable support for this, you should include the `@mediaPickerModal` Blade-directive on every page where you want to use the MediaPicker component.

The `@mediaPickerModal` directive should be added before the `</body>`-tag. Please make sure to only include the component once to prevent issues.

```blade
<!-- In your app.blade.php -->
<body>

    <!-- ... -->
    @mediaPickerModal
</body>
```

Or, on individual pages only:

```blade
@once
    @mediaPickerModal
@endonce
```

## Upgrading from V1 to V2

> **Do you have the V1 and want to upgrade to V2?**
>
> You should have gotten an email with a link to upgrade for a small fee. If you did not get this email or if you want to get it earlier/again, please email me at support@ralphjsmit.com.

- Replace all references to `RalphJSmit\Filament\MediaLibrary\Media\Components\MediaPicker` to `RalphJSmit\Filament\MediaLibrary\Forms\Components\MediaPicker`. The old class is deprecated and will be removed in V3.
- If you have published your config file, add the following key: `filament-media-library.models.folder` and value `RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryFolder::class`.
- Publish 2 migrations and migrate:
  ```
  php artisan vendor:publish --tag="filament-media-library-migrations"
  php artisan migrate
  ```
- If you have overridden custom views, please remove the overridden views or compare them with the new ones. Internally the Blade views have changed a lot.
- If you have extended pages like the BrowseLibrary, MediaInfo or UploadMedia page, please check your custom overrides with the new code. The BrowseLibrary component has changed the most.
- Re-compile your assets using `npm run build` or `npm run prod` if you are using a custom theme.

The V2 is a paid upgrade to the V1. All license holders have got the ability to purchase the V2 at a discount. If you want to purchase the upgrade from V1 to V2, please send an email to `support@ralphjsmit.com`.

### Upgrading from V2 to V3

The Filament Media library plugin has a V3 version that already has support for Filament V3.

If you want to upgrade to Media Library V3 and therefore Filament V3 support, take the following steps:

- Require `ralphjsmit/laravel-filament-media-library` `'^3.0'` instead of a 2.x version.
- For each of the panels that you want to use the MediaLibrary plugin in, please register the plugin like follows:
    ```php
    use RalphJSmit\Filament\MediaLibrary\FilamentMediaLibrary;

    $panel
        ->plugin(FilamentMediaLibrary::make())
    ```
- Filament V3 offers plugins the ability to be customized per panel. This means that instead of global config values that apply to all panels, you can now set different values per panel. If you want, review the `config/filament-media-library.php` configuration file. Set the values that you want to change using the methods on the `FilamentMediaLibrary` class. The methods look very similar to the keys they had in the config. For example, the key `disk.visibility` has become a method `FilamentMediaLibrary::make()->diskVisibility()`. You can also choose to do nothing. The package will retain compatibility with your current config. Whilst we do recommend to stay up-to-date and migrate your config, it is not a stricty requirement. For example:
```php
    $panel
        ->plugin(
            FilamentMediaLibrary::make()
                ->diskVisibility('public')
                ->modelItem(CustomMediaLibraryItemModel::class)
                ->modelFolder(CustomMediaLibraryFolderModel::class)
                ->acceptVideo()
                ->acceptPdf(false)
                // ..
        )
```
- If you had custom configuration values for the `400` and `800` conversions (hinting at their square size in px), these conversion names have now changed to `small` and `medium`. If you prefer to keep the old config file, you do not to change the names/keys. If you changed these config values and you want to migrate them to the new plugin configuration syntax from V3, use the `->conversionSmall(enabled: true, width: 400)` and `->conversionMedium(enabled: true, width: 800)` methods.
- If you have extended pages like the BrowseLibrary, MediaInfo or UploadMedia page, please check your custom overrides with the new code. The best is to publish your views again.

The V3 is available to all customers who previously purchased a license for V2. If you want to purchase the upgrade from V1 to V3, please send an email to `support@ralphjsmit.com`.

## Support

If you have a question, bug or feature request, please e-mail me at support@ralphjsmit.com or tag @ralphjsmit on [#media-library-pro](https://discord.com/channels/883083792112300104/961393209639067698) on Discord. Love to hear from you!

🙋‍♂️ [Ralph J. Smit](https://ralphjsmit.com)
