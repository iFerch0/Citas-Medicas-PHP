<?php
switch ($accion) {
    case "0":
        $msj = "";
        $data = $model->index();
        $view = "medicos";
        break;
    case "listar":
        $msj = "";
        $data = $model->index();
        $view = "medicos_lista";
        break;
    case "nuevo":
        $datos = array();
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos['usuario'] = $_POST["identificacion"];
            $datos['password'] = $_POST["identificacion"];
            $datos['email'] = $_POST["email"];
            require_once "modelos/usuariosModelo.php";
            $users = new usuariosModelo();
            if($users->checkEmail($datos)){
                $datos['id_rol'] = '3';
                $datos["token"] = $users->randomString();
                $datos['password'] = $users->genPass($datos['password']);
                $id_usuario = $users->newUsuario($datos);
                if($id_usuario!=false){
                    $datos['id_usuario'] = $id_usuario;
                    $datos["nombres"] = $_POST["nombres"];
                    $datos["apellidos"] = $_POST["apellidos"];
                    $datos["identificacion"] = $_POST["identificacion"];
                    $datos["id_consultorio"] = $_POST["id_consultorio"];
                    $datos["tipo"] = $_POST["tipo"];
                    if($model->newMedico($datos)){
                        $datos['msg'] = "Para activar su usuario ingrese a este link: http://uaesunicor.ml/index.php?ruta=login&accion=verificar&token=$datos[token]";
                        $users->sendEmail($datos);
                        $msj = "Guardado Exitosamente";
                    }else{
                        $msj = "Ocurrio un error al guardar";
                    }
                }else{
                    $msj = "Ocurrio un error al guardar";
                }
            }else{
                $msj = "Ya existe un usuario con este correo";
            }
        }
        $data['tipos'] = $model->getMedicosTipos();
        $data['consultorios'] = $model->getConsultorios();
        $view = "nuevoMedico";
        break;
    case "editar":
        $datos = array();
        $msj = "";
        $data = array();
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            $data['medico'] = $model->showMedico($datos);
            $data['tipos'] = $model->getMedicosTipos();
            $data['consultorios'] = $model->getConsultorios();
            $view = "editarMedico";
        }else{
            $msj = "Nada que editar";
            $data = $model->index();
            $view = "medicos";
        }
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["nombres"] = $_POST["nombres"];
            $datos["apellidos"] = $_POST["apellidos"];
            $datos["identificacion"] = $_POST["identificacion"];
            $datos["id_consultorio"] = $_POST["id_consultorio"];
            $datos["tipo"] = $_POST["tipo"];

            if($model->editMedico($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
            $data = $model->index();
            $view = "medicos";
        }
        break;
    case "eliminar":
        $datos = array();
        $msj = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            if($model->deleteMedico($datos)){
                $msj = "Eliminado Exitosamente";
            }else{
                $msj = "No se pudo eliminar";
            }
        }else{
            $msj = "Nada que eliminar";
        }
        $data = $model->index();
        $view = "medicos";
        break;
    }
?>