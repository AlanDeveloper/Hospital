@extends('template.app')

@section('content')
<form action="/patient/search" class="form-inline" method="post">
    {{ csrf_field() }}
    <div class="form-group mb-2">
        <input type="text" name="name" class="form-control">
        <input type="submit" class="btn btn-primary mb-2" value="Procurar">
    </div>
</form>

<table class="table">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Entrada</th>
    </thead>
    <tbody>
        @foreach ($list as $item)
        <tr scope="row">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->telephone }}</td>
            <td>{{ $item->entry }}</td>
            @if ($user)
            <td><a href="/binds/{{ $item->id }}">Vincular</a></td>
            @endif
            <td><a href="/patient/change/{{ $item->id }}">Alterar</a></td>
            <td><a href="/patient/delete/{{ $item->id }}">Deletar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection