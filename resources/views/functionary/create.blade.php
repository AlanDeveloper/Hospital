@extends('template.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form action="{{ url('functionary/register') }}" method="post">
    {{ csrf_field() }}
    <h3>Preencha o formulário</h3>
    <label for="">Nome</label>
    <input class="form-control" type="text" name="name" placeholder="Nome completo" required>
    <label for="">Senha</label>
    <input class="form-control" type="password" name="password" placeholder="Senha" required>
    <label for="">Cargo</label>
    <select class="form-control" name="office">
        <option value="as">Assistente social</option>
        <option value="e">Enfermeiro</option>
        <option value="m">Médico</option>
        <option value="p">Psicólogo</option>
    </select>
    <label>Especialidade</label>
    <select class="form-control" name="specialty">
        <option value="c">Cirurgião</option>
        <option value="cg">Clinico geral</option>
        <option value="o">Obstetra</option>
    </select>
    <br />
    <input class="btn btn-primary" type="submit" value="Cadastrar">
</form>
@endsection