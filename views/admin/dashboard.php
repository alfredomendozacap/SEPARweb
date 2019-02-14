
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Noticias</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Noticias Publicadas</li>
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
                    <h3 class="text-danger"><b>Noticias</b> Publicadas Recientemente</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Subtítulo</th>
                                    <th>Contenido</th>
                                    <th>
                                        Fecha de Creación <small>(año-mes-día)</small>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $noticias = $this->obtenerNoticias();
                                foreach ($noticias as $key => $news) {
                                    $contenido = limitartexto($news['content'],50);
                                    $indice = $key + 1;
                                    $noticia = <<<NEWS
                                    <tr>
                                        <td>{$indice}</td>
                                        <td style="font-weight: bold;"><a href="news/{$news['slug']}" target="_blank">{$news['title']}</a></td>
                                        <td>{$news['subtitle']}</td>
                                        <td>{$contenido}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> {$news['created_at']}</span> </td>
                                    </tr>
NEWS;
                                    echo $noticia;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
