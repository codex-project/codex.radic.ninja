---
title: Installation
subtitle: Getting Started
---

# Installation


## Full installation
The easiest and fastest way to get started with Codex is by using the composer installer project. 
It includes all the default addons and their configuration, production ready configuration, example projects and various other usefull features.

If you are planning on integrating Codex into a existing Laravel project then head over to [Existing Project](#existing-project).

#### 1. Create project
```bash
composer create-project codex/codex [directory]
cd [directory]
```

#### 2. Enable addons
Codex ships with a couple of addons that are disabled by default. Use the list command to display a overview.    

```bash
php artisan codex:addons list
``` 

The example project uses the `codex/phpdoc` addon, so lets enable it.
```bash
php artisan codex:addons enable codex/phpdoc
```

Notice that addons can be installed/enabled/disabled/uninstalled. However, enabling a addon that is not installed will automatically install it. 
The same goes for uninstalling enabled addons.

```bash
# Which means the following command
php artisan codex:addons enable codex/phpdoc
# equals
php artisan codex:addons install codex/phpdoc
php artisan codex:addons enable codex/phpdoc
``` 

Enable the other addons depending on your needs. 

#### 3. Environment Configuration
Open up the `.env` file and modify it to suit your environment. 
Depending on which addons you enabled, you might need to provide addon-specific data.
Details regarding addon-specific configuration can be viewed on the addon's individual page:
- [codex/auth](../addons/auth)  
- [codex/git](../addons/git)  
- [codex/phpdoc](../addons/phpdoc)  
- [codex/algolia-search](../addons/algolia-search)  
  

#### 4. Post-installation
The composer file contains a few run-scripts you can use. Most notably:

```bash
composer env:development
composer env:production
composer optimize   
composer checks 
```


You should now configure Codex to suit your needs. Head over to the [Basic Configuration](basic-configuration.md) page.
