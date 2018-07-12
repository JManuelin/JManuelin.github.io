<?php 

 require_once('cnxn.php');

 class m_persona 
 {
 function registrar($Id_tipodocumento, $numero_documento, $apellidopater, $apellidomater, $nombres, 
 		              $direccion, $celular, $telefono, $email){
 		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "insert into  tb_persona values(null,'$Id_tipodocumento', '$numero_documento',
 	               '$apellidopater', '$apellidomater', '$nombres', 
 		       '$direccion', '$celular', '$telefono', '$email','activo');";
        	mysqli_query($cc,$sql);
                return mysqli_insert_id($cc) ;
                mysqli_close($cc);
      }
 function rgistrar_usuario($user,$id_persona){
                $con= new cnxn();
                $cc= $con->abrirConextion();
                $clave=sha1($user);
                $sql = "insert into tb_usuario values(null,'$user','$clave',1,'$id_persona',3,'por_verificar')";
                mysqli_query($cc,$sql);  
                return mysqli_insert_id($cc) ;
                mysqli_close($cc);              
 }
 function cambiarClave($clavep,$ndoc,$id){
                $con= new cnxn();
                $cc= $con->abrirConextion();
                $clave=sha1($clavep); 
                $sql="update tb_usuario set clave_usuario='$clave' where usuario='$ndoc' and id_usuario='$id'";   
                mysqli_query($cc,$sql); 
                mysqli_close($cc);
 }
 function cambios_personas($opc,$ndoc,$id){
            
            
                $con= new cnxn();
                $cc= $con->abrirConextion();               
                $sql = "";
                $val=false;
                if($opc=='verificar'){
                    $sql="update tb_usuario set estado='verificada' where usuario='$ndoc' and id_usuario='$id' ";   
                }else{
                    $sql="update tb_usuario set estado='eliminada' where usuario='$ndoc' and id_usuario='$id'";      
                }
               if( mysqli_query($cc,$sql)==true){
                $val=true;
               } 
               return $val; 
               mysqli_close($cc); 
 }
 function busca_persona($id){
    $con= new cnxn();
    $cc= $con->abrirConextion();
    $sql="select * from tb_persona where ID_PERSONA like '".$id."%' or numero_documento like '".$id."%'";
    $rs=mysqli_query($cc,$sql);
    return $rs;
    mysqli_close($cc);

 }
  function listar_persona($pos){
    $con= new cnxn();
    $cc= $con->abrirConextion();
    $sql="select * from tb_persona limit $pos,10";
    if($pos==0){
        $sql="select * from tb_persona ";
    }
    $rs=mysqli_query($cc,$sql);
    mysqli_close($cc);
    return $rs;
    

 }
  function listar_persona_poremail($email){
    $con= new cnxn();
    $cc= $con->abrirConextion();
    $sql="select * from tb_persona where email_persona='$email'";
    $rs=mysqli_query($cc,$sql);
    return $rs;
    mysqli_close($cc);

 }


  function registrarEmpleado($id){
               $con= new cnxn();
                $cc= $con->abrirConextion();               
                $sql = "insert into tb_empleado values(null,'1','$id','2')";
                $val=false;
                
               if( mysqli_query($cc,$sql)==true){
                $val=true;
               } 
               return $val; 
               mysqli_close($cc); 
 }
 function listar_empleado($tb){
    $con= new cnxn();
    $cc= $con->abrirConextion();
    $sql="select * from $tb";
        $rs=mysqli_query($cc,$sql);
    return $rs;
    mysqli_close($cc);
 }
 }
 ?>