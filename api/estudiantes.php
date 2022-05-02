<?phpheader("Access-Control-Allow-Origin: *");header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");header("Access-Control-Allow-Headers: X-API-data, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
require '../config/central.php';require '../modelos/padreModelo.php';require '../modelos/estudiantesModelo.php';
$padrem=new padreModelo();
$accion = filter_input(INPUT_POST,"accion",FILTER_SANITIZE_STRING);$nombre = filter_input(INPUT_POST,"nombre",FILTER_SANITIZE_STRING);
    switch ($accion) {        case 'getEstudiantes':			if ( isset($nombre) ) {				$bd = $padrem->conectarBaseDatos();
				$obj = new estudiantesModelo();
				echo json_encode($obj->getPorNombre($nombre));


			}else{				$bd=$padrem->conectarBaseDatos();
				$obj = new estudiantesModelo();
				echo json_encode($obj->index);
			}            break;
    }?>