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
                <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="alert alert-success" role="alert">
                <strong>Su archivo se a subido correctamente</strong>
                </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                <?=$capsule?>
                </div>
                </div>               
                <!-- /. ROW  -->
                       
    </div>
             <!-- /. PAGE INNER  -->