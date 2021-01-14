<?php

namespace Database\Factories;

use App\Models\Modules;
use App\Models\ModuleTypes;
use App\Models\UserObject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'module_type_id' => ModuleTypes::all('id')->random(),
            'object_id' => UserObject::all('id')->random(),
            'name' => 'module_name_' . $this->faker->unique()->numberBetween($min = 1, $max = 100),
            'ip_adress' => $this->faker->ipv4 . ':' . $this->faker->numberBetween($min = 0, $max = 65536)
        ];
    }
}
