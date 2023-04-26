//Aqui mandamos a llamar dropzon
import Dropzone from "dropzone";
// import Swal from 'sweetalert2';
// windows.Swal = require('sweetalert2');
Dropzone.autoDiscover = false;

//aqui agregamos sweetalert2


const dropzone = new Dropzone(".dropzone", {
  dictDefaultMessage: "Sube aquí tu imagen",
  acceptedFiles: ".png, .jpg, .jpeg, .gif",
  addRemoveLinks: true,
  dictRemoveFile: "Borrar archivo",
  maxFiles: 1,
  uploadMultiple: false,

  init: function () {
    if (document.querySelector('[name="image"]').value.trim()) {
      const imagenPublicada = {}
      imagenPublicada.size = 1234;
      imagenPublicada.name = document.querySelector('[name="image"]').value;

      this.options.addedfile.call(this, imagenPublicada);
      this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

      imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
    }
  },
});
//Conoceremos los eventos de dropzon
// //evento para saber que archivo se esta subiendo en dropzone
//     dropzone.on('sending',function(file,xhr,formData){
//         console.log(formData);
// })
//evento para el envio correcto de la imagen
dropzone.on('success', function (file, response) {
  //  console.log(response.imagen);
  //asiganmos el response imagen al input para que haga la validacion
  document.querySelector('[name="image"]').value = response.image;
});
// //para errores en dropzone
// dropzone.on('error',function(file,message){
//     console.log(message);
// })

//para archivos eliminados
dropzone.on('removedfile', function () {
  console.log('archivo eliminado');
});
//para qeu se borre el value del input y la imagen
dropzone.on('removedfile',function(){
  document.querySelector('[name="image"]').value =''
});