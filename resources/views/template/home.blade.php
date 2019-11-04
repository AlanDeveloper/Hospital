@extends('template.app')

@section('content')
<div class="form-group">
    <button type="button" class="btn btn-primary"><a href="/functionary/register">Cadastrar funcionário</a></button>
    <button type="button" class="btn btn-danger"><a href="/patient/register">Realizar Baixa</a></button>
</div>
@endsection