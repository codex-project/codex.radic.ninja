---
title: HTML & Components
subtitle: Writing Reference
---

# HTML & Components

### HTML
By default HTML code is allowed except `<script>` tags.
 
> It is recommended that you wrap any HTML code inside a [macro](../processors/macros), which use HTML comments and are ignored in external applications.


### (React) Components
Components can also be used in your documents using HTML tags, for example: 
```html
<c-tabs>
<c-tab tab="Tab 1">
Tab 1 content
</c-tab>
<c-tab tab="Tab 2">
Tab 1 content
</c-tab>
</c-tabs>
```

> To use/add components as HTML tags they need to be registered with the frontend. 
> 
> Check `codex.core.app.get('components')` in your browser's console.
> 
> And don't forget to check the [Frontend > Components](../frontend/components#codex:document['frontend/components']) documentation for a in-depth explanation of all possibilities. 

