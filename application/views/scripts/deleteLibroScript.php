<script>
 function eliminarLibro(id){
var pregunta = confirm('Confirme Que Desea Realizar Esta Operacion');
if (pregunta == true){
    $.ajax({
        type:'POST',
		url:'<?=base_url()?>' + 'eliminar/eliminarLibro',
		data:"id="+id,
		success: function(registro){
		  $('#mensaje').html(registro);	
		}
    });
}else{
    
}
}
</script>