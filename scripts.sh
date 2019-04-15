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

create-archive2(){
    rm -f archive.tar
    tar --exclude-vcs --exclude-vcs-ignores -cvf archive.tar \
        app bootstrap config database routes artisan server.php

    tar --exclude-vcs -rvf archive.tar \
        codex-addons vendor storage resources public \
        .env composer.json composer.lock

}



create-archive(){
    rm -f archive.tar.gz
    tar --exclude-vcs --exclude-vcs-ignores -czvf archive.tar.gz \
        app bootstrap config database routes artisan server.php \
        codex-addons vendor storage resources public \
        .env composer.json composer.lock



}


$*
