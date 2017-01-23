<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:models {models*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new multiple Eloquent classes';

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
        $models = $this->argument('models');
        foreach ($models as $model) {
            $name = studly_case(str_singular($model));
            $this->call('make:model', [
                'name' => $name,
                '-m' => true,
            ]);
            $this->call('make:controller', [
                'name' => $name . 'Controller',
                '-r' => true,
            ]);
        }
    }
}
