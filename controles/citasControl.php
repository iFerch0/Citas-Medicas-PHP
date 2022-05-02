<?php
switch ($accion) {
    case "0":
        $msj = "";
        $data = $model->index();
        $view = "citas";
        break;
    case "mias":
        $msj = "";
        $data = $model->index($_SESSION['id_usuario']);
        $view = "citas_mias";
        break;
    case "medicos":
        $msj = "";
        if(isset($_GET['id'])&&$_GET['id'] != ""){
            $id = $_GET['id'];
        }else{
            $id = null;
        }
        $data = $model->index_medicos($id);
        $view = "citas_medicos";
        break;
    case "nuevo":
        $datos = array();
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos["tipo"] = $_POST["tipo"];
            $datos["fecha"] = $_POST["fecha"];
            $datos["hora"] = $_POST["hora"];
            $datos["id_medico"] = $_POST["id_medico"];
            $datos["id_estudiante"] = $_POST["id_estudiante"];
            if($model->checkHorario($datos)){
                if($model->checkCitasSemestre($datos)){
                    if($model->newCita($datos)){
                        require_once "modelos/usuariosModelo.php";
                        $users = new usuariosModelo();
                        $datos['email'] = $users->getEmailEstudiante($datos["id_estudiante"])[0];
                        $datos['msg'] = "Se le ha agendado una nueva cita con exito para el dia: $datos[fecha] a las $datos[hora]";
                        $users->sendEmailCita($datos);
                        $msj = "Guardado Exitosamente";
                    }else{
                        $msj = "Ocurrio un error al guardar";
                    }
                }else{
                    $msj = "El estudiante ya tiene 3 citas de este tipo en el semestre seleccionado";
                }
            }else{
                $msj = "El medico se encuentra ocupado para esa fecha";
            }
        }
        require_once "modelos/medicosModelo.php";
        $obj = new medicosModelo();
        $data['medicos'] = $obj->index();
        require_once "modelos/estudiantesModelo.php";
        $obj = new estudiantesModelo();
        $data['estudiantes'] = $obj->index();
        $data['tipos'] = $model->getCitasTipos();
        $view = "nuevoCita";
        break;
    case "agendar":
        $datos = array();
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos["tipo"] = $_POST["tipo"];
            $datos["fecha"] = $_POST["fecha"];
            $datos["hora"] = $_POST["hora"];
            $datos["id_medico"] = $_POST["id_medico"];
            $datos["id_estudiante"] = $_POST["id_estudiante"];

            if($model->checkHorario($datos)){
                if($model->checkCitasSemestre($datos)){
                    if($model->newCita($datos)){
                        require_once "modelos/usuariosModelo.php";
                        $users = new usuariosModelo();
                        $datos['email'] = $users->getEmailUsuario($_SESSION['id_usuario'])[0];
                        $datos['msg'] = "Se le ha agendado una nueva cita con exito para el dia: $datos[fecha] a las $datos[hora]";
                        $users->sendEmailCita($datos);
                        $msj = "Guardado Exitosamente";
                    }else{
                        $msj = "Ocurrio un error al guardar";
                    }
                }else{
                    $msj = "El estudiante ya tiene 3 citas de este tipo en el semestre seleccionado";
                }
            }else{
                $msj = "El medico se encuentra ocupado para esa fecha";
            }
        }
        require_once "modelos/medicosModelo.php";
        $obj = new medicosModelo();
        $data['medicos'] = $obj->index();
        require_once "modelos/estudiantesModelo.php";
        $obj = new estudiantesModelo();
        $datos['id_usuario'] = $_SESSION['id_usuario'];
        $data['estudiantes'] = $obj->getIdEstudiant($datos);
        $data['tipos'] = $model->getCitasTipos();
        $view = "agendarCita";
        break;
    case "editar":
        $datos = array();
        $msj = "";
        $data = array();
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            $data['cita'] = $model->showCita($datos);
            require_once "modelos/medicosModelo.php";
            $obj = new medicosModelo();
            $data['medicos'] = $obj->index();
            require_once "modelos/estudiantesModelo.php";
            $obj = new estudiantesModelo();
            $data['estudiantes'] = $obj->index();
            $data['tipos'] = $model->getCitasTipos();
            $view = "editarCita";
        }else{
            $msj = "Nada que editar";
            $data = $model->index();
            $view = "citas";
        }
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["tipo"] = $_POST["tipo"];
            $datos["fecha"] = $_POST["fecha"];
            $datos["hora"] = $_POST["hora"];
            $datos["id_medico"] = $_POST["id_medico"];
            $datos["id_estudiante"] = $_POST["id_estudiante"];

            if($model->editCita($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
            $data = $model->index();
            $view = "citas";
        }
        break;
    case "observaciones":
        $datos = array();
        $msj = "";
        $data = array();
        if(isset($_GET[ "id"])){
            $datos["id"] = $_GET["id"];
            $data['cita'] = $model->showCita($datos);
            $view = "observacionesCita";
        }else{
            $msj = "No hay cita seleccionada";
            $data = $model->index_medicos();
            $view = "citas_medicos";
        }
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["observaciones"] = $_POST["observaciones"];

            if($model->editObservacionCita($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
            $data = $model->index_medicos();
            $view = "citas_medicos";
        }
        break;
    case "eliminar":
        $datos = array();
        $msj = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            if($model->deleteCita($datos)){
                $msj = "Eliminado Exitosamente";
            }else{
                $msj = "No se pudo eliminar";
            }
        }else{
            $msj = "Nada que eliminar";
        }
        $data = $model->index();
        $view = "citas";
        break;
    }
?>