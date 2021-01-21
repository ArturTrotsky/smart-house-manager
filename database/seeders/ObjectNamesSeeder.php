<?php

namespace Database\Seeders;

use App\Models\Objects;
use Illuminate\Database\Seeder;

class ObjectNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objects::factory()->times(15)->create();
    }
}
