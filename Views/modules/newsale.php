<?php

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
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Ventas</h4>
                        </div>
                        <div class="card-body">
                            <!--FORMULARIO PARA DE REGISTRO-->
                            <div id="formularioregistros">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                            <label for="">Fecha(*): </label>
                                            <input class="form-control" type="date" name="fecha_hora" id="fecha_hora"
                                                required>
                                        </div>
                                        <div class="form-group col-lg-8 col-md-8 col-xs-12">
                                            <label for="">Cliente(*):</label>
                                            <input class="form-control" type="hidden" name="idventa" id="idventa">
                                            <div class="input-group mb-3">
                                                <select name="idcliente" id="idcliente" class="form-select" required>
                                                </select>
                                                <button class="btn btn-success" type="button"
                                                    onclick="agregarCliente()"><i
                                                        class="fa fa-plus-circle"></i>Agregar</button>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-xs-6">
                                            <label for="">Comprobante(*):</label>
                                            <select name="tipo_comprobante" id="tipo_comprobante" class="form-select"
                                                required>
                                            </select>
                                        </div>
                                        <!--<div class="form-group col-lg-4 col-md-4 col-xs-6">
                                            <label for="">Serie: </label>
                                            <input class="form-control" type="text" name="serie_comprobante"
                                                id="serie_comprobante" maxlength="7" readonly required>
                                        </div>

                                        <div class="form-group col-lg-4 col-md-4 col-xs-6">
                                            <label for="">Número: </label>
                                            <input class="form-control" type="text" name="num_comprobante"
                                                id="num_comprobante" maxlength="10" readonly required>
                                        </div>-->

                                        <div class="form-group col-lg-4 col-md-4 col-xs-6">
                                            <label for="">Aplicar Impuesto: </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input"
                                                        name="aplicar_impuesto" id="aplicar_impuesto">
                                                </div>
                                                <input type="text" class="form-control"
                                                    aria-label="Text input with checkbox" name="impuesto" id="impuesto"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <label for="">Tipo de pago(*):</label>
                                            <select onchange="ShowTipopago()" name="tipo_pago" id="tipo_pago"
                                                class="form-select" required>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Depósito">Depósito</option>
                                            </select>
                                        </div>
                                        <div id="t_pago" class="form-group col-lg-4 col-md-4 col-xs-12">
                                            <label for="">N° Operacion: </label>
                                            <input class="form-control" type="text" name="num_transac" id="num_transac"
                                                maxlength="45">
                                        </div>
                                        <div class="form-group  col-lg-12 col-md-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="detalles"
                                                    class="table table-striped table-hover text-center table-sm text-nowrap">
                                                    <thead class="bg-aqua">
                                                        <th class="">Opción</th>
                                                        <th class="col-xs-6">Articulo</th>
                                                        <th class="col-xs-1">Cantidad</th>
                                                        <th class="col-xs-1">Precio</th>
                                                        <th class="col-xs-1">Descuento</th>
                                                        <th class="col-xs-1">Subtotal</th>
                                                    </thead>

                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="d-flex justify-content-between">
                                                        <td>Subtotal</td>
                                                        <td><span id="total">
                                                                0.00</span></td>
                                                    </tr>
                                                    <tr class="d-flex justify-content-between">
                                                        <td> <span id="valor_impuesto">
                                                                0.00</span></td>
                                                        <td><span id="most_imp" class="pull-right">0.00</span></td>
                                                    </tr>
                                                    <tr class="d-flex justify-content-between">
                                                        <td>Total</td>
                                                        <td><span id="most_total" class="pull-right">0.00</span></td>
                                                    </tr>
                                                    <tr class="d-flex justify-content-between">
                                                        <td class="d-flex justify-content-between">
                                                            <label for="tpagado"> Cant. pagado: </label>
                                                            <input class="form-control" oninput="modificarSubtotales()"
                                                                style="width: 150px; height: 31px;" type="number"
                                                                step="0.01" name="tpagado" id="tpagado">
                                                            <input type="hidden" step="0.01" name="total_venta"
                                                                id="total_venta">
                                                        </td>
                                                        <td>
                                                            <span> Cambio: </span>
                                                            <span id="vuelto">0.00</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                    class="fa fa-save"></i> Guardar</button>
                                            <a href="listsales"><button class="btn btn-danger" type="button"
                                                    id="btnCancelar"><i class="fa fa-arrow-circle-left"></i>
                                                    Cancelar</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--FORMULARIO PARA DE REGISTRO FIN-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success" id="formularioregistros">
                        <div class="card-header">
                            <h4>Agrega un articulo</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tblarticulos"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="width:100%;">
                                    <thead>
                                        <th>Opción</th>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <th>Opción</th>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!--modal para agregar nuevo cliente-->
<div class="modal fade" id="Modalcliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="formulariocliente" id="formulariocliente" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Nombre</label>
                            <input class="form-control" type="hidden" name="idpersona" id="idpersona">
                            <input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona"
                                value="Cliente">
                            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100"
                                placeholder="Nombre del cliente" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Tipo Dcumento</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento"
                                required>
                                <option value="DNI">CEDULA</option>
                                <option value="RUC">PASAPORTE</option>
                                <option value="CEDULA">NIT</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Número Documento</label>
                            <input class="form-control" type="text" name="num_documento" id="num_documento"
                                maxlength="20" placeholder="Número de Documento">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Direccion</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" maxlength="70"
                                placeholder="Direccion">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Telefono</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20"
                                placeholder="Número de Telefono">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" id="email" maxlength="50"
                                placeholder="Email">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardarcliente"><i
                                    class="fa fa-save"></i>
                                Guardar</button>

                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i
                                    class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="form-group col-lg-12 col-md-12 col-xs-12">

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?php
    } else {
        require "access.php";
    }
    require "footer.php";
    ?>
<script src="Views/modules/scripts/generaldata.js"></script>
<script src="Views/modules/scripts/newsale.js"></script>
<?php
}
ob_end_flush();
?>