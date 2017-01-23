<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {path} {name} {--layout=app}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Blade View';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // name of the blade file
        $name = $this->argument('name') . '.blade.php';

        // path to the new blade file
        $path = resource_path('views/' . $this->argument('path'));

        // the content of the blade file
        $content = "@extends('layouts.{$this->option('layout')}')";

        // create directory if not exists
        $files = new Filesystem();
        if (!$files->isDirectory($path)) {
            $files->makeDirectory($path, 0777, true, true);
        }

        // put the content
        $files->put($path . '/' . $name, $content);

        $this->info('View created successfully.');
    }
}
