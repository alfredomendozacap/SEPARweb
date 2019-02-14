<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Publicar Noticia</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Publicar Noticia</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
<!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Nueva Noticia</h5>
                    <p class="card-text text-danger">Rellene todos los campos para publicar la <b>Noticia</b>.</p>
                    <form id="form_publish" class="form-material" method="post" multipart enctype="multipart/form-data">
                        <div class="row">    
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="title">Título</label>
                                <input id="title" name="title" class="form-control" type="text" require>
                                <span class="help-block">
                                    <small>No debe exceder de 255 caracteres.</small>
                                </span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 form-group">
                                <label for="subtitle">Sub-Título</label>
                                <input id="subtitle" name="subtitle" class="form-control" type="text" require>
                                <span class="help-block">
                                    <small>No debe exceder de 255 caracteres.</small>
                                </span>
                            </div>
                            <div class="col-12 form-group">
                                <label for="summary">Resumen</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3" require></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label for="content">Contenido Principal</label>
                                <textarea id="content" name="content" class="form-control" rows="3" require></textarea>
                            </div>
                            <div class="col-12">
                                <div class="card card-outline-inverse">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Imagen Principal</h4>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">1° Imagen</h4>
                                        <label for="input-file-max-fs">Subir imagenes no más de 2MB</label>
                                        <input type="file" name="coverPage[]" multiple id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Imagen Complementaria</h4>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">2° Imagen</h4>
                                        <label for="input-file-max-fs">Subir imagenes no más de 2MB</label>
                                        <input type="file" name="coverPage[]" multiple id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Imagen Complementaria</h4>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">3° Imagen</h4>
                                        <label for="input-file-max-fs">Subir imagenes no más de 2MB</label>
                                        <input type="file" name="coverPage[]" multiple id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Imagen Complementaria</h4>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">4° Imagen</h4>
                                        <label for="input-file-max-fs">Subir imagenes no más de 2MB</label>
                                        <input type="file" name="coverPage[]" multiple id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">Imagen Complementaria</h4>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">5° Imagen</h4>
                                        <label for="input-file-max-fs">Subir imagenes no más de 2MB</label>
                                        <input type="file" name="coverPage[]" multiple id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <button type="submit" name="submit" class="btn btn-lg btn-block btn-themecolor"><i class="fa fa-check"></i> Publicar</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        $crearNoticia = new AdminController();
                        $crearNoticia -> crearNoticia();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->