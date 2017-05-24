<div id="page-wrapper" >
            <div id="page-inner">
            <!-- Row de Titulos -->
                <div class="row">
                    <div class="col-md-1">
                     <h2>Administrador</h2>   
                        <h4><?=$admin?></h4>
                    </div>
                    <!-- Fin Row De Titulos -->
                    <!-- Panel de Informacion De Capacidad de Disco -->
                    <div class="panel panel-primary text-center no-border bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-hdd-o fa-3x"></i>
                            <?php
                            //Calculo De Capacidad De Disco
                            $Bytes = disk_free_space("/");
                            $Bytes1 = disk_total_space("/"); 
    
                              $Type=array("", "k", "M", "G", "T", "P", "E", "Z", "Y");
                                $Index=0;
                                while($Bytes>=1024)
                                    {
                                $Bytes/=1024;
                                $Bytes1/=1024;
                                $Index++;
                                    }
                                    
                                    $df = round($Bytes,3);
                                    $df = ''.$df.' '.$Type[$Index]."b";
                                    $por = ($Bytes * 100)/$Bytes1;
                                    $por = 100 - round($por);
                            ?>
                            <h3><?=$df?> </h3>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$por?>%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        
                        <div class="panel-footer back-footer-green">
                          Espacio en Disco Disponible <?=100-$por?>%
                        </div>
                    </div>
                </div>             
                 <!-- /. ROW  -->
              <hr />  
                 <!-- /. ROW  -->
                <div class="row"> 
                <!-- Panel Upload Video -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Subir Nuevo Video</div>
                <div class="panel-body">
                <form class="formulario" id="uploader">
                    <label class="label label-success">Nombre:</label>
                    <input type="text" class="form-control" required="required" id="nombre" name="nombre"/>
                    <br />
                    <label class="label label-success">Decripci&oacute;n:</label>
                    <textarea id="descripcion" class="form-control"></textarea>
                    <br />
                    <label class="label label-success">Categor&iacute;a</label>
                    <div>
                    <?=$selection?>
                    <a style="width: 50%;" href="<?=base_url()?>admin/temas">&iquest;No encuentras la categoria Correcta? Creala Aqui</a>
                    </div>
                    <br />
                    <label class="label label-success">Tags(palabras clave separadas con un ";")</label>
                    <textarea class="form-control" id="tags"></textarea>
                    <br />
                    <label class="label label-success">Autor:</label>
                    <input class="form-control" id="autor" required="required"/>
                    <br />             
                <div class="alert alert-success">
                <strong>Seleccione un documento en formato PDF</strong>
                </div>
                    <div class="drag-drop" style="alignment-adjust: baseline;">
            <input type="file" id="fileUploadDocument" required="required"/>
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
            </span>
            <span class="desc">Pulse aqu&iacute; para subir un PDF</span>
                </div>
                <br />
                <div id="document-holder" align="center">
                </div>
                    <br/>
                    <div class="alert alert-success">
                <strong>Seleccione una imagen para su previsualizacion en el video</strong>
                </div>
                    <div class="drag-drop" style="alignment-adjust: baseline;">
            <input type="file" id="fileUploadImage" required="required" accept="image/*"/>
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
            </span>
            <span class="desc">Pulse aqu&iacute; para Subir una Imagen</span>
                </div>
                <div id="image-holder">
                </div>                    
                    <input type="button" class=" btn btn-primary fa fa-upload" value="Iniciar Subida" onclick="uploadFile()"/>
                    <br />
                    <br />
                    <div id="progressBar" class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width:100%">
                    </div>
                    </div>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </form>
                </div>
                </div>
                </div>
                <!-- fin Panel Upload Video -->              
                </div>              
                    <hr />
                
                 <!-- /. ROW  -->       
    </div>
             <!-- /. PAGE INNER  -->
