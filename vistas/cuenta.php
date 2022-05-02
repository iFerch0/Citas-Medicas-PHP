<div class="">
    <div class="row">
        <div class="col-md-12">
        
            <h1 class="title-4">Cambiar
                <span>Contraseña</span>
            </h1>
            <form method="post" action="index.php?ruta=usuarios&accion=cuenta">
                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                
                <div class="form-group">
                    <label for="password">Nueva Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirmar contraseña">
                </div>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            </form>			</br>			<p class="mensaje"><?php echo $msj; ?></p>
        </div>
    </div>
</div>
