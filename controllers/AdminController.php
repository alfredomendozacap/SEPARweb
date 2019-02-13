<?php

    require_once 'models/News.php';
    require_once 'models/Images.php';
    require_once 'models/Administrator.php';
    require_once 'helpers/helps.php';

/**
 * Controlador del Administrador
 */
class AdminController
{
    public function login()
    {
        session_start();
        session_destroy();
        require_once 'views/admin/login.php';        
        require_once 'views/admin/scripts.php';
    }
    public function logout()
    {
        require_once 'views/admin/logout.php';        
    }
    // SECCIÓN DE FORMULARIO PARA INGRESAR AL DASHBOARD
    public function signIn()
    {
        if (isset($_POST['ingresar'])) {

            $userEmail = isset($_POST['userEmail']) ? ValidarCampo($_POST['userEmail']) : '';
            $password = isset($_POST['password']) ? ValidarCampo($_POST['password']) : '';

            if (preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $userEmail)) {

                $credencial = new Administrator();
                $credencial -> setAdmin('email',$userEmail);
                $respuesta = $credencial -> getCredentials(); 
                
                if (password_verify($password,$respuesta['password']) && $userEmail == $respuesta['email']) {
                    echo '<div class="alert alert-success text-center">
							Bienvenido al Dashboard.
							</div>';
                    session_start();
                    $_SESSION['nombre'] = $respuesta['first_name'];
                    $_SESSION['apellido'] = $respuesta['last_name'];
                    $_SESSION['email'] = $respuesta['email'];
                    $_SESSION['rol'] = $respuesta['rol'];
                    header('Location: dashboard');
                    die();
                }else{
                    // $_SESSION['error'] = "Usuario y contraseña";
                    // header('Location: login');
                    echo '<script type="text/javascript">
						swal({
							type: "error",
							title: "¡El correo o la contraseña son incorrectos!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "login"
							}
						});
					</script>';
                }
            } else {
                echo '<script type="text/javascript">
						swal({
							type: "error",
                            title: "¡El Correo y la contraseña no debe estar vacíos!",
                            text: "Ambos tiene que estar en el formato correcto",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "login"
							}
						});
					</script>';
            }

        }
    }
    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: login');
            die();
        }else{
            require_once 'views/admin/bars.php';
            require_once 'views/admin/dashboard.php';
            require_once 'views/admin/footer.php';
            require_once 'views/admin/scripts.php';
        }
    }
    public function publish()
    {        
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: login');
            die();
        }else{
            require_once 'views/admin/bars.php';
            require_once 'views/admin/publish.php';
            require_once 'views/admin/footer.php';
            require_once 'views/admin/scripts.php';
        }
    }
    // SECCIÓN DE FORMULARIO PARA PUBLICAR
    public function crearNoticia()
    {
        if (isset($_POST['submit'])) {
            $title = (isset($_POST['title'])) ?  trim($_POST['title']) : '';
            $subtitle = (isset($_POST['subtitle'])) ? trim($_POST['subtitle']) : '';
            $summary = (isset($_POST['summary'])) ? trim($_POST['summary']) : '';
            $content = (isset($_POST['content'])) ? trim($_POST['content']) : ''; 

            if (!empty($title) || !empty($subtitle) || !empty($summary) || !empty($content)){
                
                $data = array(
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'summary' => $summary,
                    'content' => $content,
                    'created_at' => $this->definirFecha(),
                    'slug' => $this->crearSlug($title)
                );
    
                $newNews = new News();
                foreach ($data as $key => $row) {
                    $newNews -> setNews($key,$row);
                }
    
                // SECCION DE SUBIR IMAGEN
                if (isset($_FILES['coverPage'])) {
                    // convertir en nuevo array
                    $newFiles = $this->convertirArray($_FILES['coverPage']);
                    $noEntra = false;
                    if (empty($newFiles)) {
                        $noEntra=true;
                    }
    
                    // Se inserta cada Imagen a la carpeta coverPage
                    $submitFiles = $newFiles;
                    for ($i=0; $i < sizeof($newFiles); $i++) { 
                        // validar imagen
                        $respuestaImagen = $this->validarImagen($newFiles[$i],$newNews -> getNews('slug'),$noEntra);

                        if ($respuestaImagen !== false) {
                            // decodificamos el json en un array asociativo
                            $validarImagen = json_decode($respuestaImagen,true);
                            if ($validarImagen['codigo'] == 200) {
                                // se inserta la imagen en nuestra carpeta creada
                                if (move_uploaded_file($newFiles[$i]['tmp_name'],$validarImagen['archivo'])) {
                                    $rpta = true;
                                }
                            }else{
                                unset($submitFiles[$i]);
                                echo $validarImagen['mensaje'];
                                $rpta = false;
                            }
                        }else{
                            $rpta = false;
                        }
                
                    }
                }
    
                $keys = array_keys($data);
                if($newNews -> newNews($keys) && $rpta){
                    $newid = $newNews -> getId();
                    if ($this->insertarImagen($submitFiles,$newid)) {
                        echo '<script type="text/javascript">
                                swal({
                                    type: "success",
                                    title: "¡La Noticia se ha creado Correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "?page=publish"
                                    }
                                });
                            </script>';
                    }
                }else{
                    echo '<script type="text/javascript">
                            swal({
                                type: "error",
                                title: "Upps, algo salió mal",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "?page=publish"
                                }
                            });
                        </script>';
                }
            }else{
                echo '<script type="text/javascript">
                            swal({
                                type: "error",
                                title: "Por favor rellene todos los campos",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "?page=publish"
                                }
                            });
                        </script>';
            }

        }
    }
    function crearSlug($cadena)
    {
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena
        );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena
        );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena
        );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena
        );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );
        $cadena = trim($cadena);
        $cadena = strtolower(str_replace(" ", "-", $cadena));
        $cadena = preg_replace("/[^a-zA-Z0-9\_\-.]+/", "", $cadena);
        return $cadena;
    }  
    private function definirFecha()
    {
        date_default_timezone_set('America/Lima');
        return date('Y-m-d');
    }

    // SECCIÓN SUBIR IMAGEN
    private function convertirArray($postFile)
    {
        // obtenemos las llaves de los archivos enviados por POST
        $file_keys = array_keys($postFile);
        $newFiles = array();
        for ($j=0; $j < count($postFile['name']); $j++) { 
            foreach ($file_keys as $key) {
                if (empty($postFile[$key][$j]) || $postFile[$key][$j] === 0 || $postFile[$key][$j] === 4) {
                    unset($postFile[$key][$j]);
                }else{
                    if ($key == 'name') {
                        $postFile[$key][$j] = preg_replace('/[^áéíóúÁÉÍÓÚA-Za-z0-9-.]+/', '-', trim($postFile[$key][$j]));
                    }
                    $newFiles[$j][$key]=$postFile[$key][$j];
                }
            }
        }
        // Se retorna el nuevo array
        return $newFiles;
    }

    private function validarImagen($newFiles,$slug,$noEntra = false)
    {
        if ($noEntra) {
            $existDir = false;
        }else{
            // creamos nueva carpeta de publicación
            $directorio = 'coverPage/'.$slug.'/';
    
            if (!is_dir($directorio)) {
                // Si no existe esa carpeta la creamos
                $existDir = mkdir($directorio,0755);
            }else{
                $existDir = true;
            }
        }
        
        if ($existDir) {   
            // Se limpia el namePath, y se reemplaza los espacios en blanco por "-" 
            $fileName = $this->crearSlug(basename($newFiles['name']));
            // creamos string del archivo en donde guardar
            $archivo = $directorio.$fileName;
            // obtenemos el tipo de archivo
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            // validamos si es una imagen
            $validar = getimagesize(trim($newFiles['tmp_name']));
            if($validar){

                // validamos tipo de archivo
                if ($tipoArchivo !== 'jpg' && $tipoArchivo !=='png' && $tipoArchivo !=='jpeg') {
                    $respuesta['mensaje'] = 'No es un formato válido';
                    $respuesta['codigo'] = 400;
                }

                // validamos tamaño de archivo
                if($newFiles['size'] > 2000000){
                    $respuesta['mensaje'] = 'El archivo es muy grande';
                    $respuesta['codigo'] = 400;
                }

                // vemos si el archivo se repite
                if (file_exists($archivo)) {
                    $respuesta['mensaje'] = 'No lo puedes subir, El archivo ya existe';
                    $respuesta['codigo'] = 400;
                }else{
                    $respuesta['mensaje'] = 'Si es valido, lo puedes subir';
                    $respuesta['codigo'] = 200;
                    $respuesta['archivo'] = $archivo;
                }
            }else{
                $respuesta['mensaje'] = 'No es una imagen';
                $respuesta['codigo'] = 400;
            }
            // enviamos los datos por json
            return json_encode($respuesta, JSON_PRETTY_PRINT);
        }else{
            return false;
        }
    }
    private function insertarImagen($data,$id_noticia)
    {
        $imagenes = new Image();
        for ($i=0; $i < count($data); $i++) { 
            foreach ($imagenes -> getAttr() as $key) {
                if ($key === 'id_noticia') {
                    $imagenes -> setImage($i,$key,$id_noticia);
                }
                if ($key === 'image') {
                    $imagenes -> setImage($i,$key,$data[$i]['name']);
                }
                if ($key === 'relevance') {
                    if ($i === 0) {
                        $imagenes -> setImage($i,$key,'p');                  
                    }else{
                        $imagenes -> setImage($i,$key,'c');      
                    }
                }
            }
        }
        $respuesta = $imagenes -> newImages();  
        return $respuesta;
    }

    // Traer Título
    public function obtenerTitulo($title)
    {
        $titleNews = new News();
        $titleNews -> setNews('title',$title);
        return $titleNews -> getTitle();
    }
    
}