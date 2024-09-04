<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DIESEL GUZMAN</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("assets/img/logo/camione.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        #auth {
            display: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #auth-left {
            width: 700px; 
            padding: 110px;
           
            border-radius: 50px;
        }

        .form-group {
            position: relative;
        }

        .form-control-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
        }

        .auth-title {
            text-align: center;
        }

        .mt-5 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">DIESEL GUZMAN</h1>
                    <form method="POST" action="" id="formAcceso" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-xl" placeholder="Usuario" name="nombre"
                                id="nombre">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="clave" id="clave" class="form-control form-control-xl"
                                placeholder="Contraseña">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Ingresar</button>
                    </form>
                    <div class="mt-5">
                    <p style="color: #000000;">Sistema de ventas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Contenido del lado derecho (si lo tienes) -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script src="Views/modules/scripts/login.js"></script>

    <script src="assets/js/sweetalert.min.js"></script>
</body>

</html>
