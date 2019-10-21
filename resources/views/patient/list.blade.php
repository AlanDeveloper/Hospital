@extends('template.app')

@section('content')
<form action="/patient/search" class="form-inline" method="post">
    {{ csrf_field() }}
    <div class="form-group mb-2">
        <input type="text" name="name" placeholder="Digite o nome" class="form-control">
        <input type="number" name="code" placeholder="Digite o código" class="form-control">
        <input type="submit" class="btn btn-primary mb-2" value="Procurar">
    </div>
</form>

<table class="table">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Entrada</th>
    </thead>
    <tbody>
        @foreach ($list as $item)
        <tr scope="row">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <?php
                $date = new \DateTime($item->date);
                $interval = $date->diff(new \DateTime(date('Y-m-d')));
                echo $interval->format('%Y');
                ?>
            </td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->telephone }}</td>
            <td>
                <?php
                $data = $item->entry;
                echo date("d/m/Y  H:i", strtotime($data));
                ?>
            </td>
            @if ($user)
            <td><a href="/binds/{{ $item->id }}">Vincular</a></td>
            @endif
            <td><a href="/patient/change/{{ $item->id }}">Alterar</a></td>
            <td><a href="/patient/delete/{{ $item->id }}">Deletar</a></td>
        </tr>
        @endforeach
        @if (count($list) === 0)
        <tr scope="row">
            <td colspan="6" style="text-align:center;">Nenhum resultado encontrado</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection