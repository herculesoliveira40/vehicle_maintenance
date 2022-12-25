@extends('layouts.main')

@section('title', 'Dashboard Manutencoes')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-8 col-lg-10">
        <h1>Todas Manutencoes</h1>
        <a href="/manutencoes/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Manutencao</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Veiculo</th>
                    <th scope="col">Proxima Manutenção</th>
                    <th scope="col">Menu</th>

                </tr>
            </thead>
            <tbody>
                @foreach($manutencoes as $manutencao)
                <tr>
                    <td scropt="row">{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->nome_veiculo}}</td>
                    <td>{{ date('d/m/Y - H:i', strtotime($manutencao->proxima_manutencao)) }}</td>

                    <td>
                        <a href="/manutencoes/edit/{{ $manutencao->id }}" class="btn btn-warning edit-btn">
                            <i class="bi bi-wrench-adjustable"></i> Editar
                        </a>

                        <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $manutencao->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                        <!-- Modal -->
                        <form id="delete" action="/manutencoes/{{ $manutencao->id }}" method="POST">
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