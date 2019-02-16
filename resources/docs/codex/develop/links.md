<!--
title: Links
subtitle: Processors
links:
    define:
        doc: phpdoc(Codex\Processors\Links\$1):popover
-->

# Links

<!-- [Relative + Hash](../getting-started/installation.md#codex:doc[Link]) -->

## Transformations
Links are transformed by the [](#codex:phpdoc[Codex\Processors\LinksProcessor]:type:drawer:popover)

### URL Path based
any relative file path to a document will be fixed to the right url.

### URL Hash based 
The __Link Processor__ also runs other transformations based on the #hash of a link, 
these are __Link Actions__ that are configured in Codex.    

### Anatomy of the URL Hash
<pre><c-c teal>#codex</c-c>:<c-c deep-orange>type[</c-c><c-c green>parameter</c-c>,<c-c green>parameter</c-c><c-c deep-orange>]</c-c>:<c-c indigo>modifier</c-c>:<c-c indigo>modifier[</c-c><c-c green>parameter</c-c>,<c-c green>parameter</c-c><c-c indigo>]</c-c>:<c-c indigo>modifier</c-c>:<c-c indigo>modifier[</c-c><c-c green>parameter</c-c><c-c indigo>]</c-c></pre>

- <pre><c-c teal>prefix</c-c></pre> The prefix is required as Codex uses it to mark it as a link action 
- <pre><c-c deep-orange>type</c-c></pre> Identifies which link type should be used 
- <pre><c-c green>type-parameter</c-c></pre> Parameter values will be casted to the a data type <code>int</code>, <code>string</code> or <code>bool</code>   
- <pre><c-c indigo>modifier</c-c></pre> Think of it as booleans that ac-cept parameters to set actions
- <pre><c-c green>modifier-parameter</c-c></pre> Parameter values will be casted to the a data type <code>int</code>, <code>string</code> or <code>bool</code>   


### Document

| Example                                                                                            | Code                                                                                                 |
|:---------------------------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------------------------|
| [Relative link](../getting-started/installation.md)                                                | `[Relative link](../getting-started/installation.md)`                                                |
| [Hash](#codex:document[getting-started/installation]:!icon)                                        | `[Hash](#codex:document[getting-started/installation]:!icon)`                                        |
| [Hash with revision](#codex:document[v1,getting-started/installation]:!styling)                    | `[Hash with revision](#codex:document[v1,getting-started/installation]:!styling)`                    |
| [Hash with revision and project](#codex:document[codex,2.0-alpha,getting-started/installation])    | `[Hash with revision and project](#codex:document[codex,2.0-alpha,getting-started/installation])`    |
| [Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation]) | `[Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation])` |


#### #popover Modifier
Creates a link with a popover

| Example                                                                                                    | Code                                                                                                                         |
|:-----------------------------------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------------------------------------------------|
| [Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation]:popover) | `[Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation]:popover)`                 |
| [Project Hash](#codex:project[codex]:popover)                                                              | `[Project Hash](#codex:project[codex]:popover)                                                              `                |
| [Project Hash wo Icon](#codex:project[codex]:popover:!icon)                                                | `[Project Hash](#codex:project[codex]:popover:!icon)                                                              `          |
| [Project Hash wo Icon/Style](#codex:project[codex]:popover:!icon:!styling)                                 | `[Project Hash](#codex:project[codex]:popover:!icon:!styling)                                                              ` |
| [Revision Hash](#codex:revision[master]:popover)                                                           | `[Revision Hash](#codex:revision[master]:popover)`                                                                           |
| [Revision Hash with project](#codex:revision[codex,master]:popover)                                        | `[Revision Hash with project](#codex:revision[codex,master]:popover)`                                                        |
| [Document Hash](#codex:document[getting-started/installation]:popover)                                     | `[Document Hash](#codex:document[getting-started/installation]:popover)`                                                     |
| [Document Hash with revision](#codex:document[master,getting-started/installation]:popover)                | `[Document Hash with revision](#codex:document[master,getting-started/installation]:popover)`                                |
| [Document Hash with project, revision](#codex:document[codex,master,getting-started/installation]:popover) | `[Document Hash with project, revision](#codex:document[codex,master,getting-started/installation]:popover)`                 |



<!--#### #modal Modifier
Opens a document in a modal

| Example                                                                                                    | Code                                                                                                          |
|:-----------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------|
| [Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation]:modal) | `[Relative + Hash](../getting-started/installation.md#codex:document[getting-started/installation]:modal)`  |
| [Project Hash](#codex:project[codex]:modal)                                                              | `[Project Hash](#codex:project[codex]:modal)                                                              ` |
| [Revision Hash](#codex:revision[master]:modal)                                                           | `[Revision Hash](#codex:revision[master]:modal)`                                                            |
| [Revision Hash with project](#codex:revision[codex,master]:modal)                                        | `[Revision Hash with project](#codex:revision[codex,master]:modal)`                                         |
| [Document Hash](#codex:document[getting-started/installation]:modal)                                     | `[Document Hash](#codex:document[getting-started/installation]:modal)`                                      |
| [Document Hash with revision](#codex:document[master,getting-started/installation]:modal)                | `[Document Hash with revision](#codex:document[master,getting-started/installation]:modal)`                 |
| [Document Hash with project, revision](#codex:document[codex,master,getting-started/installation]:modal) | `[Document Hash with project, revision](#codex:document[codex,master,getting-started/installation]:modal)`  |
-->

### PHPDoc

| Example                                                                 | Code                                                                        |
|:------------------------------------------------------------------------|:----------------------------------------------------------------------------|
| [Class Link](#codex:phpdoc(Codex\Codex))                                | `[Class Link](#codex:phpdoc(Codex\Codex))`                                  |
| [Class Link](#codex:phpdoc(Codex\Codex):!styling:!icon)                 | `[Class Link](#codex:phpdoc(Codex\Codex):!styling:!icon)`                   |
| [Class Drawer + Popover](#codex:phpdoc(Codex\Codex):drawer:popover)     | `[Class Drawer + Popover](#codex:phpdoc(Codex\Codex):drawer:popover)`       |
| [](#codex:phpdoc(Codex\Codex):drawer:popover)                           | `[](#codex:phpdoc(Codex\Codex):drawer:popover)`                             |
| [](#codex:phpdoc(Codex\Codex):drawer:popover:type)                      | `[](#codex:phpdoc(Codex\Codex):drawer:popover:type)`                        |
| [Link to phpdoc class](#codex:phpdoc(Codex\Codex))                      | `[Link to phpdoc class](#codex:phpdoc(Codex\Codex))`                        |
| [Link to phpdoc method](#codex:phpdoc(Codex\Codex::get()))              | `[Link to phpdoc method](#codex:phpdoc(Codex\Codex::get()))`                |
| [Class popover](#codex:phpdoc(Codex\Codex):popover)                     | `[Class popover](#codex:phpdoc(Codex\Codex):popover)`                       |
| [](#codex:phpdoc(Codex\Codex):popover)                                  | `[](#codex:phpdoc(Codex\Codex):popover)`                                    |
| [Method popover](#codex:phpdoc(Codex\Codex::get()):popover)             | `[Method popover](#codex:phpdoc(Codex\Codex::get()):popover)`               |
| [Method popover + type](#codex:phpdoc(Codex\Codex::get()):popover:type) | `[Method popover + :type](#codex:phpdoc(Codex\Codex::get()):popover::type)` |
| Class type: [](#codex:phpdoc(Codex\Codex):type)                         | `Class type: [](#codex:phpdoc(Codex\Codex):type)`                           |
| Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)           | `Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)`             |
| Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)             | `Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)`               |
| string type: [](#codex:phpdoc(string):type)                             | `String type: [](#codex:phpdoc(string):type)`                               |
| array type: [](#codex:phpdoc(array):type)                               | `Array type: [](#codex:phpdoc(array):type)`                                 |
| [Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)             | `[Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)`               |
| [Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)             | `[Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)`               |


| Class                                              | Interface                                                    | Trait                                                          | Code                                            |
|:---------------------------------------------------|:-------------------------------------------------------------|:---------------------------------------------------------------|:------------------------------------------------|
| [](#codex:phpdoc(Codex\Codex))                     | [](#codex:phpdoc(Codex\Contracts\Codex))                     | [](#codex:phpdoc(Codex\Concerns\Bootable))                     | `[](#codex:phpdoc(<name>))`                     |
| [Link](#codex:phpdoc(Codex\Codex))                 | [Link](#codex:phpdoc(Codex\Contracts\Codex))                 | [Link](#codex:phpdoc(Codex\Concerns\Bootable))                 | `[Link](#codex:phpdoc(<name>))`                 |
| [](#codex:phpdoc(Codex\Codex):!styling:!icon)      | [](#codex:phpdoc(Codex\Contracts\Codex):!styling:!icon)      | [](#codex:phpdoc(Codex\Concerns\Bootable):!styling:!icon)      | `[](#codex:phpdoc(<name>):!styling:!icon)`      |
| [](#codex:phpdoc(Codex\Codex):type:popover)        | [](#codex:phpdoc(Codex\Contracts\Codex):type:popover)        | [](#codex:phpdoc(Codex\Concerns\Bootable):type:popover)        | `[](#codex:phpdoc(<name>):type:popover)`        |
| [](#codex:phpdoc(Codex\Codex):type:popover:drawer) | [](#codex:phpdoc(Codex\Contracts\Codex):type:popover:drawer) | [](#codex:phpdoc(Codex\Concerns\Bootable):type:popover:drawer) | `[](#codex:phpdoc(<name>):type:popover:drawer)` |
| [](#codex:phpdoc(Codex\Codex):type)                | [](#codex:phpdoc(Codex\Contracts\Codex):type)                | [](#codex:phpdoc(Codex\Concerns\Bootable):type)                | `[](#codex:phpdoc(<name>):type:popover:drawer)` |
|                                                    |                                                              |                                                                |                                                 |
|                                                    |                                                              |                                                                |                                                 |
|                                                    |                                                              |                                                                |                                                 |




- [Link to phpdoc class](#codex:phpdoc(Codex\Codex))           
- [Link to phpdoc method](#codex:phpdoc(Codex\Codex::get()))   
- [Class tooltip](#codex:phpdoc(Codex\Codex):tooltip)          
- [Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)  
- Class type: [](#codex:phpdoc(Codex\Codex):type)              
- Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)
- Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)  
- string type: [](#codex:phpdoc(string):type)                  
- array type: [](#codex:phpdoc(array):type)                    

```markdown
- [Link to phpdoc class](#codex:phpdoc(Codex\Codex))           
- [Link to phpdoc method](#codex:phpdoc(Codex\Codex::get()))   
- [Class tooltip](#codex:phpdoc(Codex\Codex):tooltip)          
- [Method tooltip](#codex:phpdoc(Codex\Codex::get()):tooltip)  
- Class type: [](#codex:phpdoc(Codex\Codex):type)              
- Interface type: [](#codex:phpdoc(Codex\Contracts\Codex):type)
- Trait type: [](#codex:phpdoc(Codex\Concerns\HasCodex):type)  
- string type: [](#codex:phpdoc(string):type)                  
- array type: [](#codex:phpdoc(array):type)                 
```    

| asdfsadf | asfsadfasdf |
|:---------|:------------|
|          | asdf        |


Document links with modal modifier 
