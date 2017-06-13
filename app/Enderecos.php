<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $fillable = ['nome_logradouro','tipo_logradouro','numero','complemento', 'bairro', 'localidade', 'sigla', 'cep'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'enderecos';

    public function infoPessoais()
    {
      return $this->hasMany('App\InfoPessoais');
    }
}
