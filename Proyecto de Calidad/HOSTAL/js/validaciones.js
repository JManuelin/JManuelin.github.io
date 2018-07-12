function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) {
     event.returnValue = false;
    
 }
else{
     
 }
  
    
}

function txtmarca() {

    
}

function valModificar() {
    var result = confirm("Realmente desea Modificar el Registro");
    if(result==false){
      location.reload(true);
    }
    return result;
}

function valregistrar() {
    var result = confirm("Realmente desea Registrar");
    if(result==false){
      alert("Cancelo su Registro");
      //
    }
    location.reload(true);
    return result;

}function validarRegistroTipoDoc() {
    var result = confirm("Realmente desea Registrar");

    var min=document.getElementById("txt01").value;
    var max=document.getElementById("txt02").value;
    if(min<=5 ){
      result=false;
    }
    if(min>15 ){
      result=false;
    }
    if(min>max){
      result=false;
    }
     if(max>15){
      result=false;
    }
    if(result==false){
      alert("Cancelo su Registro");
      
    }
    location.reload(true);
    return result;
}

function limpiar(){
  location.reload(true);
}

function txNombres() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122)){
     event.returnValue = false;
        
 }else{
     
 }
  
}
  function NumCheck(e, field) {
    key = e.keyCode ? e.keyCode : e.which
    if (key == 8) return true
    if (key > 47 && key < 58) {
      if (field.value == "") return true
      regexp = /.[0-9]{5}$/
      return !(regexp.test(field.value))
    }
    if (key == 46) {
      if (field.value == "") return false
      regexp = /^[0-9]+$/
      return regexp.test(field.value)
    }
    return false
  }

