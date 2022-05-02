<?php
class usuariosModelo extends padreModelo{

    public function index(){
        global $bd;
        $result = $bd->prepare("SELECT * FROM usuarios");
        $result->execute();
        return $result->fetchAll();
    }
    public function showUsuario($datos){
        global $bd;
        $result = $bd->prepare("SELECT * FROM usuarios WHERE id = $datos[id] LIMIT 1");
        if($result->execute()){
            return $result->fetch();
        }else{
            return false;
        }
    }
    public function newUsuario($datos){
        global $bd;
        $result = $bd->prepare("INSERT INTO usuarios(id,usuario,password,email,token) VALUES (null,:usuario,:password,:email,:token)");
        $result->bindParam(":usuario",$datos["usuario"]);
        $result->bindParam(":password",$datos["password"]);
        $result->bindParam(":email",$datos["email"]);
        $result->bindParam(":token",$datos["token"]);
        if($result->execute()){
            $datos['id_usuario'] = $bd->lastInsertId();
            if(self::addUsuarioRoles($datos)){
                return $datos['id_usuario'];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function addUsuarioRoles($datos){
        global $bd;
        $result = $bd->prepare("INSERT INTO usuarios_roles(id,id_usuario,id_rol) VALUES (null,:id_usuario,:id_rol)");
        $result->bindParam(":id_usuario",$datos["id_usuario"]);
        $result->bindParam(":id_rol",$datos["id_rol"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function editUsuario($datos){
        global $bd;
        $result = $bd->prepare("UPDATE usuarios SET usuario = :usuario,password = :password,email = :email WHERE id = :id");
        $result->bindParam(":id",$datos["id"]);
        $result->bindParam(":usuario",$datos["usuario"]);
        $result->bindParam(":password",$datos["password"]);
        $result->bindParam(":email",$datos["email"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteUsuario($datos){
        global $bd;
        $result = $bd->prepare("DELETE FROM usuarios WHERE id = $datos[id]");
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updatePass($datos){
        global $bd;
        $result = $bd->prepare("UPDATE usuarios SET password = :password WHERE email = :email");
        $result->bindParam(":password",$datos["password"]);
        $result->bindParam(":email",$datos["email"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function changePass($datos){
        global $bd;
        $result = $bd->prepare("UPDATE usuarios SET password = :password WHERE id = :id");
        $result->bindParam(":password",$datos["password"]);
        $result->bindParam(":id",$datos["id"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function checkEmail($datos){
        global $bd;
        $result = $bd->prepare("SELECT count(*) as total FROM usuarios WHERE email = '$datos[email]' LIMIT 1");
        if($result->execute()){
            $row = $result->fetch();
            if($row['total']>0){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function checkToken($datos){
        global $bd;
        $result = $bd->prepare("SELECT count(*) as total FROM usuarios WHERE token = '$datos[token]' LIMIT 1");
        if($result->execute()){
            $row = $result->fetch();
            if($row['total']>0){
                $result = $bd->prepare("UPDATE usuarios SET verificado = '1' WHERE token = '$datos[token]'");
                if($result->execute()){
                    return true;
                }else{
                    return false;    
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getToken($datos){
        global $bd;
        $result = $bd->prepare("SELECT token FROM usuarios WHERE email = :email LIMIT 1");
        $result->bindParam(":email",$datos["email"]);
        $result->execute();
        return $result->fetch();
    }

    public function getEmail($datos){
        global $bd;
        $result = $bd->prepare("SELECT email FROM usuarios WHERE token = :token LIMIT 1");
        $result->bindParam(":token",$datos["token"]);
        $result->execute();
        return $result->fetch();
    }

    public function getEmailUsuario($id_usuario){
        global $bd;
        $result = $bd->prepare("SELECT email FROM usuarios WHERE id = :id_usuario LIMIT 1");
        $result->bindParam(":id_usuario",$id_usuario);
        $result->execute();
        return $result->fetch();
    }
    public function getEmailEstudiante($id){
        global $bd;
        $result = $bd->prepare("SELECT u.email FROM usuarios u, estudiantes e WHERE e.id_usuario = u.id AND e.id = :id LIMIT 1");
        $result->bindParam(":id",$id);
        $result->execute();
        return $result->fetch();
    }

    public function genPass($pass){
        $opciones = [
            'cost' => 12,
        ];
        return password_hash($pass, PASSWORD_BCRYPT, $opciones);
    }

    public function randomString($length = 20) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    
    public function sendEmailCita($datos){
        $curl2 = curl_init();
            
        curl_setopt_array($curl2, array(
            CURLOPT_URL => "http://uaesunicor.tk/sendMail.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{  "accion" : "sendEmail", "contenido" : "'.$datos["msg"].'", "para" : "'.$datos['email'].'", "asunto" : "Informacion- Nueva Cita", "de": "registro@uaesunicor.tk" }',
            CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json"
            ),
        ));
        
        $responsec = curl_exec($curl2);
    }

    public function sendEmail($datos){
        $curl2 = curl_init();
            
        curl_setopt_array($curl2, array(
            CURLOPT_URL => "http://uaesunicor.tk/sendMail.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{  "accion" : "sendEmail", "contenido" : "'.$datos["msg"].'", "para" : "'.$datos['email'].'", "asunto" : "Registro Uaes", "de": "registro@uaesunicor.tk" }',
            CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json"
            ),
        ));
        
        $responsec = curl_exec($curl2);

        /* require_once 'librerias/phpmailer/mail.php';
        
        $to = $datos['email'];
        
        $subject = "Comfirmacion de Registro - uaesunicor.ml";
        $body = "<p>Gracias por registrarse en UAES.</p>
        <p>$datos[msg]</p>
        <p>Att: uaesunicor.ml</p>";

        $mail = new Mail();
        $mail->setFrom("registro@11776.bodis.com");
        $mail->addAddress($to);
        $mail->subject($subject);
        $mail->body($body);
        $mail->send(); 
            

        $subject  = "Registro UAES";
        $from  = "registro@uaesunicor.ml";
        $msg = wordwrap($datos['msg'],70);
        $to = $datos['email'];
        $headers = "From: $from";
        mail($to,$subject,$msg,$headers); */
    }

}
?>