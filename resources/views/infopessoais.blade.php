<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projeto prático do Seletivo Navi">
    <meta name="author" content="Eduardo Marçal">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Dados Pessoais</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
        }
        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }
        text-align: center;
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
    </style>

</head>

<body>
    <div class="col-md-12">
        <h2 class="text-center">Informações Pessoais</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i>Listagem dos registros</li>
                    <a href="#" class="add-modal"><li>Novo registro</li></a>
                </ul>
            </div>

            <div class="panel-body">
                    <table class="table table-striped table-hover" id="postTable" style="visibility: hidden;">
                        <thead>
                            <tr>
                                <th valign="middle">#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Nascimento</th>
                                <th>Gênero</th>
                                <th>Endereço</th>
                                <th>Tipo</th>
                                <th>Nº</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Localidade</th>
                                <th>CEP</th>
                                <th>Ação</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            @foreach($data as $indexKey => $item)
                                <tr>
                                    <td class="col1">{{ $indexKey+1 }}</td>
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
                                    <td>
                                        <button class="show-modal btn btn-success"
                                        data-id="{{$item->id}}"
                                        data-nome="{{$item->nome}}"
                                        data-cpf="{{$item->cpf}}"
                                        data-rg="{{$item->rg}}"
                                        data-data-nasc="{{$item->data_nasc}}"
                                        data-genero="{{$item->genero}}"
                                        data-endereco-nome="{{$item->enderecos->nome_logradouro}}"
                                        data-endereco-tipo="{{$item->enderecos->tipo_logradouro}}"
                                        data-endereco-numero="{{$item->enderecos->numero}}"
                                        data-endereco-complemento="{{$item->enderecos->complemento}}"
                                        data-endereco-bairro="{{$item->enderecos->bairro}}"
                                        data-endereco-localidade="{{$item->enderecos->localidade}}"
                                        data-endereco-sigla="{{$item->enderecos->sigla}}"
                                        data-endereco-cep="{{$item->enderecos->cep}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                        <button class="edit-modal btn btn-info"
                                        data-id="{{$item->id}}"
                                        data-nome="{{$item->nome}}"
                                        data-cpf="{{$item->cpf}}"
                                        data-rg="{{$item->rg}}"
                                        data-data-nasc="{{$item->data_nasc}}"
                                        data-genero="{{$item->genero}}"
                                        data-endereco-nome="{{$item->enderecos->nome_logradouro}}"
                                        data-endereco-tipo="{{$item->enderecos->tipo_logradouro}}"
                                        data-endereco-numero="{{$item->enderecos->numero}}"
                                        data-endereco-complemento="{{$item->enderecos->complemento}}"
                                        data-endereco-bairro="{{$item->enderecos->bairro}}"
                                        data-endereco-localidade="{{$item->enderecos->localidade}}"
                                        data-endereco-sigla="{{$item->enderecos->sigla}}"
                                        data-endereco-cep="{{$item->enderecos->cep}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger"
                                        data-id="{{$item->id}}"
                                        data-nome="{{$item->nome}}"
                                        data-cpf="{{$item->cpf}}"
                                        data-rg="{{$item->rg}}"
                                        data-data-nasc="{{$item->data_nasc}}"
                                        data-genero="{{$item->genero}}"
                                        data-endereco-nome="{{$item->enderecos->nome_logradouro}}"
                                        data-endereco-tipo="{{$item->enderecos->tipo_logradouro}}"
                                        data-endereco-numero="{{$item->enderecos->numero}}"
                                        data-endereco-complemento="{{$item->enderecos->complemento}}"
                                        data-endereco-bairro="{{$item->enderecos->bairro}}"
                                        data-endereco-localidade="{{$item->enderecos->localidade}}"
                                        data-endereco-sigla="{{$item->enderecos->sigla}}"
                                        data-endereco-cep="{{$item->enderecos->cep}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->

    <!-- Modal form to add a item -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" autofocus>
                                <small>Min: 2, Max: 256, apenas texto</small>
                                <p class="errorNome text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cpf">CPF:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cpf">
                                <small>000.000.000-00</small>
                                <p class="errorCPF text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">RG:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rg">
                                <small>000.00</small>
                                <p class="errorRG text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">Data de nascimento:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="data_nasc">
                                <small>00/00/00</small>
                                <p class="errorNascimento text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="genero">Gênero:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="genero">
                                <small>Masculino|Feminino|Outros</small>
                                <p class="errorGenero text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_nome">Nome do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_nome">
                                <small>Nome do logradouro</small>
                                <p class="errorLogradouro text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Tipo do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_tipo">
                                <small>Tipo do logradouro</small>
                                <p class="errorTipoLogradouro text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_numero">Número:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_numero">
                                <small>Número do logradouro</small>
                                <p class="errorNumero text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Complemento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_complemento">
                                <small>Complemento</small>
                                <p class="errorComplemento text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Bairro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_bairro">
                                <small>Bairro</small>
                                <p class="errorBairro text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_localidade">Localidade:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_localidade">
                                <small>Localidade</small>
                                <p class="errorLocalidade text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_sigla">sigla:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_sigla">
                                <small>Sigla</small>
                                <p class="errorSigla text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_cep">CEP:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_cep">
                                <small>CEP</small>
                                <p class="errorCEP text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Adicionar
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Modal form to show a item -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
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
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="nome_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="cpf">CPF:</label>
                          <div class="col-sm-10">
                            <input type="name" class="form-control" id="cpf_show" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">RG:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="rg_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="data_nasc_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="genero">Genero:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="genero_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_nome">Nome do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_nome_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Tipo do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_tipo_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_numero">Numero:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_numero_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_complemento">Complemento:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_complemento_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_bairro">Bairro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_bairro_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_localidade">Localidade:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_localidade_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_sigla">Sigla:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_sigla_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_cep">CEP:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_cep_show" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
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
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">CPF:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cpf_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">RG:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rg_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_nasc_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="genero">Gênero:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="genero_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_nome">Nome do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_nome_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Tipo do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_tipo_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_numero">Número:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endero_numero_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_complemento">Complemento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endero_complemento_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_bairro">Bairro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_bairro_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_localidade">Localidade:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_localidade_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_sigla">Sigla:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_sigla_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_cep">CEP:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco_cep_edit">
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Você realmente deseja remover este registro?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="nome_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cpf">CPF:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="cpf_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rg">RG:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="rg_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="data_nasc_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="genero">Gênero:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="genero_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_nome">Nome do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_nome_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_tipo">Tipo do logradouro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_tipo_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco">Número:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_numero_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_complemento">Complemento:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="complemento_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_bairro">Bairro:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_bairro_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_localidade">Localidade:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_localidade_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_sigla">Sigla:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="endereco_cep">CEP:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="endereco_cep_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'dadospessoais',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nome': $('#nome_add').val(),
                    'cpf': $('#cpf_add').val(),
                    'rg': $('#rg_add').val(),
                    'data_nasc': $('#data_nasc_add').val(),
                    'genero': $('#genero_add').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.title);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully added regist!', 'Success Alert', {timeOut: 5000});
                        $('#postTable').append("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.nome + "</td><td>" + data.cpf + + "</td><td>" + data.rg + "</td><td>" + "</td><td>" + data.data_nasc + "</td><td>" + "</td><td>"
                        + data.genero + "</td><td><button class='show-modal btn btn-success' data-id='{{$item->id}}' data-nome='{{$item->nome}}'"
                        + " data-cpf='{{$item->cpf}}' data-rg='{{$item->rg}}' data-data-nasc='{{$item->data_nasc}}' data-genero='{{$item->genero}}' data-endereco-nome-logradouro='{{$item->enderecos->nome_logradouro}}' data-endereco-tipo-logradouro='{{$item->enderecos->tipo_logradouro}}' data-endereco-numero='{{$item->enderecos->numero}}' data-endereco-complemento='{{$item->enderecos->complemento}}' data-endereco-bairro='{{$item->enderecos->bairro}}' "
                        + " data-endereco-localidade='{{$item->enderecos->localidade}}' data-endereco-sigla='{{$item->enderecos->sigla}}' data-endereco-cep='{{$item->enderecos->cep}}'> <span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='{{$item->id}}' data-nome='{{$item->nome}}' data-cpf='{{$item->cpf}}' data-rg='{{$item->rg}}' data-data-nasc='{{$item->data_nasc}}' data-genero='{{$item->genero}}' "
                        + " data-endereco-nome-logradouro='{{$item->enderecos->nome_logradouro}}' data-endereco-tipo-logradouro='{{$item->enderecos->tipo_logradouro}}' data-endereco-numero='{{$item->enderecos->numero}}' data-endereco-complemento='{{$item->enderecos->complemento}}' data-endereco-bairro='{{$item->enderecos->bairro}}' data-endereco-localidade='{{$item->enderecos->localidade}}' data-endereco-sigla='{{$item->enderecos->sigla}}' data-endereco-cep='{{$item->enderecos->cep}}'> <span "
                        + " class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='{{$item->id}}' data-nome='{{$item->nome}}' data-cpf='{{$item->cpf}}' data-rg='{{$item->rg}}' data-data-nasc='{{$item->data_nasc}}' data-genero='{{$item->genero}}' data-endereco-nome-logradouro='{{$item->enderecos->nome_logradouro}}' data-endereco-tipo-logradouro='{{$item->enderecos->tipo_logradouro}}' data-endereco-numero='{{$item->enderecos->numero}}' "
                        + " data-endereco-complemento='{{$item->enderecos->complemento}}' data-endereco-bairro='{{$item->enderecos->bairro}}' data-endereco-localidade='{{$item->enderecos->localidade}}' data-endereco-sigla='{{$item->enderecos->sigla}}' data-endereco-cep='{{$item->enderecos->cep}}'> <span class='glyphicon glyphicon-trash'></span> Delete</button>");
                    }
                },
            });
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#title_show').val($(this).data('title'));
            $('#content_show').val($(this).data('content'));
            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#title_edit').val($(this).data('title'));
            $('#content_edit').val($(this).data('content'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'posts/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'title': $('#title_edit').val(),
                    'content': $('#content_edit').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.title);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='edit_published' data-id='" + data.id + "'></td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });
        });

        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('title'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'posts/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    </script>

</body>
</html>
