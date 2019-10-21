@extends('template.app')

@section('content')
<div class="form-group">
    <button type="button" class="btn btn-primary"><a href="/functionary/register">Cadastrar funcionário</a></button>
    <button type="button" class="btn btn-danger"><a href="/patient/register">Realizar Baixa</a></button>
</div>

@if (isset($user))
@if ($user->admin == false)
@foreach ($list as $item)
<div class="card" style="width: 18rem;border: solid black 0.5px; padding: 10px;">
    <div class="card-body">
        <h5 class="card-title">{{ $item->nome }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
@endforeach
@endif
@endif
@endsection