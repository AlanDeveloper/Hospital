@extends('template.app')

@section('content')
<button type="button" class="btn btn-outline-primary"><a href="/patient/list">Voltar</a></button>
<meta name="csrf-token" content="{{ csrf_token() }}">
<form action="/patient/change/{{$item[0]->id}}" method="post">
    {{ csrf_field() }}
    <h3>Preencha o formulário</h3>
    <label for="">Nome</label>
    <input class="form-control" type="text" name="name" value="{{ $item[0]->name }}" placeholder="Nome completo" required>
    <label for="">Endereço</label>
    <input class="form-control" type="text" name="address" value="{{ $item[0]->address }}" placeholder="Endereço" required>
    <label for="">Telefone</label>
    <input class="form-control" type="number" name="telephone" value="{{ $item[0]->telephone }}" placeholder="00000-0000" required>
    <label for="">Data de Nascimento</label>
    <input class="form-control" type="date" name="date" value="{{ $item[0]->date }}" required>
    <label for="">Hora de entrada</label>
    <input class="form-control" type="text" name="entry" value="{{ $item[0]->entry }}" disabled>
    <label for="">Observações</label>
    <textarea class="form-control" name="observation" cols="30" rows="10" placeholder="Caso aja observações">{{ $item[0]->observation }}</textarea>
    <br />
    <input class="btn btn-primary" type="submit" value="Atualizar">
</form>
@endsection