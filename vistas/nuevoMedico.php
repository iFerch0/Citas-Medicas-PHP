<div class="">
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="title-4">Nuevo
                <span>Medico</span>
            </h1>
            
            <form method="post" action="index.php?ruta=medicos&accion=nuevo">

			<div class="form-group">
                    <label for="identificacion">Cedula</label>
                    <input type="text" class="form-control" name="identificacion" placeholder="Identificacion">
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                </div>
                
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo">
                    <?php foreach ($data as $row) {
                        echo "<option value='$row[id]'>$row[descripcion]</option>";
                    }?>
					<option value='General'>GENERAL</option>;
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <center>
				<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
				<a class="eliminar" href="index.php?ruta=medicos">Volver</a>
				</center>
				</br>
            </form>
			<p class="mensaje"><?php echo $msj; ?></p>
        </div>
    </div>
</div>
