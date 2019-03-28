---
title: Sitemap
subtitle: Addons
---

# Sitemap Addon

Generates a sitemap.xml


### Installation

```bash
composer require codex/sitemap
php artisan codex:addons:enable codex/sitemap
php artisan vendor:publish --provider="Codex\Sitemap\SitemapAddonServiceProvider"
```

### Configuration

**config/codex-sitemap.php**
```php
[
    'output_path' => public_path('sitemap.xml'),
]
```



<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->