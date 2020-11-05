<?php 
class navbar{

   private $ispage;
   private $h;
   private $age;
   private $direccion;
   private $disableAge;
   private $home;

   function __construct($page = false,$hom =false,$agen =false)
   {
     $this->ispage = $page;
     $this->h = $hom;
     $this->age = $agen;


     $this->direccion = ($this->ispage) ? '../' : '';
     $this->disableAge = ($this->age)?'disabled':'';
     $this->home = ($this->h)?'../index.php':'';

   }

  public function nav(){ 
      $navbar = <<<EOF
      <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Esta es una tarea practica de la materia programacion web es un CRUD para registrar estudiantes y ver su status. </p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><p>Follow on Instagram:Robinsonlebron1_</p></li>
              <li><p>Like on Facebook:Robinson Lebron</p></li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a href="{$this->home}index.php" class="navbar-brand d-flex align-items-center">
          
          <strong>Inicio</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
EOF;
  
  echo $navbar;
      
  }
}

?>

