<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'rol_id'=>1,
                'name'=>'SuperAdmin',
                'usu_nombres'=>'TILIN',
                'usu_telefono'=>'0999999999',
                'email'=>'tilin@gmail.com',
                'password'=>bcrypt('123456789')
            ]
        );
        DB::table('users')->insert(
            [
                'rol_id'=>1,
                'name'=>'peter',
                'usu_nombres'=>'la Anguila',
                'usu_telefono'=>'0999999999',
                'email'=>'peter@gmail.com',
                'password'=>bcrypt('123456789')
            ]
        );
    }
}