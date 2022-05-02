<?php
switch ($accion) {
    case "0":
        $msj = "";
        $data = $model->index();
        $view = "usuarios";
        break;
    case "nuevo":
        $datos = array();
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos["usuario"] = $_POST["usuario"];
            $datos["password"] = $_POST["password"];
            $datos["email"] = $_POST["email"];

            if($model->newUsuario($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
        }
        $view = "nuevoUsuario";
        break;
    case "editar":
        $datos = array();
        $msj = "";
        $data = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            $data = $model->showUsuario($datos);
            $view = "editarUsuario";
        }else{
            $msj = "Nada que editar";
            $data = $model->index();
            $view = "usuarios";
        }
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["usuario"] = $_POST["usuario"];
            $datos["password"] = $_POST["password"];
            $datos["email"] = $_POST["email"];

            if($model->editUsuario($datos)){
                $msj = "Guardado Exitosamente";
            }else{
                $msj = "Ocurrio un error al guardar";
            }
            $data = $model->index();
            $view = "usuarios";
        }
        break;
    case "eliminar":
        $datos = array();
        $msj = "";
        if(isset($_GET["id"])){
            $datos["id"] = $_GET["id"];
            if($model->deleteUsuario($datos)){
                $msj = "Eliminado Exitosamente";
            }else{
                $msj = "No se pudo eliminar";
            }
        }else{
            $msj = "Nada que eliminar";
        }
        $data = $model->index();
        $view = "usuarios";
        break;
    case "cuenta":
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos["id"] = $_POST["id"];
            $datos["password"] = $_POST["password"];
            $datos["password2"] = $_POST["password2"];
            if($datos["password"]==$datos["password2"]){
                $datos['password'] = $model->genPass($datos['password']);
                if($model->changePass($datos)){
                    $msj = "Guardado Exitosamente";
                }else{
                    $msj = "Ocurrio un error al guardar";
                }
            }else{
                $msj = "No coinciden";
            }
        }
        $data['id'] = $_SESSION['id_usuario'];
        $view = "cuenta";
        break;
    }
?>