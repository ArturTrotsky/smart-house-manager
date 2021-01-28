<?php

namespace Database\Factories;

use App\Models\ModuleTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModuleTypes::class;

    protected $name = ['Light', 'Ventilation', 'Heating', 'Water Heating', 'Television',
        'Door lock', 'Radio', 'Video camera', 'Security alarm'];

    protected $unit = ['%', '%', '°C', '°C', 'on\off', 'on\off', 'on\off', 'on\off', 'on\off'];

    protected $i = -1;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $this->i++;
        return ['name' => $this->name[$this->i], 'unit' => $this->unit[$this->i]];
    }
}
