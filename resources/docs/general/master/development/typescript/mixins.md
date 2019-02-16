Mixins
======

This document just shows some snippets i have successfully implemented.

- Regular Typescript Mixins
- VueJS Typescript Mixins


## Regular Typescript Mixins

**Details**
- Typescript 2.5
- Intellisence / type completion
- Supports decorators in mixins (only tested property decorators)
- Using the decorators from 'MobX' package
- Should add some IoC/DI with Inversify soon aswell

```typescript
import 'reflect-metadata'
import * as mobx from 'mobx'
import { action, computed, observable } from 'mobx'


namespace test1 {
    function Mixin<T>(...mixins): new() => T {
        // let current = mixins.length - 1;

        class X {
            constructor() {
                mixins.forEach(mixin => {
                    if ( mixin.call !== 'undefined' ) {
                        mixin.call(this)
                    }
                });
            }
        }

        let ignoreNames:string[] = ['constructor', 'length', 'name', 'prototype']

        mixins.forEach(mixin => {
            console.log(`merging mixin ${mixin.name || mixin.toString()}`)
            Object.getOwnPropertyNames(mixin.prototype).forEach(name => {
                if ( ignoreNames.indexOf(name) !== - 1 ) return;
                console.log(`defining propeprty ${name}`)
                Object.defineProperty(X.prototype, name, Object.getOwnPropertyDescriptor(mixin.prototype, name))
            })
        })

        return <any> X;
    }


    abstract class DogMeta {
        constructor(...args) {
            console.log('DogMeta args', args);
        }

        @observable dog = {
            name: 'foo',
            age : 15
        }

        @action
        setName(name) {
            this.dog.name = name;
        }

        @action
        setAge(age) {
            this.dog.age = age;
        }

        @computed
        get name(): string {return this.dog.name}

        set name(name: string) { this.setName(name) }

        @computed
        get age(): number {return this.dog.age}
    }

    abstract class DogFeatures {
        constructor(...args) {
            console.log('DogFeatures args', args);
        }

        @observable activity = {
            walking: false,
            sitting: true
        }

        @action
        walk() {
            this.activity.sitting = false;
            this.activity.walking = true;
        }

        @action
        sit() {
            this.activity.walking = false;
            this.activity.sitting = true;
        }
    }

    class BaseDog {
        constructor(...args) {
            console.log('BaseDog args', args);
        }

        bark() {
            console.log('WOOF!')
        }

        alive: boolean = false

        kill() {
            this.alive = false;
            console.log('YU KILLED DOGGY. U SAD MAN')
        }

        isAlive() { console.log(this.alive)}

        revive() {
            this.alive = true;
        }

    }


    interface IDog extends BaseDog, DogMeta, DogFeatures {}

    class MyDog extends Mixin<IDog>(BaseDog, DogMeta, DogFeatures) {
        constructor() {
            super()
            this.dump()
            this.revive();
        }

        dumpx() { console.dir(mobx), { colors: true, showHidden: true, depth: 10 }}

        dump() {console.dir(this, { colors: true, showHidden: true, depth: 6 })}
    }

    export function run() {
        let dog = new MyDog();
        dog.dump()
        dog.setName('sweety');
        dog.sit();
        dog.bark();
        dog.kill();
    }
}

test1.run();
```
