<?php

namespace Database\Factories;

use App\Models\Objects;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Objects::class;

    protected $name = ['Bathroom', 'Bedroom', 'Boxroom', 'Cellar', 'Cloakroom',
        'Dining-room', 'Games room', 'Garage', 'Hall', 'Kitchen', 'Laboratory',
        'Living-room','Study room','Toilet','Utility room'];

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
            'name' => $this->name[$this->i]
        ];
    }
}
