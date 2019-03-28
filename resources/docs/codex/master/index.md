---
title: Overview
subtitle: Codex Documentation
processors:
    #enabled:
    #    - cache
    cache:
        mode: true
    buttons:
      buttons:    
        github: 
          text: Github
          icon: github    
          href: https://github.com/codex-project/codex
        packagist:
          text: Packagist
          icon: download    
          href: https://packagist.org/packages/codex
---          

# Codex Documentation

<!--*codex:general:hide*-->

> Head over to [codex-project.ninja](http://codex-project.ninja) for the full documentation (starting with this document) to get started.

<!--*codex:/general:hide*-->

**Codex** is a file-based documentation platform built on top of Laravel. It's completely customizable and dead simple to use to create beautiful documentation.

Codex is able to do things like transforming markdown or automaticaly fetching documentation from a Bitbucket/Github repositories.
Most of it's features are provided by addons. Codex is extenable, themeable, hackable and simple to setup and use.

**Codex** > **Projects** > **Revisions** > **Documents** > **Processors** > **Output**

- _Codex_ can provide documentation for multiple _Projects_.
- Each _Project_ has one or more _Revisions (versions)_
- Each _Revision_ contains _Documents_.
- Eech _Document_ is passed trough _Processors_, modifying it's content before displaying.

## Features
- Laravel 5
- Ships with Markdown, Creole or custom document parsers
- Host a unlimited number of _projects/manuals_ with accompanying _versions_
- Extendable, themeable, hackable 
- Simple to setup and use
- Syntax Highlighting
- Easy navigation defined in YAML
- SEO Friendly URLs
- Multiple storage methods (local, dropbox, amazon, etc)
- Can be installed as stand-alone or sub-component in your own (Laravel) project.
- Much, much more!

## Official Addons

- [Algolia search](addons/algolia-search) - Integrates algolia search into codex 
- [Auth](addons/auth) - Provides authentication using oauth providers to restrict project access
- [Blog](addons/blog) - Provides blogging capability with categories containing posts
- [Comments](addons/comments) - Adds comments to your documents like Disqus or create your own adapter
- [Filesystems](addons/filesystems) - Adds a collection of common filesystem adapters. These can be used by your projects.
- [Git](addons/git) - Github/Bitbucket (auto-webhook or manual) synchronisation based on tags/branches.
- [Phpdoc](addons/phpdoc) - Integrates phpdoc documentation, links and macros in your projects
- [Sitemap](addons/sitemap) - Generates a sitemap.xml
