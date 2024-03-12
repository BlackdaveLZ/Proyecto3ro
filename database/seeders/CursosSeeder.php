<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert(
            [
                'cur_id'=>1,
                'cur_titulo'=>'matematicas',
                'cur_descripcion'=>'Todo sobre el mundo de la matematica',
                'cur_grupo'=>'1er grupo'
            ]
        );
        DB::table('cursos')->insert(
            [
                'cur_id'=>2,
                'cur_titulo'=>'biologia',
                'cur_descripcion'=>'reproduccion humana',
                'cur_grupo'=>'2do Grupo'
            ]
        );
        DB::table('cursos')->insert(
            [
                'cur_id'=>3,
                'cur_titulo'=>'fisica',
                'cur_descripcion'=>'que pasaria si isaac newton no descubria la gravedad',
                'cur_grupo'=>'Grupo Octavo'
            ]
        );
        
    }
}