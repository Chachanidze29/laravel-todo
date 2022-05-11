<?php

namespace App\Console\Commands;

use App\Services\RandomService;
use Illuminate\Console\Command;

class GetRandomValue extends Command
{
    protected $signature = 'command:get-random-value';
    protected $description = 'Outputs the random value';

    public $randomService;

    public function __construct(RandomService $randomService)
    {
        parent::__construct();
        $this->randomService = $randomService;
    }

    public function handle()
    {
        echo $this->randomService->getRandomValue().PHP_EOL;
    }
}
