<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="msj-info"><?php echo $msj; ?></p>
            <h1 class="title-4">Nuevo
                <span>Usuario</span>
            </h1>
            <center><a href="index.php?ruta=usuarios">Volver</a></center>
            <form method="post" action="index.php?ruta=usuarios&accion=nuevo">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
