<div class="">
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="title-4">MEDICOS</h1>
           <article>
		   <a class="agregar" href="index.php?ruta=medicos&accion=nuevo">Agregar Medico</a>
		   </article>
            <table id="tablaMedicos" class="table" width="100%">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true" >ID</th>
						<th data-field="identificacion" data-sortable="true" >Identificacion</th>
                        <th data-field="nombres" data-sortable="true" >Nombres</th>
                        <th data-field="apellidos" data-sortable="true" >Apellidos</th>
                        <th data-field="tipo" data-sortable="true" >Tipo</th>
                        <th data-field="consultorio" data-sortable="true" >Oficina</th>
                        <th data-field="acciones" data-sortable="false" >Opciones</th>
                    </tr>
                </thead>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["identificacion"]; ?></td>
                        <td><?php echo $row["nombres"]; ?></td>
                        <td><?php echo $row["apellidos"]; ?></td>
                        <td><?php echo $row["tipo"]; ?></td>
                        <td><?php echo $row["consultorio"]; ?></td>
                        <td>
                            <a href="index.php?ruta=citas&accion=medicos&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Citas</a>
                            <a href="index.php?ruta=medicos&accion=eliminar&id=<?php echo $row["id"]; ?>" class="eliminar">Eliminar</a>
                            <a href="index.php?ruta=medicos&accion=editar&id=<?php echo $row["id"]; ?>" class="editar">Editar</a>
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
	$('#tablaMedicos').bootstrapTable({
		toggle: "table",
		showToggle: false,
		showColumns: false,
		search: true,
		pagination: true,
		sortName: "nombres",
		height: 500,
		pageList: '[10, 100, 500]',
		sortOrder: "asc",
		pageSize: "10",
		paginationVAlign: "top",
		showMultiSort:false, 
		sortPriority: [{"sortName": "nombres","sortOrder":"asc"}],
		showExport:true,
		exportTypes: ['pdf', 'csv', 'xlsx', 'excel']
	});
});
</script>
