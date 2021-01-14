<?php

namespace Database\Seeders;

use App\Models\ModuleTypes;
use Illuminate\Database\Seeder;

class ModuleTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleTypes::factory()->times(9)->create();
    }
}
