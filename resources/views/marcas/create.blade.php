@extends('layouts.main')
@section('title', 'Cadastrar Marca')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/marcas/dashboard"> <i class="bi bi-speedometer"></i> Marcas </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Marca</li>
  </ol>
</nav>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastrar Marca</h1>
  <form action="/marcas" method="POST" enctype="multipart/form-data">
    @include('marcas._partials.form')

    <input type="submit" class="btn btn-success" value="Cadastrar Marca">
  </form>
</div>

@endsection