<?php
// Agradeço a DEUS pelo dom do conhecimento
use App\Enderecos;
use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enderecos::create([
          'nome_logradouro' => 'Av. Luiz Lopes Varela',
      		'tipo_logradouro' => 'Avenida',
      		'numero' => 310,
      		'bairro' => 'Centro',
      		'complemento' => 'casa',
      		'localidade' => 'Ceará Mirim',
      		'sigla' => 'RN',
      		'cep' => '59570-000',
        ]);
    }
}
