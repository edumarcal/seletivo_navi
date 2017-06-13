<?php
// Agradeço a DEUS pelo dom do conhecimento
use App\InfoPessoais;
use Illuminate\Database\Seeder;

class InfoPessoaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoPessoais::create([
          'nome' => 'Eduardo Marçal Oliveira',
          'cpf' => '001.100.000-00',
          'rg' => '1111111',
          'data_nasc' => '24/01/1993',
          'genero' => 'nao declarado',
          'id_endereco' => 1,
        ]);
    }
}
