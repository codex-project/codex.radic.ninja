---
title: Packagist
subtitle: Addons
---

# Packagist Addon

Adds packagist ...


### Installation
```bash
composer require codex/packagist
php artisan codex:addons:enable codex/packagist
```


### Configuration
**config/codex-packagist.php**
```php
[
]
```

**[project]/config.php**
**[project]/[revision]/revision.yml**
**[project]/[revision]/[document] (as attributes)**
```php
[
    'packagist' => [
        'enabled' => [
            // ...
            'packagist' => true
        ],
        'packagist' => [
            'name' => 'vendor/package'
        ]
    ]
]
```

<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->
