<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-env {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the value of a specified environment variable';

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
     * @return int
     */
    public function handle()
    {
        $key = $this->argument('key');

        $value = env($key);

        if ($value) {
            $this->info($value);
        } else {
            $this->warn($value);
        }

        return 0;
    }
}
