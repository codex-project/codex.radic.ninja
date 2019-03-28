<?php

namespace App\Codex;

use App\Codex\Console\DotenvSetKeyCommand;
use Illuminate\Support\ServiceProvider;
use Jackiedo\DotenvEditor\DotenvEditorServiceProvider;

class CodexServiceProvider extends ServiceProvider
{
    public function provides()
    {
        return [ 'command.dotenv.setkey' ];
    }

    public function register()
    {
        $this->app->register(DotenvEditorServiceProvider::class);
        $this->app->singleton('command.dotenv.setkey', DotenvSetKeyCommand::class);

        $this->commands([ 'command.dotenv.setkey' ]);
    }

}
