<div id="page-wrapper" >
    <div id="page-inner">
       <!-- row reproductor -->
        <div class="row">
            <div class="col-md-12">
                <?=$documento?>
                <div class="thumbnail" style="height: auto;">
                    <div class="caption-full">
                        <h4 class="pull-right"><?=$paginas?> P&aacute;ginas</h4>
                        <h4><strong><a><?=$titulo?></a></strong>
                        </h4>
                        <strong><p><?=$uploader?></p></strong>
                        <strong><p><?=$autor?></p></strong>
                        <p><?=$descripcion?></p>
                    </div>
                    <br />
                    <div class="ratings" style="alignment-adjust: baseline;">
                        <p class="pull-right"><?=$visitas?></p>
                        <p><?=$uploaddate?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Row reproductor -->
        <hr />
        
        <!-- row recomendaciones -->
        <div class="row">
        <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
        <div class="panel panel-heading">
        Mas Libros Subidos Por El Mismo Usuario
        </div>
        <div class="panel panel-body">
        <?=$recomendado?>
        </div>
        </div>
        </div></div>
        <!-- ./ row recomendaciones -->
             <!-- /. PAGE INNER  -->
             </div>
            