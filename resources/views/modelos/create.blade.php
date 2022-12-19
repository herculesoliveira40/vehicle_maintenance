@extends('layouts.main')
@section('title', 'Cadastrar Modelo')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/modelos/dashboard"> <i class="bi bi-speedometer"></i> Modelos </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Modelo</li>
  </ol>
</nav>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastrar Modelo</h1>
  <form action="/modelos" method="POST" enctype="multipart/form-data">
    @include('modelos._partials.form')

    <input type="submit" class="btn btn-success" value="Cadastrar Modelo">
  </form>
</div>

@endsection