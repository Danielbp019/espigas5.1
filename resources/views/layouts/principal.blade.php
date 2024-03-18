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

    <script>
        var $j = jQuery.noConflict();
        $j(document).ready(function () {
            $j("#niu").autocomplete({
                source: function (request, response) {
                    var term = $j("#niu").val();

                    // Verificar si el término es demasiado corto
                    if (term.length < 2) {
                        return;
                    }

                    $j.ajax({
                        url: "{{ url('buscarcodigo') }}",
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            term: term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function (event, ui) {
                    // Obtener el token CSRF
                    var token = "{{ csrf_token() }}";
                    $j.ajax({
                        url: "{{ url('valores') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            codigo: ui.item.value,
                            _token: token // Enviar el token CSRF
                        }
                    }).done(function (respuesta) {
                        $j("#user").val(respuesta.usuario);
                        $j("#address").val(respuesta.direccion);
                        $j("#bill").val(respuesta.factura);
                    });
                }
            });
        });
    </script>


    <!-- Custom CSS -->
    {!!Html::style('css/small-business.css')!!}
    <!--Font Awesome-->
    {!!Html::style('font-awesome-4.6.1/css/font-awesome.min.css')!!}
    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logo2.png') }}" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--dropdown-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            Inicio</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Bienvenido, {{ Auth::user()->name }}<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-power-off" aria-hidden="true"></i>
                                    Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <!--end dropdown-->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    @yield('content')

    <!-- Page Content -->
    <div class="container">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; Espigas 2012-2016</p>
                </div>
                <div class="col-md-4">
                    <!--vacio-->
                </div>
                <div class="col-md-4">
                    <p>Sistema Espigas</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>