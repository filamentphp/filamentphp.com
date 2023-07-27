<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;

class ListCommunityRecordsController extends Controller
{
    public function __invoke()
    {
        return view('community', [
            'tricksCount' => 315,
            'articlesCount' => 517,
            'authorsCount' => 23,
            'records' => [
                [
                    'id' => 1,
                    'type' => 'Trick',
                    'slug' => 'password-form-fields',
                    'title' => 'Hashing password fields and handling password updates',
                    'stars_count' => 54,
                    'author' => [
                        'name' => 'Dan Harrin',
                        'avatar' => 'https://avatars.githubusercontent.com/u/41773797?v=4',
                    ],
                    'tags' => [
                        'Form Builder',
                        'Admin Panel'
                    ],
                    'versions' => [2, 3],
                    'created_at' => '1 year ago',
                ],
                [
                    'id' => 2,
                    'type' => 'Article',
                    'slug' => 'how-to-refresh-widgets-when-table-actions-are-fired',
                    'title' => 'How to Refresh Widgets When Table Actions Are Fired',
                    'stars_count' => 23,
                    'author' => [
                        'name' => 'Leandro C. Ferreira',
                        'avatar' => 'https://leandroferreira.dev.br/images/profile.jpg',
                    ],
                    'tags' => [
                        'Laravel',
                        'Table Builder',
                        'Livewire',
                        'Admin Panel'
                    ],
                    'versions' => [2, 3],
                    'created_at' => '4 months ago',
                ],
                [
                    'id' => 3,
                    'type' => 'Article',
                    'slug' => 'how-to-consume-an-external-api-with-filament-tables',
                    'title' => 'How to consume an external API with Filament Tables',
                    'stars_count' => 61,
                    'author' => [
                        'name' => 'Leandro C. Ferreira',
                        'avatar' => 'https://leandroferreira.dev.br/images/profile.jpg',
                    ],
                    'tags' => [
                        'Laravel',
                        'Table Builder',
                    ],
                    'versions' => [2, 3],
                    'created_at' => '11 months ago',
                ],
                [
                    'id' => 4,
                    'type' => 'Trick',
                    'slug' => 'geocoding-field-using-select-component',
                    'title' => 'Geocoding field using Select component',
                    'stars_count' => 37,
                    'author' => [
                        'name' => 'Dennis Koch',
                        'avatar' => 'https://avatars.githubusercontent.com/u/22632550?v=4',
                    ],
                    'tags' => [
                        'Integration',
                        'Form Builder',
                    ],
                    'versions' => [1, 2, 3],
                    'created_at' => '6 months ago',
                ],
            ],
            'tags' => collect([
                'Laravel',
                'Admin Panel',
                'Livewire',
                'Table Builder',
                'FAQ',
                'Form Builder',
                'Integration',
                'Alpine.js',
                'Tailwind CSS',
                'News',
            ])->sort()->toArray(),
        ]);
    }
}
