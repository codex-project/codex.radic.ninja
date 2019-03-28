---
title: UML
subtitle: Writing Reference
---

# UML

Uses [nomnoml](https://github.com/skanaar/nomnoml)

##### Decorator Pattern

```markdown
    ```nomnoml
    [<frame>Decorator pattern|
      [<abstract>Component||+ operation()]
      [Client] depends --> [Component]
      [Decorator|- next: Component]
      [Decorator] decorates -- [ConcreteComponent]
      [Component] <:- [Decorator]
      [Component] <:- [ConcreteComponent]
    ]
    ```
```

```nomnoml
[<frame>Decorator pattern|
  [<abstract>Component||+ operation()]
  [Client] depends --> [Component]
  [Decorator|- next: Component]
  [Decorator] decorates -- [ConcreteComponent]
  [Component] <:- [Decorator]
  [Component] <:- [ConcreteComponent]
]
```



##### Example


```nomnoml
#direction: right
#.box: fill=pink italic bold visual=rhomb

[<frame>frame|[some class]]
[<package>package|[some class]]
[<box>box]
[class|items: Object\[\]] - [<hidden> hidden]
[hidden] - [<label> label]
[hidden] - [instance]
[<abstract> abstract] - [<instance> instance]
[<note> note] -- [<reference> reference]
[<package> package] <- [<frame> frame]
[<database> database] <:- [<start> start]
[<end> end] -/- [<state> state]
[<choice> choice] <-o [<input> input]
[<sender> sender] <-+ [<receiver> receiver]
[<actor> actor] <-> [<usecase> usecase]
```
