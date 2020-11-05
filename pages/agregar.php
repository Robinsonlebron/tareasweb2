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
        require_once 'estudiantes.php';
        require_once '../ServiceBasic/iService.php';
        require_once 'estudentService.php';

        $layaut = new navbar(true,true,true,false,false);
        $servicio = new estudentService();
        $newEstudiante = new estudiantes();
        
      if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){
       $newEstudiante->initialize(0,$_POST['nombre'],$_POST['apellido'],'activo',$_POST['carrera'],'foto');
       $servicio->Add($newEstudiante);
        header('Location: ../index.php');
        exit();
      }
  ?> 
    <?php $layaut->nav();?>
    <?php
      $carreras = ['Software','Mecatronica','Sonido','Seguridad informatica','Multimedia'];
    
    ?>
  <div class="container">
  <form action="agregar.php" method="POST">
    <div class="form-group pt-5">
    <div class="form-row">
    <div class="col">
    <label for="validationTooltip01" class="font-weight-bold " required>Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombre" id="nombre" tabindex="1">
      <?php echo "  <script>focuss();</script>"; ?>
    </div>
    <div class="col">
    <label for="validationTooltip01" class="font-weight-bold">Apellido</label>
      <input type="text" class="form-control" placeholder="" name="apellido" tabindex="2">
    </div>
    <div class="col-md-12">
    <label for="photo" class="font-weight-bold">Foto</label>
      <input type="file" class="form-control" placeholder="" name="photoProfile" tabindex="2" id="photo">
    </div>
  </div>
  <!--  -->
 
  <!--  -->
    </div>
    
    <div class="mb-3">
    <label for="validationTooltip01" class="font-weight-bold">Carrera</label>
    <select class="custom-select" required name="carrera" tabindex="3">

        <?php foreach($carreras as $materia):?>
          <option value="<?php echo $materia;?>"><?php echo $materia;?></option>
        <?php endforeach;?>

    </select>
    <button type="submit" class="btn btn-success mt-3" tabindex="4">Enviar</button>
  </form>
  </div>
          
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>