---
title: Create Interactive QR Generator
slug: lara-zeus-create-interactive-qr-generator
author_slug: lara-zeus
publish_date: 2023-12-01
categories: [livewire, alpinejs, form-builder]
type_slug: trick
versions: [3]
---

## interactive QR generator, unlock the power of FilamentPHP

**I created this simple page with coloring options to generate a QR code. and my [Twitter](https://twitter.com/home) account went crazy 😜**

Instead of packing it into a plugin, I decided it's really simple, and I am sure everyone has a diffrent use case for it.

> This is more like a demo of how powerful and flexible filament can be.

Also, please note this code is a draft, I am sure there is plenty of improvement and refactoring depending on your app, so I'll keep that task to you :)

## Usage:

You can start with creating a Livewire component, or a filament page.

>Notice the `mount` function to fill the form, you can simply replace it with the `->defualt()` method.

<details>
<summary>QrCode.php</summary>

```php
public function mount(): void
{
    $defualtData = [
        'url' => 'https://filamentphp.com/',
        'size' => '300',
        'margin' => '1',
        'color' => 'rgb(0, 0, 0)',
        'back_color' => 'rgb(252, 252, 252)',
        'gradient_form' => 'rgb(69, 179, 157)',
        'gradient_to' => 'rgb(241, 148, 138)',
        'eye_color_inner' => 'rgb(241, 148, 138)',
        'eye_color_outer' => 'rgb(69, 179, 157)',
        'gradient_type' => 'vertical',
        'style' => 'square',
        'eye_style' => 'square',
    ];

    $this->form->fill($defualtData);
}

public function form(Form $form): Form
{
    return $form
        ->statePath('data')
        ->schema([
            Section::make()
                ->id('main-card')
                ->columns([
                    'default' => '1',
                    'lg' => '2',
                ])
                ->schema([
                    TextInput::make('size')->live(),
                    TextInput::make('url')->live(onBlur: true),

                    ColorPicker::make('color')
                        ->live()
                        ->rgb(),

                    ColorPicker::make('back_color')
                        ->live()
                        ->rgb(),

                    Select::make('margin')
                        ->live()
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '3' => '3',
                            '7' => '7',
                            '9' => '9',
                        ]),

                    Select::make('style')
                        ->live()
                        ->options([
                            'square' => __('square'),
                            'round' => __('round'),
                            'dot' => __('dot'),
                        ]),

                    Toggle::make('hasGradient')
                        ->live()
                        ->inline()
                        ->columnSpan([
                            'sm' => 1,
                            'lg' => 2,
                        ])
                        ->reactive(),

                    Grid::make()
                        ->schema([
                            ColorPicker::make('gradient_form')
                                ->live()
                                ->rgb(),

                            ColorPicker::make('gradient_to')
                                ->live()
                                ->rgb(),

                            Select::make('gradient_type')
                                ->live()
                                ->options([
                                    'vertical' => __('vertical'),
                                    'horizontal' => __('horizontal'),
                                    'diagonal' => __('diagonal'),
                                    'inverse_diagonal' => __('inverse_diagonal'),
                                    'radial' => __('radial'),
                                ]),
                        ])
                        ->columns([
                            'sm' => 1,
                            'lg' => 3,
                        ])
                        ->columnSpan([
                            'sm' => 1,
                            'lg' => 2,
                        ])
                        ->visible(fn(\Filament\Forms\Get $get) => $get('hasGradient')),

                    Toggle::make('hasEyeColor')
                        ->live()
                        ->inline()
                        ->columnSpan([
                            'sm' => 1,
                            'lg' => 2,
                        ]),

                    Grid::make()->schema([
                        ColorPicker::make('eye_color_inner')
                            ->live()
                            ->rgb(),

                        ColorPicker::make('eye_color_outer')
                            ->live()
                            ->rgb(),

                        Select::make('eye_style')
                            ->live()
                            ->options([
                                'square' => __('square'),
                                'circle' => __('circle'),
                            ]),
                    ])
                        ->columns([
                            'sm' => 1,
                            'lg' => 3,
                        ])
                        ->columnSpan([
                            'sm' => 1,
                            'lg' => 2,
                        ])
                        ->visible(fn(\Filament\Forms\Get $get) => $get('hasEyeColor')),
                ]),
        ]);
}

public static function maketheqr($data): string
{
    $maker = new \SimpleSoftwareIO\QrCode\Generator();

    if ($data['color'] !== null) {
        $colorRGB = str_replace(['rgb(', ')'], '', $data['color']);
        $colorRGB = explode(',', $colorRGB);
        call_user_func_array([$maker, 'color'], $colorRGB);
    }

    if ($data['back_color'] !== null) {
        $back_colorRGB = str_replace(['rgb(', ')'], '', $data['back_color']);
        $back_colorRGB = explode(',', $back_colorRGB);
        call_user_func_array([$maker, 'backgroundColor'], $back_colorRGB);
    }

    $maker = $maker->size($data['size']);

    if ($data['hasGradient']) {
        if ($data['gradient_to'] !== null && $data['gradient_form'] !== null) {
            $gradient_form = str_replace(['rgb(', ')'], '', $data['gradient_form']);
            $gradient_form = explode(',', $gradient_form);

            $gradient_to = str_replace(['rgb(', ')'], '', $data['gradient_to']);
            $gradient_to = explode(',', $gradient_to);

            $options = array_merge($gradient_to, $gradient_form, [$data['gradient_type']]);
            call_user_func_array([$maker, 'gradient'], $options);
        }
    }

    if ($data['hasEyeColor']) {
        if ($data['eye_color_inner'] !== null && $data['eye_color_outer'] !== null) {
            $eye_color_inner = str_replace(['rgb(', ')'], '', $data['eye_color_inner']);
            $eye_color_inner = explode(',', $eye_color_inner);

            $eye_color_outer = str_replace(['rgb(', ')'], '', $data['eye_color_outer']);
            $eye_color_outer = explode(',', $eye_color_outer);

            $options = array_merge([0], $eye_color_inner, $eye_color_outer);
            call_user_func_array([$maker, 'eyeColor'], $options);

            $options = array_merge([1], $eye_color_inner, $eye_color_outer);
            call_user_func_array([$maker, 'eyeColor'], $options);

            $options = array_merge([2], $eye_color_inner, $eye_color_outer);
            call_user_func_array([$maker, 'eyeColor'], $options);
        }
    }

    if ($data['margin'] !== null) {
        $maker = $maker->margin($data['margin']);
    }

    if ($data['style'] !== null) {
        $maker = $maker->style($data['style']);
    }

    if (isset($data['eye_style']) && filled($data['eye_style'])) {
        $maker = $maker->eye($data['eye_style']);
    }

    return $maker->generate('https://larazeus.com')->toHtml();
}
```
</details>

And here is the Blade file:

<details>
<summary>QrCode.blade.php</summary>

```HTML
<x-filament::page>
    <div class="flex items-stretch justify-center gap-4">
        <div class="w-full lg:w-1/2">
            {{ $this->form }}
        </div>
        <div class="w-full lg:w-1/2">
            <x-filament::section>
                <x-slot name="heading">
                    Preview
                </x-slot>

                <div id="qrcode" class="text-center flex justify-center items-center">
                    {!! \App\Filament\Pages\QrCode::maketheqr($this->form->getState()) !!}
                </div>

                <x-slot name="headerEnd">
                    <x-filament::button type="button" @click="download('{{ 'filename' }}')">
                        Download
                    </x-filament::button>
                </x-slot>
            </x-filament::section>
        </div>
    </div>

    {{--better to use @push...--}}
    <script src="{{ asset('js/qrcode.js') }}"></script>
</x-filament::page>
```
</details>

Finally, to provide the download button for the QR code as an image:

<details>
<summary>QrCode.blade.php</summary>

```js
import domtoimage from 'dom-to-image';
import {saveAs}   from 'file-saver';

window.download = function (domain) {
    var node = document.querySelector('#qrcode svg');
    domtoimage.toBlob(node)
              .then(function (blob) {
                  window.saveAs(blob, domain + '.png');
              })
              .catch(function (error) {
                  console.error('oops, something went wrong!', error);
              });
}
```

</details>

## Demo

to see it in action, check out the [demo page](https://demo.larazeus.com/admin/qr-code)

I hope this is helpful.
