---
title: Filesystems
subtitle: Addons
---

# Filesystems Addon

Adds a collection of common filesystem adapters.
These can be used by your projects.


### Installation

```bash
composer require codex/filesystems
php artisan codex:addons:enable codex/filesystems
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

**config/filesystems.php**
```php
[
    'my-webdav-project' => [
        'driver'   => 'webdav',
        'root'     => 'test-dav-project',
        'baseUri'  => env('STACK_URI'),
        'proxy'    => env('STACK_PROXY'),
        'userName' => env('STACK_USERNAME'),
        'password' => env('STACK_PASSWORD'),
        'prefix'   => env('STACK_PREFIX', ''),
    ],

    'my-google-project' => [
        'driver'    => 'google-cloud',
        'projectId' => '',
        'bucket'    => '',
    ],

    'my-dropbox-project' => [
        'driver' => 'dropbox',
        'prefix' => env('DROPBOX_PREFIX', ''),
        'token'  => env('DROPBOX_TOKEN'),
    ],

    'my-zip-project' => [
        'driver' => 'zip',
        'path'   => resource_path('docs/test-zip-project/test-zip-project.zip'),
    ],

    'my-s3-project' => [
        'driver' => 's3',
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION'),
        'bucket' => env('AWS_BUCKET'),
        'url'    => env('AWS_URL'),
    ], 
    
    'my-sftp-project' => [
        'driver'        => 'sftp',
        'host'          => env('SFTP_HOST'),
        'port'          => env('SFTP_PORT'),
        'username'      => env('SFTP_USERNAME'),
        'password'      => env('SFTP_PASSWORD'),
        'privateKey'    => env('SFTP_PRIVATEKEY'),
        'root'          => env('SFTP_ROOT'),
        'timeout'       => 10,
        'directoryPerm' => 0755,
    ],
    
    'my-rackspace-project' => [
        'driver'   => 'rackspace',
        'url'      => env('RACKSPACE_URL'),
        'secret' => [
            'username' => env('RACKSPACE_USERNAME'),
            'apiKey'   => env('RACKSPACE_APIKEY'),
        ],
        'region'   => env('RACKSPACE_REGION'),
        'options'  => [],
    ],
]
```


<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->
