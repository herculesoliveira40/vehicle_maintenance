@extends('layouts.main')

@section('title', 'Login Usuario')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Usuarios </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Usuario</li>
  </ol>
</nav>
<h1>Login Usuario</h1>
<div id="event-create-container" class="col-md-6 offset-md-3">

  <form action="{{ route('usuario.auth')}}" method="POST">
    @csrf {{--DIRETIVA Token SALVAR DADOS NO BANCO--}}
    <div class="form-group">
      <label for="email">Email Usuario:</label>
      <input type="mail" class="form-control" id="email" name="email" placeholder="Email Usuario" value="{{old('email')}}">
    </div>
    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-check">
      <input type="checkbox" name="lembrar" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Lembrar-se</label>
    </div>
    <input type="submit" class="btn btn-success" value="Login">
  </form>
</div>
@endsection