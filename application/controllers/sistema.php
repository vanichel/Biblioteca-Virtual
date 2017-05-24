<?php

class Sistema extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('construct_page','modelo');
        $this->load->model('material_model','modelo2');
        
    }
    
    public function home(){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data = $this->modelo->getContadoresSistema('');
    $this->load->view('wrapper/default',$data);
    $this->load->view('guest/footer');   
    }
    public function audio(){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/video/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas('','audio');//calcula el número de filas  
            $config['per_page'] = 16; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 3;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["videos"] = $this->modelo2->paginacionAudio($config['per_page'],$this->uri->segment(3),'');
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_audio',$data);
    $this->load->view('guest/footer'); 
    }
    
    public function reproduccionaudio($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data  = $this->modelo2->dataAudioReproduccion($id);
    $this->load->view('wrapper/view_reproduccion_audio',$data);
    $this->load->view('guest/footer');   
    }
    
    public function video(){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/video/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas('','video');//calcula el número de filas  
            $config['per_page'] = 12; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 3;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["videos"] = $this->modelo2->paginacionVideos($config['per_page'],$this->uri->segment(3),'');
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/video',$data);
    $this->load->view('guest/footer'); 
    }

    public function reproduccionvideo($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data  = $this->modelo2->dataVideoReproduccion($id);
    $this->load->view('wrapper/reproduccion_video',$data);
    $this->load->view('guest/footer');   
    }
    
    public function documentos(){
        
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/documentos/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas('','documentos');//calcula el número de filas  
            $config['per_page'] = 16; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 3;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["documentos"] = $this->modelo2->paginacionDocumentos($config['per_page'],$this->uri->segment(3),'');
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_libros',$data);
    $this->load->view('guest/footer');
    }
    
    public function visorducumento($id){
        
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data  = $this->modelo2->dataLibroVisualizacion($id);
    $this->load->view('wrapper/view_visor_libro',$data);
    $this->load->view('guest/footer');   
    }
    
    public function categorias($value){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data = $this->modelo->getContadoresSistema($value);
    $this->load->view('wrapper/view_categoria',$data);
    $this->load->view('guest/footer');     
        }
        
    public function set_values_categoria($tipo,$id){
        $this->session->set_userdata('tipo',$tipo);
        $this->session->set_userdata('id',$id);
        redirect(base_url().'sistema/categoria/'.$id);
    }
    public function categoria($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/categoria/'.$id.'/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo->getContadoresCategoria($this->session->userdata('id'),$this->session->userdata('tipo'));//calcula el número de filas  
            $config['per_page'] = 12; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 4;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación
            switch($this->session->userdata('tipo')){
            case 'audio': $data["material"] = $this->modelo2->paginacionAudioCategoria($config['per_page'],$this->uri->segment(4),$this->session->userdata('id'));
            break;
            case 'video': $data["material"] = $this->modelo2->paginacionVideosCategoria($config['per_page'],$this->uri->segment(4),$id);
            break;
            case 'documentos': $data['material'] = $this->modelo2->paginacionDocumentosCategoria($config['per_page'],$this->uri->segment(4),$this->session->userdata('id'));
            break;
                        }		        
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('wrapper/view_categoria_material',$data);
    $this->load->view('guest/footer');  
    }
        
    public function profesores(){
        
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
        $menu = $this->modelo->getMenuBasic();
        $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
        $data = $this->modelo->getProfesores();
        $this->load->view('wrapper/view_profesores',$data);
        $this->load->view('guest/footer');
    }
    
    public function profesor($id_admin){
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
        $menu = $this->modelo->getMenuBasic();
        $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
        $data = $this->modelo->getContadoresAdmin($id_admin);
        $this->load->view('wrapper/view_profesor_filtrado',$data);
        $this->load->view('guest/footer');
    }
    
    public function audioprofesor($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/audioprofesor/'.$id.'/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas($this->session->userdata('Id'),'audio');//calcula el número de filas  
            $config['per_page'] = 12; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 3;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["material"] = $this->modelo2->paginacionAudio($config['per_page'],$this->uri->segment(3),$id);
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_material_profesor',$data);
    $this->load->view('guest/footer');
    }
    public function videoprofesor($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/videoprofesor/'.$id.'/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas($this->session->userdata('Id'),'video');//calcula el número de filas  
            $config['per_page'] = 12; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 4;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["material"] = $this->modelo2->paginacionVideos($config['per_page'],$this->uri->segment(4),$id);
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_material_profesor',$data);
    $this->load->view('guest/footer');
    }
    public function librosprofesor($id){
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
    $menu = $this->modelo->getMenuBasic();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'sistema/librosprofesor/nichos/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->modelo2->numeroFilas('','documentos');//calcula el número de filas  
            $config['per_page'] = 16; //Número de registros mostrados por páginas
            $config['num_links'] = 5; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera';//primer link
            $config['last_link'] = 'Última';//último link
            $config["uri_segment"] = 4;//el segmento de la paginación
            $config['next_link'] = 'Siguiente';//siguiente link
            $config['prev_link'] = 'Anterior';//anterior link
            $this->pagination->initialize($config); //inicializamos la paginación		
            $data["material"] = $this->modelo2->paginacionDocumentos($config['per_page'],$this->uri->segment(3),$id);
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_material_profesor',$data);
    $this->load->view('guest/footer');  
    }
}

?>