@extends('layouts.main')

@section('title', 'Dashboard Manutencoes')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Todas Manutencoes</h1>
        <a href="/manutencoes/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Manutencao</a>
        
        @include('manutencoes._partials.table')
    </div>
</div>


@endsection