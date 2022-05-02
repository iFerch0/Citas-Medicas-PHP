<div class="">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-4">Editar paciente</h1>
            
			
            
			<form method="post" action="index.php?ruta=estudiantes&accion=editar">
                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                <div class="form-group">
                    <label for="identificacion">Cedula</label>
                    <input type="text" class="form-control" name="identificacion" placeholder="Identificacion" value="<?php echo $data["identificacion"]; ?>">
                </div>
				<div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="<?php echo $data["nombres"]; ?>">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $data["apellidos"]; ?>">
                </div>
                
                <center>
				<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
				<a class="eliminar" href="index.php?ruta=estudiantes">Volver</a></center>
            </form>
        </div>
    </div>
</div>
