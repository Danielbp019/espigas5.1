<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Crear peticiones, quejas y reclamos que no constituyen</h1>
                <hr> {!!Form::open(['route'=>'pqrnc.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!} {{ csrf_field() }}
                <!--form start-->
                @include('pqrnc.form')

                <!--hidden-->
                <input type="hidden" name="user_update" value="{{Auth::user()->id}}">
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="date" value="<?php echo date(" Y-m-d ") ?>">
                <input type="hidden" name="time" value="<?php echo date(" h:i:s ") ?>">
                <input type="hidden" name="code_dane" value="15469000">
                <input type="hidden" name="type_service" value="5">

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <!--form end-->
                <hr>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- /.row -->
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Notas</h4>
                    <p>Numero de PQRnC actual:
                        <?php $suma=1; ?>
                            @foreach ($number as $numbers)
                            <?php $suma += $numbers->idpqrnc; ?>
                                @endforeach {{ $suma }}</p>
                </div>
                <!--end well-->
            </div>
            <!--end class-->

            <!--    menu    -->
            @include('menus.pqrnc')
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
            open(url, '', 'top=500,left=500,width=800,height=400');
        }
    </script>
    @endsection
    <?php }?>