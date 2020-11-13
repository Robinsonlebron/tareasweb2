<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Inicio</title>
  </head>
  <body>
  
  <?php require_once 'layaut/navbars.php';
        require_once 'logic.php';
        require_once 'pages/transaccion.php';
       require_once 'ServiceBasic/iService.php';
       require_once 'pages/transaccionService.php';
       require_once 'FileHandler/FileHandler.php';
        require_once 'FileHandler/JsonFileHandler.php';
        require_once 'pages/transaccionServiceFile.php';
        require_once 'FileHandler/SerializationFileHandler.php';

       $logic = new logic();
     $sevicios = new transaccionServiceFile
     ("pages/data");

    $listTransaccion = $sevicios->GetList();
      
        
  ?> 
    <?php 
        $layaut = new navbar();
        $layaut->nav();
    ?>
    <main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1>Registro de Transacciones</h1>
    <p class="lead text-muted">Pulse el boton para registrar una transaccion en el sistema</p>
    <p>
      <a href="pages/agregar.php" class="btn btn-outline-secondary">Registrar transaccion</a>
      <a href="pages/transaccionesUpload.php" class="btn btn-outline-danger">Subir transferencia</a>
      
    </p>
  </div>
</section>
    

   
<div class="album py-5 bg-light">
    <div class="container">

   

       <div class="row">
       <?php if(empty($listTransaccion)):?>
       <h2>No hay transacciones registradas</h2>
       <?php  else: ?>

        <div class="container">
      <table class="table mt-5">
        <thead class="thead-dark">
          <tr>
          <th scope="col">ID</th>
            <th scope="col">Fecha & Hora</th>
            <th scope="col">Monto</th>
            <th scope="col">Descripcion</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><a href="download.php" type="button" class="btn btn-outline-success">Descargar Transacciones</a></th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach($listTransaccion as $transaccion ): 
             
            ?>
          <tr>
          
            
            <td><?php echo $transaccion->id; ?></td>
            <td><?php echo $transaccion->fecha; ?></td>
            <td><?php echo $transaccion->monto; ?></td>
            <td><?php echo $transaccion->descripcion; ?></td>
            <td></td>
            <td><a href="pages/editar.php?id=<?php echo $transaccion->id;?>" class="btn btn-outline-primary">Modificar</a><a href="pages/eliminar.php?id=<?php echo $transaccion->id;?>" class="btn btn-outline-danger">Eliminar</a></td>
            
            
            
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    
       </ul>
      </div>
    </div>
  
       <?php endif;?>
  </div>
</div>
</div>
    
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="js/bootstrap.min.js"></script>
  </body>
</html>