<?php

namespace App\Console\Commands;

use App\Actions\GetAllUsers;
use App\Services\RandomService;
use App\Services\StaticService;
use Illuminate\Console\Command;

class GetValue extends Command
{
    protected $signature = 'command:get-value {--implementation=}';
    protected $description = 'Command description';

    protected $staticService;
    protected $randomService;
    protected $getAllUsers;

    public function __construct(RandomService $randomService,StaticService $staticService,GetAllUsers $getAllUsers)
    {
        parent::__construct();
        $this->randomService = $randomService;
        $this->staticService = $staticService;
        $this->getAllUsers = $getAllUsers;
    }

    public function handle()
    {
        $implementation = $this->option('implementation');

        $value = match ($implementation) {
            'static'=>$this->staticService->getStaticValue(),
            'random'=>$this->randomService->getRandomValue(),
        };

        $allUsers = ($this->getAllUsers)();

        $bar = $this->output->createProgressBar(count($allUsers));

        $bar->start();

        $allUsers->each(function ($user) use ($bar) {
            $bar->advance();
            usleep(100000);
        });

        $bar->finish();

        dd($allUsers);
    }
}
