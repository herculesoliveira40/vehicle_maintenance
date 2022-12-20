@extends('layouts.main')

@section('title', 'Dashboard Versoes')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Versoes</h1>
        <a href="/versoes/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Versao</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Menu</th>

                </tr>
            </thead>
            <tbody>
                @foreach($versoes as $versao)
                <tr>
                    <td scropt="row">{{ $versao->id }}</td>
                    <td>{{ $versao->nome_versao}}</td>

                    <td>
                        <a href="/versoes/edit/{{ $versao->id }}" class="btn btn-warning edit-btn">
                            <i class="bi bi-wrench-adjustable"></i> Editar
                        </a>

                        <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $versao->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                        <!-- Modal -->
                        <form id="delete" action="/versoes/{{ $versao->id }}" method="POST">
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