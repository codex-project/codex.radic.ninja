---
title: Components
subtitle: Frontend
---


# Components

### Class Overview

#### ComponentRegistry 
The ComponentRegistry contains React Components with their associated HTML Tag/id.

```typescript
const { app }       = codex.core
const components    = app.get('components'); // ComponentRegistry
components.register('my-component', MyComponent);
```


#### HtmlParser 
The HTML parser is used to parse the document content HTML and transform registered HTML tags into a rendered React Components.
```typescript
const htmlParser    = app.get('htmlparser') // HtmlParser 
htmlParser.parse('<div><my-component /></div>') // MyComponent is now rendered as html inside a <div> 
```  


#### Hyperscript
The Hyper(script) code render function renders valid HTML tags and registered React Component HTML Tags. 

The `h()` function makes it really easy to create and register your own custom React Components.   

It is also possible to directly render inside a document using a fenced code block as shown below:  

<!--*codex:row({ gutter: 10 })*-->
<!--*codex:col({ md: 16 })*-->
**Code**
```markdown
    ```hyper
    h('div', { style: { border: '1px solid lightgrey', padding: '0 20px' } }, h([
        h('p', 'Wrapped in fragment'),
        h('p', 'Requires no keys'),
        h('div', [
            h('p', { key: 1 }, 'Not wrapped in fragment'),
            h('p', { key: 2 }, 'Requires keys to be provided'),
            h('div', { key: 3, className: 'foobar' }, 'The content of div.foobar'),
        ]),            
        h('c-tabs', { style: { border: '1px solid lightgrey', margin: '15px 0' } }, [
            h('c-tab', { key: 'foo', tab: 'foo' }, h('p','The foo tab')),
            h('c-tab', { key: 'bar', tab: 'bar' }, h('p','The bar tab')),
            h('c-tab', { key: 'ape', tab: 'ape' }, h([
               h('p', 'content string'),
               h('p', 'content string'),
               h('p', 'content string'),
               h('p', 'content string'),
           ])),
        ]),
    ]));
    ```
```
<!--*codex:/col*-->
<!--*codex:col({ md: 8 })*-->
**Output** 
```hyper
h('div', { style: { border: '1px solid lightgrey', padding: '0 20px' } }, h([
    h('p', 'Wrapped in fragment'),
    h('p', 'Requires no keys'),
    h('div', [
        h('p', { key: 1 }, 'Not wrapped in fragment'),
        h('p', { key: 2 }, 'Requires keys to be provided'),
        h('div', { key: 3, className: 'foobar' }, 'The content of div.foobar'),
    ]),            
    h('c-tabs', { style: { border: '1px solid lightgrey', margin: '15px 0' } }, [
        h('c-tab', { key: 'foo', tab: 'foo' }, h('p','The foo tab')),
        h('c-tab', { key: 'bar', tab: 'bar' }, h('p','The bar tab')),
        h('c-tab', { key: 'ape', tab: 'ape' }, h([
           h('p', 'content string'),
           h('p', 'content string'),
           h('p', 'content string'),
           h('p', 'content string'),
       ])),
    ]),
]));
```
<!--*codex:/col*-->
<!--*codex:/row*-->
