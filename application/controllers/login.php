<?php
class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user','modelo');
    }

    public function index(){
        $nombre = $this->input->post('user');
        $password = $this->input->post('password');
        $fila = $this->modelo->getUser($nombre);
        if ($fila!=null){
            if ($fila->Password == $password){
                $data = array(
                'Id'=>$fila->Id_admin,
                'nombre'=>$fila->Nombre,
                'img'=>$fila->Path_image_profile,
                'login'=>true
                );
                $this->session->set_userdata($data);
                header("Location: ".base_url());
            }
            else {
                header("Location: ".base_url());
            }
        }
        else{
            header("Location: ".base_url());
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        header("Location: ".base_url());
    }
    
}

?>