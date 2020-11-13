<?php
 class transaccionService implements Iservicios{

    private $logic;
    private $cookieName;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->logic = new logic();
        $this->cookieName = "estudiantes";
    }

    public function GetList()
    {
        $listTransaccion = array();
        if(isset($_COOKIE[$this->cookieName])){
                
            $listTransaccionDecode = json_decode($_COOKIE[$this->cookieName],false);

            foreach($listTransaccionDecode as $elementDecode){
                $elemet = new transaccion();
                $elemet->set($elementDecode);
                array_push($listTransaccion,$elemet); 

            }
        }else{
            setcookie($this->cookieName,json_encode($listTransaccion),$this->logic->GetcookieTime(),"/"); 
        }

        return $listTransaccion;
    }

    public function GetById($id)
    {
        $listTransaccion = $this->GetList();
        $Transaccion = $this->logic->filtrado($listTransaccion,'id',$id)[0];
        return $Transaccion;
    }

    public function Add($entidad)
    {
        $listTransaccion = $this->GetList();
        $transaccionId  = 1;

        if(!empty($listTransaccion)){
            $ultimo = $this->logic->cont($listTransaccion);
            $transaccionId = $ultimo->id+1;
        }
        $entidad->id = $transaccionId;
        $entidad->photo = "";
        $photoFile = $_FILES['photo'];
        if(isset($_FILES['photo'])){

            $photoFile = $_FILES['photo'];
            if($photoFile['error'] == 4){
                $entidad->photo = "";
            }else{
                $typeReplace = str_replace("image/","",$_FILES['photo']['type']);
                $type = $photoFile['type'];
                $size =$photoFile['size'];
                $name = "../img/estudiante".$transaccionId .".".$typeReplace;
                $tmpName = $photoFile['tmp_name'];
    
                $success = $this->logic->uploadIMG("img",$name,$tmpName,$type,$size);
                if($success){
                    $entidad->photo = "";
                }
            }
            
        }
        array_push($listTransaccion,$entidad);
        setcookie($this->cookieName,json_encode($listTransaccion),$this->logic->GetcookieTime(),"/"); 
    }
    public function Update($id, $entidad)
    {
        $elemet = $this->GetById($id);
        $listTransaccion = $this->GetList();
        $elementIndex = $this->logic->index($listTransaccion,'id',$id);

        if(isset($_FILES['photo'])){

            $photoFile = $_FILES['photo'];
            if($photoFile['error'] == 4){
                $entidad->photo = $elemet->photo;
            }else{
                $typeReplace = str_replace("image/","",$_FILES['photo']['type']);
                $type = $photoFile['type'];
                $size = $photoFile['size']; 
                $name = "../img/estudiante/".$id .".".$typeReplace;
                $tmpName = $photoFile['tmp_name'];
    
                $success = $this->logic->uploadIMG("img",$name,$tmpName,$type,$size);
                if($success){
                    $entidad->photo = "";
                } 
            }

           
        }

        $listTransaccion[$elementIndex] = $entidad;
        setcookie($this->cookieName,json_encode($listTransaccion),$this->logic->GetcookieTime(),"/"); 
    }

    public function Delete($id)
    {
        $listTransaccion = $this->GetList();
        $elementIndex = $this->logic->index($listTransaccion,'id',$id); 
        unset($listTransaccion[$elementIndex]);

        $listTransaccion = array_values($listTransaccion);
        setcookie($this->cookieName,json_encode($listTransaccion),$this->logic->GetcookieTime(),"/"); 

    }
 }

?>