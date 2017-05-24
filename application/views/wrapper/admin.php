<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-1">
                     <h2>Administrador</h2>   
                        <h4><?=$admin?></h4>
                    </div>
                    <div class="panel panel-primary text-center no-border bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-hdd-o fa-3x"></i>
                            <?php
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
                                    $por = round($por);
                            ?>
                            <h3><?=$df?> </h3>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=100 - $por?>%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        
                        <div class="panel-footer back-footer-green">
                          Espacio en Disco Disponible <?=$por?>%
                        </div>
                    </div>
                </div>             
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <a href="#"><div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-headphones"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$audio?> Archivos De Audio</p>
                </div>
             </div>
		     </div>
             </a>
                    <a href="#"><div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-video-camera"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$video?> Archivos De Video</p>
                </div>
             </div>
		     </div>
             </a>
                    <a href="#"><div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-book"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$documentos?> Documentos</p>
                </div>
             </div>
		     </div>
             </a>
                 <a href="#"><div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-eye"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$visitas?> <br /> Visitas</p>
                </div>
             </div>
		     </div>
             </a>
			</div>
              <hr />  
                 <!-- /. ROW  -->
                <div class="row"> </div>
                 <!-- /. ROW  -->       
    </div>
             <!-- /. PAGE INNER  -->
            