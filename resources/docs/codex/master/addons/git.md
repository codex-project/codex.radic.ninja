---
title: Git
subtitle: Addons
---


# Git

The git addon allows your Codex project to fetch documentation from any bitbucket/github repository. Either by manual synchronisation or automated synchronisation using webhooks.


Lets say you have a repository on github with a directory named `docs`, containing all your documentation. 
The git addon has the ability to sync your repository's branches/tags to your local project's revisions.
It's even possible to create a github webhook to your Codex project, making Codex automatically synchronise the latest changes.

### Installation

```bash
composer require codex/git
php artisan codex:addon enable codex/git
php artisan vendor:publish --provider="Codex\Git\GitAddonServiceProvider"
```


### Project Configuration

You can add the git addon configuration to your project's `config.php`. 
 
```php
[
    // ...
    'git'       => [
        'enabled'    => true,
        // The owner (organisation or username)
        'owner'      => 'codex-project',
        // The repository name
        'repository' => 'codex',
        // The connection key to use (configured in the global `codex-git` configuration)
        'connection' => 'github_password',
        // Branches to sync
        'branches'   => ['master'], //[ 'master']
        // Version (tags) constraints makes one able to define ranges and whatnot
        // * || 1.x || >=2.5.0 || 5.0.0 - 7.2.3'
        'versions'   => '>=2.5.0',
    
        'skip'  => [
            'patch_versions' => true,
            'minor_versions' => false,
        ],
    
        // paths
        'paths' => [
            // relative path to the root folder where the docs are
            'docs'  => 'docs',
            // relative path to the index.md file. You can use the README.md or docs/index.md for example
            'index' => 'docs/index.md' // 'index' => 'README.md',
        ],
    
        'webhook' => [
            // Enable webhook support. Configure it in Github/Bitbucket.
            // This will automaticly sync your project every time a 'push' event occurs
            // This also requires you to configure queues properly (by using for example, redis with supervisord)
            'enabled' => false,
    
            // Github webhooks allow a 'secret' that has to match. Put it in here
            'secret'  => env('CODEX_GIT_GITHUB_WEBHOOK_SECRET', ''),
        ],
    ],
];
``` 

### Global Configuration

Located in `config/codex-git.php`
```php
return [
    'connections'            => [
        'bitbucket_oauth'    => [
            'driver' => 'bitbucket',
            'method' => 'oauth',
            'key'    => env('CODEX_GIT_BITBUCKET_KEY', 'your-key'),
            'secret' => env('CODEX_GIT_BITBUCKET_SECRET', 'your-secret'),
        ],
        'bitbucket_password' => [
            'driver'   => 'bitbucket',
            'method'   => 'password',
            'username' => env('CODEX_GIT_BITBUCKET_USERNAME', 'your-username'),
            'password' => env('CODEX_GIT_BITBUCKET_PASSWORD', 'your-password'),
        ],
        'github_token'       => [
            'driver' => 'github',
            'method' => 'token',
            'token'  => env('CODEX_GIT_GITHUB_TOKEN', 'your-token'),
        ],
        'github_password'    => [
            'driver'   => 'github',
            'method'   => 'password',
            'username' => env('CODEX_GIT_GITHUB_USERNAME', 'your-username'),
            'password' => env('CODEX_GIT_GITHUB_PASSWORD', 'your-password'),
        ],
        'github_app'         => [
            'driver'       => 'github',
            'clientId'     => 'your-client-id',
            'clientSecret' => 'your-client-secret',
            'method'       => 'application',
        ],
        'github_jwt'         => [
            'driver' => 'github',
            'token'  => 'your-jwt-token',
            'method' => 'jwt',
        ],
    ],
    // ...
];
```


### Synchronising 

#### Manual synchronisation
```bash
php artisan codex:git:sync [project]
```

#### Automatic (webhook) synchronisation
To use automatic synchronisation:
- Automatic synchronisation depends on a working laravel queue driver. Make sure you have it configured and running. 
- You need to add a webhook to your github/bitbucket repository. The webhook url should be equal to the `codex.git.webhook.{bitbucket,github}` route url. Use `php artisan route:list` to get it.


<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->