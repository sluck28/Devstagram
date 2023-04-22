//Aqui mandamos a llamar dropzon
import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone= new Dropzone('#dropzone',{

    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles:'.png,.jpg,.jpeg,.gif',
    addRemoveLinks:true,
    dictRemoveFile:"Borrar archivo",
    maxFiles:1,
    uploadMultiple:false,

  
}

);

//eventos de dropzone para la subida de archivos

//con file podemos ver en consola loq ue se esta subiendo como imagen

dropzone.on("success",function(file,response ){

    //seleccionamos el input de la validacion
    document.querySelector('[name="imagen"]').value=response.imagen

})


dropzone.on('removedfile',function(){
    console.log('Archivo elminado');
})

