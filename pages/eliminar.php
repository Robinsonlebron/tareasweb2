<?php 
require_once '../layaut/navbars.php';
require_once '../logic.php';
require_once '../pages/transaccion.php';
require_once '../ServiceBasic/iService.php';
require_once '../pages/transaccionService.php';
require_once '../FileHandler/FileHandler.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once '../pages/transaccionServiceFile.php';



$servicio = new transaccionServiceFile();

$isId = isset($_GET['id']);

if($isId){
    $transaccionId = $_GET['id'];
    $servicio->Delete($transaccionId);
    $path = 'archivo.txt';
    $file = fopen($path, 'a');
    $Date = date("Y-m-d H:i:s");
    fwrite($file, "Se ha eliminado una transaccion con el ID: $newTransaccion->id a las $Date"."\n");
    fclose($file);

    header('Location: ../index.php');
        exit();
}
//header("Location: index.php");
//exit();
?>