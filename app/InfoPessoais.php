<?php
// Agradeço a DEUS pelo dom do conhecimento
namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPessoais extends Model
{
    protected $fillable = ['nome','cpf','rg','data_nasc', 'genero', 'id_endereco'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'info_pessoais';

    public function enderecos()
    {
      return $this->belongsTo('App\Enderecos', 'id_endereco');
    }
}
