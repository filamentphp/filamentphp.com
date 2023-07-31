---
title: Why are my files not processing in production?
slug: danharrin-files-not-processing-in-production
author_slug: danharrin
publish_date: 2023-08-01
categories: [form-builder]
type_slug: trick
---

If you're using a proxy like Cloudflare, ensure it is trusted in the `TrustProxies` middleware:

```php
protected $proxies = '*';
```
