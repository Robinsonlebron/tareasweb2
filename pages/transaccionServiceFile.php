<?php
 class transaccionServiceFile implements Iservicios{

    private $logic;
    public $filehandler;
    public $directory;
    public $filename;

    /**
     * Class constructor.
     */
    public function __construct($directory="data")
    {
        $this->logic = new logic();
        $this->directory=$directory;
        $this->filename="transacciones";
        $this->filehandler=new SerializationFileHandler($this->directory,$this->filename);
        
    }

    public function GetList()
    {
        $listTransaccionDecode=$this->filehandler->ReadFile();
        $listTransaccion = array();
        if($listTransaccionDecode==false){
            $this->filehandler->SaveFile($listTransaccion);
            
        }else{
            

           

            foreach($listTransaccionDecode as $elementDecode){
                $elemet = new transaccion();
                $elemet->set($elementDecode);
                array_push($listTransaccion,$elemet); 

            }
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
        $this->filehandler->SaveFile($listTransaccion);
    }
    public function Update($id, $entidad)
    {
        $elemet = $this->GetById($id);
        $listTransaccion = $this->GetList();
        $elementIndex = $this->logic->index($listTransaccion,'id',$id);

        

        $listTransaccion[$elementIndex] = $entidad;
        $this->filehandler->SaveFile($listTransaccion);
    }

    public function Delete($id)
    {
        $listTransaccion = $this->GetList();
        $elementIndex = $this->logic->index($listTransaccion,'id',$id); 
        unset($listTransaccion[$elementIndex]);

        $listTransaccion = array_values($listTransaccion);
        $this->filehandler->SaveFile($listTransaccion);

    }
 }

?>