@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group row add">
    <div id="myAdd" class="modal fade hidden" role="dialog">
      <div class="col-md-8">
        <input type="text" class="form-control" id="nome" name="nome"
          placeholder="Informe seu nome" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" id="cpf" name="cpf"
          placeholder="000.000.000-00" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" id="rg" name="rg"
          placeholder="000.00" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-8">
        <input type="date" class="form-control" id="data_nasc" name="data_nasc"
          placeholder="00/00/00" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control" id="genero" name="genero"
          placeholder="Masculino|Feminino|Outro" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
    </div>

    <div class="col-md-4">
      <button class="btn btn-primary" type="submit" id="add">
        <span class="glyphicon glyphicon-plus"></span>ADD
      </button>
    </div>
  </div>
   {{ csrf_field() }}
<div class="table-responsive text-center">
  <table class="table table-borderless" id="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>RG</th>
        <th>CPF</th>
        <th>Data de Nascimento<th>
        <th>Gênero</th>
        <th>Endereço</th>
        <th>Tipo</th>
        <th>Nº</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Localidade</th>
        <th>CEP</th>
      </tr>
    </thead>
    @foreach($data as $item)
    <tr class="item{{$item->id}}">
      <td>{{$item->id}}</td>
      <td>{{ $item->nome }}</td>
      <td>{{ $item->cpf }}</td>
      <td>{{ $item->rg }}</td>
      <td>{{ $item->data_nasc }}</td>
      <td>{{ $item->genero }}</td>
      <td>{{ $item->enderecos->nome_logradouro }}</td>
      <td>{{ $item->enderecos->tipo_logradouro }}</td>
      <td>{{ $item->enderecos->numero }}</td>
      <td>{{ $item->enderecos->complemento }}</td>
      <td>{{ $item->enderecos->bairro }}</td>
      <td>{{ $item->enderecos->localidade }} - {{ $item->enderecos->sigla }}</td>
      <td>{{ $item->enderecos->cep }}</td>
      <td><button class="edit-modal btn btn-info"
          data-id="{{$item->id}}" data-nome="{{$item->nome}}" data-cpf="{{$item->cpf}}" data-rg="{{$item->rg}}"
          data-data-nasc="{{$item->data_nasc}}" data-genero="{{$item->genero}}"
          data-endereco-nome-logradouro="{{$item->enderecos->nome_logradouro}}"
          data-endereco-tipo-logradouro="{{$item->enderecos->tipo_logradouro}}"
          data-endereco-numero="{{$item->enderecos->numero}}"
          data-endereco-complemento="{{$item->enderecos->complemento}}"
          data-endereco-bairro="{{$item->enderecos->bairro}}"
          data-endereco-localidade="{{$item->enderecos->localidade}}"
          data-endereco-sigla="{{$item->enderecos->sigla}}"
          data-endereco-cep="{{$item->enderecos->cep}}">
          <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
        <button class="delete-modal btn btn-danger"
          data-id="{{$item->id}}"
          data-nome="{{$item->nome}}"
          data-cpf="{{$item->cpf}}"
          data-rg="{{$item->rg}}"
          data-data-nasc="{{$item->data_nasc}}"
          data-genero="{{$item->genero}}"
          data-endereco-nome-logradouro="{{$item->enderecos->nome_logradouro}}"
          data-endereco-tipo-logradouro="{{$item->enderecos->tipo_logradouro}}"
          data-endereco-numero="{{$item->enderecos->numero}}"
          data-endereco-complemento="{{$item->enderecos->complemento}}"
          data-endereco-bairro="{{$item->enderecos->bairro}}"
          data-endereco-localidade="{{$item->enderecos->localidade}}"
          data-endereco-sigla="{{$item->enderecos->sigla}}"
          data-endereco-cep="{{$item->enderecos->cep}}">
          <span class="glyphicon glyphicon-trash"></span> Delete
        </button></td>
    </tr>
    @endforeach
  </table>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="control-label col-sm-2" for="id">ID:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fid" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Nome:</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="n">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="cpf">CPF:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="c">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="rg">RG:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="r">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="genero">Gênero:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="g">
          </div>
        </div>
      </form>
      <div class="deleteContent">
        Você realamente deseja remover este registro <span class="dname"></span> ? <span
          class="hidden did"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class='glyphicon'> </span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> Close
        </button>
      </div>
		</div>
	</div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
