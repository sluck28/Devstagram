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
    //crearemos la funcion para que en la validacion no se borre la imagen subida
  init  : function(){
      if(document.querySelector('[name="image"]').value.trim()){
        //creamos un objeto
          const imagenPublicada= {}
          //le damos un tamaño a la imagen
          imagenPublicada.size= 1234;
          imagenPublicada.name= document.querySelector('[name="image"]').value;

          this.options.addedfile.call(this,imagenPublicada);
          this.options.thumbnail.call(this,imagenPublicada,'/uploads/${imagenPublicada.name}');

          imagenPublicada.previewElement.classList.add(
            "dz-success",
            "dz-complete"
          );
      }
  },
}
);
 //Conoceremos los eventos de dropzon
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