---
title: Introduction
subtitle: Processors
---


# Introduction

Processors are used to read, parse, modify and render documents to HTML.


### Core processor overview

- AttributesProcessor 
    - Parses the (frontmatter) attributes of the document
- ParserProcessor 
    - Uses the configured parser to convert the document's markup language to HTML
- [LinksProcessor](links) 
    - Corrects relative link paths
    - Adds _blank target on external links 
    - Parses/modifies links containing hashes starting with **#codex:** as configured in `processors.links.prefix`.
- [MacroProcessor](macros)
    - Parses/modifies HTML comments that use the macro syntax, calls the associated handler and replaces it with the result.
- [TocProcessor](toc)
    - Renders a Table of Content using the document's header texts.
- CacheProcessor
    - Caches the final processed content 
    
      
