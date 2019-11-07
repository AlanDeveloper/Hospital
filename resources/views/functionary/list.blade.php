@extends('template.app')

@section('content')
<form action="/functionary/search" class="form-inline" method="post">
    {{ csrf_field() }}
    <div class="form-group mb-2">
        <input type="text" name="name" placeholder="Digite o nome" class="form-control">
        <input type="number" name="code" placeholder="Digite o código" class="form-control">
        <input type="submit" class="btn btn-primary mb-2" value="Procurar">
    </div>
</form>
<table class="table">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cargo</th>
        <th scope="col">Especialidade</th>
    </thead>
    <tbody>
        @foreach ($list as $item)
            @if (isset($user->admin))
                <tr scope="row">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    @if ($item->office == "as") <td>Assistente Social</td> @endif
                    @if ($item->office == "e") <td>Enfermeiro</td> @endif
                    @if ($item->office == "m") <td>Médico</td> @endif
                    @if ($item->office == "p") <td>Psicólogo</td> @endif

                    @if ($item->specialty == "c") <td>Cirurgião</td> @endif
                    @if ($item->specialty == "cg") <td>Clínico Geral</td> @endif
                    @if ($item->specialty == "o") <td>Obstetra</td> @endif
                    <td><a href="/functionary/change/{{ $item->id }}">Alterar</a></td>
                    <td><a href="/functionary/delete/{{ $item->id }}">Deletar</a></td>
                </tr>
            @endif
        @endforeach
        @if (count($list) === 0)
        <tr scope="row">
            <td colspan="4" style="text-align:center;">Nenhum resultado encontrado</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection