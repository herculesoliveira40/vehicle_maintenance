@extends('layouts.main')

@section('title', 'Home Manutencoes')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1> Manutencoes Previstas em 7 dias não concluidas</h1>
        <a href="/manutencoes/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Manutencao</a>
        @include('manutencoes._partials.table')
    </div>
</div>


@endsection