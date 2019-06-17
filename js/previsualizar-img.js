function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
          var fileSize = $('#files')[0].files[0].size;
            var siezekiloByte = parseInt(fileSize / 1024);
          
            if (siezekiloByte > 1024) {
                alertify.alert('Atención', 'La imagen seleccionada supera el tamaño permitido');
                return false;
            }

           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                       var btnCambiar = document.getElementById("btn-cambiar");
                       btnCambiar.style.display='none';
                       var lblTamaño = document.getElementById("lbl-tamaño");
                       lblTamaño.style.display='none';
                       var botones = document.getElementById("botones");
                       botones.style.display='block';
                       var imgAct = document.getElementById("img-actual");
                       imgAct.style.display='none';
                       
                      /* document.getElementById("botones").innerHTML = "<p>¿Guargar esta imagen?</p> <a href=\"\" class=\"btn btn-success\">Si</a><a href=\"perfil-paciente.php\" class=\"btn btn-danger\">No</a>";*/
                      
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
            document.getElementById('files').addEventListener('change', archivo, false);