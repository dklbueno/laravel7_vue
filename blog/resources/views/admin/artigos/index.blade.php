@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModalTeste">Large modal</button>

      <tabela-lista
        v-bind:titulos="['#','Título','Descrição']"
        v-bind:itens="[[1,'PHP OO','Curso de PHP OO'],[2,'Vue JS','Curso de Vue JS']]"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="123456"
        ordem="asc" ordemcol="2"
      ></tabela-lista>

    </painel>
  </pagina>
  <modal nome="meuModalTeste">
    <painel titulo="Adicionar">
      <form>
      <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </painel>
  </modal>
@endsection