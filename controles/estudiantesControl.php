<?php
switch ($accion) {
    case "0":
        $msj = "";
        $data = $model->index();
        $view = "estudiantes";
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
                $datos['id_rol'] = '2';
                $datos["token"] = $users->randomString();
                $datos['password'] = $users->genPass($datos['password']);
                $id_usuario = $users->newUsuario($datos);
                if($id_usuario!=false){
                    $datos['id_usuario'] = $id_usuario;
                    $datos["nombres"] = $_POST["nombres"];
                    $datos["apellidos"] = $_POST["apellidos"];
                    $datos["identificacion"] = $_POST["identificacion"];
                    if($model->newEstudiant($datos)){
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
        $view = "nuevoEstudiant";
        break;
    case "editar":
        $datos = array();
        $msj = "";
        $data = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            $data = $model->showEstudiant($datos);
            $view = "editarEstudiant";
        }else{
            $msj = "Nada que editar";
            $data = $model->index();
            $view = "estudiantes";
        }
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["nombres"] = $_POST["nombres"];
            $datos["apellidos"] = $_POST["apellidos"];
            $datos["identificacion"] = $_POST["identificacion"];

            if($model->editEstudiant($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
            $data = $model->index();
            $view = "estudiantes";
        }
        break;
    case "eliminar":
        $datos = array();
        $msj = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            if($model->deleteEstudiant($datos)){
                $msj = "Eliminado Exitosamente";
            }else{
                $msj = "No se pudo eliminar";
            }
        }else{
            $msj = "Nada que eliminar";
        }
        $data = $model->index();
        $view = "estudiantes";
        break;
    }
?>