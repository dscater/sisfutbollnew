<div class="modal fade show" id="modal_generacion" style="display: block; background:rgba(0, 0, 0, 0.651);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="txtTituloConfirmarVenta">GENERACIÓN DE FIXTURE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>VARIACIONES SIN REPETICIÓN TOTAL {{ session('variaciones') }} PARTIDOS</p>
                <p>COMBINACIONES SIN REPETICIÓN TOTAL {{ session('combinaciones') }} PARTIDOS POR GRUPO</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
