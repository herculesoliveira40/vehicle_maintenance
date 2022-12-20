@extends('layouts.main')
@section('title', 'Cadastrar Versao')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/versoes/dashboard"> <i class="bi bi-speedometer"></i> Versoes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Versao</li>
  </ol>
</nav>

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastrar Versao</h1>
  <form action="/versoes" method="POST" enctype="multipart/form-data">
    @include('versoes._partials.form')

    <input type="submit" class="btn btn-success" value="Cadastrar Versao">
  </form>
</div>

@endsection