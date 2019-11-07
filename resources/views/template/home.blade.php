@extends('template.app')

@section('content')
<div class="form-group">
    <button type="button" class="btn btn-primary"><a href="/register_user_functionary">Cadastrar funcionário</a></button>
    <button type="button" class="btn btn-danger"><a href="/patient/register">Realizar Baixa</a></button>
</div>

@foreach ($list as $item)
    <div class="card" style="width: 24rem;box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 15px;margin-bottom: 15px;">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $item[0]->name }}</h5>
            <p class="card-text">Observação: {{ $item[0]->observation }}</p>
            <p class="card-text">Entrada: 
                <?php
                    $data = $item[0]->entry;
                    echo date("d/m/Y  H:i", strtotime($data));
                ?>
            </p>
        </div>
    </div>
@endforeach
@endsection