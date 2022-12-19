@extends('layouts.main')
@section('title', 'Editar Marcas')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/marcas/dashboard"> <i class="bi bi-speedometer"></i> Marcas </a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Marca: {{$marca->id}}</li>
    </ol>
</nav>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Marca</h1>
    <form action="/marcas/update/{{ $marca->id }}" method="POST" enctype="multipart/form-data">
        @csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
        @method('PUT')
        @include('marcas._partials.form')

        <input type="submit" class="btn btn-success" value="Editar Marca">
    </form>
</div>

@endsection