<!doctype html>
<html lang="en">
  <head>
  <?php session_start();?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Modificacion de transaccion</title>
  </head>
  <body>
  <?php require_once '../layaut/navbars.php';
        require_once '../logic.php';
        require_once '../pages/transaccion.php';
        require_once '../ServiceBasic/iService.php';
        require_once '../pages/transaccionService.php';
        require_once '../FileHandler/FileHandler.php';
        require_once '../FileHandler/JsonFileHandler.php';
        require_once '../pages/transaccionServiceFile.php';
        require_once '../FileHandler/SerializationFileHandler.php';

        $layaut = new navbar(true,true,false,true,false);
        $servicio = new transaccionServiceFile();
       

       

        if(isset($_GET['id'])){
          $transaccionId = $_GET['id'];
          $element = $servicio->GetById($transaccionId);
          
          if(isset($_POST['fecha']) && isset($_POST['monto']) && isset($_POST['descripcion'])){
            
              $editTransaccion = new transaccion();
              $editTransaccion->initialize($transaccionId,$_POST['fecha'],$_POST['monto'],$_POST['descripcion']);
              $servicio->Update($transaccionId,$editTransaccion);

              $path = 'archivo.txt';
            $file = fopen($path, 'a');
            $Date = date("Y-m-d H:i:s");
            fwrite($file, "Se ha editado una transaccion con el ID: $newTransaccion->id a las $Date"."\n");
            fclose($file);

              header('Location: ../index.php');
              exit();
          }
        }else{
          header('Location: ../index.php');
              exit();
          
        }


        
        
      
  ?> 
  
  <?php $layaut->nav();?>

 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body ">
        <h5 class="card-title ">Modificar transaccion</h5>
        
        <form action="editar.php?id=<?php echo $element->id?>" method="POST">

  <div class="form-group">
    <label for="fecha">Fecha & Hora</label>
    <input type="datetime-local" class="form-control" id="fecha" name="fecha" value='<?php echo $element->fecha?>'>
  </div>

  <div class="form-group">
    <label for="monto">Monto</label>
    <input type="text" class="form-control" id="monto" name="monto" value='<?php echo $element->monto?>'>
  </div>

  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value='<?php echo $element->descripcion?>'>
  </div>

  <button type="submit" class="btn btn-outline-success">Modificar transaccion</button>
  <a href="../index.php" class="btn btn-outline-primary">Inicio</a>
</form>
        
      </div>
    </div>
  </div>

    

</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>


