<?php
 class estudentService implements Iservicios{

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
        $listEstudiantes = array();
        if(isset($_COOKIE[$this->cookieName])){
                
            $listEstudiantesDecode = json_decode($_COOKIE[$this->cookieName],false);

            foreach($listEstudiantesDecode as $elementDecode){
                $elemet = new estudiantes();
                $elemet->set($elementDecode);
                array_push($listEstudiantes,$elemet); 

            }
        }else{
            setcookie($this->cookieName,json_encode($listEstudiantes),$this->logic->GetcookieTime(),"/"); 
        }

        return $listEstudiantes;
    }

    public function GetById($id)
    {
        $listEstudiantes = $this->GetList();
        $estudiante = $this->logic->filtrado($listEstudiantes,'id',$id)[0];
        return $estudiante;
    }

    public function Add($entidad)
    {
        $listEstudiantes = $this->GetList();
        $estudianteId  = 1;

        if(!empty($listEstudiantes)){
            $ultimo = $this->logic->cont($listEstudiantes);
            $estudianteId = $ultimo->id+1;
        }
        $entidad->id = $estudianteId;
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
                $name = "../img/estudiante".$estudianteId .".".$typeReplace;
                $tmpName = $photoFile['tmp_name'];
    
                $success = $this->logic->uploadIMG("img",$name,$tmpName,$type,$size);
                if($success){
                    $entidad->photo = "";
                }
            }
            
        }
        array_push($listEstudiantes,$entidad);
        setcookie($this->cookieName,json_encode($listEstudiantes),$this->logic->GetcookieTime(),"/"); 
    }
    public function Update($id, $entidad)
    {
        $elemet = $this->GetById($id);
        $listEstudiantes = $this->GetList();
        $elementIndex = $this->logic->index($listEstudiantes,'id',$id);

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

        $listEstudiantes[$elementIndex] = $entidad;
        setcookie($this->cookieName,json_encode($listEstudiantes),$this->logic->GetcookieTime(),"/"); 
    }

    public function Delete($id)
    {
        $listEstudiantes = $this->GetList();
        $elementIndex = $this->logic->index($listEstudiantes,'id',$id); 
        unset($listEstudiantes[$elementIndex]);

        $listEstudiantes = array_values($listEstudiantes);
        setcookie($this->cookieName,json_encode($listEstudiantes),$this->logic->GetcookieTime(),"/"); 

    }
 }

?>