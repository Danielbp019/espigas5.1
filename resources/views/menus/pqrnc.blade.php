<div class="col-md-4">
    <h2>PQRNC</h2>
    <div class="list-group">
        <a href="{{route('pqrnc.create')}}" class="list-group-item"><i class="fa fa-file-o" aria-hidden="true"></i> Nueva PQRNC</a>
        <a href="{{route('pqrnc.index')}}" class="list-group-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Listado de PQRNC</a>
        <!-- Trigger the modal with a button -->
        <a href="" data-toggle="modal" data-target="#ModalPQRNC" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i> Excel PQRNC</a>
        <!-- Modal -->
        <div id="ModalPQRNC" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:#000;">Excel PQRNC</h4>
                    </div>
                    <div class="modal-body" style="color:#000;">
                        <p>
                            {!!Form::open(['route'=>'excelpqrnc.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha desde (*)</label>
                                <div class="col-md-6">
                                    {!!Form::date('date_from',null,['class'=>'form-control', 'required'])!!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha hasta (*)</label>
                                <div class="col-md-6">
                                    {!!Form::date('date_to',null,['class'=>'form-control', 'required'])!!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
        <!--endmodal-->
    </div>
</div>
<!-- /.col-md-4 -->