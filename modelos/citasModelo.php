<?php
class citasModelo extends padreModelo{

    public function index($id_estudiante = null){
        global $bd;
        $where = "";
        if($id_estudiante!=null){
            $where = " AND u.id = $id_estudiante";
        }
        $result = $bd->prepare("SELECT c.id, ct.descripcion as tipo, c.fecha, c.hora, CONCAT(m.nombres, ' ', m.apellidos) as medico, CONCAT(e.nombres, ' ', e.apellidos) as estudiante, c.observaciones FROM citas c, citas_tipos ct, medicos m, estudiantes e, usuarios u WHERE c.tipo = ct.id AND c.id_medico = m.id AND c.id_estudiante = e.id AND u.id = e.id_usuario $where");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function index_medicos($id = null){
        global $bd;
        $where = "";
        if($id!=null){
            $where = " AND m.id = $id";
        }else{
            $where = " AND u.id = $_SESSION[id_usuario]";
        }
        $result = $bd->prepare("SELECT c.id, ct.descripcion as tipo, c.fecha, c.hora, CONCAT(e.nombres, ' ', e.apellidos) as estudiante, c.observaciones FROM citas c, citas_tipos ct, medicos m, estudiantes e, usuarios u WHERE c.tipo = ct.id AND c.id_medico = m.id AND c.id_estudiante = e.id AND u.id = m.id_usuario $where");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function showCita($datos){
        global $bd;
        $result = $bd->prepare("SELECT * FROM citas WHERE id = $datos[id] LIMIT 1");
        if($result->execute()){
            return $result->fetch();
        }else{
            return false;
        }
    }
    public function newCita($datos){
        global $bd;
        $result = $bd->prepare("INSERT INTO citas(id,tipo,fecha,hora,id_medico,id_estudiante) VALUES (null,:tipo,:fecha,:hora,:id_medico,:id_estudiante)");
        $result->bindParam(":tipo",$datos["tipo"]);
        $result->bindParam(":fecha",$datos["fecha"]);
        $result->bindParam(":hora",$datos["hora"]);
        $result->bindParam(":id_medico",$datos["id_medico"]);
        $result->bindParam(":id_estudiante",$datos["id_estudiante"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function editCita($datos){
        global $bd;
        $result = $bd->prepare("UPDATE citas SET tipo = :tipo,fecha = :fecha,hora = :hora,id_medico = :id_medico,id_estudiante = :id_estudiante WHERE id = :id");
        $result->bindParam(":id",$datos["id"]);
        $result->bindParam(":tipo",$datos["tipo"]);
        $result->bindParam(":fecha",$datos["fecha"]);
        $result->bindParam(":hora",$datos["hora"]);
        $result->bindParam(":id_medico",$datos["id_medico"]);
        $result->bindParam(":id_estudiante",$datos["id_estudiante"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function editObservacionCita($datos){
        global $bd;
        $result = $bd->prepare("UPDATE citas SET observaciones = :observaciones WHERE id = :id");
        $result->bindParam(":id",$datos["id"]);
        $result->bindParam(":observaciones",$datos["observaciones"]);
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteCita($datos){
        global $bd;
        $result = $bd->prepare("DELETE FROM citas WHERE id = $datos[id]");
        if($result->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCitasTipos(){
        global $bd;
        $result = $bd->query("SELECT * FROM citas_tipos");
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function checkHorario($datos){
        global $bd;
        $result = $bd->query("SELECT count(*) as total FROM citas WHERE tipo = $datos[tipo] AND fecha = '$datos[fecha]' AND hora = '$datos[hora]' AND id_medico = $datos[id_medico]");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row['total'] > 0){
            return false;
        }else{
            return true;
        }
    }
    public function checkCitasSemestre($datos){
        global $bd;
        $temp = explode("-",$datos['fecha']);
        $anio = $temp[0];
        if(self::getSemestre($datos)==1){
            $result = $bd->query("SELECT count(*) as total FROM citas WHERE tipo = $datos[tipo] AND (MONTH(fecha) BETWEEN '01' AND '06') AND YEAR(fecha) = '$anio' AND id_estudiante = $datos[id_estudiante]");
        }else{
            $result = $bd->query("SELECT count(*) as total FROM citas WHERE tipo = $datos[tipo] AND (MONTH(fecha) BETWEEN '07' AND '12') AND YEAR(fecha) = '$anio' AND id_estudiante = $datos[id_estudiante]");
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row['total'] >= 3){
            return false;
        }else{
            return true;
        }
    }
    public function getSemestre($datos){
        $temp = explode("-",$datos['fecha']);
        $mes = intval($temp[1]);
        if(($mes >= 1)&&($mes <= 6)){
            return 1;
        }else{
            return 2;
        }
    }

}
?>