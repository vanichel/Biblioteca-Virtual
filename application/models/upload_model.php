<?php
class Upload_model extends CI_Model{
    public function __construct() {
        
    }
    
    public function insertarVideo($nombre,$categoria,$localizacion,$descripcion,$Keywords,$autor,$pathImage){
        $query = $this->db->query('SELECT max(Id_material) FROM material');
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
             $id = $row['max(Id_material)'] + 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
            $this->db->insert('video',array('Id_material'=>$id,
                                            'Duracion'=>'Desconocido',
                                            'Path_image'=>$pathImage,
                                            'Autor'=>$autor));                                             
            }
        }
        else{
             $id = 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id_admin'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
            $this->db->insert('video',array('Id_material'=>$id,
                                            'Duracion'=>'Desconocido',
                                            'Path_image'=>$pathImage,
                                            'Autor'=>$autor));                                             
            
        }
        echo $id;
    
    }
    
    public function uploadDocument($nombre,$categoria,$localizacion,$descripcion,$Keywords,$autor,$pathImage){
        $query = $this->db->query('SELECT max(Id_material) FROM material');
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
             $id = $row['max(Id_material)'] + 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
                                                                                                                                                
            $this->db->insert('pdf',array('Id_material'=>$id,
                                            'Autor'=>$autor,
                                            'Path_image'=>$pathImage,
                                            'Num_pag'=>1));                                             
            }
        }
        else{
             $id = 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id_admin'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
            $this->db->insert('pdf',array('Id_material'=>$id,
                                            'Autor'=>$autor,
                                            'Path_image'=>$pathImage,
                                            'Num_pag'=>1));                                             
            
        }
             echo $id;  
      }
      
    public function uploadAudio($nombre,$categoria,$localizacion,$descripcion,$Keywords,$autor,$pathImage){
        $query = $this->db->query('SELECT max(Id_material) FROM material');
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
             $id = $row['max(Id_material)'] + 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
                                                                                                                                                
            $this->db->insert('audio',array('Id_material'=>$id,
                                            'Autor'=>$autor,
                                            'Path_image'=>$pathImage,
                                            'Duracion'=>'00:00'));                                             
            }
        }
        else{
             $id = 1;
             $this->db->insert('material',array('Id_material'=>$id,
                                                'Id_categoria'=>$categoria,
                                                'Id_admin'=>$this->session->userdata('Id_admin'),
                                                'Nombre'=>$nombre,
                                                'Path_material'=>$localizacion,
                                                'Descripcion'=>$descripcion,
                                                'Keywords'=>$Keywords,
                                                'Fecha_subida'=>date('Y-m-d'),
                                                'Visitas' => 0));
            $this->db->insert('audio',array('Id_material'=>$id,
                                            'Autor'=>$autor,
                                            'Path_image'=>$pathImage,
                                            'Duracion'=>'00:00'));                                              
            
        }
             echo $id;  
      }
    
}
?>