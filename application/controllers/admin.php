<?php
class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('construct_page','modelo');
        $this->load->model('material_model','modelo2');
    }
    
    public function index(){
    if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        header("Location: ".base_url());
    }
    $this->load->view('guest/head');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data = $this->modelo->getContadoresAdmin($this->session->userdata('Id'));
    $this->load->view('wrapper/admin',$data);
    $this->load->view('guest/footer');
    }
    
    public function videos(){
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
    $this->load->view('scripts/deleteVideoScript');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'admin/videos/'; 
            $config['total_rows'] = $this->modelo2->numeroFilas($this->session->userdata('Id'),'video');
            $config['per_page'] = 12; 
            $config['num_links'] = 5; 
            $config['first_link'] = 'Primera';
            $config['last_link'] = 'Última';
            $config["uri_segment"] = 3;
            $config['next_link'] = 'Siguiente';
            $config['prev_link'] = 'Anterior';
            $this->pagination->initialize($config); 
            $data["videos"] = $this->modelo2->paginacionVideosAdmin($config['per_page'],$this->uri->segment(3));
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_admin_videos',$data);
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
    $this->load->view('scripts/deleteAudioScript');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'admin/audio/'; 
            $config['total_rows'] = $this->modelo2->numeroFilas($this->session->userdata('Id'),'audio');
            $config['per_page'] = 12;
            $config['num_links'] = 5;
            $config['first_link'] = 'Primera';
            $config['last_link'] = 'Última';
            $config["uri_segment"] = 3;
            $config['next_link'] = 'Siguiente';
            $config['prev_link'] = 'Anterior';
            $this->pagination->initialize($config); 
            $data["audio"] = $this->modelo2->paginacionAudioAdmin($config['per_page'],$this->uri->segment(3));
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_admin_audios',$data);
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
    $this->load->view('scripts/deleteLibroScript');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
            $config['base_url'] = base_url().'admin/documentos/';
            $config['total_rows'] = $this->modelo2->numeroFilas($this->session->userdata('Id'),'video');  
            $config['per_page'] = 16; 
            $config['num_links'] = 5; 
            $config['first_link'] = 'Primera';
            $config['last_link'] = 'Última';
            $config["uri_segment"] = 3;
            $config['next_link'] = 'Siguiente';
            $config['prev_link'] = 'Anterior';
            $this->pagination->initialize($config); 	
            $data["videos"] = $this->modelo2->paginacionDocumentosAdmin($config['per_page'],$this->uri->segment(3));
            $data['pagination'] = $this->pagination->create_links();			
    $this->load->view('wrapper/view_admin_videos',$data);
    $this->load->view('guest/footer'); 
    }
    
    public function temas(){
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
    $this->load->view('scripts/tema');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $this->load->view('wrapper/view_administracion_temas',array('admin'=>$admin,'audio'=>'30','video'=>'12','documentos'=>'45','visitas'=>'1265'));
    $this->load->view('guest/footer');
    }
    public function uploadVideo(){
    if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        header("Location: ".base_url());
    }
    $this->load->view('guest/head');
    $this->load->view('scripts/uploadVideoScript');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $optionUpload = $this->modelo->optionUpload();
    $this->load->view('wrapper/upload_video',array('admin'=>$admin,'selection'=>$optionUpload));
    $this->load->view('guest/footer');
    }
    public Function finalizado($id,$type){
        if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
                }
        else{
            header("Location: ".base_url());
            }
        $this->load->view('guest/head');
        
        $menu = $this->modelo->getMenuAdministrador();
        $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
        switch($type){
            case 'video': $capsule = $this->modelo2->rescatarVideo($id);
                          break;
            case 'libro': $capsule = $this->modelo2->rescatarLibro($id);
                          break;
            case 'audio': $capsule = $this->modelo2->rescatarAudio($id);
                          break; 
        }        
        $this->load->view('wrapper/finalizado',array('admin'=>$admin,'capsule'=>$capsule,'id'=>$id));
        $this->load->view('guest/footer');
    }
    public function uploadDocument(){
    if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        header("Location: ".base_url());
    }
    $this->load->view('guest/head');
    $this->load->view('scripts/uploadDocumentScript');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $optionUpload = $this->modelo->optionUpload();
    $this->load->view('wrapper/upload_document',array('admin'=>$admin,'selection'=>$optionUpload));
    $this->load->view('guest/footer');
    }
    public function uploadAudio(){
    if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        header("Location: ".base_url());
    }
    $this->load->view('guest/head');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $this->load->view('scripts/uploadAudioScript');
    $optionUpload = $this->modelo->optionUpload();
    $this->load->view('wrapper/view_upload_audio',array('admin'=>$admin,'selection'=>$optionUpload));
    $this->load->view('guest/footer');
    }
    
    public function perfil(){    
    if ($this->session->userdata('login')){
        $direccion = base_url().'admin';
        $image = base_url().''.$this->session->userdata('img');
        $admin = $this->session->userdata('nombre');
    }
    else{
        header("Location: ".base_url());
    }
    $this->load->view('guest/head');
    $menu = $this->modelo->getMenuAdministrador();
    $this->load->view('scripts/modificar_perfil');
    $this->load->view('guest/nav',array('menu'=>$menu,'direccion'=>$direccion,'imagen'=>$image));
    $data = $this->modelo->dataUsuario();
    $this->load->view('wrapper/view_modificarperfil',$data);
    $this->load->view('guest/footer');
    }
    
    public function modificarNombreAdministrador(){
    $nombre = $this->input->post('nombre');
    $id = $this->session->userdata('Id');
    $this->modelo->cambiarNombreUsuario($nombre,$id);
    
    }
    
    public function modificarInformacionAdministrador(){
        $info = $this->input->post('info');
        $id = $this->session->userdata('Id');
        $this->modelo->cambiarInformacionUsuario($info,$id);
        
    }
    
    public function modificarContrasenaAdministrador(){
        $actual = $this->input->post('actual');
        $nueva = $this->input->post('nuevo');
        
        $this->modelo->cambiarContraseñaUsuario($actual,$nueva);
    }
    
    public function modificarImagenAdministrador(){     
        $id = $this->session->userdata('Id');
        $fileName = $_FILES["fileUploadImage"]["name"];
        $fileTmpLoc = $_FILES["fileUploadImage"]["tmp_name"];
        $fileErrorMsg = $_FILES["fileUploadImage"]["error"];
        
        if(!$fileTmpLoc){
	       echo "ERROR: Please browse for a file before clicking the upload button";
	           exit();
        }
        if (move_uploaded_file($fileTmpLoc, "./data/imgUsers/$fileName")){
            $this->modelo->cambiarImagenUsuario($fileName,$id);
                  
        }
        else{
	       echo "move_uploaded_file funcion fallida";
        }
        
    }
    
    public function modificarTema(){
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $query = $this->db->query('SELECT max(Id_categoria) FROM categoria');
        foreach($query->result_array() as $row){
            $id = $row['max(Id_categoria)'] + 1;
        }
        
        $data = array(
        'Id_categoria'=>$id,
        'Nombre'=>$nombre,
        'Informacion'=>$descripcion
        );
        $this->db->insert('categoria',$data);
        echo('realizado con exito');
        
        
    }
        
}
        
?>