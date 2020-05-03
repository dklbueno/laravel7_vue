@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>      

      <tabela-lista
        v-bind:titulos="['#','Título','Descrição']"
        v-bind:itens="{{$listaArtigos}}"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="123456"
        ordem="asc" ordemcol="2"
        modal="sim"
      ></tabela-lista>

    </painel>
  </pagina>
  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="#" method="put" enctype="multipart/form-data" token="">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" placeholder="Descrição">
      </div>      
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" type="submit" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" value="" v-model="$store.state.item.titulo" placeholder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" value="" v-model="$store.state.item.descricao" placeholder="Descrição">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
    <p>@{{$store.state.item.descricao}}</p>
  </modal>
  
@endsection