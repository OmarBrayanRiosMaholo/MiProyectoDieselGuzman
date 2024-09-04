<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location: login");
} else {
    //echo $_SESSION['nombre'];
    require "header.php";

    if ($_SESSION['ventas'] == 1) {
?>
<!-- Main Content -->
<div class="page-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">Lista de ventas</h4>
                            <ul class="list-inline d-flex mb-0">
                                <li class="d-flex align-items-center">
                                    <button id="btnagregar" class="btn text-primary"><i class="bi bi-plus"></i>
                                        Agregar ventas</button>
                                </li>
                            </ul>
                        </div>
                        <!--TABLA DE LISTADO DE REGISTROS-->
                        <div class="card-body">
                            <div class="table-responsive" id="listadoregistros">
                                <table id="tbllistado" class="table table-striped table-hover text-nowrap"
                                    style="width:100%;">
                                    <thead>
                                        <th>Opciones</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Usuario</th>
                                        <th>Comprobante</th>
                                        <th>Tipo venta</th>
                                        <th>Total Venta</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Usuario</th>
                                        <th>Comprobante</th>
                                        <th>Tipo venta</th>
                                        <th>Total Venta</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!--TABLA DE LISTADO DE REGISTROS FIN-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!--MODALES-->
<!--MODAL PARA VER EL INGRESO-->

<div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Vista de venta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-8 col-md-8 col-xs-12">
                        <label for="">Cliente(*):</label>
                        <input class="form-control" type="hidden" name="idventam" id="idventam">
                        <input class="form-control" type="text" name="cliente" id="cliente" maxlength="7" readonly>
                    </div>
                    <div class="form-group has-icon-right col-lg-4 col-md-4 col-xs-6">
                        <label for="fecha_horam">Fecha: </label>
                        <div class="position-relative">
                            <input class="form-control" type="text" name="fecha_horam" id="fecha_horam" readonly>
                            <div class="form-control-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-xs-6">
                        <label for="">Comprobante(*):</label>
                        <input class="form-control" type="text" name="tipo_comprobantem" id="tipo_comprobantem"
                            maxlength="7" readonly>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-xs-6">
                        <label for="">Serie: </label>
                        <input class="form-control" type="text" name="serie_comprobantem" id="serie_comprobantem"
                            maxlength="7" readonly>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-xs-6">
                        <label for="">Número: </label>
                        <input class="form-control" type="text" name="num_comprobantem" id="num_comprobantem"
                            maxlength="10" readonly>
                    </div>
                    <div class="form-group has-icon-right col-lg-4 col-md-4 col-xs-6">
                        <label for="impuestom">Impuesto: </label>
                        <div class="position-relative">
                            <input type="text" class="form-control" name="impuestom" id="impuestom" readonly>
                            <div class="form-control-icon">
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="detallesm"
                                class="table table-striped table-bordered table-condensed table-hover">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-xs-12">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL PARA VER EL INGRESO-->
<!--FIN MODALES-->
<?php
    } else {
        require "access.php";
    }
    require "footer.php";
    ?>
<script src="Views/modules/scripts/listsales.js"></script>
<?php
}
ob_end_flush();
?>