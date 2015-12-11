<?php
	require_once '../negocio/prdc.class.php';
	$objPrdc = new Prdc();
	$resultado=$objPrdc->listar();
	echo json_encode($resultado);
?>