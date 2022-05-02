<?php
class estudiantesModelo extends padreModelo{

    public function index(){
        global $bd;
        $result = $bd->prepare("SELECT * FROM estudiantes");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getPorNombre($nombre){
		global $bd;
	    $result = $bd->prepare("SELECT * FROM estudiantes WHERE nombres LIKE '%". $nombre ."%'" );
		$result->execute();
	    return $result->fetchAll(PDO::FETCH_ASSOC);		
}


    public function showEstudiant($datos){
        global $bd;
        $result = $bd->prepare("SELECT * FROM estudiantes WHERE id = $datos[id] LIMIT 1");
        if($result->execute()){
            return $result->fetch();
        }else{
            return false;
        }
    }
    public function newEstudiant($datos){
        global $bd;
        $result = $bd->prepare("INSERT INTO estudiantes(id,nombres,apellidos,identificacion,id_usuario) VALUES (null,:nombres,:apellidos,:identificacion,:usuario)");
        $result->bindParam(":nombres",$datos["nombres"]);
        $result->bindParam(":apellidos",$datos["apellidos"]);
        $result->bindParam(":identificacion",$datos["identificacion"]);
        $result->bindParam(":usuario",$datos["id_usuario"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function editEstudiant($datos){
        global $bd;
        $result = $bd->prepare("UPDATE estudiantes SET nombres = :nombres,apellidos = :apellidos,identificacion = :identificacion WHERE id = :id");
        $result->bindParam(":id",$datos["id"]);
        $result->bindParam(":nombres",$datos["nombres"]);
        $result->bindParam(":apellidos",$datos["apellidos"]);
        $result->bindParam(":identificacion",$datos["identificacion"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteEstudiant($datos){
        global $bd;
        $result = $bd->prepare("DELETE FROM estudiantes WHERE id = $datos[id]");
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getIdEstudiant($datos){
        global $bd;
        $result = $bd->prepare("SELECT * FROM estudiantes WHERE id_usuario = $datos[id_usuario] LIMIT 1");
        if($result->execute()){
            return $result->fetch();
        }else{
            return false;
        }
    }
}
?>