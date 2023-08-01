---
title: Why are my file previews not loading?
slug: danharrin-file-previews-not-loading
author_slug: danharrin
publish_date: 2023-08-01
categories: [form-builder]
type_slug: trick
---

Once you've uploaded an image using the `FileUpload` component and saved it, you should see a preview in the component.

To find out if you've misconfigured your app, check for any console errors. 404s or 403s? Read on.

Make sure that the `APP_URL` variable in your `.env` file matches the domain you're using to access your app from, including the protocol (`http` or `https`). This is usually the problem.

Additionally, if you're using the public filesystem driver, ensure that you have `run php artisan storage:link`.
