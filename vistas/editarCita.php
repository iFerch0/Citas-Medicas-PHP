<div class="">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-4">REPROGRAMAR CITA</h1>
            
			<form method="post" action="index.php?ruta=citas&accion=editar">

				<div class="form-group">
                    <label for="id_estudiante">Estudiante</label>
                    <select class="form-control" name="id_estudiante">
                    <?php foreach ($data['estudiantes'] as $row) {
                        if($data['cita']["id_estudiante"]==$row['id']){
                            echo "<option selected value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                        }else{
                            echo "<option value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                        }
                    }?>
                    </select>
                </div>

							<div class="form-group">
                    <label for="id_medico">Medico</label>
                    <select class="form-control" name="id_medico">
                    <?php foreach ($data['medicos'] as $row) {
                        if($data['cita']["id_medico"]==$row['id']){
                            echo "<option selected value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                        }else{
                            echo "<option value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                        }
                    }?>
                    </select>
                </div>
            
			<input type="hidden" name="id" value="<?php echo $data['cita']["id"]; ?>">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo">
                    <?php foreach ($data['tipos'] as $row) {
                        if($data['cita']["tipo"]==$row['id']){
                            echo "<option selected value='$row[id]'>$row[descripcion]</opcion>";
                        }else{
                            echo "<option value='$row[id]'>$row[descripcion]</opcion>";
                        }
                    }?>
                    </select>
                </div>
            
			<div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" placeholder="Fecha" value="<?php echo $data['cita']["fecha"]; ?>">
                </div>
            
			<div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="time" class="form-control" name="hora" readonly placeholder="Hora" value="<?php echo $data['cita']["hora"]; ?>">
                </div>
            

            
		

				<center>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
				<a class="eliminar" href="index.php?ruta=citas">Volver</a></center>
            </form>
        </div>
    </div>
</div>
