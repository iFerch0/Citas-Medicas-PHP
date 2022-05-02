<?php
switch ($accion) {
    case '0':
        if(isset($_GET["error"])){
            $error =  "Datos de autenticación incorrectos";
        }else if(isset($_GET["ok"])){
                $error =  "Se ha registrado correctamente, revise su correo para activar el usuario";
        }else if(isset($_GET["check"])){
            if($_GET['check'] == "1"){
                $error =  "Registro completo";
            }else if($_GET['check'] == "2"){
                    $error =  "No se pudo completar el registro";
            }else if($_GET['check'] == "3"){
                $error =  "Se ha cambiado la contraseña";
            }else if($_GET['check'] == "4"){
                $error =  "La peticion de restaurar la contraseña ha sido enviada a su correo";
            }
        }
       require_once "public/login.php";exit();
        break;
    case 'entrar':
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $resp = $model->login ($usuario);
        if(isset($resp['password'])){
            if(checkPass($password,$resp['password'])){

                $_SESSION["user_activo"] = $usuario;
                $rol = $model->getRol($usuario);
                $_SESSION["menu"] = $rol['menu'];
                $_SESSION['id_usuario'] = $rol['id_usuario'];
                $permisos = $model->getPermisos($rol['id_rol']);
                $_SESSION['permisos'] = array();
                foreach ($permisos as $row) {
                    $_SESSION['permisos'][$row['ruta']][$row['accion']] = 1;
                }
                header("Location:index.php");
                
            }else{
                header("Location:index.php?ruta=login&error=1");    
            }
        }else{
            header("Location:index.php?ruta=login&error=1");
        }
        break;
    case 'salir':
        if(isset($_SESSION["user_activo"])){
            $_SESSION["user_activo"] = "";
            session_destroy();
        }
        header("Location:index.php");
        break;
    case 'registro':
        $datos = array();
        $msj = "";
        if(isset($_POST["guardar"])){
            $datos['usuario'] = $_POST["identificacion"];
            $datos['password'] = $_POST["password"];
            $password2 = $_POST["password2"];
            $datos['email'] = $_POST["email"];
            if($datos['password']==$password2){
                require_once "modelos/usuariosModelo.php";
                $users = new usuariosModelo();
                if($users->checkEmail($datos)){
                    $datos["token"] = $users->randomString();
                    $datos['password'] = $users->genPass($datos['password']);
                    $datos['id_rol'] = '2';
                    $id_usuario = $users->newUsuario($datos);
                    if($id_usuario!=false){
                        $datos['identificacion'] = $_POST["identificacion"];
                        $datos['nombres'] = $_POST["nombres"];
                        $datos['apellidos'] = $_POST["apellidos"];
                        $datos['id_usuario'] = $id_usuario;
                        require_once "modelos/estudiantesModelo.php";
                        $est = new estudiantesModelo();
                        if($est->newEstudiant($datos)){
                            $datos['msg'] = "Para activar su usuario ingrese a este link: http://uaesunicor.ml/index.php?ruta=login&accion=verificar&token=$datos[token]";
                            $users->sendEmail($datos);
                            header("Location:index.php?ruta=login&ok=1");
                        }else{
                            $msj = "Ocurrio un error al guardar";
                        }
                    }else{
                        $msj = "Ocurrio un error al guardar";
                    }
                }else{
                    $msj = "Ya existe un usuario con este correo";
                }
            }else{
                $msj = "Las contraseñas no coinciden";
            }
        }
        require_once "public/registro.php";exit();
        break;
        case 'verificar':
        if(isset($_GET["token"])){
            $datos['token'] = $_GET["token"];
            require_once "modelos/usuariosModelo.php";
            $users = new usuariosModelo();
            if($users->checkToken($datos)){
                header("Location:index.php?ruta=login&check=1");
            }else{
                header("Location:index.php?ruta=login&check=2");    
            }
        }else{
            header("Location:index.php?ruta=login&check=2");
        }
        break;
        case 'olvide':
            $msj = "";
            if(isset($_POST["guardar"])){
                require_once "modelos/usuariosModelo.php";
                $datos['email'] = $_POST['email'];
                $users = new usuariosModelo();
                if(!$users->checkEmail($datos)){
                    $temp = $users->getToken($datos);
                    $datos["token"] = $temp['token'];
                    $datos['msg'] = "Para restablecer la contraseña ingrese a este link: http://uaesunicor.ml/index.php?ruta=login&accion=restablecer&token=$datos[token]";
                    $users->sendEmail($datos);
                    header("Location:index.php?ruta=login&check=4");
                }else{
                    $msj = "No existe un usuario con este correo";
                }
            }
            require_once "public/olvide.php";exit();

        break;

        case 'restablecer':
            $datos = array();
            require_once "modelos/usuariosModelo.php";
            $users = new usuariosModelo();
            
            if(isset($_POST["guardar"])){
                $datos['password'] = $_POST["password"];
                $password2 = $_POST["password2"];
                $datos['email'] = $_POST["email"];
                if($datos['password']==$password2){
                    $datos['password'] = $users->genPass($datos['password']);
                    if($users->updatePass($datos)){
                        header("Location:index.php?ruta=login&check=3");
                    }else{
                        $msj = "Ocurrio un error al guardar";
                    }
                }else{
                    $msj = "Las contraseñas no coinciden";
                }
                $email = $datos['email'];
                require_once "public/restablecer.php";exit();
            }

            if(isset($_GET["token"])){
                $datos['token'] = $_GET["token"];
                $temp = $users->getEmail($datos);
                $email = $temp['email'];
                require_once "public/restablecer.php";exit();
            }else{
                header("Location:index.php");
            }
        break;
    }

    function checkPass($pass,$hash){
        if (password_verify($pass, $hash)) {
            return true;
        } else {
            return false;
        }
    }
?>
