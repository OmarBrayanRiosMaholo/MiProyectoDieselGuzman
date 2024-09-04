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

    if ($_SESSION['compras'] == 1) {
?>
<!-- Main Content -->
<div class="page-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">Lista de compras</h4>
                            <ul class="list-inline d-flex mb-0">
                                <li class="d-flex align-items-center">
                                    <button id="btnagregar" class="btn text-primary" onclick="mostrarform(true)"><i
                                            class="bi bi-plus"></i>
                                        Agregar compras</button>
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
                                        <th>Proveedor</th>
                                        <th>Usuario</th>
                                        <th>Documento</th>
                                        <th>Número</th>
                                        <th>Total Compra</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Usuario</th>
                                        <th>Documento</th>
                                        <th>Número</th>
                                        <th>Total Compra</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!--TABLA DE LISTADO DE REGISTROS FIN-->

                            <!--FORMULARIO PARA DE REGISTRO-->
                            <div id="formularioregistros">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                            <label for="idproveedor">Proveedor(*):</label>
                                            <input class="form-control" type="hidden" name="idingreso" id="idingreso">
                                            <select name="idproveedor" id="idproveedor" class="form-select"
                                                data-live-search="true" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                            <label for="fecha_hora">Fecha(*): </label>
                                            <input class="form-control" type="date" name="fecha_hora" id="fecha_hora"
                                                required>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                            <label for="tipo_comprobante">Tipo Comprobante(*): </label>
                                            <select name="tipo_comprobante" id="tipo_comprobante" class="form-select"
                                                required>
                                                <option value="Boleta">Boleta</option>
                                                <option value="Factura">Nota de Venta</option>
                                                <option value="Ticket">Ticket</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                            <label for="serie_comprobante">Serie: </label>
                                            <input class="form-control" type="text" name="serie_comprobante"
                                                id="serie_comprobante" maxlength="7" placeholder="Serie">
                                        </div>
                                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                            <label for="num_comprobante">Número: </label>
                                            <input class="form-control" type="text" name="num_comprobante"
                                                id="num_comprobante" maxlength="10" placeholder="Número" required>
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button type="button" class="btn btn-outline-primary block"
                                                data-bs-toggle="modal" data-bs-target="#myModal">
                                                <span class="fa fa-plus"></span> Agregar
                                                Articulos
                                            </button>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="detalles"
                                                    class="table table-striped table-bordered table-condensed table-hover"
                                                    style="width:100%;">
                                                    <thead class="bg-aqua">
                                                        <th>Opciones</th>
                                                        <th>Articulo</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Compra</th>
                                                        <th>Precio Venta</th>
                                                        <th>Subtotal</th>
                                                    </thead>
                                                    <tfoot style="background-color:#A9D0F5">
                                                        <th><span>SubTotal</span><br><span id="valor_impuesto"><span
                                                                    id="tipo_impuesto"></span>
                                                                0.00</span><br><span>TOTAL</span></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><i id="smoneda_total"></i> <span id="total"></span><br>
                                                            <i id="smoneda_most_imp"></i><span id="most_imp"
                                                                maxlength="4">0.00</span><br>
                                                            <i id="smoneda_most_total"></i> <span
                                                                id="most_total"></span><input type="hidden" step="0.01"
                                                                name="total_compra" id="total_compra">
                                                        </th>
                                                    </tfoot>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                    class="fa fa-save"></i> Guardar</button>
                                            <button class="btn btn-danger" onclick="cancelarform()" type="button"
                                                id="btnCancelar"><i class="fa fa-arrow-circle-left"></i>
                                                Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--FORMULARIO PARA DE REGISTRO FIN-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!--MODALES-->
<!--MODAL PARA LISTAR PRODUCTOS-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione un articulo</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive col-lg-12 col-md-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="tblarticulos" width="100%" class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cerrar</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL PARA LISTAR PRODUCTOS-->
<!--MODAL PARA VER EL INGRESO-->

<div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Vista de ingreso</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-8 col-md-8 col-xs-12">
                        <label for="idproveedorm">Proveedor:</label>
                        <input class="form-control" type="text" name="idproveedorm" id="idproveedorm" readonly>
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
                        <label for="tipo_comprobantem">Tipo Comprobante(*): </label>
                        <input class="form-control" type="text" name="tipo_comprobantem" id="tipo_comprobantem"
                            readonly>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-xs-6">
                        <label for="serie_comprobantem">Serie: </label>
                        <input class="form-control" type="text" name="serie_comprobantem" id="serie_comprobantem"
                            maxlength="7" readonly>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-xs-6">
                        <label for="num_comprobantem">Número: </label>
                        <input class="form-control" type="text" name="num_comprobantem" id="num_comprobantem"
                            maxlength="10" readonly>
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

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
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
<script src="Views/modules/scripts/buy.js"></script>
<script src="Views/modules/scripts/generaldata.js"></script>
<?php
}
ob_end_flush();
?>