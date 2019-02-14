<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <!-- TEMA PRINCIPAL -->
    <link href="assets/admin/css/colorTheme.css" id="theme" rel="stylesheet">
    <!-- SWEET ALERT -->
    <script src="assets/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>
<body>
    <?php
        if (empty($_SESSION['key'])) {
            $_SESSION['key'] = bin2hex(random_bytes(32));
        }
        # Token
        $csrf = hash_hmac('sha256', 'registro.php', $_SESSION['key']);
    ?>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form method="POST" class="form-horizontal form-material" id="loginform">
                    <h3 class="box-title m-b-20 text-center">Login SEPAR</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="userEmail" class="form-control" type="text" required="" placeholder="Usuario"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password" class="form-control" type="password" required="" placeholder="Contraseña"> </div>
                    </div>
                    <div class="form-group mt-3 text-center m-t-20">
                        <div class="col-xs-12">
                            <button name="ingresar" class="btn btn-themecolor btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                        </div>
                    </div>
                    <input type="hidden" name="csrf" value="<?php echo $csrf;?>">
                </form>
                <?php
                    $this->signIn();
                ?>
            </div>
          </div>
        </div>
        
    </section>
