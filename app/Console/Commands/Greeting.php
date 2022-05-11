<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Greeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:greeting {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $lastName = $this->ask("What is your last name?");
        $this->info("Hello ".$lastName.' '.$this->argument('name').PHP_EOL);
    }
}
