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
        require_once 'pages/estudiantes.php';
       require_once 'ServiceBasic/iService.php';
       require_once 'pages/estudentService.php';

       $logic = new logic();
     $sevicios = new estudentService();

    $listEstudiante = $sevicios->GetList();
      if(isset($_GET['carreraId'])){
      
        $listEstudiante = $logic->filtrado($listEstudiante,'carrera',$_GET['carreraId']);
          
        }
        
  ?> 
    <?php 
        $layaut = new navbar();
        $layaut->nav();
    ?>
    <main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1>Registro de estudiantes</h1>
    <p class="lead text-muted">Pulse el boton para registrar los datos personales un estudiante</p>
    <p>
      <a href="pages/agregar.php" class="btn btn-primary my-2">Registrar estudiante</a>
      
    </p>
  </div>
</section>
      
      <div class style="margin-bottom:1%;" class="row">

       <div class="col-md-13">

       <div class="col-md-13">
        <div class="col-md-12 btn-group ">

          <a href="index.php?carreraId=Software" class="btn btn-dark text-light">Software</a>
          <a href="index.php?carreraId=Seguridad informatica " class="btn btn-dark text-light">Seguridad</a>
          <a href="index.php?carreraId=Mecatronica" class="btn btn-dark text-light">Mecatronica</a>
          <a href="index.php?carreraId=Multimedia" class="btn btn-dark text-light">Multimedia</a>
          <a href="index.php?carreraId=Sonido" class="btn btn-dark text-light">Sonido</a>
          <a href="index.php" class="btn btn-dark text-light">Todos</a>

           </div>
           </div>
           </div>
           </div>
           <div class="album py-5 bg-light">
    <div class="container">

   

       <div class="row">
       <?php if(empty($listEstudiante)):?>
       <h2>No hay Estudiantes registrados</h2>
       <?php  else: ?>

       <?php foreach ($listEstudiante as $value): ?>         
          <div class="col-md-4">
             <div class="card" style="width: 18rem;">
                  <div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
                 <div class="card-header"><?php echo $value->nombre." ".$value->apellido; ?></div>
                        <ul class="list-group list-group-flush">
         <li class="list-group-item"><?php echo $value->carrera?></li>
<?php if($value->estatus == 'activo'):?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked disabled>
              <label class="form-check-label text-success" for="defaultCheck1">Activo</label>
            </div></td>
          <?php elseif($value->estatus == 'inactivo'):?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"  disabled>
              <label class="form-check-label text-danger" for="defaultCheck1">Inactivo</label>
            </div></td>
          <?php endif; ?>

         
       </ul>
       <div class="card-body">
    <a href="<?php echo "pages/editar.php?editarId={$value->id}";?>" class="card-link">Editar</a>
    <a href="<?php echo "pages/detalles.php?detalleId={$value->id}";?>" class="card-link">Detalles</a>
    <a href="<?php echo "eliminar.php?eliminarId={$value->id}";?>" class="card-link">Eliminar</a>

  </div>
      </div>
    </div>
    <?php endforeach?>
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