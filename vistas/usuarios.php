<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="msj-info"><?php echo $msj; ?></p>
            <h1 class="title-4">Vista
                <span>usuarios</span>
            </h1>
            <center><a href="index.php?ruta=usuarios&accion=nuevo">Nuevo Usuario</a></center>
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>PASSWORD</th>
                        <th>EMAIL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["usuario"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <a href="index.php?ruta=usuarios&accion=editar&id=<?php echo $row["id"]; ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?ruta=usuarios&accion=eliminar&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>

        </div>
    </div>
</div>
