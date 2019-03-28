---
title: Overview
subtitle: Codex Documentation
processors:
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

<!--*codex:hide*-->

> Head over to [codex-project.ninja](http://codex-project.ninja) for the full documentation (starting with this document) to get started.

<!--*codex:/hide*-->


## Introduction
**Codex** is a file-based documentation platform built on top of Laravel. It's completely customizable and dead simple to use to create beautiful documentation.

Codex is able to do things like transforming markdown or automaticaly fetching documentation from a Bitbucket/Github repositories.
Most of it's features are provided by addons. Codex is extenable, themeable, hackable and simple to setup and use.

**Codex** > **Projects** > **Revisions** > **Documents** > **Processors** > **Output**

- _Codex_ can provide documentation for multiple _Projects_.
- Each _Project_ has one or more _Revisions (versions)_
- Each _Revision_ contains _Documents_.
- Echo _Document_ is passed trough _Processors_, modifying it's content before displaying.

## Features
- Laravel 5
- Markdown, Creole or custom document parsers
- Host a unlimited number of _projects/manuals_ with accompanying _versions_
- Extenable, themeable, hackable 
- Simple to setup and use
- Syntax Highlighting
- Easy navigation defined in YAML
- SEO Friendly URLs
- Default theme build on Laravels theme
- Multiple storage methods (local, dropbox, amazon, etc)
- Can be installed as stand-alone or sub-component in your own (Laravel) project.
- (Addon Feature) Github/Bitbucket (auto webhook) synchronisation based on tags/branches. 
- (Addon Feature) Smooth working, custom PHPDoc integration
- (Addon Feature) Access restriction on projects using Github/Bitbucket login
- Much, much more!
