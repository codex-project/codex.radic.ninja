---
title: Phpdoc
subtitle: Addons
---


# Phpdoc

Provides PHP Api documentation and features to your projects.

By generating a `structure.xml` using `phpDocumentor --template=xml` and placing it in a project's revision directory.


### Api Viewer
Revisions with phpdoc enabled allows users to browse the [Api Viewer](#codex:phpdoc(Codex\Codex))


### Macros
**Example**
```php
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->


### Links

| Example                                                                                       | Code                                                                        |
|:----------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------|
|   [Class Link](../processors/links.md#codex:phpdoc(Codex/Codex))                                | `[Class Link](#codex:phpdoc(Codex\Codex))`                                  |
|   [Class Link](../processors/links.md#codex:phpdoc(Codex/Codex):!styling:!icon)                 | `[Class Link](#codex:phpdoc(Codex\Codex):!styling:!icon)`                   |
|   [Class Drawer + Popover](../processors/links.md#codex:phpdoc(Codex/Codex):drawer:popover)     | `[Class Drawer + Popover](#codex:phpdoc(Codex\Codex):drawer:popover)`       |
|   [](../processors/links.md#codex:phpdoc(Codex/Codex):drawer:popover)                           | `[](#codex:phpdoc(Codex\Codex):drawer:popover)`                             |
|   [](../processors/links.md#codex:phpdoc(Codex/Codex):drawer:popover:type)                      | `[](#codex:phpdoc(Codex\Codex):drawer:popover:type)`                        |
|   [Link to phpdoc class](../processors/links.md#codex:phpdoc(Codex/Codex))                      | `[Link to phpdoc class](#codex:phpdoc(Codex\Codex))`                        |
|   [Link to phpdoc method](../processors/links.md#codex:phpdoc(Codex/Codex::get()))              | `[Link to phpdoc method](#codex:phpdoc(Codex\Codex::get()))`                |
|   [Class popover](../processors/links.md#codex:phpdoc(Codex/Codex):popover)                     | `[Class popover](#codex:phpdoc(Codex\Codex):popover)`                       |
|   [](../processors/links.md#codex:phpdoc(Codex/Codex):popover)                                  | `[](#codex:phpdoc(Codex\Codex):popover)`                                    |
|   [Method popover](#codex:phpdoc(Codex/Codex::get()):popover)                                   | `[Method popover](#codex:phpdoc(Codex\Codex::get()):popover)`               |
|   [Method popover + type](../processors/links.md#codex:phpdoc(Codex/Codex::get()):popover:type) | `[Method popover + :type](#codex:phpdoc(Codex\Codex::get()):popover::type)` |
| Class type:   [](../processors/links.md#codex:phpdoc(Codex/Codex):type)                         | `Class type: [](#codex:phpdoc(Codex\Codex):type)`                           |
| Interface type:   [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex):type)           | `Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)`             |
| Trait type:   [](../processors/links.md#codex:phpdoc(Codex/Concerns/HasCodex):type)             | `Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)`               |
| string type:   [](../processors/links.md#codex:phpdoc(string):type)                             | `String type: [](#codex:phpdoc(string):type)`                               |
| array type:   [](../processors/links.md#codex:phpdoc(array):type)                               | `Array type: [](#codex:phpdoc(array):type)`                                 |
|   [Method tooltip](../processors/links.md#codex:phpdoc(Codex/Codex::get()):tooltip)             | `[Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)`               |
|   [Method tooltip](../processors/links.md#codex:phpdoc(Codex/Codex::get()):tooltip)             | `[Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)`               |


| Class                                                                     | Interface                                                                           | Trait                                                                                 | Code                                            |
|:--------------------------------------------------------------------------|:------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------|:------------------------------------------------|
|  [](../processors/links.md#codex:phpdoc(Codex/Codex))                     |  [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex))                     |  [](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable))                     | `[](#codex:phpdoc(<name>))`                     |
|  [Link](../processors/links.md#codex:phpdoc(Codex/Codex))                 |  [Link](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex))                 |  [Link](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable))                 | `[Link](#codex:phpdoc(<name>))`                 |
|  [](../processors/links.md#codex:phpdoc(Codex/Codex):!styling:!icon)      |  [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex):!styling:!icon)      |  [](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable):!styling:!icon)      | `[](#codex:phpdoc(<name>):!styling:!icon)`      |
|  [](../processors/links.md#codex:phpdoc(Codex/Codex):type:popover)        |  [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex):type:popover)        |  [](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable):type:popover)        | `[](#codex:phpdoc(<name>):type:popover)`        |
|  [](../processors/links.md#codex:phpdoc(Codex/Codex):type:popover:drawer) |  [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex):type:popover:drawer) |  [](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable):type:popover:drawer) | `[](#codex:phpdoc(<name>):type:popover:drawer)` |
|  [](../processors/links.md#codex:phpdoc(Codex/Codex):type)                |  [](../processors/links.md#codex:phpdoc(Codex/Contracts/Codex):type)                |  [](../processors/links.md#codex:phpdoc(Codex/Concerns/Bootable):type)                | `[](#codex:phpdoc(<name>):type:popover:drawer)` |
|                                                                           |                                                                                     |                                                                                       |                                                 |
