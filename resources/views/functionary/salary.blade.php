@extends('template.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sálario Bruto</th>
                <th scope="col">Sálario Líquido</th>
                <th scope="col">INSS</th>
                <th scope="col">IRRF</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td> R$ {{$salary}}</td>
                <td> R$ {{$liquidsalary}}</td>
                <td> R$ {{$inss}}</td>
                <td> R$ {{$irrf}}</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-primary"><a href="/functionary/list">Voltar</a></button>
@endsection