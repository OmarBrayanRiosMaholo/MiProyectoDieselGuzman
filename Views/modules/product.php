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
                            <h4 class="card-title d-flex">Lista de artículos</h4>
                            <ul class="list-inline d-flex mb-0">
                                <li class="d-flex align-items-center">
                                    <button id="btnagregar" class="btn text-primary" onclick="mostrarform(true)"><i
                                            class="bi bi-plus"></i>
                                        Agregar artículo</button>
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
                                        <th>Categoria</th>
                                        <th>Codigo</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Descripcion</th>
                                        <th>P. Compra</th>
                                        <th>P. Venta</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Codigo</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Descripcion</th>
                                        <th>P. Compra</th>
                                        <th>P. Venta</th>
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
                                            <label for="">Nombre(*):</label>
                                            <input class="form-control" type="hidden" name="idarticulo" id="idarticulo">
                                            <input type="hidden" id="modoEdicion" value="false">
                                            <input class="form-control" type="text" name="nombre" id="nombre"
                                                maxlength="100" placeholder="Nombre" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                            <label for="">Categoria(*):</label>
                                            <select name="idcategoria" id="idcategoria" class="form-select"
                                                required></select>
                                        </div>
                                        <!--<div class=" form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Stock</label>
                                                    <input class="form-control" type="number" name="stock" id="stock" value="0">
                                                </div>-->
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                            <label for="">Descripcion</label>
                                            <input class="form-control" type="text" name="descripcion" id="descripcion"
                                                maxlength="256" placeholder="Descripcion">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                            <label for="">Codigo:</label>
                                            <input class="form-control" type="text" name="codigo" id="codigo"
                                                placeholder="codigo del producto" required>
                                            <button class="btn btn-success" type="button"
                                                onclick="generarbarcode()">Generar</button>
                                            <button class="btn btn-info" type="button"
                                                onclick="imprimir()">Imprimir</button>
                                            <div id="print">
                                                <svg id="barcode"></svg>
                                            </div>
                                        </div>
                                        <body>
                                            
                                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Imagen:</label>
    <input class="form-control" type="file" name="imagen" id="imagen">
    <input type="hidden" name="imagenactual" id="imagenactual">
    <img src="" alt="" width="150px" height="120" id="imagenmuestra" class="img-hover">
    <!--<img id="previewHolder" alt="Selecciona una imagen" width="150px" height="120px" style="border-radius:10px;" />-->
    <span id="previewImagen" class="btn btn-danger btn-sm">X</span>
</div>

<style>
    .img-hover {
        transition: transform 0.3s ease; /* Añade una transición suave */
    }

    .img-hover:hover {
        transform: scale(7.5); /* Escala la imagen al 150% de su tamaño original */
        z-index: 1000; /* Asegura que la imagen ampliada quede por encima de otros elementos */
        position: relative; /* Permite que la imagen se desplace en el contexto de su contenedor */
    }
</style>

                                        </body>
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
<script src="assets/js/JsBarcode.all.min.js"></script>
<script src="assets/js/jquery.PrintArea.js"></script>
<script src="Views/modules/scripts/product.js"></script>
<?php
}
ob_end_flush();
?>