<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Daniel Bautista P., col.">

    <title>Espigas</title>

    <!-- Cargar Bootstrap 3.3.7 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Cargar jQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Cargar Bootstrap 3.3.7 JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Cargar jQuery UI desde CDN -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    <!-- Custom CSS -->
    {!!Html::style('css/small-business.css')!!}
    <!--Font Awesome-->
    {!!Html::style('font-awesome-4.6.1/css/font-awesome.min.css')!!}
    <!--favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}"/>

</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">

                <div class="panel panel-default">
                    <div class="panel-body">
                    @include('errors/loginError')
                        @include('errors/alertLogin')
                        {!!Form::open(['route'=>'auth.store', 'method'=>'POST', 'class'=>'form-signin', 'autocomplete'=>'off'])!!} 
                        {{ csrf_field() }}
                        <h2 class="form-signin-heading" style=" text-align: center">Inicio de Sesión</h2>
                        <label for="inputEmail" class="sr-only">Nombre de usuario</label>
                        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de usuario', 'autofocus'])!!}
                        <br/>
                        <label for="inputPassword" class="sr-only">Contraseña</label>
                    {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}

                        <!--<div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>-->
                        <br/>
                        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-key" aria-hidden="true"> Iniciar</i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">

            </div>
            <!-- /.col-md-4 -->
        </div>
    </div>
    <!-- /.container -->

    </div>
    <!-- /.container -->
</body>

</html>