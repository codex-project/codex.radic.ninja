<?php

namespace App\Codex;

use App\Codex\Console\DotenvSetKeyCommand;
use App\Codex\Console\SitemapCommand;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use Jackiedo\DotenvEditor\DotenvEditorServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;
use Sabre\DAV\Client as WebDAVClient;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class CodexServiceProvider extends ServiceProvider
{
    public function provides()
    {
        return [ 'command.dotenv.setkey', 'command.sitemap.generate' ];
    }

    public function register()
    {
        $this->app->register(DotenvEditorServiceProvider::class);
        $this->app->singleton('command.dotenv.setkey', DotenvSetKeyCommand::class);
        $this->app->singleton('command.sitemap.generate', SitemapCommand::class);
        $this->registerFilesystemAdapters();

        $this->commands([ 'command.dotenv.setkey', 'command.sitemap.generate' ]);
    }

    protected function registerFilesystemAdapters()
    {
        $fsm = $this->app->make('filesystem');
        $fsm->extend('webdav', function (Application $app, array $config = []) {
            $client    = new WebDAVClient($config);
            $adapter   = new WebDAVAdapter($client, $config[ 'prefix' ]);
            $flysystem = new Filesystem($adapter);
            return new FilesystemAdapter($flysystem);
        });
        $fsm->extend('dropbox', function (Application $app, array $config = []) {
            $client    = new DropboxClient($config[ 'token' ]);
            $adapter   = new DropboxAdapter($client, $config[ 'prefix' ] || '');
            $flysystem = new Filesystem($adapter);
            return new FilesystemAdapter($flysystem);
        });
        $fsm->extend('zip', function (Application $app, array $config = []) {
            $adapter   = new ZipArchiveAdapter($config[ 'path' ]);
            $flysystem = new Filesystem($adapter);
            return new FilesystemAdapter($flysystem);
        });
        $fsm->extend('google-cloud', function (Application $app, array $config = []) {
            $storageClient = new StorageClient($config);
            $adapter       = new GoogleStorageAdapter($storageClient, $storageClient->bucket($config[ 'bucket' ]));
            $flysystem     = new Filesystem($adapter);
            return new FilesystemAdapter($flysystem);
        });
    }

}
