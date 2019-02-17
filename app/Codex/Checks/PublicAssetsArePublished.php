<?php

namespace App\Codex\Checks;

use BeyondCode\SelfDiagnosis\Checks\Check;
use Codex\CodexServiceProvider;
use Symfony\Component\Finder\SplFileInfo;

class PublicAssetsArePublished implements Check
{
    /** @var \Illuminate\Filesystem\Filesystem */
    protected $fs;

    public function __construct(\Illuminate\Filesystem\Filesystem $fs)
    {
        $this->fs = $fs;
    }


    public function name(array $config): string
    {
        return 'Codex public assets are published and up to date';
    }

    public function check(array $config): bool
    {
        if ( ! $this->checkServiceProviderResources(app()->getProvider(CodexServiceProvider::class))) {
            return false;
        }
        foreach (codex()->getAddons()->enabled() as $addon) {
            /** @var \Codex\Addons\Addon $addon */
            if ( ! $this->checkServiceProviderResources($addon->newServiceProvider())) {
                return false;
            }
        }
        return true;
    }

    protected function checkServiceProviderResources($provider)
    {
        $resources = $provider->getResources();
        foreach ($resources[ 'assets' ] as $resource) {
            $hasPublished = $this->fs->exists($resource[ 'publishPath' ]);
            if ( ! $hasPublished) {
                return false;
            }
            $files          = collect($this->fs->allFiles($resource[ 'path' ]));
            $publishedFiles = collect($this->fs->allFiles($resource[ 'publishPath' ]))->keyBy(function (SplFileInfo $file) {
                return $file->getRelativePathname();
            });
            $isOutdated     = $files->filter(function (SplFileInfo $file) use ($publishedFiles) {
                /** @var SplFileInfo $publishedFile */
                $publishedFile = $publishedFiles->get($file->getRelativePathname());
                if ( ! $publishedFile) {
                    return true;
                }
                return $file->getMTime() > $publishedFile->getMTime();
            })->isNotEmpty();
            if ($isOutdated) {
                return false;
            }
        }
        return true;
    }

    public function message(array $config): string
    {
        return 'Some assets are either not published or up to date. Call "php artisan vendor:publish --tag=public --force" to publish the assets.';
    }
}
