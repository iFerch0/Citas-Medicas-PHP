<div class="">
    <div class="row">
        <div class="col-md-12">
            <p class="msj-info"><?php echo $msj; ?></p>
            <h1 class="title-4">Mis
                <span>citas</span>
            </h1>
            <center><a href="index.php?ruta=citas&accion=agendar">Agendar Cita</a></center>
            <table id="tablaCitas" class="table" width="100%">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="tipo" data-sortable="true">TIPO</th>
                        <th data-field="fecha" data-sortable="true">FECHA</th>
                        <th data-field="hora" data-sortable="true">HORA</th>
                        <th data-field="medico" data-sortable="true">MEDICO</th>
                        <th data-field="observaciones" data-sortable="true">OBSERVACIONES</th>
                        <th data-field="acciones" data-sortable="false">ACCIONES</th>
                    </tr>
                </thead>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["tipo"]; ?></td>
                        <td><?php echo $row["fecha"]; ?></td>
                        <td><?php echo $row["hora"]; ?></td>
                        <td><?php echo $row["medico"]; ?></td>
                        <td><?php echo $row["observaciones"]; ?></td>
                        <td>
                            <a href="index.php?ruta=citas&accion=eliminar&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Cancelar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(window).ready(function(){
	$('#tablaCitas').bootstrapTable({
		toggle: "table",
		showToggle: true,
		showColumns: true,
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