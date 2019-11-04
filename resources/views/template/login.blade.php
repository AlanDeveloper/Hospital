@extends('template.app')

@section('content')
<form action="/login" method="post">
    {{ csrf_field() }}
    <label for="">Nome</label>
    <input class="form-control" type="text" name="name" placeholder="Nome completo" required>
    <label for="">Senha</label>
    <input class="form-control" type="password" name="password" placeholder="Senha" required>
    <br>
    <?php
        if(isset($error)) {
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
    ?>
    <input class="btn btn-primary" type="submit" value="Iniciar sessão">
</form>
@endsection