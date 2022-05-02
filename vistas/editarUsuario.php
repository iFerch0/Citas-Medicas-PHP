<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-4">Editar
                <span>Usuario</span>
            </h1>
            <center><a href="index.php?ruta=usuarios">Volver</a></center>
            <form method="post" action="index.php?ruta=usuarios&accion=editar">
                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php echo $data["usuario"]; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $data["password"]; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $data["email"]; ?>">
                </div>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
