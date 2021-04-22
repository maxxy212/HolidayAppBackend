<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Engineering'
        ]);
        DB::table('departments')->insert([
            'name' => 'Construction'
        ]);DB::table('departments')->insert([
            'name' => 'HR'
        ]);
    }
}
