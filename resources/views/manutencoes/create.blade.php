@extends('layouts.main')
@section('title', 'Cadastrar Manutencao')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/manutencoes/dashboard"> <i class="bi bi-speedometer"></i> Manutencoes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Manutencao</li>
  </ol>
</nav>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastrar Manutencao</h1>
  <form action="/manutencoes" method="POST" enctype="multipart/form-data">
    @include('manutencoes._partials.form')

    <input type="submit" class="btn btn-success" value="Cadastrar Manutencao">
  </form>
</div>

@endsection