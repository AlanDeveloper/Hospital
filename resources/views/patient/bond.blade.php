@extends('template.app')

@section('content')
<table class="table">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Médicos/Enfermeiros</th>
    </thead>
    <tbody>
        @foreach ($list as $item)
        <tr scope="row">
            <td>{{ $item[0]->id }}</td>
            <td>{{ $item[0]->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection