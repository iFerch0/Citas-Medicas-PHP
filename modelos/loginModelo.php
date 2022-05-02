<?php
class loginModelo extends padreModelo{

    public function Login($usuario){
        global $bd;
        $result = $bd->query("SELECT password FROM usuarios WHERE usuario='$usuario' AND verificado='1'");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
?>
