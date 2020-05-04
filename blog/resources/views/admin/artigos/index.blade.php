@extends('layouts.app')

@section('content')
  <pagina tamanho="12">

    @if($errors->all())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      @foreach($errors->all() as $value)
      <li><strong>{{$value}}</strong></li>
      @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div> 
    @endif

    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>  

      <tabela-lista
        v-bind:titulos="['#','Título','Descrição','Data']"
        v-bind:itens="{{json_encode($listaArtigos)}}"
        criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
        ordem="asc" ordemcol="2"
        modal="sim"
      ></tabela-lista>

      <div align="center">
      {{$listaArtigos->links()}}
      </div>

    </painel>
  </pagina>
  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
      </div>
      <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" name="conteudo" id="" cols="30" rows="10">{{old('conteudo')}}</textarea>
      </div>  
      <div class="form-group">
        <label for="data">Data</label>
        <input name="data" type="datetime-local" class="form-control" id="data" value="{{old('data')}}">
      </div>          
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" type="submit" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" :action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="" v-model="$store.state.item.titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="" v-model="$store.state.item.descricao" placeholder="Descrição">
      </div>
      <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" name="conteudo" id="" v-model="$store.state.item.conteudo"></textarea>
      </div>  
      <div class="form-group">
        <label for="data">Data</label>
        <input name="data" type="datetime-local" class="form-control" id="data" value="" v-model="$store.state.item.data">
      </div>          
    </formulario>
    <span slot="botoes">
      <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
    </span>
  </modal>

  <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
    <p>@{{$store.state.item.descricao}}</p>
    <p>@{{$store.state.item.conteudo}}</p>
  </modal>
  
@endsection