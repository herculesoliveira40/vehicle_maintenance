@extends('layouts.main')
@section('title', 'Editar Versao')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/versoes/dashboard"> <i class="bi bi-speedometer"></i> Versoes </a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Versao: {{$versao->id}}</li>
    </ol>
</nav>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Versao</h1>
    <form action="/versoes/update/{{ $versao->id }}" method="POST" enctype="multipart/form-data">
        @csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
        @method('PUT')
        @include('versoes._partials.form')

        <input type="submit" class="btn btn-success" value="Editar Versao">
    </form>
</div>

@endsection