<?php

namespace App\Codex\Console;

use App\Codex\Commands\GenerateSitemap;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SitemapCommand extends Command
{
    use DispatchesJobs;

    protected $signature = 'sitemap:generate';

    public function handle()
    {
        $this->dispatch(new GenerateSitemap($path = public_path('sitemap.xml')));

        $this->line("Sitemap generated [{$path}]");
    }
}
