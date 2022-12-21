@extends('layouts.main')
@section('title', 'Editar Manutencao')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/manutencoes/dashboard"> <i class="bi bi-speedometer"></i> Manutencoes </a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Manutencao: {{$manutencao->id}}</li>
    </ol>
</nav>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Manutencao</h1>
    <form action="/manutencoes/update/{{ $manutencao->id }}" method="POST" enctype="multipart/form-data">
        @csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
        @method('PUT')
        @include('manutencoes._partials.forme')

        <input type="submit" class="btn btn-success" value="Editar Manutencao">
    </form>
</div>

@endsection