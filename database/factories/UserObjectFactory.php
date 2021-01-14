<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserObject;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserObjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserObject::class;

    protected $name = ['Bedroom', 'Boxroom', 'Cellar', 'Cloakroom', 'Dining-room',
        'Games room', 'Garage', 'Hall', 'Kitchen', 'Laboratory', 'Living-room', 'Study room',
        'Toilet', 'Utility room'];


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all('id')->random(),
            'name' => $this->name[array_rand($this->name)],
        ];
    }
}
