<div id="page-wrapper" >
    <div id="page-inner">
            <!-- Row de Titulos -->             
    <div class="row">
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar por Palabras Clave">
      <span class="input-group-btn">
        <button class="btn btn-default glyphicon glyphicon-search" type="button"></button>
      </span>
    </div>
  </div>
  <br />
  <hr />        
  
  <!-- paginacion de videos  -->
  <div class="col-md-12">
<?php
if ($material){
    echo $material;
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