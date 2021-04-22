<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'username'=>Str::random(10),
        'date_of_joining'=>\Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
        'remaining_leaves'=>20,
        'total_leaves'=>30,
        'role_id'=>1,
        'department_id'=>1
        ]); DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'username'=>Str::random(10),
        'date_of_joining'=>\Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
        'remaining_leaves'=>10,
        'total_leaves'=>30,
        'role_id'=>4,
        'department_id'=>1
        ]); DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'username'=>Str::random(10),
        'date_of_joining'=>\Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
        'remaining_leaves'=>0,
        'total_leaves'=>30,
        'role_id'=>3,
        'department_id'=>1
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'lidichamp@gmail.com',
            'password' => Hash::make('password'),
            'username'=>Str::random(10),
        'date_of_joining'=>\Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
        'remaining_leaves'=>0,
        'total_leaves'=>30,
        'role_id'=>3,
        'department_id'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'Maxwell Obinna',
            'email' => 'maxsteelobinna@gmail.com',
            'password' => Hash::make('password'),
            'username'=>'maxsteel',
            'date_of_joining'=>\Carbon\Carbon::createFromDate(2019,01,01)->toDateTimeString(),
            'remaining_leaves'=>20,
            'total_leaves'=>30,
            'role_id'=>2,
            'department_id'=>1
        ]);

    }
}
