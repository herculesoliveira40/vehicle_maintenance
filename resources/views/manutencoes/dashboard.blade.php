@extends('layouts.main')

@section('title', 'Dashboard Manutencoes')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Todas Manutencoes</h1>
        <a href="/manutencoes/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Manutencao</a>
        @if (Auth::user()->profile == 0) 
            <a href=" {{ route('manutencoes.gerarPDF') }}" class="btn btn-warning" ><i class="bi bi-printer-fill"></i> Imprimir Historico</a>
        @endif
        @include('helpers.pierchat')
        @include('manutencoes._partials.table')
    </div>
</div>

<div> 
    {{ $manutencoes_search->appends([
        'search' => request()->get('search', '')
    ])->links('pagination::bootstrap-5') }}   <!-- underfly OR Provider= Paginator::useBootstrapFive(); -->  
</div>

@endsection