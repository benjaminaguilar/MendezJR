<?php

header("Content-type:application/json");
  
require_once("Coneccion.php");
require_once("constants.php");

$con = new Coneccion();
$constants = new constants();
$queryS = $_GET["term"];
$array2 = array();

if ($queryS === null or empty($queryS)){
  echo json_encode($constants->operationError);
} else {
  $queryTBD = 'SELECT id, descripcion as label, descripcion as value, banco, banco_sucursal, cuenta, clabe, chequera, tarjeta, banco_default, notas, sucursal, estado FROM '.$constants->bancosTableName.' where descripcion like "%'.$queryS.'%" and estado = '.$constants->estadoActivo.' and sucursal = '.$constants->sucursalActual;
  
  $result = $con->query($queryTBD,array("id", "label", "value", "banco", "banco_sucursal", "cuenta", "clabe", "chequera", "tarjeta", "banco_default", "notas", "sucursal", "estado"));

  echo json_encode($result);
}

$con->coseConnection();
?>

