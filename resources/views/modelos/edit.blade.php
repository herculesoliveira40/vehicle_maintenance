@extends('layouts.main')
@section('title', 'Editar Modelo')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/modelos/dashboard"> <i class="bi bi-speedometer"></i> Modelos </a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Modelo: {{$modelo->id}}</li>
    </ol>
</nav>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Modelo</h1>
    <form action="/modelos/update/{{ $modelo->id }}" method="POST" enctype="multipart/form-data">
        @csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
        @method('PUT')
        @include('modelos._partials.form')

        <input type="submit" class="btn btn-success" value="Editar Modelo">
    </form>
</div>

@endsection