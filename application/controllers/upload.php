<?php

class Upload extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('upload_model','modelo');
    }
    
    public function video(){
        $name = $this->input->post('name');
        $descripcion = $this->input->post('descripcion');
        $categoria = $this->input->post('categoria');
        $tags = $this->input->post('tags');
        $autor = $this->input->post('autor');        
        $fileName = $_FILES["fileUpload"]["name"];
        $fileTmpLoc = $_FILES["fileUpload"]["tmp_name"];
        $fileErrorMsg = $_FILES["fileUpload"]["error"]; 
        $fileName =$this->generarCodigo(12,'video');
        if(!$fileTmpLoc){
	       echo "ERROR: Please browse for a file before clicking the upload button";
	           exit();
        }
        if (move_uploaded_file($fileTmpLoc, "./data/video/$fileName")){
            $imageName = $_FILES["fileUploadImage"]["name"];
            $fileTmpLoc1 = $_FILES["fileUploadImage"]["tmp_name"];
            $imageName = $this->generarCodigo(12,'imagen');
            if(move_uploaded_file($fileTmpLoc1, "./data/imgMateriales/$imageName")){
            $this->modelo->insertarVideo($name,$categoria,'data/video/'.$fileName,$descripcion,$tags,$autor,'data/imgMateriales/'.$imageName);   
            
                }            
        }
        else{
	       echo "move_uploaded_file funcion fallida";
        }
        
    }
    public function documento(){
        $name = $this->input->post('name');
        $descripcion = $this->input->post('descripcion');
        $categoria = $this->input->post('categoria');
        $tags = $this->input->post('tags');
        $autor = $this->input->post('autor');        
        $fileName = $_FILES["fileUploadDocument"]["name"];
        $fileTmpLoc = $_FILES["fileUploadDocument"]["tmp_name"];
        $fileErrorMsg = $_FILES["fileUploadDocument"]["error"]; 
        $fileName =$this->generarCodigo(12,'documento');
        if(!$fileTmpLoc){
	       echo "ERROR: Please browse for a file before clicking the upload button";
	           exit();
        }
        if (move_uploaded_file($fileTmpLoc, "./data/pdf/$fileName.pdf")){
            $imageName = $_FILES["fileUploadImage"]["name"];
            $fileTmpLoc1 = $_FILES["fileUploadImage"]["tmp_name"];
            $imageName = $this->generarCodigo(12,'imagen');
        if(move_uploaded_file($fileTmpLoc1, "./data/imgMateriales/$imageName")){
            $this->modelo->uploadDocument($name,$categoria,'data/pdf/'.$fileName.'.pdf',$descripcion,$tags,$autor,'data/imgMateriales/'.$imageName);   
            
                }            
        }
        else{
	       echo "move_uploaded_file funcion fallida";
        }
    }
    
    public function audio(){        
        $name = $this->input->post('name');
        $descripcion = $this->input->post('descripcion');
        $categoria = $this->input->post('categoria');
        $tags = $this->input->post('tags');
        $autor = $this->input->post('autor');        
        $fileName = $_FILES["fileUploadAudio"]["name"];
        $fileTmpLoc = $_FILES["fileUploadAudio"]["tmp_name"];
        $fileErrorMsg = $_FILES["fileUploadAudio"]["error"]; 
        $fileName =$this->generarCodigo(12,'audio');
        if(!$fileTmpLoc){
	       echo "ERROR: Please browse for a file before clicking the upload button";
	           exit();
        }
        if (move_uploaded_file($fileTmpLoc, "./data/audio/$fileName.mp3")){
            $imageName = $_FILES["fileUploadImage"]["name"];
            $fileTmpLoc1 = $_FILES["fileUploadImage"]["tmp_name"];
            $imageName = $this->generarCodigo(12,'imagen');
        if(move_uploaded_file($fileTmpLoc1, "./data/imgMateriales/$imageName")){
            $this->modelo->uploadAudio($name,$categoria,'data/audio/'.$fileName.'.mp3',$descripcion,$tags,$autor,'data/imgMateriales/'.$imageName);   
            
                }            
        }
        else{
	       echo "move_uploaded_file funcion fallida";
        }
    }
   
   public function generarCodigo($longitud,$clase) {
    switch($clase){
        case 'video': do {
                    $key = '';
                    $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                    $max = strlen($pattern)-1;
                    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                    } while (file_exists('./data/video/'.$key.''));
                    break;
        case 'imagen':   do {
                    $key = '';
                    $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                    $max = strlen($pattern)-1;
                    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                    } while (file_exists('./data/imgMateriales/'.$key.''));
                    break;
        case 'documento':   do {
                    $key = '';
                    $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                    $max = strlen($pattern)-1;
                    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                    } while (file_exists('./data/pdf/'.$key.''));
                    break;
        case 'audio': do {
                            $key = "";
                            $pattern = '1234567890ABCDEFGHIJKLMOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                            $max = strlen($pattern)-1;
                            for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                    } while (file_exists('./data/audio/'.$key.''));
                    break;
                        
                    
    }
    return $key;
             } 
        
}
?>