	<!-- ------------- SECCION DE NOTICIAS -------------  -->
	<main class="main__separ container py-4 my-4">
			<section class="row">
					<article class="col-md-8 col-12">
							<h3 class="pb-3 mb-4 border-bottom font-weight-bold"><?php echo HEADER_TITLE; ?></h3>

							<?php
								$showNews = MainController::mostrarNoticias();

								foreach ($showNews as $key => $row) {
									
									$image = MainController::mostrarImagenes($row['id'],'p');
									$summary = limitarTexto($row['content'],450);
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
															<p class="flex-grow-1">{$summary}</p>
															<a href="news/{$row['slug']}" class="btn btn-outline-dark">Leer Más</a>
													</div>
											</div>
									</div>
CARDNEWS;
									echo $cardNews;
								}
							?>
					</article>
          			<?php require_once 'views/pages/aside.php'; ?>					
			</section>
	</main>
	<!-- ------------- SECCION DE NOTICIAS -------------  -->