<?php 
require_once 'layaut/navbars.php';
require_once 'logic.php';
require_once 'pages/estudiantes.php';
require_once 'ServiceBasic/iService.php';
require_once 'pages/estudentService.php';

$servicio = new estudentService();

$isId = isset($_GET['eliminarId']);

if($isId){
    $estudianteId = $_GET['eliminarId'];
    $servicio->Delete($estudianteId);
}
header("Location: index.php");
exit();
?>