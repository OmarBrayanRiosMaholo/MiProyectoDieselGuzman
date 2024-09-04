<?php

ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header("location: login");
} else {
    //echo $_SESSION['nombre'];
    require "header.php";

    if ($_SESSION['dashboard'] == 1) {
        //require_once "../Models/Company.php";
        require_once(dirname(__FILE__, 3) . '/Models/Consult.php');
        $consulta = new Consult();


        require_once(dirname(__FILE__, 3) . '/Models/Company.php');
        $cnegocio = new Company();
        $id_negocio = 1;
        $rsptan = $cnegocio->mostrar($id_negocio);
        //$regn=$rsptan->fetch_object();
        $empresa = $rsptan['nombre'];
        $ndocumento = $rsptan['ndocumento'];
        $documento = $rsptan['documento'];
        $direccion = $rsptan['direccion'];
        $telefono = $rsptan['telefono'];
        $email = $rsptan['email'];
        $pais = $rsptan['pais'];
        $ciudad = $rsptan['ciudad'];
        $nombre_impuesto = $rsptan['nombre_impuesto'];
        $monto_impuesto = $rsptan['monto_impuesto'];
        $moneda = $rsptan['moneda'];
        $simbolo = $rsptan['simbolo'];
        $new_simbolo = '';
        $sim_euro = '€';
        $sim_yen = '¥';
        $sim_libra = '£';
        if ($simbolo == $sim_euro) {
            $new_simbolo = EURO;
        } elseif ($simbolo == $sim_yen) {
            $new_simbolo = JPY;
        } elseif ($simbolo == $sim_libra) {
            $new_simbolo = GBP;
        } else {
            $new_simbolo = $simbolo;
        }
?>
<!-- Main Content -->
<div class="page-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="stats-icon bg-info">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                            <div>
                                <h4 class="">Total ventas</h4>
                                <h4 class="card-title">
                                    <?php
                                            $rspta = $consulta->totalVentas();
                                            echo $new_simbolo . ' ' . number_format($rspta['total_venta'], 2, '.', ',');
                                            ?></h4>
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="chart-1" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="stats-icon bg-danger">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <h4 class="pull-right">Total compras</h4>
                                <h4 class="card-title">
                                    <?php
                                            $rspta = $consulta->totalCompras();
                                            echo $new_simbolo . ' ' . number_format($rspta['total_compra'], 2, '.', ',');
                                            ?></h4>
                            </div>
                        </div>

                        <div class="card-chart">
                            <canvas id="chart-2" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="stats-icon bg-success">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <h4 class="pull-right">Total compras</h4>
                                <h4 class="card-title">
                                    <?php
                                            $rspta = $consulta->totalGanancia();
                                            echo $new_simbolo . ' ' . number_format($rspta['precio_venta'] - $rspta['precio_compra'], 2, '.', ',');
                                            ?></h4>
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="chart-3" height="80"></canvas>
                        </div>
                    </div>
                </div>



                <!--GRAFICO DE COMPRAS-->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafico de compras</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="compras_grafica"></canvas>
                        </div>
                    </div>
                </div>

                <!--GRAFICO DE VENTAS-->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafico de ventas</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="ventas_grafica"></canvas>
                        </div>
                    </div>
                </div>

                <!--RESUMEN DE COMPRAS DEL AÑO-->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Resumen de compras del año <?php echo date("Y"); ?></h4>
                        </div>
                        <div class="card-body">
                            <canvas id="resumen_compras"></canvas>
                        </div>
                    </div>
                </div>
                <!--RESUMEN DE VENTAS DEL AÑO-->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Resumen de ventas del año <?php echo date("Y"); ?></h4>
                        </div>
                        <div class="card-body">
                            <canvas id="resumen_ventas"></canvas>
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
<!-- JS Libraies -->

<script src="assets/extensions/chartjs/chart.min.js"></script>
<script src="assets/extensions/jquery.sparkline.min.js"></script>
<script src="Views/modules/scripts/graphics.js"></script>



<?php
}
ob_end_flush();
?>