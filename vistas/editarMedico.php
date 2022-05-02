<div class="">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-4">EDITAR MEDICO
            </h1>
            
            <form method="post" action="index.php?ruta=medicos&accion=editar">

			 <div class="form-group">
                    <label for="identificacion">Identificacion</label>
                    <input type="text" class="form-control" name="identificacion" placeholder="Identificacion" value="<?php echo $data['medico']["identificacion"]; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $data['medico']["id"]; ?>">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="<?php echo $data['medico']["nombres"]; ?>">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $data['medico']["apellidos"]; ?>">
                </div>
               
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo">
                    <?php foreach ($data['tipos'] as $row) {
                        if($data['medico']["tipo"]==$row['id']){
                            echo "<option selected value='$row[id]'>$row[descripcion]</opcion>";
                        }else{
                            echo "<option value='$row[id]'>$row[descripcion]</opcion>";
                        }
                    }?>
                    </select>
                </div>
                <center>
				<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
				<a class="eliminar" href="index.php?ruta=medicos">Volver</a></center>
            </form>
        </div>
    </div>
</div>
