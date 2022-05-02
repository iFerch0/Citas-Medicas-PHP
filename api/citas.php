<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-data, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
 
require '../config/central.php';
require '../modelos/padreModelo.php';
require '../modelos/citasModelo.php';

$padrem=new padreModelo();

$accion = filter_input(INPUT_POST,"accion",FILTER_SANITIZE_STRING);

    switch ($accion) {
        case 'getCitasUsuarioEstudiante':
            $id_estudiante = $_POST['id_estudiante'];
            $bd = $padrem->conectarBaseDatos();
            $obj = new citasModelo();
            echo json_encode($obj->index($id_estudiante));
            break;
        case 'getCitasMedico':
            $id_medico = $_POST['id_medico'];
            $bd = $padrem->conectarBaseDatos();
            $obj = new citasModelo();
            echo json_encode($obj->index_medicos($id_medico));
            break;
    }

?>