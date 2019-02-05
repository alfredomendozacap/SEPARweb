	<!-- ------------- SECCION DE NOTICIAS -------------  -->
	<main class="main__separ container py-4 my-4">
			<section class="row">
					<article class="col-md-8 col-12">
							<h3 class="pb-3 mb-4 border-bottom font-weight-bold"><?php echo HEADER_TITLE; ?></h3>

							<?php
								$showNews = MainController::mostrarNoticias();

								foreach ($showNews as $key => $row) {
									
									$image = MainController::mostrarImagenes($row['id'],'p');

									$cardNews = <<<CARDNEWS
										<div class="news__separ border-bottom pb-4 mb-4">
											<h4 class="mb-1"><a class="text-dark" href="news/{$row['slug']}">{$row['title']}</a></h4>
											<p class="text-muted mb-2">Publicado el: {$row['created_at']}</p>
											<div class="row justify-content-center">
													<div class="col-12 col-lg-5">
															<figure class="figure mb-0">
																<a href="news/{$row['slug']}">
																	<img class="figure-img img-fluid mb-0" src="coverPage/{$row['slug']}/{$image['image']}">
																</a>
															</figure>
													</div>
													<div class="col-12 col-lg-7 d-flex flex-column border__summary mt-3 m-lg-0">
															<p class="flex-grow-1">{$row['summary']}</p>
															<a href="news/{$row['slug']}" class="btn btn-outline-dark">Leer Más</a>
													</div>
											</div>
									</div>
CARDNEWS;
									echo $cardNews;
								}
							?>
					</article>
					<aside class="bg-sandy pt-3 col-md-4 mt-5 mt-md-0 col-12">
							<div class="p-3 mb-3 bg-light rounded">
									<h4>SEPAR</h4>
									<p class="mb-0">Etiam porta mollis euismod. Cras mattis consectetur purus sit amet
											fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
							</div>
							
							<div class="p-3">
									<h4 class="font-italic">Archivos</h4>
									<ol class="list-unstyled mb-0">
											<li><a class="link" href="#">Marzo 2019</a></li>
											<li><a class="link" href="#">Febrero 2019</a></li>
											<li><a class="link" href="#">Enero 2019</a></li>
											<li><a class="link" href="#">Deciembre 2018</a></li>
											<li><a class="link" href="#">Noviembre 2018</a></li>
											<li><a class="link" href="#">Octubre 2018</a></li>
											<li><a class="link" href="#">Septiembre 2018</a></li>
											<li><a class="link" href="#">Agosto 2018</a></li>
											<li><a class="link" href="#">Julio 2018</a></li>
											<li><a class="link" href="#">Junio 2018</a></li>
											<li><a class="link" href="#">Mayo 2018</a></li>
											<li><a class="link" href="#">Abril 2018</a></li>
									</ol>
							</div>
							
							<div class="p-3">
									<h4 class="font-italic">Redes</h4>
									<ol class="list-unstyled">
											<li><a class="link" href="#">Youtube</a></li>
											<li><a class="link" href="#">Twitter</a></li>
											<li><a class="link" href="#">Facebook</a></li>
									</ol>
							</div>
					</aside>
			</section>
	</main>
	<!-- ------------- SECCION DE NOTICIAS -------------  -->