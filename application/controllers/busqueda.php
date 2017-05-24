<?php
class Busqueda extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('construct_page','modelo2');     
        $this->load->model('material_model','modelo');
     
    }
    
    public function audio(){
        
    }
    
    public function video(){
        $valorbusqueda = $this->input->post('buscando');
        if ($valorbusqueda != ''){
            
        }
        if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        $direccion = base_url();
        $image = base_url().'data/imgUsers/UserDefault.png';
        $admin = 'Invitado';
    }
    $this->load->view('guest/head');
    $menu = $this->modelo2->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'busqueda/video/'; // parametro base de la aplicaci�n, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo->numeroFilas('','video');//calcula el n�mero de filas  
            $config['per_page'] = 12; //N�mero de registros mostrados por p�ginas
            $config['num_links'] = 5; //N�mero de links mostrados en la paginaci�n
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = '�ltima';//�ltimo link
            $config["uri_segment"] = 3;//el segmento de la paginaci�n
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginaci�n		
            $data["videos"] = $this->modelo->paginacionVideos($config['per_page'],$this->uri->segment(3),'');
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/video',$data);
    $this->load->view('guest/footer');
    }
    
    public function libros(){
        
    }

    
}

?>