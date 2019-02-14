<?php
require_once 'models/Main.php';
require_once 'helpers/helps.php';

class MainController
{

	// PÁGINA ERROR
	public function errorPage()
	{
		include_once 'views/includes/head.php';
		require_once 'views/pages/error.php';
		include_once 'views/includes/scripts.php';
	}

	// SECCIÓN INDEX
	public function index()
	{	
		include_once 'views/includes/head.php';
		include_once 'views/includes/header.php';
		include_once 'views/includes/slider.php';
		define('HEADER_TITLE','NOTICIAS');
		require_once 'views/pages/main.php';
		include_once 'views/includes/footer.php';
		include_once 'views/includes/scripts.php';
	}

	public static function mostrarNoticias()
	{
		$noticias=Main::getAllNews();
		return $noticias;
	}

	public static function mostrarImagenes($id,$relevance)
	{
		$noticias=Main::getMainImage($id,$relevance);
		return $noticias;
	}

	// SECCIÓN NEWS
	public function news()
	{
		include_once 'views/includes/head.php';
		if(isset($_GET['slug'])) {
			include_once 'views/includes/header.php';
			require_once 'views/pages/news.php';
			include_once 'views/includes/footer.php';
		}else{
			header('Location: error');
		}
		include_once 'views/includes/scripts.php';
	}

	public static function mostrarInfoNoticia($slug)
	{
		$info = Main::getNews($slug);
		return $info;
	}
}
