<?php

namespace App\Services;

use Illuminate\Support\Str;

class RandomService
{
    public function getRandomValue(): string
    {
        return Str::random().PHP_EOL;
    }
}
