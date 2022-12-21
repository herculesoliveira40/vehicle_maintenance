@extends('layouts.main')

@section('title', 'Dashboard Veiculo')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Veiculos</h1>
        <a href="/veiculos/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Veiculo</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Menu</th>

                </tr>
            </thead>
            <tbody>
                @foreach($veiculos as $veiculo)
                <tr>
                    <td scropt="row">{{ $veiculo->id }}</td>
                    <td>{{ $veiculo->nome_veiculo}}</td>

                    <td>
                        <a href="/veiculos/edit/{{ $veiculo->id }}" class="btn btn-warning edit-btn">
                            <i class="bi bi-wrench-adjustable"></i> Editar
                        </a>

                        <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $veiculo->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                        <!-- Modal -->
                        <form id="delete" action="/veiculos/{{ $veiculo->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @include('helpers.delete_modal')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


@endsection