---
title: Auth
subtitle: Addons
---


# Auth

Provides authentication using oauth providers to restrict project access.    

### Installation

```bash
composer require codex/auth
php artisan codex:addons:enable codex/auth
php artisan vendor:publish --provider="Codex\Auth\AuthAddonServiceProvider"
```

### Configuration

**[project]/config.php**
```php
[
    // ...
    'disk' => 'my-dropbox-project',
    // ...
];
```


<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->