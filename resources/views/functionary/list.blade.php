@extends('template.app')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Especialidade</th>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr scope="row">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                     @if ($item->office == "as")
                        <td>Assistente Social</td>
                    @endif
                    @if ($item->office == "e")
                        <td>Enfermeiro</td>
                    @endif
                    @if ($item->office == "m")
                        <td>Médico</td>
                    @endif
                    @if ($item->office == "p")
                        <td>Psicólogo</td>
                    @endif

                    @if ($item->specialty == "c")
                        <td>Cirurgião</td>
                    @endif
                    @if ($item->specialty == "cg")
                        <td>Clínico Geral</td>
                    @endif
                    @if ($item->specialty == "o")
                        <td>Obstetra</td>
                    @endif
                    <td><a href="/functionary/salary/{{ $item->id }}">Salário</a></td>
                    <td><a href="/functionary/change/{{ $item->id }}">Alterar</a></td>
                    <td><a href="/functionary/delete/{{ $item->id }}">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection