The source code for the [Filament](https://filamentphp.com) website.

## Docs

> [!NOTE]
> Please submit pull requests for documentation changes to the [`filament/filament`](https://github.com/filamentphp/filament) repository. The relevant documentation files can be found in the `/docs` directory of each package.


## Contributing

Submitting plugins can be done by submitting a pull request to this repository. We have opted for this approach to allow for a more open and transparent process, as well as a smoother review process based on GitHub, where you and Filament maintainers can communicate directly.

### Setting up an author profile

Before you can contribute plugins to the website, you must set up your author profile. This is then linked to your contributions.

To set up your author profile, create a new file in the `content/authors` directory. The filename should be your name, with spaces replaced by dashes, and the extension should be `.md`. For example, if your name is Dan Harrin, the filename should be `dan-harrin.md`.

```md
---
name: Dan Harrin
slug: dan-harrin
github_url: https://github.com/danharrin
twitter_url: https://twitter.com/danjharrin
mastodon_url: https://phpc.social/@danharrin
sponsor_url: https://github.com/sponsors/danharrin
---

Your bio should be written in Markdown here. In the future, we may introduce an Author page where people can see your contributions, so feel free to write a little about yourself. Please check the grammar and spelling of this description, preferably using [Grammarly](https://www.grammarly.com). It should be in full sentences.
```

> [!IMPORTANT]
> Please upload an avatar to the `content/authors/avatars` directory. The file must be the same name as your slug. It must be square, at least 1000x1000 pixels in size, and preferably a JPEG.

- The `slug` should match the current filename.
- The `github_url` should be a link to your GitHub profile.
- The `twitter_url` should be a link to your Twitter profile. It is optional.
- The `mastodon_url` should be a link to your Mastodon profile. It is optional.
- The `sponsor_url` should be a link to your sponsors page like GitHub sponsors. It is optional.

### Submitting a plugin

To submit a plugin, create a new file in the `content/plugins` directory. The filename should be your author name, followed by the name of your plugin, with spaces replaced by dashes, and the extension should be `.md`. For example, if your author name is "Filament" and the plugin is called "Spatie Media Library", the filename should be `filament-spatie-media-library.md`.

```md
---
name: Spatie Media Library
slug: filament-spatie-media-library
author_slug: filament
categories: [form-builder, form-field, spatie, table-builder, table-column]
description: Filament support for `spatie/laravel-medialibrary`.
discord_url: https://discord.com/channels/883083792112300104/1080807837833384017
docs_url: https://raw.githubusercontent.com/filamentphp/spatie-laravel-media-library-plugin/3.x/README.md
github_repository: filamentphp/spatie-laravel-media-library-plugin
has_dark_theme: true
has_translations: true
versions: [2, 3]
publish_date: 2023-08-01
---
```

> [!IMPORTANT]
> Please upload an image to the `content/plugins/images` directory. The file must be the same name as the plugin's slug. It must fit the 16:9 aspect ratio, at least 2560x1440 pixels in size, and preferably a JPEG. If your image is a screenshot of your plugin, please ensure that it is using a light theme and not a dark theme, to ensure it fits in with the rest of the website.**

> [!NOTE]
> Do not include the word "Filament" in the name of your plugin. This is redundant, as all plugins on the website are for Filament. Please do not include it in the slug or filename either - unless its part of your author name.

- The `slug` should match the current filename.
- The `author_slug` should match the `slug` of the author profile you created earlier.
- The `categories` should be an array of categories that your plugin is related to. Available categories can be found in the `content/plugin_categories` directory.
- The `description` should be a short description of your plugin. Please check the grammar and spelling of this description, preferably using [Grammarly](https://www.grammarly.com). It should be one full sentence.
- The `discord_url` should be a link to the Discord channel where people can discuss your plugin. If this doesn't exist yet, you can leave this empty until the Filament team creates it in the official server.
- The `docs_url` should be a URL to a public, raw Markdown file of your plugin. You can leave this blank if your documentation does not live in a raw Markdown file, but please ensure that you have filled in a `url` instead, where we can redirect users who are looking for the documentation. If you have content in your README that you do not want to be displayed on the website, please add a `.filament-hidden` class to the element. This is especially useful for banner images.
- The `github_repository` should be the name of the GitHub repository where your plugin is hosted.
- The `has_dark_theme` should be `true` if your plugin supports Tailwind's dark mode, or `false` if not.
- The `has_translations` should be `true` if your plugin supports multiple languages, or `false` if not.
- The `versions` should be an array of Filament major versions that your plugin supports.
- The `publish_date` is the date that you submitted the plugin to the website. It usually should be the date that you submitted the pull request for the plugin.

If your plugin supports multiple versions, you can replace `docs_url` with an array:

```
docs_urls:
    v3: https://raw.githubusercontent.com/author/plugin/3.x/README.md
    v2: https://raw.githubusercontent.com/author/plugin/2.x/README.md
```

The first key/url pair is the one that will be shown by default. The keys should be query string safe values (e.g. avoid spaces).

#### Quality guidelines

In Filament v2, we introduced the plugins section of the website. We did not enforce many rules on the plugins that were submitted, and as a result, some plugins were not consistent in quality with others. In Filament v3, we are introducing some quality guidelines to ensure that plugins are consistent with each other, and that they are of a high quality. You are more than welcome to create a plugin, distribute it on GitHub and Packagist, and not submit it to the Filament website, if you do not wish to meet these guidelines. However, if you do wish to submit your plugin to the website, please ensure:

- Your plugin's code is hosted on GitHub.
- Your plugin must be available to install from Packagist or [Anystack.sh](https://anystack.sh).
- Documentation should always be public, even if the plugin is paid.
- Documentation should be written clearly, thorough, and well-structured. Users should not be put off from using your plugin because of poor documentation.
- If your plugin contains any UI element, screenshots of any UI should be available in your documentation.

In return for following these guidelines, your plugin will receive free promotion on our website, and a dedicated support channel on our Discord server.

#### Selling a plugin

Filament allows you to sell your plugin on our website. To do this, we've partnered with [Anystack.sh](https://anystack.sh). To get started, visit the `Advertising` section of your Anystack product page, and opt-in to advertising on the `Filament Website`. If you do not follow these instructions, your plugin will not be listed on the website. 15% of sales made through the website will be taken by Filament, to fund the development of the project.

To set up your plugin for sale, you must add an `anystack_id` field to your plugin's Markdown file. You can find "product ID" this from your Anystack product settings.

Please also make sure that `@danharrin` is invited to the private GitHub repository where you are hosting the code, with read-only access. This is to allow us to review your plugin's code.

If you'd like to host your documentation on the Filament website instead of your own, please let us know during the review process, and we can help you get that set up.

## Forge deployment

By default, Forge's NGINX configuration does not route requests to the `docs` directory to Laravel. To fix the side effects of this, you can add a catch for `403` above the one for `404` so Laravel handles the request instead:

```nginx
error_page 403 /index.php;
error_page 404 /index.php;
```

## Debugging missing content

If you are working on the website locally, and you notice that some Markdown-based content is missing, it is likely that it has not reached the cache yet. Please run `php artisan clear-orbit-cache` and `php artisan cache:clear`. If images aren't showing up, you probably also need to run `php artisan optimize-images`.

> You need to [install image optimization tools](https://github.com/spatie/image-optimizer#optimization-tools) before you can run `php artisan optimize-images`.
