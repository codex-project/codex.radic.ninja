---
title: Comments
subtitle: Addons
---

# Comments Addon

Adds comments to your documents.
The addon uses adapters to provide Codex with a comment system. You can either use one of the included adapters or use a custom adapter.  

Includes the following adapters:
- Disqus


### Installation
```bash
composer require codex/comments
php artisan codex:addons:enable codex/comments
```


### Configuration
**config/codex-comments.php**
```php
[
    'default' => 'disqus',
    'connections' => [
        'disqus' => [
            'driver'    => 'disqus',
            'shortcode' => 'codex-project',
        ],
    ],
]
```

**[project]/config.php**
**[project]/[revision]/revision.yml**
**[project]/[revision]/[document] (as attributes)**
```php
[
    'processors' => [
        'enabled' => [
            // ...
            'comments' => true
        ],
        'comments' => [
            'enabled' => true,
            'connection' => 'disqus' 
        ]
    ]
]
```


### Creating a custom adapter



<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->
