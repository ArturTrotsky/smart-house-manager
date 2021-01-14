<?php

namespace Database\Seeders;

use App\Models\Modules;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modules::factory()->times(100)->create();
    }
}
