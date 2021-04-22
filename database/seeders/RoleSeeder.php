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
            'name' => 'Head'
        ]);
        DB::table('roles')->insert([
            'name' => 'Deputy Head'
        ]);
        DB::table('roles')->insert([
            'name' => 'Junior Member'
        ]);
        DB::table('roles')->insert([
            'name' => 'Senior Member'
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager'
        ]);
    }
}
