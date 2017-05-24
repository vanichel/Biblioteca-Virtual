<?php
class Material_model extends CI_Controller{
    
    public function rescatarVideo($id){
      $query = $this->db->query("SELECT * FROM material m, video v WHERE m.Id_material=".$id." AND m.Id_material = v.Id_material");
        foreach($query->result_array() as $row){
            $path = base_url().$row['Path_material'];
            }
      
      $data = '<div class="flowplayer">
                    <video data-title="Adaptive ratio">
                        <source type="video/mp4" src="'.$path.'">
                    </video>
                </div>';
             return $data;
             
              }
    public function rescatarLibro($id){
        $query = $this->db->query("SELECT * FROM material m, pdf p WHERE m.Id_material=".$id." AND m.Id_material=p.Id_material");
            foreach($query->result_array() as $row){
                $data = '<iframe src="'.base_url().'plantilla/readpdf/viewer.html?file='.base_url();
                $data .= $row['Path_material'];
                $data .= '" style="width: 100%; height: 900px;"></iframe>';
            }
        return $data;
    }
    
    public function rescatarAudio($id){
        $query = $this->db->query("SELECT * FROM material m, audio p WHERE m.Id_material=".$id." AND m.Id_material=p.Id_material");
        foreach($query->result_array() as $row){
            $data = '<audio controls>';
            $data .='<source src="'.base_url().$row["Path_material"].'" type="audio/mp3" />';
            $data .='</audio>';
        }
        return $data;
    }
    
    public function numeroFilas($atributo,$material){
        if ($atributo != ''){
            switch ($material){
                case 'video' : $consulta = $this->db->select("*")
                                                    ->from('video')
                                                    ->join('material','video.Id_material = material.Id_material')
                                                    ->where("material.Id_admin LIKE '".$atributo."'")
                                                    ->get();
                        break;
                case 'documentos': $consulta = $this->db->select('*')
                                                        ->from('pdf')
                                                        ->join('material','material.Id_material = pdf.Id_material')
                                                        ->where("material.Id_admin LIKE '".$atributo."'")
                                                        ->get();
                                                        
                            break;
                            
                case 'audio': $consulta = $this->db->select("*")
                                                    ->from('audio')
                                                    ->join('material','audio.Id_material = material.Id_material')
                                                    ->where("material.Id_admin like '".$atributo."'")
                                                    ->get();
            }
            }
            else{
            switch ($material){
                case 'video' : $consulta = $this->db->query('select * from video');
                        break;
                case 'documentos': $consulta = $this->db->query('select * from pdf');
                            break;
                case 'audio': $consulta = $this->db->query('select * from audio');
                            }
        
        }
        return $consulta->num_rows();
    }
    
