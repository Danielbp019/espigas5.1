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
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- /.row -->
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Notas</h4>
                    <p>Los campos de fecha siempre deberán seguir el formato año, mes día. (año-mes-dia)</p>
                    <p>Los campos de hora siempre deberán seguir el formato hora, minutos, segundos. (hora:minutos:segundos)</p>
                    <p>Abre el enlace para consultar el niu, nombre de titular, dirección y factura.</p>
                    <a href="javascript:abrir('{{route('planilla.index')}}')" role="button" class="btn btn-primary">Consulta planilla</a>
                </div>
                <!--    end well    -->
            </div>
            <!--end class-->

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
        function abrir(url) {
            open(url, '', 'top=400,left=500,width=800,height=400');
        }
    </script>
    @endsection
    <?php }?>