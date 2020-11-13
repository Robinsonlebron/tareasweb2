<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Registro de estudiantes</title>
  </head>
  <body>
  <?php require_once '../layaut/navbars.php';
        require_once '../logic.php';
        require_once 'transaccion.php';
        require_once '../ServiceBasic/iService.php';
        require_once '../pages/transaccionService.php';
        require_once '../FileHandler/FileHandler.php';
        require_once '../FileHandler/JsonFileHandler.php';
        require_once '../FileHandler/SerializationFileHandler.php';
        require_once '../pages/transaccionServiceFile.php';
        
        

        $layaut = new navbar(true,true,true,false,false);
        $servicio = new transaccionServiceFile();
        $newTransaccion = new transaccion();
        
      if(isset($_POST['fecha']) && isset($_POST['monto']) && isset($_POST['descripcion']) ){
       $newTransaccion->initialize(0,$_POST['fecha'],$_POST['monto'],$_POST['descripcion']);
       $servicio->Add($newTransaccion);
     
            $path = 'archivo.txt';
            $file = fopen($path, 'a');
            $Date = date("Y-m-d H:i:s");
            fwrite($file, "Se ha registrado una nueva transaccion con el ID: $newTransaccion->id a las $Date"."\n");
            fclose($file);

        header('Location: ../index.php');
        exit();
      }
  ?> 
    <?php $layaut->nav();?>
    
    <main role="main">

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body ">
        <h5 class="card-title ">Registrar transaccion</h5>
        
        <form action="agregar.php" method="POST">

  <div class="form-group">
    <label for="fecha">Subir transaccion</label>
    <input type="file" class="form-control" id="fecha" name="fecha">
    *Solo se aceptan archivos Json o csv*
  </div>

  

  <button type="submit" class="btn btn-outline-success">Modificar transaccion</button>
  <a href="..//index.php" class="btn btn-outline-primary">Inicio</a>
</form>
        
      </div>
    </div>
  </div>

</main>
          