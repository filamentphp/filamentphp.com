# Filament Plugin Review Guidelines

This document provides standardized responses and procedures for reviewing Filament plugins, articles, and related contributions. Each section outlines a scenario, the corresponding response, and guidelines for handling specific cases.

## Review Scenarios and Responses

### 1. Plugin Purpose Unclear
**Scenario:** The submitted plugin's purpose or functionality is unclear from the documentation.
**Response:**
```md
Hey! Thank you for your contribution.

After reviewing your plugin, we noticed that its purpose and functionality are not entirely clear based on the provided documentation. Could you take some time to expand the documentation to clearly explain what your plugin does? Adding screenshots or examples would also help users better understand and visualize its functionality.

Please let us know once you’ve made these updates so we can continue with the review.
```

### 2. Discord Channel Limit
**Scenario:** Discord has reached its channel limit, delaying the creation of a plugin’s channel.
**Response:**
```md
Hey! We’ve hit the channel limit (500) on Discord. While we’re working on cleaning up old or archived channels to make room for new ones, your plugin will not have a channel. A channel will be created as soon as the cleanup is complete.
```

### 3. Not a Filament Plugin
**Scenario:** The submitted plugin aligns more closely with a general Laravel package than a Filament plugin.
**Response:**
```md
Hey! Thank you for your contribution.

After reviewing your plugin, we believe its functionality aligns more closely with a general Laravel package rather than a specific Filament plugin. We appreciate the effort you’ve put into it and think it could better serve the community as a standalone Laravel package.

Please let us know if you have any questions or need assistance.
```

### 4. Author Profile Submission
**Scenario:** An author profile is submitted without a plugin or article.
**Response:**
```md
Hey! We don’t need an author profile until you submit a plugin or article. When you do, please include your author profile alongside your plugin in the same PR.
```

### 5. Correct Name Casing
**Scenario:** The documentation contains incorrect casing of "Filament" or "FilamentPHP."
**Response:**
```
Hello! Could you please ensure that all instances of "Filament" or "FilamentPHP" in your documentation are properly capitalized? Thank you!
```

### 6. Duplicate README Images
**Scenario:** A plugin’s README contains duplicate images on the Filament website.
**Response:**
```md
Hey! Your plugin’s `README` is displayed on its page on the Filament website. Currently, there’s a duplicate image because it also exists in your documentation. To resolve this, you can add the `filament-hidden` class to hide it from the website while keeping it in your documentation.

Please let us know once this is resolved.
```

### 7. Improve Plugin Image Focus
**Scenario:** A plugin’s image is a full screenshot of an entire panel instead of highlighting functionality.
**Response:**
```md
Hey! Please ensure that your plugin image highlights its functionality rather than being a full screenshot of an entire panel. You can zoom in to crop out the sidebar and top bar, which will make your plugin stand out more.

Let us know once this is addressed!
```

### 8. Fix README Image Links
**Scenario:** README images use relative URLs that cannot be embedded on the website.
**Response:**
```md
Hey! Could you please ensure that all image URLs in your plugin’s `README` file are absolute rather than relative? This allows us to embed them correctly on the Filament website.

Please let us know once this is updated. Thank you!
```

### 9. Fix README Video Embedding
**Scenario:** A video in the README cannot be embedded correctly.
**Response:**
````md
Hey! The video in your README could not be embedded correctly. To fix this, please use raw HTML markup for the video. It should look like this:

```html
<video width="320" height="240" controls>
  <source src="RAW-VIDEO-URL-HERE" type="video/mp4">
</video>
```

Please let us know once this has been updated.
````

### 10. Plugin Image Dimensions Invalid
**Scenario:** The plugin image does not meet the required dimensions or aspect ratio.
**Response:**
```md
Hey! Your plugin image must follow the 16:9 aspect ratio, be at least 2560x1440 pixels, and preferably be a JPEG file, as outlined in our [Contributing Guide](https://github.com/filamentphp/filamentphp.com#submitting-a-plugin).

Please make the necessary adjustments and let us know once it’s fixed.
```

### 11. Missing Plugin Image
**Scenario:** A plugin is submitted without an image.
**Response:**
```md
Hey! Your plugin does not currently have an image. Please add one as outlined in our [Contributing Guide](https://github.com/filamentphp/filamentphp.com#submitting-a-plugin). The image must follow the 16:9 aspect ratio, be at least 2560x1440 pixels, and preferably be a JPEG.

You can use [Beyond Code's banner generator](https://banners.beyondco.de) to create a banner for your plugin. Let us know once this is added!
```

### 12. Author Avatar Dimensions Invalid
**Scenario:** The author avatar does not meet the required dimensions or aspect ratio.
**Response:**
```md
Hey! Your author avatar must follow a 1:1 aspect ratio, be at least 1000x1000 pixels in size, and preferably be a JPEG file, as outlined in our [Contributing Guide](https://github.com/filamentphp/filamentphp.com#setting-up-an-author-profile).

Please make the necessary adjustments and let us know once this is resolved.
```

### 13. Missing Author Bio
**Scenario:** An author profile is missing a bio.
**Response:**
```md
Hey! Your author profile is missing a short bio. Please add one and let us know once it’s updated.
```

### 14. Invalid Plugin Category
**Scenario:** The plugin is submitted under one or more invalid categories.
**Response:**
```md
Hey! Your plugin was submitted to one or more invalid categories. Please choose a valid category from the [available categories](https://github.com/filamentphp/filamentphp.com/tree/main/content/plugin_categories).

Let us know once this is corrected. Thanks!
```

### 15. Article/Trick Review Process
**Scenario:** An article or trick requires additional review for grammar and accuracy.
**Response:**
```md
Hey! Thank you for your contribution.

This is an initial review to ensure everything complies with our guidelines. The content of your article or trick will be reviewed by another team member before it can be fully approved and published on the website.
```

### 16. PR Without Access
**Scenario:** The PR does not have "Allow edits and access to secrets by maintainers" enabled.
**Response:**
```md
Hey! It looks like you’ve opened this PR without enabling the “Allow edits and access to secrets by maintainers” option. Without this, we cannot proceed with the review.

Please create a new PR and ensure this option is enabled so we can make changes if necessary.
```

### 17. Paid Plugin Review
**Scenario:** A paid plugin requires additional review of its private repository.
**Response:**
```md
Hey! Thank you for your contribution.

This is an initial review to ensure your submission complies with our guidelines. Since your plugin is paid, your private repository will need to be reviewed by another team member before it can be fully approved and published.
```

### 18. Documentation Update Required
**Scenario:** Documentation updates are required before a plugin can be approved.
**Response:**
```md
Hey! Thanks for your contribution!

Before we can merge your plugin, this documentation update PR must be approved first to ensure it complies with our guidelines. Please let us know in the original PR once this is merged.
```

### 19. Improve Plugin Design Consistency
**Scenario:** A plugin’s design is inconsistent with other plugins on the website.
**Response:**
```md
Hey! Thanks for your contribution!

We appreciate the effort you’ve put into your plugin, but the design doesn’t align closely with the other plugins on our website. This contrast might discourage users from exploring your plugin. We recommend looking at the design of other plugins on the website for inspiration.

Please let us know once you’ve made adjustments.
```