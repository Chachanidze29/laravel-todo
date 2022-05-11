<?php

namespace Database\Factories;

use App\Models\Todos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TodosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Todos::class;

    public function definition()
    {
        return [
            'content'=>Str::random(10),
            'completed'=>0
        ];
    }
}
