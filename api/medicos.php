<?php
require '../config/central.php';
$padrem=new padreModelo();
$accion = filter_input(INPUT_POST,"accion",FILTER_SANITIZE_STRING);
    switch ($accion) {
				$obj = new medicosModelo();
				echo json_encode($obj->getPorNombre($nombre));


			}else{
				$obj = new medicosModelo();
				echo json_encode($obj->index);
			}
    }