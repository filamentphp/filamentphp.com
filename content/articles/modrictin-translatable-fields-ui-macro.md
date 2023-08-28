---
title: Show the users which fields are translatable
slug: modrictin-translatable-fields-ui-macro
author_slug: modrictin
publish_date: 2023-08-17
categories: [general]
type_slug: trick
---

## Introduction

If you are using `filament/spatie-laravel-translatable-plugin` you probably want to show the users which fields are translatable.

With this little trick you can show the users which fields are translatable with the helper text and a nice icon.

![translatable-icon-image](/images/content/articles/modrictin-translatable-ui-macro/translatable-icon.webp)

Simply use

```php
TextInput::make('label')
         ->hint('Translatable')
         ->hintIcon('heroicon-m-language');
```

Or, what I like to do is to create a little Macro on the `Filament\Forms\Components\Field` class.

Like this:

```php
Field::macro('translatable', function () {
    return $this->hint('Translatable')
                ->hintIcon('heroicon-m-language');
});
```

And then use it like this:

```php
TextInput::make('label')->translatable();
```

## Hope it helps!

Please email me to [modrictin7@gmail.com](mailto:modrictin7@gmail.com) if you have any feedback, question or suggestion.

