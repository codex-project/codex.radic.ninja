<!--
title: Todo
            
-->

## DevOps

Current situation 

the frontend dev project is able to produce largely stable builds for both development, pre-production (for frontend/backend integration testing) and production. 

the backend dev project is able to copy or link those types of frontend builds to either: 
- the relating backend package its assets directory 
- or directly to the application public asset folder

This will remain possible for both development projects forever for convienices sake. 


This should soon be automaticly done trough countinous integration using Jenkins as well, here's some stuff to be realised early on:

- Job 1: For each PHP package that is pushed to remote, jenkins will unit-test them individually with only their required dependencies. 
- Job 1.1: Afterwards, jenkins will do feature testing by combining all packages and create a fresh (pre-defined) laravel project in which all those packages will be installed with composer's local path based repository to mimick real world behaviour. 
- job 1.2: After positive completion of both installation and feature tests, the PHP package that initiated the build 'pipeline' will be marked for release availability.

- Job 2: The frontend application does not utilize multiple repositories. When the frontend app is pushed, jenkins will build/compile and unit tests them.
- Job 2.1: On success, Jenkins will continue and start the e2e testing environment (real-world scenario w/Selenium) ensuring that the all components of the frontend application intergrate and function as expected.
- Job 2.2: When successfull, the frontend app will be marked/promoted for integration testing. 

- Job 3.1: 

## Tasks

- [x] ~~GlobalFooter~~ 
- [x] ~~document left menu: when navigating to a child of an menu item, the menu item collapses but should be expanded~~
- [x] ~~document right projects list: does not navigate to another project~~
- [x] document right projects list: Sub-projects 
- [x] ~~document content: toc: links should properly scrollTo with animation~~
- [x] ~~document content: toc: headers in content should be a link~~
- [ ] WelcomeView
- [ ] Macros



<!--
## API

- [ ] <medium /> <beta3 /> Swagger files need some updates
- [ ] <medium /> <beta3 /> Serialization of the PHPDoc XML should have proper naming conventions/convert. some examples of current bad stuff: `namespace-alias`, `long-description` and dashed naming, singular words used for arrays (class.method = array?!?), etc. This has lead to making wrapper classes in the frontend js code (awefull mistake)



## Frontend

#### Core
- [ ] <blocker /> <beta1 /> Big footer variant (with menus, logos, affiliates, copyright)
- [ ] **Menus**
    - [ ] <high /> <beta2 /> Left menu requires styling attention / alternatives. Its the most common used/configurated one..
    - [ ] <medium /> <beta3 /> Implement all child menu types for all (header,side,footer) menu containers.
    - [ ] <low /> Left menu show/hide animation should just be horizontal, remove the vertical growth aspect
    - [ ] <low /> Fix menu show/hide bug on XS & SM sizes
- [ ] <medium /> <beta3 /> Sub-projects integration (proper back-end implementation of this should be first, front-end is ez subitem stuff np)
- [ ] <medium /> <beta2 /> The styling of the generated document elements should be improved
- [ ] <medium /> <beta2 /> TOC items and document header links need to be adjusted in both style and script, does not work now
- [x] <blocker /> <beta1 /> Code highlighter needs to be improved
- [x] <medium /> <beta2 /> The new Code highlight implementation needs to be implemented
- [x] <blocker /> <beta1 /> The left menu should have current item/page selected and be updated with on page enter / update
- [x] <low /> Fixing async content
    - [x] Table tyles
    - [x] Highlighting
    
 

#### Welcome
- [x] <blocker /> <beta1 /> Scrollspy header links tracking bug
- [ ] <blocker /> <beta1 /> Overview section texts (and some screenshots)
- [ ] <blocker /> <beta1 />  **Welcome Carousel**
    - [ ] Replace Code editor screenshot for a relevant screenshotb with better quality
    - [ ] Add another relevant quality screenshot
    - [ ] Each of the 3 slides need to contain informational, attractive, well-written text
    - [ ] Review styling of the slide texts
- [ ] <high /> <beta1 /> Transition from Welcome to Documentation needs a bit of tweaking, it's a bit jerky now
- [x] <blocker /> <beta1 /> Header item (a bit eye-catching) that brings your right to the documentation


#### Document
## Backend

#### Core
- [ ] ...

#### Phpdoc
- [ ] ...

#### Welcome
- [ ] ...


## Addons
#### Search
- Backend Addon using Algolia
- Frontend Vue search implementation 


###### General
- [ ] Create a integration plan document for front/back-end integration in a step-by-step plan  

###### Frontend
- [ ] Integrate [`quasar-framework's q-search`](http://v0-14.quasar-framework.org/components/search.html) into the theme
- [ ] Integrate algolia's `vue-instantsearch` [documentation](https://community.algolia.com/vue-instantsearch) [examples](https://github.com/algolia/vue-instantsearch-examples)


###### Backend
- [ ] Create addon-search php package 
- [ ] Create documentation indexer [example indexer](https://github.com/laravel/laravel.com/blob/master/app/Services/Documentation/Indexer.php) 
- [ ] Add console command calling indexer [example command](https://github.com/laravel/laravel.com/blob/master/app/Console/Commands/IndexDocuments.php) 


#### Git
- Documentation synchronisation from Github/Bitbucket repositories.
- Able to define a range of tags/versions and branches to sync. 
- Webhook support! Auto-sync after push. It can even create the webhooks on git/bitbucket for you :).
- **Can** sync private repos. Tip: check `codex/addon-auth` for access control.
 
#### Auth
- The Auth Addon provides Codex the means to leverage access control to the projects you define. Currently it works only with Bitbucket/Github login.
- Define Github\Bitbucket groups that are allowed to view the documentation.
- There will be support for more providers in the future. Including local/database.
-->
