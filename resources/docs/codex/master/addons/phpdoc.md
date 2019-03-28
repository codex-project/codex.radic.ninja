---
title: Phpdoc
subtitle: Addons
---


# Phpdoc Addon

The Phpdoc Addon provides Codex the means to parse the phpdoc generated xml file and display it in a user-friendly way.


### Installation

```bash
composer require codex/phpdoc
php artisan codex:addons:enable codex/phpdoc
php artisan vendor:publish --provider="Codex\Phpdoc\PhpdocAddonServiceProvider"
```

### Configuration

...


### Examples

#### Api Viewer
Revisions with phpdoc enabled allows users to browse the [Api Viewer](#codex:phpdoc['Codex\Codex'])


#### Macros
**Example**
```php
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->


#### Links

[Class Link](#codex:phpdoc['Codex\Codex'])

[Method popover](#codex:phpdoc['Codex\Codex::get()']:popover)


| Example                                                                   | Code                                                                         |
|:--------------------------------------------------------------------------|:-----------------------------------------------------------------------------|
|       [Class Link](#codex:phpdoc['Codex\Codex'])                                | `[Class Link](#codex:phpdoc['Codex\Codex'])`                                 |
|       [Class Link](#codex:phpdoc['Codex\Codex']:!styling:!icon)                 | `[Class Link](#codex:phpdoc['Codex\Codex']:!styling:!icon)`                  |
|       [Class Drawer + Popover](#codex:phpdoc['Codex\Codex']:drawer:popover)     | `[Class Drawer + Popover](#codex:phpdoc['Codex\Codex']:drawer:popover)`      |
|       [](#codex:phpdoc['Codex\Codex']:drawer:popover)                           | `[](#codex:phpdoc['Codex\Codex']:drawer:popover)`                            |
|       [](#codex:phpdoc['Codex\Codex']:drawer:popover:type)                      | `[](#codex:phpdoc['Codex\Codex']:drawer:popover:type)`                       |
|       [Link to phpdoc class](#codex:phpdoc['Codex\Codex'])                      | `[Link to phpdoc class](#codex:phpdoc['Codex\Codex'])`                       |
|       [Link to phpdoc method](#codex:phpdoc['Codex\Codex::get()'])              | `[Link to phpdoc method](#codex:phpdoc['Codex\Codex::get()'])`               |
|       [Class popover](#codex:phpdoc['Codex\Codex']:popover)                     | `[Class popover](#codex:phpdoc['Codex\Codex']:popover)`                      |
|       [](#codex:phpdoc['Codex\Codex']:popover)                                  | `[](#codex:phpdoc['Codex\Codex']:popover)`                                   |
|       [Method popover](#codex:phpdoc['Codex\Codex::get()']:popover)             | `[Method popover](#codex:phpdoc['Codex\Codex::get()']:popover)`              |
|       [Method popover + type](#codex:phpdoc['Codex\Codex::get()']:popover:type) | `[Method popover + :type](#codex:phpdoc['Codex\Codex::get()']:popover::type)`|
| Class type:       [](#codex:phpdoc['Codex\Codex']:type)                         | `Class type: [](#codex:phpdoc['Codex\Codex']:type)`                          |
| Interface type:       [](#codex:phpdoc['Codex\Contracts\Codex']:type)           | `Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)`                |
| Trait type:       [](#codex:phpdoc['Codex\Concerns\HasCodex']:type)             | `Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)`                  |
| string type:       [](#codex:phpdoc['string']:type)                             | `String type: [](#codex:phpdoc[string]:type)`                                  |
| array type:       [](#codex:phpdoc['array']:type)                               | `Array type: [](#codex:phpdoc[array]:type)`                                    |
|       [Method tooltip](#codex:phpdoc[Codex\Codex::get()]:tooltip)             | `[Method tooltip](#codex:phpdoc['Codex\Codex::get()']:tooltip)`              |
|       [Method tooltip](#codex:phpdoc['Codex\Codex::get()']:tooltip)             | `[Method tooltip](#codex:phpdoc['Codex\Codex::get()']:tooltip)`              |





| Class                                                                                                   | Interface                                                                                                         | Trait                                                                                                                | Code                                            |
|:--------------------------------------------------------------------------------------------------------|:------------------------------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------|:------------------------------------------------|
|    [](#codex:phpdoc['Codex\Codex'])                     |    [](#codex:phpdoc['Codex\Contracts\Codex'])                     |    [](#codex:phpdoc['Codex\Concerns\Bootable'])                     | `[](#codex:phpdoc(<name>))`                     |
|    [Link](#codex:phpdoc['Codex\Codex'])                 |    [Link](#codex:phpdoc['Codex\Contracts\Codex'])                 |    [Link](#codex:phpdoc['Codex\Concerns\Bootable'])                 | `[Link](#codex:phpdoc(<name>))`                 |
|    [](#codex:phpdoc['Codex\Codex']:!styling:!icon)      |    [](#codex:phpdoc['Codex\Contracts\Codex']:!styling:!icon)      |    [](#codex:phpdoc['Codex\Concerns\Bootable']:!styling:!icon)      | `[](#codex:phpdoc(<name>):!styling:!icon)`      |
|    [](#codex:phpdoc['Codex\Codex']:type:popover)        |    [](#codex:phpdoc['Codex\Contracts\Codex']:type:popover)        |    [](#codex:phpdoc['Codex\Concerns\Bootable']:type:popover)        | `[](#codex:phpdoc(<name>):type:popover)`        |
|    [](#codex:phpdoc['Codex\Codex']:type:popover:drawer) |    [](#codex:phpdoc['Codex\Contracts\Codex']:type:popover:drawer) |    [](#codex:phpdoc['Codex\Concerns\Bootable']:type:popover:drawer) | `[](#codex:phpdoc(<name>):type:popover:drawer)` |
|    [](#codex:phpdoc['Codex\Codex']:type)                |    [](#codex:phpdoc['Codex\Contracts\Codex']:type)                |    [](#codex:phpdoc['Codex\Concerns\Bootable']:type)                | `[](#codex:phpdoc(<name>):type:popover:drawer)` |

<!--*codex:general:hide*-->
## Copyright/License
Copyright 2019 [Robin Radic](https://github.com/RobinRadic) - [MIT Licensed](LICENSE.md)
<!--*codex:/general:hide*-->
