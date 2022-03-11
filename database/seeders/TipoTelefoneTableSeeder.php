<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TipoTelefone;

class TipoTelefoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('tipos_telefone')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $descricao_tipos = [
            ['descricao_tipo' => 'Casa'], 
            ['descricao_tipo' => 'Celular'],
            ['descricao_tipo' => 'Trabalho'],
            ['descricao_tipo' => 'Principal'],
            ['descricao_tipo' => 'Outros'],
            
        ];    

        foreach($descricao_tipos as $descricao_tipo) {
            TipoTelefone::create(
                ['descricao_tipo' => $descricao_tipo['descricao_tipo']]
            );

        }
    }
}
