<div class="">
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="title-4">Nuevo Paciente</h1>
            
            <form method="post" action="index.php?ruta=estudiantes&accion=nuevo">
                <div class="form-group">
                    <label for="identificacion">Identificacion</label>
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
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <center>
				<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
				<a class="eliminar" href="index.php?ruta=estudiantes">Volver</a>
				</center>
				</br>
				<p class="mensaje"><?php echo $msj; ?></p>
            </form>
        </div>
    </div>
</div>
