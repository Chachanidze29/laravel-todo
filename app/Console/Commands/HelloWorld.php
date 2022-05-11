<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloWorld extends Command
{
    protected $signature = 'command:hello-world';
    protected $description = "Outputs the 'Hello World'";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo "Hello World ". PHP_EOL;
    }
}
