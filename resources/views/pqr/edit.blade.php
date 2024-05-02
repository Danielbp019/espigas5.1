<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title (metodo put para actualizar) -->
                <h1>Editar PQR</h1>
                <hr> {!!Form::model($pqr, ['route'=>['pqr.update',$pqr],'method'=>'PUT', 'class'=>'form-horizontal'])!!}
                <!--form start-->
                @include('pqr.form')

                <!--hidden-->
                <input type="hidden" name="user_update" value="{{Auth::user()->id}}">
                <input type="hidden" name="rta_niu" value="{{Auth::user()->id}}">
                <input type="hidden" name="answer_date" value="<?php echo date(" Y-m-d ") ?>">
                <input type="hidden" name="date_notification" value="<?php echo date(" Y-m-d ") ?>">

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                        </button>
                    </div>
                </div>

                {!! Form::close() !!} @if(Auth::user()->role == 'admin') {!!Form::open(['route'=>['pqr.destroy', $pqr], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" onclick="return confirm('¿Seguro que desea eliminar? esta acción no se podrá deshacer')" class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar</button>
                    </div>
                </div>
                {!!Form::close()!!} @endif
                <!--form end-->

            </div>

            <!--    menu    -->
            @include('menus.pqr')
            <!--    end menu    -->

        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
<?php } ?>