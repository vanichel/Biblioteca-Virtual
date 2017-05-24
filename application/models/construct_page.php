<?php

 class Construct_page extends CI_Model{
    
    
    public function getMenuBasic(){
      $menu = '  <li>
                        <a href="'.base_url().'sistema/audio"><i class="fa fa-headphones fa-3x"></i> Ver Audio</a>
                    </li>
                     <li>
                        <a  href="'.base_url().'sistema/video"><i class="fa fa-video-camera fa-3x"></i> Ver Videos</a>
                    </li>
                    <li>
                        <a  href="'.base_url().'sistema/documentos"><i class="fa fa-book fa-3x"></i> Ver Libros-PDF</a>
                    </li>
						   <li  >
                        <a   href="'.base_url().'sistema/profesores"><i class="fa fa-users fa-3x"></i> Profesores</a>
                    </li>				
				    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Temas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">';
        $query = $this->db->query('SELECT * FROM categoria');
                    foreach($query->result_array() as $row){
                        $menu .= '<li><a href="';
                        $menu .= base_url();
                        $menu .= 'sistema/categorias/';
                        $menu .= $row['Id_categoria'];
                        $menu .= '">';
                        $menu .= $row['Nombre'];
                        $menu .= '</a></li>';
                    }
        $menu .=    '</ul>
               </ul>
            </div>
            
        </nav>';
        return $menu;
        }
    public function getMenuAdministrador(){
      $menu = ' <li>
                        <a href="'.base_url().'admin/audio"><i class="fa fa-headphones fa-3x"></i> Ver Audio</a>
                    </li>
                     <li>
                        <a  href="'.base_url().'admin/videos"><i class="fa fa-video-camera fa-3x"></i> Ver Videos</a>
                    </li>
                    <li>
                        <a  href="'.base_url().'admin/documentos"><i class="fa fa-book fa-3x"></i> Ver Libros-PDF</a>
                    </li>
						   <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Subir Nuevo...<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="'.base_url().'admin/uploadVideo">Video</a>
                            </li>
                            <li>
                                <a href="'.base_url().'admin/uploadAudio">Audio</a>
                            </li>
                            <li>
                            <li>
                            <a href="'.base_url().'admin/uploadDocument">Documento</a>
                            </li>
                            </ul>
                    </li>	
                      <li  >
                        <a  href="'.base_url().'admin/temas"><i class="fa fa-table fa-3x"></i> Modificaci&oacute;n de Temas</a>
                    </li>			
                </ul>
               
            </div>
            
        </nav>';
        return $menu;
          
    
        }

    public function getCategorias(){
    $query = $this->db->query("SELECT * FROM categoria");
    
    if ($query->num_rows()>0){
        $data = '<select class="form-control" required="required" placeholder="Seleccione una categoria">';
        foreach($query->result_array() as $row){
            $data .='<option id="';
            $data .=$row['Id_categoria'];
            $data .='">';
            $data .= $row['Nombre'];
            $data .= '</option>';        
        }
        $data .= '</select>';
    }
    return $data;
}
    public function optionUpload(){
    $query = $this->db->query("SELECT * FROM categoria");
    
    if ($query->num_rows()>0){
        $data = '<select class="form-control" required="required" style="width: 50%;" placeholder="Seleccione una categoria" id="categoria">';
        foreach($query->result_array() as $row){
            $data .='<option value="';
            $data .=$row['Id_categoria'];
            $data .='">';
            $data .= $row['Nombre'];
            $data .= '</option>';        
        }
        $data .= '</select>';
    }
    return $data;
        }
        
    public function getProfesores(){
        $data['info'] = '';
        $consulta = $this->db->select("*")
        ->from("administrador")
        ->get();
        
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data['info'] .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data['info'] .= base_url().$row['Path_image_profile'];
                $data['info'] .= '" alt="">
                            <hr style="margin-bottom:10px; margin-top:10px;"/>
                            <div class="caption">
                                <strong><h3 style="font-size:14px;"><a href="';
                $data['info'] .= base_url()."sistema/profesor/".$row['Id_admin'];
                $data['info'] .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3></strong>
                                <p>'.substr($row["Informacion"],0,140).'...</p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
        
    }
    
    public function getContadoresCategoria($categoria,$tipo){
        if ($tipo == 'documentos'){
            $tipo = 'pdf';
        }
        $query = $this->db->select('*')
                          ->from($tipo)
                          ->join('material',$tipo.'.Id_material = material.Id_material ')
                          ->where('material.Id_categoria = '.$categoria)
                          ->get();
                          
                          return $query->num_rows();        
    }    
    public function getContadoresSistema($categoria){
        if ($categoria !=''){       
        $data = "";
        $query = $this->db->select('video.Id_material')
                          ->from('video')
                          ->join('material','material.Id_material = video.Id_material')
                          ->join('categoria','material.Id_categoria = categoria.Id_categoria')
                          ->where("categoria.Id_categoria like '".$categoria."'")
                          ->get();
        
        $data['video'] = $query->num_rows();
        
        $query = $this->db->select('Id_material')
                          ->from('pdf')
                          ->get();
        
        $data['documentos'] = $query->num_rows();
        
        $query = $this->db->select('Id_material')
                          ->from('audio')
                          ->get();
        
        $data['audio'] = $query->num_rows();
        
        $data['admin'] = 'Invitado';
        $data['categoria'] = $categoria;
        }
        else{
            
        
        $data = "";
        $query = $this->db->select('Id_material')
                          ->from('video')
                          ->get();
        
        $data['video'] = $query->num_rows();
        
        $query = $this->db->select('Id_material')
                          ->from('pdf')
                          ->get();
        
        $data['documentos'] = $query->num_rows();
        
        $query = $this->db->select('Id_material')
                          ->from('audio')
                          ->get();
        
        $data['audio'] = $query->num_rows();
        
        $data['admin'] = 'Invitado';
        }
        return $data;
    }
    
    public function getContadoresAdmin($id){
        $data = "";
        $query = $this->db->select('video.Id_material')
                          ->from('video')
                          ->join('material','material.Id_material = video.Id_material')
                          ->where("Id_admin like '".$id."'")
                          ->get();
        
        $data['video'] = $query->num_rows();
        
        $query = $this->db->select('pdf.Id_material')
                          ->from('pdf')
                          ->join('material','material.Id_material = pdf.Id_material')
                          ->where("Id_admin like '".$id."'")
                          ->get();
        
        $data['documentos'] = $query->num_rows();
        
        $query = $this->db->select('Id_material')
                          ->from('audio')
                          ->get();
        
        $data['audio'] = $query->num_rows();
        
        $query = $this->db->select('sum(Visitas)')
                          ->from('material')
                          ->where('Id_admin',$id)
                          ->get();
                          
        foreach($query->result_array() as $row){
            
        $number = $row['sum(Visitas)'];
        }
        $data['visitas'] = $number;
        
        $data['admin'] = $this->session->userdata('nombre');
        $data['id'] = $id;
        
        return $data;
    }
    
    public function dataUsuario(){
        $data = "";
        $query = $this->db->select('Id_admin,Nombre,Password,Informacion,Path_image_profile')
                          ->from('administrador')
                          ->where("Id_admin like '".$this->session->userdata('Id')."'")
                          ->get();
                          
        foreach($query->result_array() as $row){
            $data['id_admin'] = $row['Id_admin'];
            $data['nombre'] = $row['Nombre'];
            $data['password'] =$row['Password'];
            $data['informacion'] = $row['Informacion'];
            $data['imagen'] = $row['Path_image_profile'];
        }
        return $data;
    }
    
    public function cambiarNombreUsuario($nombre,$id){
        $data = array(
        'Nombre'=>$nombre
        );
        
        $this->db->where('Id_admin',$id);
        $this->db->update('administrador',$data);
        echo($nombre);
        
    }
    
    public function cambiarImagenUsuario($filename,$id){
        $data = array(
        'Path_image_profile'=>'data/imgUsers/'.$filename
        );
        
        $this->db->where('Id_admin',$id);
        $this->db->update('administrador',$data);
        
    }
    
    public function cambiarContraseñaUsuario($actual,$nueva){
        $query = $this->db->query("SELECT Password FROM administrador WHERE Id_admin like '".$this->session->userdata('Id')."'");
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
             $id = $row['Password'];
             }
             }
        if($actual == $id){
            $data = array(
            'Password'=>$nueva
            );
            
            $this->db->where('Id_admin',$this->session->userdata('Id'));
            $this->db->update('administrador',$data);
            echo('Procedimiento correcto');
        }
        else{
            echo('la contraseña actual no coincide');
        }
        
    }
    
    public function cambiarInformacionUsuario($info,$id){
        $data = array(
            'Informacion'=>$info
        );
        
        $this->db->where('Id_admin',$id);
        $this->db->update('administrador',$data);
        echo($info);
                
    }
   
}
?>