<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ViewArticleController extends Controller
{
    public function __invoke(Article $article)
    {
        seo()->title("{$article->title} by {$article->author->name}");

        return view('articles.view-article', ['article' => $article]);
        return view('articles.view-article', [
            'record' => [
                'id' => 1,
                'type' => 'Trick',
                'slug' => 'password-form-fields',
                'title' => 'Hashing password fields and handling password updates',
                'stars_count' => 54,
                'author' => [
                    'name' => 'Dan Harrin',
                    'avatar' => 'https://avatars.githubusercontent.com/u/41773797?v=4',
                    'twitter_url' => 'https://twitter.com/danharrin',
                    'github_url' => 'https://twitter.com/danharrin',
                    'bio' => 'Lead developer at @kirschbaum-development. Building @filamentphp to boost your Laravel productivity beyond what you thought was possible',
                    'tricks_count' => 23,
                    'articles_count' => 12,
                    'stars_count' => 448,
                ],
                'categories' => [
                    'Form Builder',
                    'Admin Panel'
                ],
                'versions' => [2, 3],
                'created_at' => '1 year ago',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed imperdiet enim. Proin tellus neque, viverra eu auctor eu, convallis eget augue. Donec nisl libero, elementum in euismod non, tincidunt sed elit. Curabitur in vulputate elit, commodo tristique quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque feugiat, risus sollicitudin euismod condimentum, orci metus efficitur velit, a mollis mi ipsum ut diam. Vivamus id velit arcu.  Nulla tincidunt consectetur risus. Sed eleifend, mauris a vestibulum venenatis, nisi orci volutpat mi, at tristique nunc leo ut erat. Sed metus magna, tristique eu orci nec, convallis accumsan nunc. Sed vel cursus justo. Aenean eleifend nibh venenatis magna placerat consequat. Nullam risus erat, ornare at tortor eget, vehicula malesuada orci. Ut quam est, pellentesque vel lacus in, suscipit pellentesque sem. Nunc laoreet leo eu efficitur convallis. Etiam aliquam imperdiet urna, et suscipit massa suscipit eget. Integer venenatis sapien ut magna fringilla imperdiet. Quisque sed leo a diam volutpat vehicula eu eget ante. Duis aliquet mauris nisi, at tristique arcu sodales at. Aenean ultricies maximus leo, sit amet ultrices risus porta nec. Sed rutrum at sapien vel ullamcorper. Morbi pellentesque, nulla eget ultricies eleifend, ipsum diam imperdiet magna, ut consectetur dui purus quis magna. Donec fringilla tristique massa eu vestibulum. Cras lacinia ornare sapien, ac elementum leo dapibus vitae. Nulla tristique efficitur lectus, nec ultrices dolor dictum eget. Vivamus venenatis odio tellus, in bibendum lorem fermentum ut. Aenean porttitor sollicitudin diam, tristique sagittis nulla bibendum a. Proin condimentum suscipit volutpat. Vestibulum rutrum turpis ligula, vitae consequat diam bibendum sit amet. Ut et nulla at libero luctus bibendum ut id leo. Ut eros odio, iaculis ut ante vel, feugiat aliquet arcu.',
                'isCompatibleWithLatestVersion' => true,
            ],

            'more_from_author' => [
                [
                    'id' => 1,
                    'type' => 'Trick',
                    'slug' => 'file-upload-previews-not-loading',
                    'title' => 'File upload previews not loading',
                    'stars_count' => 58,
                ],
                [
                    'id' => 2,
                    'type' => 'Article',
                    'slug' => 'changes-to-admin-panel-resources-in-v2-13-0',
                    'title' => 'Changes to Admin Panel resources in v2.13.0',
                    'stars_count' => 33,
                ],
            ]
        ]);
    }
}
