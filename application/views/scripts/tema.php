<script>
function _(el){
	return document.getElementById(el);
}

function crearTema(){
            var parametros = {
                "nombre" : $('#tema').val(),
                "descripcion" : $('#descripcion').val()
               };
        $.ajax({
                data:  parametros,
                url:   '<?=base_url()?>'+'admin/modificarTema',
                type:  'post',
                success:  function (response) {
                        $("#res").html(response);
                }
        });
        
}

</script>