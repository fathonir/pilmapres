<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TestJob;
use Carbon\Carbon;
use Excel;

class TestJob1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:test-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Job';

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
        $test_job = new TestJob;
        $test_job->nama     = "Indra";
        $test_job->alamat   = "Tasikmalaya";
        $test_job->save();
    }
}





















