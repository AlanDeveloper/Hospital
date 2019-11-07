@extends('template.app')

@section('content')
<div class="form-group">
    <button type="button" class="btn btn-primary"><a href="/register_user_functionary">Cadastrar funcionário</a></button>
    <button type="button" class="btn btn-danger"><a href="/patient/register">Realizar Baixa</a></button>
</div>

@foreach ($list as $item)
    <div class="card" style="width: 18rem;box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 10px;margin-bottom: 15px;">
        <div class="card-body">
            <h5 class="card-title">{{ $item[0]->name }}</h5>
            <p class="card-text">{{ $item[0]->observation }}</p>
            <a href="#" class="btn btn-primary">Realizar consulta</a>
        </div>
    </div>
@endforeach
@endsection