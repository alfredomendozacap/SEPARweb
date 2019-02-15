
  <!-- ------------- SECCION DE NOTICIAS -------------  -->
  <main class="main__separ container py-4 my-4">
      <section class="row">
          <article class="col-md-8 col-12">
              <h4 class="pb-3 mb-4 border-bottom font-weight-light">NOTICIAS</h4>
              <?php
                $showInfo = $this->mostrarInfoNoticia($_GET['slug']);
                if($showInfo === false){
                  echo '<div class="news__alert alert alert-danger text-center">NO SE PUEDE ENCONTRAR LA NOTICIA</div>';
                }else{
                  $cImages = $this->mostrarImagenes($showInfo['id'],'c');
                  $secondaryImages = '';
                  if (!$cImages) {
                    $secondaryImages = '<div class="news__alert alert alert-info text-center">No se agregaron más imágenes</div>';
                  } else {
                    for ($i = 0; $i < count($cImages); $i++) {
                      $secondaryImages .= '
                          <div class="img-secondary carousel-item'.(($i == 0) ? ' active' : '' ).'" data-toggle="modal" data-target="#modal_'.$i.'">
                              <img src="../coverPage/'.$showInfo['slug'].'/'.$cImages[$i]['image'].'" class="img__carousel d-block w-100 h-100" alt="'.$cImages[$i]['image'].'">
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="modal_'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel_'.$i.'" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                    <img src="../coverPage/'.$showInfo['slug'].'/'.$cImages[$i]['image'].'" class="img-fluid" alt="'.$cImages[$i]['image'].'">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
  
                      ';
                    }
                  }

                  $pImage = $this->mostrarImagenes($showInfo['id'],'p');
                  $separNews = <<<SEPARNEWS
                    <div class="news__separ">
                      <h3 class="news__title font-weight-bold">{$showInfo['title']}</h3>
                      <p class="news__date text-muted mb-2">Fecha de Publicación: {$showInfo['created_at']}</p>
                      <div class="row justify-content-center flex-column align-items-center">
                          <div class="col-12">
                              <figure class="mb-0">
                                  <img class="figure-img img-fluid mb-0" src="../coverPage/{$showInfo['slug']}/{$pImage['image']}">
                              </figure>
                          </div>
                          <div class="col-12 my-3">
                              <p class="news__content flex-grow-1">{$showInfo['content']}</p>
                          </div>
                          <div class="col-12">
                              <h4 class="pb-3 mb-4 border-bottom font-weight-light text-uppercase">Más Imágenes</h4>
                              <div id="carouselsecondaryImages" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                  {$secondaryImages}
                                </div>
                                <a class="carousel-control-prev" href="#carouselsecondaryImages" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselsecondaryImages" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                              </div>
                          </div>
                      </div>
                    </div>
SEPARNEWS;
                  echo $separNews;
                }
              ?>
              
          </article>
          <?php require_once 'views/pages/aside.php'; ?>
      </section>
  </main>
  <!-- ------------- SECCION DE NOTICIAS -------------  -->