    public function paginacionVideos($por_pagina,$segmento,$id){
        if ($id==''){
            $where = 'material.Id_material = video.Id_material';
        }
        else{
            $where = "material.Id_admin like '".$id."'";
        }
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("video", "material.Id_material = video.Id_material")
        ->where($where)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionvideo/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionVideosAdmin($por_pagina,$segmento){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("video", "material.Id_material = video.Id_material")
        ->where("Id_admin like '".$this->session->userdata('Id')."'")
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                        <a href="javascript:eliminarVideo('.$row["Id_material"].')" class="btn btn-default glyphicon glyphicon-remove-circle" style="position: absolute;margin-left: 4px;margin-top: 6px;"></a>
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionvideo/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionVideosCategoria($por_pagina, $segmento, $categoria){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("video", "material.Id_material = video.Id_material")
        ->where("Id_categoria = ".$categoria)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionvideo/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionDocumentos($por_pagina, $segmento,$id){
         if ($id==''){
            $where = 'material.Id_material = pdf.Id_material';
        }
        else{
            $where = "material.Id_admin like '".$id."'";
        }
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("pdf", "material.Id_material = pdf.Id_material")
        ->where($where)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/visorducumento/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionDocumentosAdmin($por_pagina, $segmento){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("pdf", "material.Id_material = pdf.Id_material")
        ->where("Id_admin like '".$this->session->userdata('Id')."'")
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                        <a href="javascript: eliminarLibro('.$row["Id_material"].')" class="btn btn-default glyphicon glyphicon-remove-circle" style="position: absolute;margin-left: 4px;margin-top: 6px;"></a>
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/visorducumento/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionDocumentosCategoria($por_pagina, $segmento, $categoria){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("pdf", "material.Id_material = pdf.Id_material")
        ->where("Id_categoria = ".$categoria)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/visorducumento/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
        
    }
    
    public function paginacionAudio($por_pagina,$segmento,$id){
        if ($id==''){
            $where = 'material.Id_material = audio.Id_material';
        }
        else{
            $where = "material.Id_admin like '".$id."'";
        }
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("audio", "material.Id_material = audio.Id_material")
        ->where($where)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionaudio/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionAudioAdmin($por_pagina,$segmento){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("audio", "material.Id_material = audio.Id_material")
        ->where("Id_admin like '".$this->session->userdata('Id')."'")
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                        <a href="javascript: eliminarAudio('.$row["Id_material"].')" class="btn btn-default glyphicon glyphicon-remove-circle" style="position: absolute;margin-left: 4px;margin-top: 6px;"></a>
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionaudio/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function paginacionAudioCategoria($por_pagina, $segmento, $categoria){
        $data = '';
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("audio", "material.Id_material = audio.Id_material")
        ->where("Id_categoria = ".$categoria)
        ->limit($por_pagina,$segmento)
        ->get();
        if ($consulta->num_rows()>0){
            foreach($consulta->result_array() as $row){
                $data .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="';
                
                $data .= base_url().$row['Path_image'];
                $data .= '" alt="">
                            <div class="caption">
                                <h3><a href="';
                $data .= base_url()."sistema/reproduccionaudio/".$row['Id_material'];
                $data .= '">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                                
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data .= $row['Nombre'];      
                }
                $data .= '  </p>
                            </div>
                        </div>
                    </div>';
            
            }
        }
        else{
            
        }
        return $data;
    }
    
    public function dataVideoReproduccion($id){
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("video", "material.Id_material = video.Id_material")
        ->where('material.Id_material LIKE '.$id)
        ->get();
        if ($consulta->num_rows()>0){
            foreach ($consulta->result_array() as $row){
            $data['video'] = '<div class="flowplayer">
                    <video data-title="Adaptive ratio">
                        <source type="video/mp4" src="'.base_url().$row["Path_material"].'">
                    </video>
                </div>';
            $data['titulo'] = $row['Nombre'];
            $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $raw){
            $data['uploader'] = "Material Proporcionado Por: ".$raw['Nombre'];      
                }
                $data['autor'] = "Autor del Material: ".$row['Autor'];
                $data['descripcion'] = $row['Descripcion'];
                $data['visitas'] = $row['Visitas']." Visitas";
                $data['uploaddate'] = "Subido el ".$row['Fecha_subida'];
                $autor = $row['Id_admin'];
                $this->db->where('Id_material',$row['Id_material']);
                $this->db->update('material',array('Visitas'=>($row['Visitas']+1)));
            }
        }
        
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("video", "material.Id_material = video.Id_material")
        ->where("Id_admin like '".$autor."'")
        ->order_by("rand()")
        ->limit(8)
        ->get();
        if ($consulta->num_rows()>0){
            $data['recomendado'] = "";
            foreach($consulta->result_array() as $row){
                $data['recomendado'] .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="'.base_url().$row["Path_image"].'" alt="">
                            <div class="caption">
                                <h3><a href="'.base_url()."sistema/reproduccionvideo/".$row["Id_material"].'">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data['recomendado'] .= $row['Nombre'];      
                }
                $data['recomendado'] .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
       
    }
     return $data;
    }

    public function dataLibroVisualizacion($id){
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("pdf", "material.Id_material = pdf.Id_material")
        ->where('material.Id_material LIKE '.$id)
        ->get();
        if ($consulta->num_rows()>0){
            foreach ($consulta->result_array() as $row){
            $data['documento'] = '<iframe src="'.base_url().'plantilla/readpdf/viewer.html?file='.base_url().$row["Path_material"].'" style="width: 100%; height: 900px;">
                                  </iframe>';
            $data['titulo'] = $row['Nombre'];
            $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $raw){
            $data['uploader'] = "Material Proporcionado Por: ".$raw['Nombre'];      
                }
                $data['autor'] = "Autor del Material: ".$row['Autor'];
                $data['descripcion'] = $row['Descripcion'];
                $data['visitas'] = $row['Visitas']." Visitas";
                $data['uploaddate'] = "Subido el ".$row['Fecha_subida'];
                $autor = $row['Id_admin'];
                $data['paginas'] = $row['Num_pag'];
                $this->db->where('Id_material',$row['Id_material']);
                $this->db->update('material',array('Visitas'=>($row['Visitas']+1)));
            }
        }
        
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("pdf", "material.Id_material = pdf.Id_material")
        ->where("Id_admin like '".$autor."'")
        ->order_by("rand()")
        ->limit(8)
        ->get();
        if ($consulta->num_rows()>0){
            $data['recomendado'] = "";
            foreach($consulta->result_array() as $row){
                $data['recomendado'] .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="'.base_url().$row["Path_image"].'" alt="">
                            <div class="caption">
                                <h3><a href="'.base_url()."sistema/visorducumento/".$row["Id_material"].'">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data['recomendado'] .= $row['Nombre'];      
                }
                $data['recomendado'] .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
       
    }
     return $data;
}

public function dataAudioReproduccion($id){
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("audio", "material.Id_material = audio.Id_material")
        ->where('material.Id_material LIKE '.$id)
        ->get();
        if ($consulta->num_rows()>0){
            foreach ($consulta->result_array() as $row){
            $data['audio'] = '<div>
                    <img src="'.base_url().$row['Path_image'].'" />
                    <audio controls autoplay style="width:100%">
                        <source type="audio/mp3" src="'.base_url().$row["Path_material"].'">
                    </audio>
                </div>';
            $data['titulo'] = $row['Nombre'];
            $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $raw){
            $data['uploader'] = "Material Proporcionado Por: ".$raw['Nombre'];      
                }
                $data['autor'] = "Autor del Material: ".$row['Autor'];
                $data['descripcion'] = $row['Descripcion'];
                $data['visitas'] = $row['Visitas']." Visitas";
                $data['uploaddate'] = "Subido el ".$row['Fecha_subida'];
                $autor = $row['Id_admin'];
                $this->db->where('Id_material',$row['Id_material']);
                $this->db->update('material',array('Visitas'=>($row['Visitas']+1)));
                $data['duracion'] = $row['Duracion'];
            }
        }
        
        $consulta = $this->db->select("*")
        ->from("material")
        ->join("audio", "material.Id_material = audio.Id_material")
        ->where("Id_admin like '".$autor."'")
        ->order_by("rand()")
        ->limit(8)
        ->get();
        if ($consulta->num_rows()>0){
            $data['recomendado'] = "";
            foreach($consulta->result_array() as $row){
                $data['recomendado'] .= '<div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="'.base_url().$row["Path_image"].'" alt="">
                            <div class="caption">
                                <h3><a href="'.base_url()."sistema/reproduccionaudio/".$row["Id_material"].'">'.substr($row["Nombre"],0,37).'...</a>
                                </h3>
                                <p>'.substr($row["Descripcion"],0,140).'...</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-left" style="font-size: 10px;">Subido por: </p>
                                <p class="pull-rigth" style="font-size: 10px;">';
                $query = $this->db->query("select Nombre from administrador where Id_admin like '".$row['Id_admin']."'");
                 foreach($query->result_array() as $row){
                  $data['recomendado'] .= $row['Nombre'];      
                }
                $data['recomendado'] .= '  </p>
                            </div>
                        </div>
                    </div>';
            }
       
    }
     return $data;
}
      //Eliminacion de material
      public function eliminarVideo($id_material,$type){
        $query = $this->db->select('Path_material')
                          ->from('material')
                          ->join('video','material.Id_material = video.Id_material')
                          ->where('material.Id_material = '.$id_material)
                          ->get();
                          
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
                $this->db->delete('video','Id_material = '.$id_material.'');
                $this->db->delete('material','Id_material = '.$id_material.'');
            }
            echo '<div class="alert alert-success">Archivo Eliminado Con Exito</div>';
        }
        else{
            echo 'El archivo ya no existe';
        }                                                    
      }
      //Elimina material de audio
      
      public function eliminarAudio($id_material,$type){
        $query = $this->db->select('Path_material')
                          ->from('material')
                          ->join('audio','material.Id_material = audio.Id_material')
                          ->where('material.Id_material = '.$id_material)
                          ->get();
                          
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
                $this->db->delete('audio','Id_material = '.$id_material.'');
                $this->db->delete('material','Id_material = '.$id_material.'');
            }
            echo '<div class="alert alert-success">Archivo Eliminado Con Exito</div>';
        }
        else{
            echo 'El archivo ya no existe';
        }                                                    
      }
      
      public function eliminarLibro($id_material,$type){
        $query = $this->db->select('Path_material')
                          ->from('material')
                          ->join('pdf','material.Id_material = pdf.Id_material')
                          ->where('material.Id_material = '.$id_material)
                          ->get();
                          
        if ($query->num_rows()>0){
            foreach($query->result_array() as $row){
                $this->db->delete('pdf','Id_material = '.$id_material.'');
                $this->db->delete('material','Id_material = '.$id_material.'');
            }
            echo '<div class="alert alert-success">Archivo Eliminado Con Exito</div>';
        }
        else{
            echo 'El archivo ya no existe';
        }                                                    
      }
}

?>