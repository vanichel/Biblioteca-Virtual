<div id="page-wrapper" >
    <div id="page-inner">
            <!-- Row de Titulos -->             
    <div class="row">
  <br />        
  
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
            