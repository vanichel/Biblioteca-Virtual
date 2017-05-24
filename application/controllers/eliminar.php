<?php
class Eliminar extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('material_model','modelo');
    }
    
    public function eliminarVideo(){
       $id = $this->input->post('id');
       $this->modelo->eliminarVideo($id,'video');
       
    }
    
    public function eliminarAudio(){
       $id = $this->input->post('id');
       $this->modelo->eliminarAudio($id,'audio');
       
    }
    
    public function eliminarLibro(){
       $id = $this->input->post('id');
       $this->modelo->eliminarLibro($id,'libro');
       
    }

}

?>