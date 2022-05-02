<?php
session_start();

require 'config/central.php';
require 'modelos/padreModelo.php';

$padrem=new padreModelo();
if($padrem->verificarSesion()){
    $bd = $padrem->conectarBaseDatos();
    require_once 'controles/kernel.php';
}else{
    require_once 'public/login.php';
}
?>
