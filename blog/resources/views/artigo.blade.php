@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel>

      <h2 style="text-align:center">{{$artigo->titulo}}</h2>
      <h4 style="text-align:center">{{$artigo->descricao}}</h4>

      <p>{!!$artigo->conteudo!!}</p>

      <p style="text-align:center">
      <small>{{$artigo->user->name}} - {{date('d/m/Y',strtotime($artigo->data))}}</small>
      </p>

    </painel>
  </pagina>
@endsection