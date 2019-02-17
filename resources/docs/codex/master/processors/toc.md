---
title: TOC 
subtitle: Processors
---

# TOC Processor
The Table of Content processor is exactly what you see right here.

```php
$project  = codex()->getProject('codex');
$revision = $project->getRevision('master');
$document = $revision->getDocument('index');
$content  = $document->getContent();

echo $document['title'];
echo $document->attr('title', 'Overview');

$phpdoc     = $revision->phpdoc();
$file       = $phpdoc->getFileByFullName($phpdoc->getDefaultClass());
$class      = $file->getClass();
/** @var \Codex\Phpdoc\Serializer\Phpdoc\File\Method $method */
$method     = $class->getMethods()->get('get');
$isAbstract = $method->isAbstract();

$member = $project->getGitConfig()->getManager()->getClient()->organizations()->members()->member('org', 'user');
if($project->auth()->hasAccess()){
    echo 'hasAccess';
}
```

[^1] asdfsd

## First 
this is the first header
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everythingwe do is connected with satori: futility, sex, samadhi, thought.

### First First
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

### First Second
- This is the child of the first header 
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
- Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
- Everything we do is connected with satori: futility, sex, samadhi, thought.
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.

### First Third
This is the child of the child of the first header

#### First Third First
This is the child of the child of the first header
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.


## Second
this is the second header
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

### Second Second
- This is the child of the first header 
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
- Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
- Everything we do is connected with satori: futility, sex, samadhi, thought.
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.

### Second Third
This is the child of the child of the first header

#### Second Third First
This is the child of the child of the first header
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

#### Second Third Second
- This is the child of the first header 
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
- Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.


## Third
this is the third header 
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

### Third First
This is the child of the third header 
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.

### Third Second 
This is the child of the child of the first header

#### Third Third First
- This is the child of the first header 
- Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
- Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.

Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.


##### Third Third First First
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.

#### Third Third Second
This is the child of the child of the first header
Why does the mermaid yell? Jolly, black treasure! Remember: boiled steak tastes best when flattened in an ice blender enameled with black cardamon.
Cum mortem nocere, omnes navises locus salvus, emeritis adiuratores.
Everything we do is connected with satori: futility, sex, samadhi, thought.
