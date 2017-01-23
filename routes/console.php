<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */
use Illuminate\Foundation\Inspiring;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('user:input', function () {
    $value = $this->ask('ask something');
    $this->comment('value: ' . $value);
    $value = $this->confirm('make confirmation');
    $this->comment('value: ' . $value);
    $value = $this->secret('request something secret');
    $this->comment('value: ' . $value);
});

// create multiple models at one time
// Artisan::command('make:models {models*}', function () {
//     $models = $this->argument('models');
//     foreach ($models as $model) {
//         $name = studly_case(str_singular($model));
//         $this->call('make:model', [
//             'name' => $name,
//             '-m' => true,
//         ]);
//         $this->call('make:controller', [
//             'name' => $name . 'Controller',
//             '-r' => true,
//         ]);
//     }
// })->describe('Create multiple new Eloquent model and Controllers classes');

// Artisan::command('make:view {path} {name} {--layout=app}', function () {

//     // name of the blade file
//     $name = $this->argument('name') . '.blade.php';

//     // path to the new blade file
//     $path = resource_path('views/' . $this->argument('path'));

//     // the content of the blade file
//     $content = "@extends('layouts.{$this->option('layout')}')";

//     // create directory if not exists
//     $files = new Filesystem();
//     if (!$files->isDirectory($path)) {
//         $files->makeDirectory($path, 0777, true, true);
//     }

//     // put the content
//     $files->put($path . '/' . $name, $content);

//     $this->info('View created successfully.');
// })->describe('Create a new Blade View');

// Artisan::command('clear:cache', function () {
//     $this->info('Clearing cache...');
//     $this->call('cache:clear');

//     $this->comment('Clearing config cache...');
//     $this->call('config:cache');

//     $this->line('Clearing blade caches...');
//     $this->call('view:clear');

//     $this->error('Optimizing your application...');
//     $this->call('optimize');
// })->describe('Clear all caches');
