@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Colaboradores</h1>

    <a href="{{ route('colaboradores.create') }}" class="btn btn-success mb-3">Novo Colaborador</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Setor</th>
            <th>Cidade</th>
            <th>Data Check-in</th>
            <th>Ações</th>
        </tr>
        @foreach($colaboradores as $colaborador)
    <tr>
        <td>{{ $colaborador->nome }}</td>
        <td>{{ $colaborador->setor }}</td>
        <td>{{ $colaborador->cidade }}</td>
        <td>{{ $colaborador->data_checkin }}</td>
        <td>
            <a href="{{ route('colaboradores.edit', $colaborador->id) }}" class="btn btn-warning btn-sm">Editar</a>

            <form action="{{ route('colaboradores.destroy', $colaborador->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este colaborador?')">
                    Excluir
                </button>
            </form>
        </td>
    </tr>
@endforeach

    </table>
</div>
@endsection
