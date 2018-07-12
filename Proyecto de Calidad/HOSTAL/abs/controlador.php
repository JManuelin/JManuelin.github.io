<?php
require_once('../model/cnxn.php');
class controlador{
    /*Configuraciones*/
    
    function config(){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select * from tb_confi";
         $val_log=mysqli_query($cc,$sql);        
        mysqli_close($cc);
        return $val_log;
    }
    
    /* Metodo para Modificar Registros */
    
    function update($tabla,$val,$id,$idval){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="update $tabla set $val where $id='$idval' ";
         $val_log=false;
        if(mysqli_query($cc,$sql)==true){
          $val_log=true;  
        }
        mysqli_close($cc);
        return $val_log;
    }
    
    /* Metodo para Registrar   */
    
    function insert($tabla,$values){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="insert into $tabla values($values)";
         $val_log=false;
        if(mysqli_query($cc,$sql)==true){
          $val_log=true;  
        }
        mysqli_close($cc);
        return $val_log;
    }
    
    /* Listar Registros Todo*/
    
    function listarAll($tabla){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select * from $tabla";
         $rs=mysqli_query($cc,$sql);
        return $rs;
    }
    /* Listar Registros con parametros*/
    
    function listarConParametro($tabla,$condicion){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select * from $tabla where $condicion ";
         $rs=mysqli_query($cc,$sql);
        return $rs;
    }
     /* Listar todos los Registros detalle*/
    
    function listarDetalle_all($select,$tabla,$condicion){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select $select from $tabla where $condicion ";
         $rs=mysqli_query($cc,$sql);
        return $rs;
    }
    
    /* Listar Registros especifico detalle*/
    
    function listarDetalle_especifico($select,$tabla,$condicion){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select $select from $tabla where $condicion ";
         $rs=mysqli_query($cc,$sql);
         $return = -1;
         $fila = mysqli_fetch_row($rs);
         $return = $fila[0];
        return $return;
    }
    /* Devuelve     ID*/
    
    function devolver_id($tabla,$condicion){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select * from $tabla where $condicion ";
         $rs=mysqli_query($cc,$sql);
         $return = -1;
         $fila = mysqli_fetch_row($rs);
         $return = $fila[0];
        return $return ;
    }
    /* Devuelve     Valor contado*/
    
    function devolver_cantidad($valores,$tabla,$condicion){
         $con= new cnxn();
         $cc= $con->abrirConextion();
         $sql="select count($valores) from $tabla where $condicion";
         $rs=mysqli_query($cc,$sql);
         $return = -1;
         $fila = mysqli_fetch_row($rs);
         $return = $fila[0];
        return $return ;
    }
    
}

?>