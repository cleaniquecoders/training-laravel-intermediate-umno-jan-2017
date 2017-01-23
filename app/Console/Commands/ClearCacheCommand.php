<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches';

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
        $this->info('Clearing cache...');
        $this->call('cache:clear');

        $this->comment('Clearing config cache...');
        $this->call('config:cache');

        $this->line('Clearing blade caches...');
        $this->call('view:clear');

        $this->error('Optimizing your application...');
        $this->call('optimize');
    }
}
