<?php

class logic{

    /**
     * Class constructor.
     */

    function __construct()
    {


    }

    public function GetcookieTime(){
        return time() + 60*60*24*30;
    }

    public function uploadIMG($directory,$name,$tmpFile,$type,$size){

        $isSucces =false;
        if
        (
            ($type == "image/gif")
           || ($type == "image/jpeg")
           || ($type == "image/png")
           || ($type == "image/jpg")
           || ($type == "image/JPG")
            ||($type == "image/pjpeg") && ($size<1000000)
        ){
            if(!file_exists($directory)){
                mkdir($directory,0777,true);

                if(file_exists($directory)){
                    if(file_exists($name)){
                        unlink($name);
                    }

                    move_uploaded_file($tmpFile,$name);
                    $isSucces = true;
                }

            }else{
                if(file_exists($name)){
                    unlink($name);
                }
                move_uploaded_file($tmpFile,$name);
                $isSucces = true;
            }
        }
    }

    public function cont($list){
        $count = count($list);
        $element = $list[$count - 1];
            
        return $element;
            
        }
        
        public  function seleccion($select){
                $id = 0;
                if(is_numeric($select)){
                    $id = $select - 1;    
                }else{
                    $id = -1;
                }
            return $id;
         }
        
         public function filtrado($list,$propiedad,$value){
            $filtro = [];
            foreach ($list as $item) {
                if($item->$propiedad == $value){
                    array_push($filtro,$item);
                }
            }
            return $filtro;
         }
         public function index($list,$propiedad,$value){
            $index = 0;
            foreach ($list as $key => $item) {
                if($item->$propiedad == $value){
                    $index = $key;
                }
            }
            return $index;
         }
        
        
          public function mostrarChek($status){
            if($status != 'activo'){
        
                echo <<<EOF
                <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" value="inactivo" id="defaultCheck1" name="check">
            <label class="form-check-label" for="defaultCheck1">Estatus</label>
          </div>
EOF;
            }else{
                echo <<<EOF
                <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" value="activo" id="defaultCheck2" checked name="check1">
            <label class="form-check-label" for="defaultCheck1">Estatus</label>
          </div>
EOF;
            }
             
          }    
}

  

  
?>
<script>
    function focuss(){
        const input = document.getElementById('nombre');
        input.focus();
    }
    
</script>
