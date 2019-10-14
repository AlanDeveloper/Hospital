@extends('template.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form action="{{ url('patient/register') }}" method="post">
        {{ csrf_field() }}
        <h3>Preencha o formulário</h3>
        <label for="">Nome</label>
        <input class="form-control" type="text" name="name" placeholder="Nome completo" required>
        <label for="">Endereço</label>
        <input class="form-control" type="text" name="address" placeholder="Endereço" required>
        <label for="">Telefone</label>
        <input class="form-control" type="number" name="telephone" placeholder="00000-0000" required>
        <label for="">Data de Nascimento</label>
        <input class="form-control" type="date" name="date" required>
        <label for="">Hora de entrada</label>
        <input class="form-control" type="datetime-local" name="entry" required>
        <label for="">Observações</label>
        <textarea class="form-control" name="observation" cols="30" rows="10" placeholder="Caso aja observações"></textarea>
        <br/>
        <input class="btn btn-primary" type="submit" value="Baixar paciente">
    </form>
@endsection