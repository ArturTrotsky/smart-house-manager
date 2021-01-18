<?php

namespace Database\Factories;

use App\Models\ModuleParams;
use App\Models\Modules;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleParamsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModuleParams::class;

    protected $i = -1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->i++;
        return [
            'module_id' => Modules::pluck('id')->toArray()[$this->i],
        ];
    }
}
