---
title: Macros
processors:
    enabled:
        toc: false
---

# Macros


<c-tabs>
    <c-tab tab="Test">Test Content</c-tab>
</c-tabs>

<!--*codex:tabs*-->
<!--*codex:tab('General')*-->

<!--*codex:tabs({ tabPosition: 'left' })*-->
<!--*codex:tab('Hide')*-->
```php
<!--*codex:hide*-->
> This blockquote will be hidden when viewed in Codex, but visible in other (eg github) viewers.   
<!--*codex:/hide*-->
```
<!--*codex:/tab*-->
<!--*codex:/tabs*-->

<!--*codex:/tab*-->


<!--*codex:tab('Scrollbar')*-->
```markdown
<!--*codex:scrollbar(200)*-->
<!--*codex:gist('10c3090294a416df4b7b459bfe914cc0')*-->
<!--*codex:/scrollbar*-->
```
<!--*codex:scrollbar(200)*-->
<!--*codex:gist('10c3090294a416df4b7b459bfe914cc0')*-->
<!--*codex:/scrollbar*-->
<!--*codex:/tab*-->


<!--*codex:tab('Gists')*-->
##### Gist + file + scrollbar
```markdown
<!--*codex:scrollbar(200)*-->
<!--*codex:gist('10c3090294a416df4b7b459bfe914cc0', 'ControlPanelServiceProvider.php')*-->
<!--*codex:/scrollbar*-->
```
<!--*codex:scrollbar(200)*-->
<!--*codex:gist('10c3090294a416df4b7b459bfe914cc0', 'ControlPanelServiceProvider.php')*-->
<!--*codex:/scrollbar*-->
<!--*codex:/tab*-->


<!--*codex:tab('Phpdoc')*-->

<!--*codex:tabs({ tabPosition: 'left' })*-->
<!--*codex:tab('Method Signature')*-->
```php
<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method:signature('Codex\Codex::get()', true, 'namespace,tags')*-->
<!--*codex:/tab*-->

<!--*codex:tab('Method')*-->
```php
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method', true, true, 'namespace,tags')*-->
````
<!--*codex:phpdoc:method('Codex\Phpdoc\Documents\PhpdocMacros::method()', true, true, 'namespace,tags')*-->
<!--*codex:/tab*-->

<!--*codex:/tabs*-->

<!--*codex:/tabs*-->


