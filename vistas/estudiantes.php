<div class="">
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="title-4">PACIENTES</h1>
            <article>
			<a class="agregar" href="index.php?ruta=estudiantes&accion=nuevo">Nuevo paciente</a>
			</article>
			
            <table id="tabla_Pacientes" class="table" width="100%">
                <thead>
                    <tr>
                        <th class="text-center data-field="id" data-sortable="true">ID</th>
                        <th class="text-center data-field="identificacion" data-sortable="true">Cedula</th>
						<th class="text-center data-field="nombres" data-sortable="true">Nombres</th>
                        <th class="text-center data-field="apellidos" data-sortable="true">Apellidos</th>
                        <th class="text-center colspan="2" data-field="acciones" data-sortable="false">Opciones</th>
                    </tr>
                </thead>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["identificacion"]; ?></td>
                        <td><?php echo $row["nombres"]; ?></td>
                        <td><?php echo $row["apellidos"]; ?></td>
                        
                        <td>
							<a href="index.php?ruta=estudiantes&accion=eliminar&id=<?php echo $row["id"]; ?>" class="eliminar">Eliminar</a>
                            <a href="index.php?ruta=estudiantes&accion=editar&id=<?php echo $row["id"]; ?>" class="editar">Editar</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
			</br>
			<p class="mensaje"><?php echo $msj; ?></p>
        </div>
    </div>
</div>

<script type="text/javascript">

$(window).ready(function(){
	$('#tabla_Pacientes').bootstrapTable({
		toggle: "table",
		showColumns: false,
		search: true,
		pagination: true,
		sortName: "fecha",
		height: 500,
		pageList: '[10, 100, 500]',
		sortOrder: "desc",
		pageSize: "10",
		paginationVAlign: "top",
		showMultiSort:false, 
		showExport:true,
		exportTypes: ['pdf', 'csv', 'xlsx', 'excel']
	});
});
</script>
