<?php

namespace Database\Seeders;

use App\Models\ModuleParams;
use Illuminate\Database\Seeder;

class ModuleParamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleParams::factory()->times(100)->create();
    }
}
