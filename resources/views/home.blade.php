@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div><a class="pull-right" href="{{url('dadospessoais/new')}}">Novo</a></div>
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
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
                    </thead>
                    <tbody>
                      @foreach($inf as $info)
                      <tr>
                        <td>{{ $info->nome }}</td>
                        <td>{{ $info->cpf }}</td>
                        <td>{{ $info->rg }}</td>
                        <td>{{ $info->data_nasc }}</td>
                        <td>{{ $info->genero }}</td>
                        <td>{{ $info->enderecos->nome_logradouro }}</td>
                        <td>{{ $info->enderecos->tipo_logradouro }}</td>
                        <td>{{ $info->enderecos->numero }}</td>
                        <td>{{ $info->enderecos->complemento }}</td>
                        <td>{{ $info->enderecos->bairro }}</td>
                        <td>{{ $info->enderecos->localidade }} - {{ $info->enderecos->sigla }}</td>
                        <td>{{ $info->enderecos->cep }}</td>
                        <td>
                          <a href="info_pessoais/{{ $info->id }}/edit" class="btn btn-default">Editar</a>
                          <button type="submit" class="btn btn-default btn-sm">Excluir</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
