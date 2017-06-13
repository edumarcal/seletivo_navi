<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InfoPessoaisTest extends TestCase
{
  public function testInfoPessoaisCreateSucess()
  {
    $response = $this->json('POST', '/api/dadospessoais/', [
      'nome' => 'nome completo',
      'cpf' => '001.100.000-00',
      'rg' => '310',
      'data_nasc' => '13/06/2017',
      'genero' => 'nao declarado',
      'id_endereco' => 10,
    ]);
    $response->assertStatus(200)
         ->assertExactJson([
          'create' => true
         ]);
  }
}
