@extends('layouts.main')

@section('title', 'Show Veiculo')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Veiculo</h1>
            <p>Nome veiculo: {{$veiculo->nome_veiculo}}</p>
            <p>Ano veiculo: {{$veiculo->ano}}</p>
            <p>Marca: {{$veiculo->marca_id}}</p>
            <p>Modelo: {{$veiculo->modelo_id}}</p>
            <p>Versao: {{$veiculo->versao_id}}</p>
            <p>Ultima Manutenção: </p>
            <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img class="img-preview w-75" src="{{ $veiculo->img }}">
      </div>
    </div>
    </div>
</div>


@endsection