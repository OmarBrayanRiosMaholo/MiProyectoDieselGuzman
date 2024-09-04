<?php

ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location: login");
} else {
    //echo $_SESSION['nombre'];
    require "header.php";
    // require "sidebar.php";

    if ($_SESSION['users'] == 1) {
?>
        <!-- Main Content -->
        <!--<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>-->
        <div class="page-content">

            <!-- Basic Tables start -->
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title d-flex">Lista de usuarios</h4>
                                <ul class="list-inline d-flex mb-0">
                                    <li class="d-flex align-items-center">
                                        <button id="btnagregar" class="btn text-primary" onclick="mostrarform(true)"><i class="bi bi-plus"></i>
                                            Agregar usuario</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive" id="listadoregistros">
                                        <table id="tbllistado" class="table table-bordered table-striped text-nowrap" style="width:100%;">
                                            <thead class="table-primary">
                                                <th>Opciones</th>
                                                <th>Nombres y apellidos </th>
                                                <th>Documento</th>
                                                <th>Numero Documento</th>
                                                <th>Telefono</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Login</th>
                                                <th>Foto</th>
                                                <th>Estado</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <th>Opciones</th>
                                                <th>Nombre y apellidos</th>
                                                <th>Documento</th>
                                                <th>Numero Documento</th>
                                                <th>Telefono</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Login</th>
                                                <th>Foto</th>
                                                <th>Estado</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div id="formularioregistros">
                                        <form action="" name="formulario" id="formulario" method="POST">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Nombres y Apellidos(*):</label>
                                                    <input class="form-control" type="hidden" name="idusuario" id="idusuario">
                                                    <input type="hidden" id="modoEdicion" value="false">
                                                    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Tipo Documento(*):</label>
                                                    <select name="tipo_documento" id="tipo_documento"  class="form-control"  required>
                                                        <option value=""></option>
                                                        <option value="CEDULA">CEDULA</option>
                                                        <option value="PASAPORTE">PASAPORTE</option>
                                                        <option value="NIT">NIT</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Numero de Documento(*):</label>
                                                    <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Documento" maxlength="20">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Direccion</label>
                                                    <input class="form-control" type="text" name="direccion" id="direccion" maxlength="70">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Telefono</label>
                                                    <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="Número de telefono">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Email: </label>
                                                    <input class="form-control" type="email" name="email" id="email" maxlength="70" placeholder="email">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Rol</label>
                                                    <select name="cargo" id="cargo" class="form-control" required>
                                                        <option value=" admin ">Administrador</option>
                                                        <option value="vendedor">Vendedor</option>
                                                        
                                                    </select></div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Login(*):</label>
                                                    <input class="form-control" type="text" name="login" id="login" maxlength="20" placeholder="nombre de usuario" required>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves">
                                                    <label for="">Clave(*):</label>
                                                    <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label for="">Imagen:</label>
                                                    <input class="form-control" type="file" name="imagen" id="imagen">
                                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                                    <img src="" alt="" width="150px" height="120" id="imagenmuestra">
                                                    <!--<img id="previewHolder" alt="Selecciona una imagen" width="150px" height="120px" style="border-radius:10px;" />-->
                                                    <span id="previewImagen" class="btn btn-danger btn-sm">X</span>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                                    <label>Permisos</label>
                                                    <ul id="permisos" style="list-style: none;">

                                                    </ul>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>
                                                        Guardar</button>
                                                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i>
                                                        Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--FORMULARIO CMABIO DE CLAVE-->
                                    <div id="formulario_clave">
                                        <form action="" name="formularioc" id="formularioc" method="POST">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Nueva clave:</label>
                                                <input class="form-control" type="hidden" name="idusuarioc" id="idusuarioc">
                                                <input class="form-control" type="password" name="clavec" id="clavec" maxlength="64" placeholder="Clave">
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="btnGuardar_clave"><i class="fa fa-save"></i>
                                                Guardar</button>
                                            <button class="btn btn-danger" onclick="cancelarform_clave()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                        </form>
                                    </div>
                                    <!--FORMULARIO CMABIO DE CLAVE FIN-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Basic Tables end -->

        </div>
    <?php
    } else {
        require "access.php";
    }
    require "footer.php";
    ?>
    <script src="Views/modules/scripts/user.js"></script>
<?php
}
ob_end_flush();
?>