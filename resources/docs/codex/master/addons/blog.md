---
title: Blog
subtitle: Addons
---

# Blog Addon

Provides blogging capability with categories containing posts. 

Uses similar features/logic/structure as projects, revisions and documents.  


### Installation

```bash
composer require codex/blog
php artisan codex:addons:enable codex/blog
php artisan vendor:publish --provider="Codex\Blog\BlogAddonServiceProvider"
```

### Configuration

**config/codex-blog.php**
```php
[
    'output_path' => public_path('blog.xml'),
]
```



<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->
