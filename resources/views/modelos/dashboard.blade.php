@extends('layouts.main')

@section('title', 'Dashboard Modelos')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Modelos</h1>
        <a href="/modelos/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Modelo</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Menu</th>

                </tr>
            </thead>
            <tbody>
                @foreach($modelos as $modelo)
                <tr>
                    <td scropt="row">{{ $modelo->id }}</td>
                    <td>{{ $modelo->nome_modelo}}</td>

                    <td>
                        <a href="/modelos/edit/{{ $modelo->id }}" class="btn btn-warning edit-btn">
                            <i class="bi bi-wrench-adjustable"></i> Editar
                        </a>

                        <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $modelo->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                        <!-- Modal -->
                        <form id="delete" action="/modelos/{{ $modelo->id }}" method="POST">
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