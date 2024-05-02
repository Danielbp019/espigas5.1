<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Crear Emergencias</h1>
                <hr> {!!Form::open(['route'=>'emergency.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!} {{ csrf_field() }}
                <!--form start-->
                @include('emergency.form')

                <!--hidden-->
                <input type="hidden" name="user_update" value="{{Auth::user()->id}}">
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="application_date" value="<?php echo date(" Y-m-d ") ?>">
                <input type="hidden" name="time_application" value="<?php echo date(" h:i:s ") ?>">
                <!--form end-->

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <hr>
            </div>

            <!--    menu    -->
            @include('menus.emergency')
            <!--    end menu    -->
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->

    <script>
        var $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j("#niu").autocomplete({
                source: function(request, response) {
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
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
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
                    }).done(function(respuesta) {
                        $j("#name_holder").val(respuesta.usuario);
                        $j("#address").val(respuesta.direccion);
                        $j("#bill").val(respuesta.factura);
                    });
                }
            });
        });

        function abrir(url) {
            open(url, '', 'top=400,left=500,width=800,height=400');
        }
    </script>

    @endsection
<?php } ?>