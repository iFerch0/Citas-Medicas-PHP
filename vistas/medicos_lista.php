<div class="">
    <div class="row">
        <div class="col-md-12">
            <p class="msj-info"><?php echo $msj; ?></p>
            <h1 class="title-4">Vista
                <span>medicos</span>
            </h1>
            <center><a href="index.php?ruta=medicos&accion=nuevo">Nuevo Medico</a></center>
            <table id="tablaMedicos" class="table" width="100%">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true" >ID</th>
                        <th data-field="nombres" data-sortable="true" >NOMBRES</th>
                        <th data-field="apellidos" data-sortable="true" >APELLIDOS</th>
                        <th data-field="identificacion" data-sortable="true" >IDENTIFICACION</th>
                        <th data-field="tipo" data-sortable="true" >TIPO</th>
                        <th data-field="consultorio" data-sortable="true" >CONSULTORIO</th>
                        <th data-field="acciones" data-sortable="false" >ACCIONES</th>
                    </tr>
                </thead>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombres"]; ?></td>
                        <td><?php echo $row["apellidos"]; ?></td>
                        <td><?php echo $row["identificacion"]; ?></td>
                        <td><?php echo $row["tipo"]; ?></td>
                        <td><?php echo $row["consultorio"]; ?></td>
                        <td>
                            <a href="index.php?ruta=citas&accion=agendar&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Agendar cita</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(window).ready(function(){
	$('#tablaMedicos').bootstrapTable({
		toggle: "table",
		showToggle: true,
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

