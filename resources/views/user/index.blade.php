<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Lista de usuarios</h1>
                <hr> @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif

                <!-- buscador-->
                {!!Form::model(Request::all(),['route'=>'user.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i> </span> {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Digite un nombre', 'aria-describedby'=>'search'])!!}
                </div>
                {!!Form::select('role', config('options.role'), null, ['class'=>'form-control', 'placeholder' => 'Rol?'])!!}
                <button type="submit" class="btn btn-default"> Enviar</button>
                {!! Form::close() !!}
                <!--fin buscador-->
                <!--***************************-->
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Creado el</th>
                        <th>Actualizado el</th>

                        <th>Acciones</th>
                    </thead>
                    @foreach($users as $user)
                    <tbody style="background-color:#fff; color:#000">
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>

                        <td>{!!link_to_route('user.edit', $title='Editar', $parameters=$user->id, $attributes=['class'=>'btn btn-primary'])!!}
                        </td>

                    </tbody>
                    @endforeach
                </table>
                {!!$users->appends(Request::only(['name','role']))->render()!!}
                <!--***************************-->
                <hr>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
    <?php }?>