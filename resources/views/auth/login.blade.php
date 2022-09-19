<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Daniel, col.">

    <title>Espigas</title>

    <!-- Bootstrap Core CSS -->
    {!!Html::style('css/bootstrap.min.css')!!}
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
    
    
    
    
      <div class="container">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <p>Sistema funciona mejor en Google Chrome y Opera</p>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    {!!Html::script('js/jquery.js')!!}
    <!-- Bootstrap Core JavaScript -->
    {!!Html::script('js/bootstrap.min.js')!!}

</body>

</html>