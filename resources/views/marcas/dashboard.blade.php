@extends('layouts.main')

@section('title', 'Dashboard Marcas')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Marcas</h1>
        <a href="/marcas/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Marca</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Menu</th>

                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marca)
                <tr>
                    <td scropt="row">{{ $marca->id }}</td>
                    <td>{{ $marca->nome_marca}}</td>

                    <td>
                        <a href="/marcas/edit/{{ $marca->id }}" class="btn btn-warning edit-btn">
                            <i class="bi bi-wrench-adjustable"></i> Editar
                        </a>

                        <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $marca->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                        <!-- Modal -->
                        <form id="delete" action="/marcas/{{ $marca->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Escolha a opção desejada: </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger" role="alert">
                                                <h4> Tem certeza?, confirmar delete :( </h4>
                                            </div>
                                        </div>
                                        <input type="hidden" name="index_id" id="index_id" value="">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger delete-btn"><i class="bi bi-trash3-fill"></i> Delete </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


@endsection