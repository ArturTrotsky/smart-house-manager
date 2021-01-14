<?php

namespace Database\Seeders;

use App\Models\UserObject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //UserObject::truncate();
        //DB::table('user_objects')->truncate();
        UserObject::factory()->times(20)->create();
    }
}
