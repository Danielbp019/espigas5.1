<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Daniel Bautista P., col.">

    <title>Espigas</title>

    <!-- Cargar Bootstrap 3.4.1 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Cargar jQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Cargar Bootstrap 3.4.1 JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <!-- Cargar jQuery UI desde CDN -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Custom CSS -->
    {!!Html::style('css/login.css')!!}
    <!--Font Awesome-->
    {!!Html::style('font-awesome-4.6.1/css/font-awesome.min.css')!!}
    <!--favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <div class="form-container">
                    <h3 class="title"><i class="glyphicon glyphicon-log-in"></i> Inicio de Sesión</h3>
                    {!!Form::open(['route'=>'auth.store', 'method'=>'POST', 'class'=>'form-horizontal', 'autocomplete'=>'off'])!!}
                    {{ csrf_field() }}
                    @include('errors/loginError')
                    @include('errors/alertLogin')
                    <div class="form-group">
                        <label for="">Usuario</label>
                        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de usuario', 'required', 'autofocus'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña', 'required'])!!}
                    </div>
                    <button class="btn signup" type="submit">Iniciar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</body>

</html>