@extends('template.app')

@section('content')
<button type="button" class="btn btn-outline-primary"><a href="/patient/list">Voltar</a></button>
<br><br>
@foreach ($vet as $item)
<form action="/binds/{{ $item->id }}" class="form-inline" method="post">
    {{ csrf_field() }}
    <div class="form-group mb-2">
        <input type="text" class="form-control" value="{{ $item->name }}" disabled>
        @endforeach
        <select name="m" class="form-control">
            <option value="-1">Selecione um médico/enfermeiro</option>
            @foreach ($list1 as $item)
                <option value="{{ $item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        <select name="e" class="form-control">
            <option value="-1">Selecione um médico/enfermeiro</option>
            @foreach ($list2 as $item)
                <option value="{{ $item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        @if ($cont >= 2) 
            <input type="submit" class="btn btn-primary mb-2" value="Vincular" disabled>
        
        @else
            <input type="submit" class="btn btn-primary mb-2" value="Vincular">
        @endif
    </div>
</form>
@endsection