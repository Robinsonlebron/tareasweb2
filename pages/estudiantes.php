<?php

class estudiantes{

    public $id;
    public $nombre;
    public $apellido;
    public $estatus;
    public $carrera;
    public $materiasF =[];
    public $photo;


     

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $logic = new logic();
    }

    public function initialize($id,$nombres,$apellidos,$estatuss,$carreras,$photos,$materiasFF = false){

        $this->id = $id;
        $this->nombre = $nombres;
        $this->apellido = $apellidos;
        $this->estatus = $estatuss;
        $this->carrera = $carreras;
        $this->materiasF = $materiasFF;
        $this->photo = $photos;
    }
    public function set($data){
        foreach($data as $key => $value) $this->{$key} = $value;
    }
}

?>