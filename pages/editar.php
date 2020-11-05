<!doctype html>
<html lang="en">
  <head>
  <?php session_start();?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Modificacion de estudiante</title>
  </head>
  <body>
  <?php require_once '../layaut/navbars.php';
        require_once '../logic.php';
        require_once 'estudiantes.php';
        require_once '../ServiceBasic/iService.php';
        require_once 'estudentService.php';

        $layaut = new navbar(true,true,false,true,false);
        $servicio = new estudentService();
        $carreras = ['Software','Mecatronica','Sonido','Seguridad informatica','Multimedia'];
        $checked;

        if(!$_POST['check']== null){
          $status = $_POST['check'];
        }else{
          $status = 'inactivo';
        }

        if(isset($_GET['editarId'])){
          $estudianteId = $_GET['editarId'];
          $element = $servicio->GetById($estudianteId);
          if($element->estatus == 'activo'){
            $checked = 'checked';
          }else{
            $checked = "";
          }
          if(isset($_POST['nEdit']) && isset($_POST['aEdit']) && isset($_POST['carreraEdit'])){
            
              $editEstudiante = new estudiantes();
              $editEstudiante->initialize($estudianteId,$_POST['nEdit'],$_POST['aEdit'],$status,$_POST['carreraEdit'],'photo');
              $servicio->Update($estudianteId,$editEstudiante);
              header('Location: ../index.php');
              exit();
          }
        }else{
          header('Location: ../index.php');
          exit();
        }
        foreach($carreras as $value){
          if($element->carrera == $value){
            $count = array_search($value,$carreras);
            unset($carreras[$count]);
            $carreras = array_values($carreras);
            array_unshift($carreras,$value);
          }
        }
      
  ?> 
    <?php $layaut->nav();?>
    <div class="container pt-5">
    <form action="editar.php?editarId=<?php echo $element->id?>" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="ids" placeholder="" name="ids" value='<?php echo $estudianteId?>' hidden>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput" class="font-weight-bold">Nuevo Nombre</label>
      <input type="text" class="form-control" id="nEdit" placeholder="" name="nEdit" value='<?php echo $element->nombre;?>'>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2" class="font-weight-bold">Nuevo Apellido</label>
      <input type="text" class="form-control" id="aEdit" placeholder="" name="aEdit" value='<?php echo $element->apellido;?>'>
    </div>
    <label for="validationTooltip01" class="font-weight-bold">Nueva Carrera</label>
     <select class="custom-select"  name="carreraEdit" tabindex="3" id="carreraEdit">
     <?php foreach ($carreras as $materias):?>
      <option value="<?php echo $materias;?>" name="cEdit" id="cEdit"><?php echo $materias;?></option>
     <?php endforeach; ?>
     </select>
     <div class="form-check my-3">
     
    <input class="form-check-input" type="checkbox" value="activo" id="check" name="check" <?php echo $checked; ?>>
    <label class="form-check-label " for="defaultCheck1">Marcar para activar al estudiante</label>
  </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
        <button class="btn btn-outline-primary mt-2" type="submit" id="button-addon3">Cambiar</button>
        
        </div>
      </div>
    </form> 
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>


