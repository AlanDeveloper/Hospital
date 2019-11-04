@extends('template.app')

@section('content')
<button type="button" class="btn btn-outline-primary"><a href="/functionary/list">Voltar</a></button>
<meta name="csrf-token" content="{{ csrf_token() }}">
<form action="/functionary/change/{{$item[0]->id}}" method="post">
    {{ csrf_field() }}
    <h3>Preencha o formulário</h3>
    <label for="">Nome</label>
    <input class="form-control" type="text" name="name" value="{{ $item[0]->name }}" placeholder="Nome completo" required>
    <label for="">Senha</label>
    <input class="form-control" type="password" name="password" placeholder="Nova senha">
    <label for="">Cargo</label>
    <select class="form-control" name="office">
        @if ($item[0]->office == "as")
        <option value="as" selected>Assistente social</option>
        <option value="e">Enfermeiro</option>
        <option value="m">Médico</option>
        <option value="p">Psicólogo</option>
        @endif
        @if ($item[0]->office == "e")
        <option value="as">Assistente social</option>
        <option value="e" selected>Enfermeiro</option>
        <option value="m">Médico</option>
        <option value="p">Psicólogo</option>
        @endif
        @if ($item[0]->office == "m")
        <option value="as">Assistente social</option>
        <option value="e">Enfermeiro</option>
        <option value="m" selected>Médico</option>
        <option value="p">Psicólogo</option>
        @endif
        @if ($item[0]->office == "p")
        <option value="as">Assistente social</option>
        <option value="e">Enfermeiro</option>
        <option value="m">Médico</option>
        <option value="p" selected>Psicólogo</option>
        @endif
    </select>
    <label>Especialidade</label>
    <select class="form-control" name="specialty">
        @if ($item[0]->specialty == "c")
        <option value="c" selected>Cirurgião</option>
        <option value="cg">Clinico geral</option>
        <option value="o">Obstetra</option>
        @endif
        @if ($item[0]->specialty == "cg")
        <option value="c">Cirurgião</option>
        <option value="cg" selected>Clinico geral</option>
        <option value="o">Obstetra</option>
        @endif
        @if ($item[0]->specialty == "o")
        <option value="c">Cirurgião</option>
        <option value="cg">Clinico geral</option>
        <option value="o" selected>Obstetra</option>
        @endif
    </select>
    <br />
    <input class="btn btn-primary" type="submit" value="Atualizar">
</form>
@endsection