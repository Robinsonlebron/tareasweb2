<?php

class transaccion{

    public $id;
    public $fecha;
    public $monto;
    public $descripcion;
    


     

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $logic = new logic();
    }

    public function initialize($id,$fecha,$monto,$descripcion= false){

        $this->id = $id;
        $this->fecha = $fecha;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
       
    }
    public function set($data){
        foreach($data as $key => $value) $this->{$key} = $value;
    }
}

?>