<div class="">
    <div class="row">
        <div class="col-md-12">
            <p class="msj-info"><?php echo $msj; ?></p>
            <h1 class="title-4">Agendar
                <span>Cita</span>
            </h1>
            
            <form method="post" action="index.php?ruta=citas&accion=agendar">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo">
                    <?php foreach ($data['tipos'] as $row) {
                        echo "<option value='$row[id]'>$row[descripcion]</opcion>";
                    }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <select class="form-control" name="hora">
                        <option value="08:00:00">08:00am</option>
                        <option value="08:20:00">08:20am</option>
                        <option value="08:40:00">08:40am</option>
                        <option value="09:00:00">09:00am</option>
                        <option value="09:20:00">09:20am</option>
                        <option value="09:40:00">09:40am</option>
                        <option value="10:00:00">10:00am</option>
                        <option value="10:20:00">10:20am</option>
                        <option value="10:40:00">10:40am</option>
                        <option value="11:00:00">11:00am</option>
                        <option value="11:20:00">11:20am</option>
                        <option value="11:40:00">11:40am</option>
                        <option value="14:00:00">02:00pm</option>
                        <option value="14:20:00">02:20pm</option>
                        <option value="14:40:00">02:40pm</option>
                        <option value="15:00:00">03:00pm</option>
                        <option value="15:20:00">03:20pm</option>
                        <option value="15:40:00">03:40pm</option>
                        <option value="16:00:00">04:00pm</option>
                        <option value="16:20:00">04:20pm</option>
                        <option value="16:40:00">04:40pm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_medico">Medico</label>
                    <?php if(isset($_GET['id'])&&($_GET['id'] != "")){
                        echo '<select class="form-control" readonly name="id_medico">';
                        foreach ($data['medicos'] as $row) {
                            if($_GET['id'] == $row['id']){
                                echo "<option selected value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                            }
                        }
                        echo '</select>';
                    }else{?>
                        <select class="form-control" name="id_medico">
                        <?php foreach ($data['medicos'] as $row) {
                            echo "<option value='$row[id]'>$row[nombres] $row[apellidos]</opcion>";
                        }
                    }?>
                    </select>
                </div>
                <input type="hidden" name="id_estudiante" value="<?php echo $data['estudiantes'][0] ?>">				<center>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>				<a class="eliminar" href="index.php?ruta=citas&accion=mias">Volver</a></center>
            </form>
        </div>
    </div>
</div>
