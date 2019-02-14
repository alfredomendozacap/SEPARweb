    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Registrar Admins</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Registrar Administradores</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Registro de nuevos Administradores</h3>
                    <p class="card-text text-danger">Rellene todos los campos para registrar un nuevo <b>Admin</b>.</p>
                    <form id="form_register" class="form-material mt-5" method="post">
                        <div class="row">    
                            <div class="col-lg-6 col-12 form-group">
                                <label for="fist_name">Nombres</label>
                                <input id="first_name" name="first_name" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <label for="last_name">Apellidos</label>
                                <input id="last_name" name="last_name" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <label for="password">Contraseña</label>
                                <input id="password" name="password" class="form-control" type="password" require>
                            </div>
                            <div class="col-12 form-group">
                                <button type="submit" name="registrar" class="btn btn-lg btn-block btn-themecolor"><i class="fa fa-check"></i> Registrar</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        $this->signUp();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 pl-0">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Administradores Registrados</h3>
                    <p class="card-text text-themecolor">Acá se muestra a todos los Administradores</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Correo Electrónico</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $verAdmins = $this->obtenerAdmins();
                                foreach ($verAdmins as $key => $row) {
                                    $indice = $key +1;
                                    $Admin =<<<ADMIN
                                    <tr>
                                        <td>{$indice}</td>
                                        <td class="text-themecolor" style="font-weight: bold;">{$row['email']}</td>
                                        <td>{$row['first_name']}</td>
                                        <td>{$row['last_name']}</td>
                                    </tr>
ADMIN;
                                    echo $Admin;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>