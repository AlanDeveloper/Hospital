@extends('template.app')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Entrada</th>
        </thead>
        <tbody>
            @foreach ($list as $item)
            <tr scope="row">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->telephone }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->entry }}</td>
                @if ($user)
                <td><a href="#">Vincular</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection