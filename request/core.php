<?php 

class Core{

	private function routeCore(){
		
		$page = (isset($_GET['page'])) ? $_GET['page'] : 'main';

		$data = array(
			'main' => array('model' => 'Main','view' => 'index', 'controller' => 'MainController'),
			'error' => array('view' => 'errorPage', 'controller' => 'MainController'),
			'news' => array('model' => 'Main','view' => 'news','controller' => 'MainController'),
			'mision-vision' => array('view' => 'mision_vision', 'controller' => 'FilosofiaController'),
			'principios-valores' => array('view' => 'principios_valores', 'controller' => 'FilosofiaController'),
			'enfoques' => array('view' => 'enfoques', 'controller' => 'FilosofiaController'),
			'quienes-somos' => array('view' => 'quienes_somos', 'controller' => 'QuienesSomosController'),
			'estructura' => array('view' => 'estructura', 'controller' => 'OrganizacionController'),
			'inclusion-social-politica' => array('view' => 'inclusion_social_politica', 'controller' => 'ProgramasController'),
			'competitividad-territorial' => array('view' => 'competitividad_territorial', 'controller' => 'ProgramasController'),
			'cambio-climatico-gestion-ambiental' => array('view' => 'cambio_climatico_gestion_ambiental', 'controller' => 'ProgramasController'),
			'proyectos' => array('view' => 'proyectos', 'controller' => 'PublicacionesController'),
			'publicaciones' => array('view' => 'publicaciones', 'controller' => 'PublicacionesController'),
			'contacto' => array('view' => 'contacto', 'controller' => 'ContactoController'),
			'dashboard' => array('model' => 'Admin','view' => 'dashboard', 'controller' => 'AdminController'),
			'publish' => array('model' => 'Admin','view' => 'publish', 'controller' => 'AdminController'),
			'login' => array('model' => 'User','view' => 'login', 'controller' => 'UserController'),
			'register' => array('model' => 'User','view' => 'register', 'controller' => 'UserController')
		);
		
		foreach ($data as $key => $components) {
			if (array_key_exists($page, $data)){
				if ($page == $key) {
					$controller = $components['controller'];
					$view = $components['view']; 
					break;
				}
			}else{
				$controller = 'MainController';
				$view = 'errorPage'; 
				break;
			}
		}

		$controllerPath = 'controllers/'.$controller.'.php';
		if (is_file($controllerPath)) {
			require_once $controllerPath;
			$object = new $controller();
			$object -> {$view}();
		}else{
			header('Location: error');
			die();
		}
	}

	public function routeAvailable(){
		$this->routeCore();
	}
}