<!--
title: Macros
-->

# Macros

## General
#### Hide
```php
<!--*codex:hide*-->
> This content will be hidden
<!--*codex:/hide*-->
```

## PHPDoc
#### Method Signature

**Usage**
```php
<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Addon\Phpdoc\PhpdocMacros::methodSignature()', true, true, 'namespace,tags')*-->

**Result**
<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->


#### Method

**Usage**
```php
<!--*codex:phpdoc:method('Codex\Codex::get()', true, true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Addon\Phpdoc\PhpdocMacros::method()', true, true, 'namespace,tags')*-->

**Result**
<!--*codex:phpdoc:method('Codex\Codex::get()', true, true, 'namespace,tags')*-->
