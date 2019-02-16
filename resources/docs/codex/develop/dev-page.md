<!--
title: Dev Page
-->

# Dev Page


## Link processor tests
- Core
    - Document link [index.md](index.md)
    - Document link [getting-started/installation.md](getting-started/installation.md)
    - Document Popover Link [index.md](index.md#codex:popover)
- Phpdoc
    - Method link with popover [Codex::get()](#codex:phpdoc['\Codex\Codex::get()']:popover)  


### Simple links

| Type                  | Example                                                         | Code                                                              | Description                                                 |
|:----------------------|:----------------------------------------------------------------|:------------------------------------------------------------------|:------------------------------------------------------------|
| Document Link         | [index.md](index.md)                                            | `[index.md](index.md)`                                            | Links pointing to documents (.md) get replaced with the url |
| Document Link         | [getting-started/installation](getting-started/installation.md) | `[getting-started/installation](getting-started/installation.md)` | Links pointing to documents (.md) get replaced with the url |
| Project Link          | [Blade Extensions](#codex:project:blade-extensions)             | `[index.md](index.md#codex:popover)`                              | Document link with popover providing document information   |
| Document Popover Link | [index.md](index.md#codex:popover)                              | `[index.md](index.md#codex:popover)`                              | Document link with popover providing document information   |


### PHPDoc links

| Type        | Example                                | Code                                 | Description                                               |
|:------------|:---------------------------------------|:-------------------------------------|:----------------------------------------------------------|
| Method link | [Codex::get()](#codex:phpdoc['\Codex\Codex::get()']:popover) | `[Codex::get()](#codex:phpdoc['\Codex\Codex::get()']:popover))` | Document link with popover providing document information |


```<!--*codex:include[getting-started/installation]*-->```
<!--*codex:include[getting-started/installation]*-->
