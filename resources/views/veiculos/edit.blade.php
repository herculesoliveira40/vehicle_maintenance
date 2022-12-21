@extends('layouts.main')
@section('title', 'Editar Veiculo')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/veiculos/dashboard"> <i class="bi bi-speedometer"></i> Veiculos </a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Veiculo: {{$veiculo->id}}</li>
    </ol>
</nav>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Veiculo</h1>
    <form action="/veiculos/update/{{ $veiculo->id }}" method="POST" enctype="multipart/form-data">
        @csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
        @method('PUT')
        @include('veiculos._partials.form')

        <div class="form-group">
            <label for="marca_id" class="form-label"> Marca: </label>
            <select name="marca_id" id="marca_id" class="form-control" placeholder="produto_id">
                @foreach ($marcas as $marca)
                <option value="{{$marca->id}}" {{ $veiculo->marca_id == ($loop->index +1) ? "selected='selected'" : ""}}> {{$marca->nome_marca}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="modelo_id" class="form-label"> Modelo: </label>
            <select name="modelo_id" id="modelo_id" class="form-control" placeholder="produto_id">
                @foreach ($modelos as $modelo)
                <option value="{{$modelo->id}}" {{ $veiculo->modelo_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$modelo->nome_modelo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="versao_id" class="form-label"> Versao: </label>
            <select name="versao_id" id="versao_id" class="form-control" placeholder="produto_id">
                @foreach ($versoes as $versao)
                <option value="{{$versao->id}}" {{ $veiculo->versao_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$versao->nome_versao}}</option>
                @endforeach
            </select>
        </div>


        <small id="emailHelp" class="form-text text-muted">...</small>
</div>
<input type="submit" class="btn btn-success" value="Editar Veiculo">
</form>
</div>

@endsection