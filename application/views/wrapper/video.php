<div id="page-wrapper" >
    <div id="page-inner">
            <!-- Row de Titulos -->    
    <div class="row">
<div class="col-lg-12">
    <form action="<?=base_url()?>busqueda/video" method="POST">
      <div class="input-group" style="width: 50%;">
      <input type="text" class="form-control" placeholder="Buscar por Palabras Clave" name="buscando" id="buscando"/>
      <span class="input-group-btn">
        <button class="btn btn-default glyphicon glyphicon-search" type="submit"></button>
      </span>
      </form>  
    </div>
  </div>
  <br />
  <hr />        
  
  <!-- paginacion de videos  -->
  <div class="col-md-12">
<?php
if ($videos){
    echo $videos;
}
else {
    echo 'No Hay Nada Que Mostrar';
}
?>

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
            