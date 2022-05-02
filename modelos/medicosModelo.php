<?php
class medicosModelo extends padreModelo{

    public function index(){
        global $bd;
        $result = $bd->prepare("SELECT m.id, m.nombres, m.apellidos, m.identificacion, mt.descripcion as tipo, c.descripcion as consultorio FROM medicos m, medicos_tipos mt, consultorios c WHERE m.tipo = mt.id AND m.id_consultorio = c.id");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getPorNombre($nombre){
		global $bd;
	    $result = $bd->prepare("SELECT * FROM medicos WHERE nombres LIKE '%". $nombre ."%'" );
		$result->execute();
	    return $result->fetchAll(PDO::FETCH_ASSOC);		
}



    public function showMedico($datos){
        global $bd;
        $result = $bd->prepare("SELECT * FROM medicos WHERE id = $datos[id] LIMIT 1");
        if($result->execute()){
            return $result->fetch();
        }else{
            return false;
        }
    }
    public function newMedico($datos){
        global $bd;
        $result = $bd->prepare("INSERT INTO medicos(id,nombres,apellidos,identificacion,tipo,id_consultorio,id_usuario) VALUES (null,:nombres,:apellidos,:identificacion,:tipo,:consultorio,:usuario)");
        $result->bindParam(":nombres",$datos["nombres"]);
        $result->bindParam(":apellidos",$datos["apellidos"]);
        $result->bindParam(":identificacion",$datos["identificacion"]);
        $result->bindParam(":tipo",$datos["tipo"]);
        $result->bindParam(":consultorio",$datos["id_consultorio"]);
        $result->bindParam(":usuario",$datos["id_usuario"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function editMedico($datos){
        global $bd;
        $result = $bd->prepare("UPDATE medicos SET nombres = :nombres,apellidos = :apellidos,identificacion = :identificacion,tipo = :tipo, id_consultorio = :consultorio WHERE id = :id");
        $result->bindParam(":id",$datos["id"]);
        $result->bindParam(":nombres",$datos["nombres"]);
        $result->bindParam(":apellidos",$datos["apellidos"]);
        $result->bindParam(":identificacion",$datos["identificacion"]);
        $result->bindParam(":tipo",$datos["tipo"]);
        $result->bindParam(":consultorio",$datos["id_consultorio"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteMedico($datos){
        global $bd;
        $result = $bd->prepare("DELETE FROM medicos WHERE id = $datos[id]");
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getMedicosTipos(){
        global $bd;
        $result = $bd->query("SELECT * FROM medicos_tipos");
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getConsultorios(){
        global $bd;
        $result = $bd->query("SELECT * FROM consultorios");
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    
}
?>