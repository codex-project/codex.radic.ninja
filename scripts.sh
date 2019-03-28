#!/usr/bin/env bash

copy-docs(){
    rm -rf resources/.docs
    mv resources/docs resources/.docs
    cp -r ../codex/resources/docs resources/docs
}

stop-supervisor(){
    sudo supervisorctl stop codex-project:*
}
start-supervisor(){
    sudo supervisorctl start codex-project:*
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
