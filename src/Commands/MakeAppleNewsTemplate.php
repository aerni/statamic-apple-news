<?php

namespace Aerni\AppleNews\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;

class MakeAppleNewsTemplate extends Command
{
    use RunsInPlease;

    protected $signature = 'make:apple-news-template {name}';
    protected $description = 'Make a new article template for Apple News';

    public function handle()
    {
        $stub = File::get(__DIR__ . '/../../resources/stubs/DummyTemplate.php');
        $stub = str_replace('DummyTemplate', $this->argument('name'), $stub);
        $path = app_path('AppleNews/' . $this->argument('name') . '.php');
        $relativePath = str_replace(base_path() . '/', '', $path);

        if (! File::exists($path) || $this->confirm("The template class <comment>{$this->argument('name')}</comment> already exists. Overwrite?")) {
            File::ensureDirectoryExists(app_path('AppleNews'));
            File::put($path, $stub);
            $this->line("<info>[✓]</info> The template class {$this->argument('name')} was successfully created: <comment>{$relativePath}</comment>");
        }
    }
}
