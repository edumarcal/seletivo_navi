<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnderecosTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetRoot()
    {
    	$response = $this->get('/');
    	$response->assertStatus(200);
    }

    public function testListEnderecoAll()
    {
    	$response = $this->json('GET', '/api/endereco');
    	$response->assertStatus(200)
    			 ->assertJsonFragment([
    			 	'nome_logradouro' => 'nome_logradouro',
    			 	'tipo_logradouro' => 'tipo_logradouro',
    			 ]);
    }

    public function testGetEnderecoByIdSuccess()
    {
    	$response = $this->json('GET', '/api/endereco');
    	$response->assertStatus(200)
    			 ->assertJsonFragment([
    			 	'localidade' => 'localidade',
    			 ]);
    }

    public function testGetEnderecoByIdFail()
    {
    	$response = $this->json('GET', '/api/endereco/1a');
    	$response->assertStatus(404)
    			 ->assertJsonFragment([
    			 	'error' => 'url mal-formada'
    			 ]);

    	$response = $this->json('GET', '/api/endereco/-1');
    	$response->assertStatus(404)
    			 ->assertJsonStructure([
    			 	'error'
    			 ]);

    	$response = $this->json('GET', '/api/endereco/a1');
    	$response->assertStatus(404)
    			 ->assertJson([
    			 	'error' => 'url mal-formada'
    			 ]);

    	$response = $this->json('GET', '/api/endereco/0');
    	$response->assertStatus(200)
    			 ->assertJsonStructure([]);
    }

    public function testEnderecoCreateSucess()
    {
    	$response = $this->json('POST', '/api/endereco/', [
    		'nome_logradouro' => 'nomelogradouro',
    		'tipo_logradouro' => 'tipologradouro',
    		'numero' => 310,
    		'bairro' => 'bairro',
    		'complemento' => 'complemento',
    		'localidade' => 'localidade',
    		'sigla' => 'RN',
    		'cep' => '59570-000',
    	]);
    	$response->assertStatus(200)
    			 ->assertExactJson([
    			 	'create' => true
    			 ]);
    }

	public function testEnderecoCreateFail()
    {
    	$response = $this->json('POST', '/api/endereco/', [
    		'nome' => 'nome_logradouro',
    		'tipo' => 'tipo_logradouro',
    		'numero' => 310,
    		'bairro' => 'bairro',
    		'complemento' => 'complemento',
    		'localidade' => 'localidade',
    		'sigla' => 'RN',
    		'cep' => '59570-000',
    	]);
    	$response->assertStatus(404)
    			 ->assertJsonStructure([
    			 	'erros'
    			 ]);
    }
}
