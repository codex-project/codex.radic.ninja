#!/usr/bin/env bash

copy-docs(){
    rm -rf resources/.docs
    mv resources/docs resources/.docs
    mkdir -p resources/docs/codex
    cp -r ../codex/resources/docs/codex/master resources/docs/codex/master
    cp -r ../codex/resources/docs/codex/v1 resources/docs/codex/v1
    cp -r ../codex/resources/docs/codex/config.php resources/docs/codex/config.php
}

stop-supervisor(){
    sudo supervisorctl stop codex:*
}
start-supervisor(){
    sudo supervisorctl start codex:*
}

restart(){
    copy-docs
    stop-supervisor
    sudo rm storage/logs/supervisor.log
    sudo rm storage/logs/laravel*.log
    composer assets
    composer optimize
    start-supervisor
}



$*
