<script>
function _(el){
	return document.getElementById(el);
}

function cambiarNombre(){
            var parametros = {
                "nombre" : $('#nombre1').val()
                
        };
        $.ajax({
                data:  parametros,
                url:   '<?=base_url()?>'+'admin/modificarNombreAdministrador',
                type:  'post',
                beforeSend: function () {
                        $("#nombre").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#nombre").html(response);
                }
        });
$('#boton3').attr("disabled", true);
}

function cambiarInformacion(){
     var parametros = {
                "info" : $('#informacion').val()
                
        };
        $.ajax({
                data:  parametros,
                url:   '<?=base_url()?>'+'admin/modificarInformacionAdministrador',
                type:  'post',
                beforeSend: function () {
                        $("#info").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#info").html(response);
                }
        });
        
}

function cambiarimagen(){
    
    var file = _("fileUploadImage").files[0];
	var formdata = new FormData();
    formdata.append("fileUploadImage",file);
	var ajax = new XMLHttpRequest();
	ajax.open("POST", "<?=base_url()?>admin/modificarImagenAdministrador");
	ajax.send(formdata);
    $('#boton').attr("disabled", true);
    alert('Modificacion Exitosa');
    

}

function cambiarPass(){
    var parametros = {
     "actual" : $('#actual').val(),
     "nuevo" : $('#nueva').val()
    };
    
    
    $.ajax({
                data:  parametros,
                url:   '<?=base_url()?>'+'admin/modificarContrasenaAdministrador',
                type:  'post',
                success:  function (response) {
                        alert(''+response);
                }
        });
    
    
}

</script>
