<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("fileUpload").files[0];
    var file2 = _("fileUploadImage").files[0];
	var formdata = new FormData($('#uploader')[0]);
    if (comprobarDatos()){
	formdata.append("fileUpload", file);
    formdata.append("name",$("#nombre").val());
    formdata.append("descripcion",$("#descripcion").val());
    formdata.append("categoria",$("#categoria").val());
    formdata.append("tags",$("#tags").val());
    formdata.append("autor",$("#autor").val());
    formdata.append("fileUploadImage",file2);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "<?=base_url()?>upload/video");
	ajax.send(formdata);
    }
    else{
        finish();
    }
}
function comprobarDatos(){
    if($("#nombre").val() == ""){
        _("status").innerHTML = "Formulario Incompleto, Asigne un Nombre al Archivo";
        return false;
    }
    else{
        if($("#descripcion").val() == ""){
            _("status").innerHTML = "Formulario Incompleto, Introduzca una Descripcion a su archivo";
            return false;
        }
        else{
            if($("#categoria").val() == ""){
                _("status").innerHTML = "Formulario Incompleto, Seleccione una categoria para su archivo";
                return false;
            }
            else{
                if($("#tags").val() == ""){
                    _("status").innerHTML = "Formulario Incompleto, Debe Poner Palabras Clave Para Facilitar La Busqueda";
                    return false;    
                }
                else{
                    if($("#autor").val() == ""){
                        _("status").innerHTML = "Formulario Incompleto, Asigne Un Autor A Su Archivo";
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            }
        }        
    }
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Subiendo "+event.loaded+" bytes de "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").style = "width: " + Math.round(percent) + "%";
	_("status").innerHTML = Math.round(percent)+"% Subido... Espere";
}
function completeHandler(event){
	var id = event.target.responseText;
    window.location.href = "<?=base_url()?>" +"admin/finalizado/"+id+"/video";
}
function errorHandler(event){
	_("status").innerHTML = "La Carga del Video No Se Completo Correctamente";
    end();
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
