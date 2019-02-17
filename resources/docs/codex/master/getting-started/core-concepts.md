---
title: Core Concepts
subtitle: Getting Started
---

# Core Concepts


### Application flow

<strong><c-c cyan>Codex</c-c> > <c-c deep-orange-7>Projects</c-c> > <c-c teal-7>Revisions</c-c> > <c-c pink-7>Documents</c-c> 

- <c-c cyan>Codex</c-c> has one or more <c-c deep-orange-7>Projects</c-c>
- Each <c-c deep-orange-7>Project</c-c> has one or more <c-c teal-7>Revisions</c-c> <small>(branches/versions)</small>
- Each <c-c teal-7>Revision</c-c> contains <c-c pink-7>Documents</c-c>
- Each <c-c pink-7>Document</c-c> is passed trough several processors, modifying the output

### Directory Structure

```js
- docs
    - [project]
        - config.php
        - [revision]
            - revision.yml
            - [document]
            - [directory]
                - [document]

    - codex
        - config.php
        - master
            - revision.yml
            - index.md
            - getting-started
                - installation.md
                - configuration.md
        - 2.1.0
            - revision.yml
            - index.md
```

### Inherited configuration

To view the available config options for each type you, use the `codex:config` command.
```bash
php artisan codex:config --groups # returns => [codex,projects,revisions,documents]
php artisan codex:config codex
php artisan codex:config codex.layout
php artisan codex:config projects
php artisan codex:config projects.layout
php artisan codex:config documents.title
# etc...
```

For example: <c-c cyan>Codex</c-c> has the config `layouts`,  which is inherited by <c-c deep-orange-7>Projects</c-c>


### Programmatic example
```php
$codex = codex();
$codex->attr('layout.header.color'); // blue-grey-5
$codex->setAttribute('layout.header.color', 'green-5');

$project = $codex->getProject('codex');
$project->attr('layout.header.color'); // green-5
```


## Projects

> A nice blockquote
{: title="Blockquote title"}

{#id .class}
## Header


Codex is structured 
