@extends('template.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form action="/functionary/change/{{ $item[0]->id }}" method="post">
        {{ csrf_field() }}
        <h3>Insira os dados no formulário</h3>
        <label for="">Nome</label>
        <input class="form-control" type="text" name="name" placeholder="Digite seu nome" value="{{ $item[0]->name }}" required>
        <label for="">Matrícula</label>
        <input class="form-control" type="number" name="matriculation" placeholder="Digite sua matrícula" value="{{ $item[0]->matriculation }}" required>
        <label for="">Salário</label>
        <input class="form-control" type="number" name="salary" placeholder="Digite seu salário bruto" value="{{ $item[0]->salary }}" required>
        <label for="">Cargo</label>
        <select class="form-control" name="office">
            @if ($item[0]->office == "Gerente")
                <option value="Gerente" selected>Gerente</option>
                <option value="Diretor">Diretor</option>
                <option value="Engenheiro">Engenheiro</option>
            @endif
            @if ($item[0]->office == "Diretor")
                <option value="Gerente">Gerente</option>
                <option value="Diretor" selected>Diretor</option>
                <option value="Engenheiro">Engenheiro</option>
            @endif
            @if ($item[0]->office == "Engenheiro")
                <option value="Gerente">Gerente</option>
                <option value="Diretor">Diretor</option>
                <option value="Engenheiro" selected>Engenheiro</option>
            @endif
        </select>
        <label>Recebe bonificação</label>
        <select class="form-control" name="bonification" value="{{ $item[0]->bonification }}">
            @if ($item[0]->bonification == True)
                <option value="yes" selected>Sim</option>
                <option value="no">Não</option>
            @else
                <option value="yes">Sim</option>
                <option value="no" selected>Não</option>
            @endif
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Atualizar">
    </form>
@endsection