@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Artigos">

      <p>
        <form class="form-inline text-center" action="{{route('site')}}" name="formBusca" method="get">
          <input class="form-control" placeholder="Buscar" type="search" name="busca" value="{{isset($busca)?$busca:''}}">
          <button class="btn btn-primary">Buscar</button>
        </form>
      </p>

      <div class="row">

        @foreach($lista as $key => $value)
        <artigocard
        titulo="{{\Str::limit($value->titulo,25,'...')}}"
        descricao="{{\Str::limit($value->descricao,40,'...')}}"
        imagem="https://coletiva.net/files/e4da3b7fbbce2345d7772b0674a318d5/midia_foto/20170713/118815-maior_artigo_jul17.jpg"
        data="{{$value->data}}"
        autor="{{$value->autor}}"
        link="{{route('artigo',[$value->id,\Str::slug($value->titulo)])}}"
        sm=""
        md=""
        >
        </artigocard>
        @endforeach

      </div>

      <br>

      <div align="center">
      {{$lista}}
      </div>

    </painel>
  </pagina>
@endsection