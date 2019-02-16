---
title: Macros
---

# Macros

## General

### Hide
```php
<!--*codex:general:hide*-->
> This content will be hidden
<!--*codex:/general:hide*-->
```

## PHPDoc
#### Method Signature

**Usage**
```php
<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method:signature('Codex\Phpdoc\Documents\PhpdocMacros::methodSignature()', true, true, 'namespace,tags')*-->

**Result**

<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->


#### Method

**Usage**
```php
<!--*codex:phpdoc:method('Codex\Codex::get()', true, true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->

**Result**

<!--*codex:phpdoc:method('Codex\Codex::get()', true, true, 'namespace,tags')*-->
