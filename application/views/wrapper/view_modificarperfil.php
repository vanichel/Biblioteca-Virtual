<div id="page-wrapper" >
    <div id="page-inner">
            <!-- Row de Titulos -->             
    <div class="row">
        <div><strong><p class="alert alert-success">Modificaci&oacute;n de Perfil</p></strong></div>
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel panel-heading">
    Datos Actuales Del Usuario:
    </div>
    <div class="panel panel-body">
    <p class="label label-success">Nombre</p>
    <div class="alert alert-info" id="nombre"><?=$nombre?><button class="btn btn-success fa fa-pencil-square" align="right" data-target="#myModal" data-toggle="modal"> Cambiar</button></div>
    <div style="display: none;" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            <h4 class="modal-title" id="myModalLabel">Inserte Nuevo Nombre Del Usuario</h4>
                                        </div>
                                        <div class="modal-body">
                                        <textarea id="nombre1" style="width: 100%;"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" id="boton3" class="btn btn-primary" onclick="cambiarNombre()">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <p class="label label-success">Informacion Personal</p>
    <div class="alert alert-info" id="info"><?=$informacion?><button class="fa fa-pencil-square btn btn-success" align="right" data-target="#modalInfo" data-toggle="modal"> Cambiar</button></div>
    <div style="display: none;" class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                            <h4 class="modal-title" id="myModalLabel">Inserte la nueva Informacion</h4>
                                        </div>
                                        <div class="modal-body">
                                        <textarea id="informacion"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" id="boton2"class="btn btn-primary" onclick="cambiarInformacion()">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <p class="label label-success">Imagen de Perfil</p>
    <div class="img-thumbnail"><img src="<?=base_url().$imagen?>"/><button class="btn btn-success fa fa-pencil-square" align="right" data-target="#modalimg" data-toggle="modal"> Cambiar</button></div>
    <div style="display: none;" class="modal fade" id="modalimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                            <h4 class="modal-title" id="myModalLabel">Elija Una Nueva Imagen Para Su Perfil</h4>
                                        </div>
                                        <div class="modal-body">
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="button" id="boton"class="btn btn-primary" onclick="cambiarimagen()" value="Guardar" />
                                        </div>
                                    </div>
                                </div>
                            </div> 
    <div>
     <p class="label label-success">Cambiar Contrase&ntilde;a</p>
    <div class="alert alert-info" id="pass">************<button class="fa fa-pencil-square btn btn-success" align="right" data-target="#modalPass" data-toggle="modal" > Cambiar</button></div>
    </div>
    <div style="display: none;" class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            <h4 class="modal-title" id="myModalLabel">Cambiar Contrase&ntilde;a</h4>
                                        </div>
                                        <div class="modal-body">
                                        <label class="label label-success">Inserte su contrase&ntilde;a actual</label>
                                        <input type="text" class="form-control" id="actual" placeholder="Inserte La Contrase&ntilde;a Actual" />
                                        <br />
                                        <label class="label label-success">Inserte su nueva contrase&ntilde;a</label>
                                        <input type="text" class="form-control" id="nueva" placeholder="Inserte su nueva contrase&ntilde;a" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" id="boton3" class="btn btn-primary" onclick="cambiarPass()">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    </div>
    </div>
    <br />    
    <!-- /. row -->
        
        </div>
             <!-- /. PAGE INNER  -->
             </div>