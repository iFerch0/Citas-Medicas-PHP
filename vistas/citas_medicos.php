<div class="">
			<article>
            <a class="agregar" href="index.php?ruta=citas&accion=agendar">Agendar Cita</a>
            <table id="tablaCitas" class="table" width="100%">
                        <th data-field="tipo" data-sortable="true">TIPO</th>
                        <th data-field="fecha" data-sortable="true">FECHA</th>
                        <th data-field="hora" data-sortable="true">HORA</th>
                        <th data-field="observaciones" data-sortable="true">DIAGNOSTICO</th>
                        <th data-field="acciones" data-sortable="false">OPCIONES</th>
                    </tr>
                </thead>
                    <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["tipo"]; ?></td>
                        <td><?php echo $row["fecha"]; ?></td>
                        <td><?php echo $row["hora"]; ?></td>
                        <td><?php echo $row["observaciones"]; ?></td>
                        <td>
                            <a href="index.php?ruta=examenes&accion=nuevo&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Examenes</a>
                            <a href="index.php?ruta=citas&accion=observaciones&id=<?php echo $row["id"]; ?>" class="btn btn-success">Observaciones</a>
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