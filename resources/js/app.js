//Aqui mandamos a llamar dropzon
import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone= new Dropzone('#dropzone',{

    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles:'.png,.jpg,.jpeg,.gif',
    addRemoveLinks:true,
    dictRemoveFile:"Borrar archivo",
    maxFiles:1,
    uploadMultiple:false
}

);
