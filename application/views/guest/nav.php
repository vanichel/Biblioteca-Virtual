</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>">VBook</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
<?php
if ($this->session->userdata('login')){  
?>
<div class='dropdown'>
                      <a class='btn btn-danger dropdown-toggle' href='#' data-toggle='dropdown' style="background: #fff;"><?php echo $this->session->userdata('nombre'); ?><strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 0px; padding-bottom: 0px; background: none; width: 230px; left: 0px;'>
                        <div class='form-group'>
                            <a class="fa fa-pencil btn btn-success" href="<?=base_url()?>admin/perfil">Modificar Mi Informaci&oacute;n</a>
                          </div>
                            <div class='form-group'> 
                               <a class="btn btn-success fa fa-remove" href="<?=base_url()?>login/logout">Cerrar Sesi&oacute;n</a> 
                            </div>
                      </div>
                    </div> 
<?php
}
else {
?>
<div class='dropdown'>
                      <a class='btn btn-danger dropdown-toggle' href='#' data-toggle='dropdown' style="background: #fff;">INICIAR SESION <strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: none; width: 400px;'>
                        <form action='<?=base_url()?>login' method='post' accept-charset='UTF-8' role="form">
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='text' name='user' placeholder='usuario'/>
                          </div>
                            <div class='form-group'> 
                                <input class='form-control large' style='text-align: center;' type='password' name='password' placeholder='contraseña' />
                            </div>
                          <div class='form-group'>
                                <button class='btn btn-primary' style='width: 380px;' type='submit'>INGRESAR</button>
                          </div>
                          </form>
                      </div>
                    </div> 
                    <?php }?>
                    </div>
        </nav>   
           <!-- /. NAV TOP  -->
<div>
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <a href="<?=$direccion?>">
                    <img src="<?=$imagen?>" class="user-image img-responsive" width="230"/>
                    </a>
					</li>
<?=$menu?>
</div>
        <!-- /. NAV SIDE  -->
         
   
