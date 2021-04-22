<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=>1,
            'name' => 'Head'
        ]);
        DB::table('roles')->insert([
            'id'=>2,
            'name' => 'Deputy Head'
        ]);
        DB::table('roles')->insert([
            'id'=>3,
            'name' => 'Junior Member'
        ]);
        DB::table('roles')->insert([
            'id'=>4,
            'name' => 'Senior Member'
        ]);
        DB::table('roles')->insert([
            'id'=>5,
            'name' => 'Manager'
        ]);
    }
}
