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

    <painel titulo="Lista de Admins">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>  

      <tabela-lista
        v-bind:titulos="['#','Name','Email']"
        v-bind:itens="{{json_encode($listaModelo)}}"
        criar="#criar" detalhe="/admin/admins/" editar="/admin/admins/" 
        ordem="asc" ordemcol="2"
        modal="sim"
      ></tabela-lista>

      <div align="center">
      {{$listaModelo->links()}}
      </div>

    </painel>
  </pagina>
  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('admins.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="admin">Admin</label>
        <select name="admin" class="form-control" id="">
          <option {{ ( old('admin') && old('admin') == 'N' ? 'selected' : '' )}} value="N">Não</option>
          <option {{ ( old('admin') && old('admin') == 'S' ? 'selected' : '' )}} {{ !old('admin') ? 'selected' : '' }} value="S">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
      </div>          
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" type="submit" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" :action="'/admin/admins/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="" v-model="$store.state.item.name" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="" v-model="$store.state.item.email" placeholder="Email">
      </div> 
      <div class="form-group">
        <label for="admin">Admin</label>
        <select name="admin" class="form-control" id="" v-model="$store.state.item.admin">
          <option value="N">Não</option>
          <option value="S">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input name="password" type="password" class="form-control" id="password" value="">
      </div>          
    </formulario>
    <span slot="botoes">
      <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
    </span>
  </modal>

  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p>@{{$store.state.item.email}}</p>
  </modal>
  
@endsection