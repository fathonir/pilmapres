<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hash {string}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call Hash:make()';

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
        $this->line(\Illuminate\Support\Facades\Hash::make($this->argument('string')));
    }
}
