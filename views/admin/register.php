    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Registro de nuevos Administradores</h3>
                    <p class="card-text text-danger">Rellene todos los campos para registrar un nuevo <b>Admin</b>.</p>
                    <form id="form_register" class="form-material" method="post">
                        <div class="row">    
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="fist_name">Nombres</label>
                                <input id="fist_name" name="first_name" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="last_name">Apellidos</label>
                                <input id="last_name" name="last_name" class="form-control" type="text" require>
                            </div>
                            <div class="col-12 form-group">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="password">Contraseña</label>
                                <input id="password" name="password" class="form-control" type="text" require>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="confirmPass">Confirmar Contraseña</label>
                                <input id="confirmPass" name="confirmPass" class="form-control" type="text" require>
                            </div>
                            <div class="col-12 form-group">
                                <button type="submit" name="registrar" class="btn btn-lg btn-block btn-themecolor"><i class="fa fa-check"></i> Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="index.html">
                    <h3 class="box-title m-b-20">Regístrate</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.html" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
                
            </div>
          </div>
        </div>
        
    </section>