@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
      <tabela-lista
        v-bind:titulos="['#','Título','Descrição']"
        v-bind:itens="[[1,'PHP OO','Curso de PHP OO'],[2,'Vue JS','Curso de Vue JS']]"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="123456"
        ordem="asc" ordemcol="2"
      ></tabela-lista>

    </painel>
  </pagina>
@endsection