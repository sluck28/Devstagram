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
 //Conoceremos los eventos de dropzon



);

// //evento para saber que archivo se esta subiendo en dropzone
//     dropzone.on('sending',function(file,xhr,formData){
//         console.log(formData);
// })
//evento para el envio correcto de la imagen
dropzone.on('success',function(file,response){
  //  console.log(response.imagen);
    //asiganmos el response imagen al input para que haga la validacion
    document.querySelector('[name]="imagen"').value=response.imagen;
})
// //para errores en dropzone
// dropzone.on('error',function(file,message){
//     console.log(message);
// })

//para archivos eliminados
dropzone.on('removedfile',function () {
        console.log('archivo eliminado');
})