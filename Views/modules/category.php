<?php

ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location: login");
} else {
    //echo $_SESSION['nombre'];
    require "header.php";

    if ($_SESSION['almacen'] == 1) {
?>
<!-- Main Content -->
<div class="page-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">Lista de categorías</h4>
                            <ul class="list-inline d-flex mb-0">
                                <li class="d-flex align-items-center">
                                    <button id="btnagregar" class="btn text-primary" onclick="mostrarform(true)"><i
                                            class="bi bi-plus"></i>
                                        Agregar categoría</button>
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
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!--TABLA DE LISTADO DE REGISTROS FIN-->

                            <!--FORMULARIO PARA DE REGISTRO-->
                            <div id="formularioregistros">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                            <label for="">Nombre</label>
                                            <input class="form-control" type="hidden" name="idcategoria"
                                                id="idcategoria">
                                            <input class="form-control" type="text" name="nombre" id="nombre"
                                                maxlength="50" placeholder="Nombre" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                            <label for="">Descripcion</label>
                                            <input class="form-control" type="text" name="descripcion" id="descripcion"
                                                maxlength="256" placeholder="Descripcion">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                    class="fa fa-save"></i> Guardar</button>

                                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                                    class="fa fa-arrow-circle-left"></i>
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
<?php
    } else {
        require "access.php";
    }
    require "footer.php";
    ?>
<script src="Views/modules/scripts/category.js"></script>
<?php
}
ob_end_flush();
?>