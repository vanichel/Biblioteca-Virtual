<div id="page-wrapper" >
    <div id="page-inner">
            <!-- Row de Titulos -->             
    <div class="row">
  <!-- paginacion de videos  -->
  
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel panel-heading">
    Video Subidos Por Usuario : <?=$this->session->userdata('nombre')?>
    </div>
    <div class="panel panel-body">
    <div id="mensaje"></div>
    <?php
    if ($audio){
        echo $audio;
    }
    else {
        echo 'No Hay Nada Que Mostrar';
    }
    ?>
    </div>
    </div>
    </div>
    <br />
    <div align='center' class="col-sm-6 col-md-12">
      <?=$pagination?>
    </div>
    
  <!-- END paginacion de videos -->
    <!-- /. row -->
        
        </div>
             <!-- /. PAGE INNER  -->
             </div>