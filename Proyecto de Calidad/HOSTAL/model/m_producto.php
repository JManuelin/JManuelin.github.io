<?php
require_once('../model/cnxn.php');
class m_producto{

	public function registro_m_c($table,$descripcion){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "insert into $table values(null,'$descripcion')";
		$val=false;
		if(mysqli_query($cc, $sql)==true){$val=true;};
		mysqli_close($cc);
        return $val;
	}
	public function modificar_precio_stock($id,$precio,$cantidad,$desc){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "update tb_producto set precio='$precio' , stock='$cantidad', descripcion_producto='$desc'where id_producto='$id'";
		$query = mysqli_query($cc, $sql);
       header("Location: ../view/v_productom.php");
       mysqli_close($cc);
	}
	public function actulizar_stock($opc,$cantidad,$id_){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "update tb_producto set stock=(stock-'$cantidad') where id_producto='$id_'";
		if($opc==='suma'){
		$sql = "update tb_producto set stock=(stock+'$cantidad') where id_producto='$id_'";
		
		}
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
       
	}
	public function registro_producto($codigo_referencial,$precio,$stock,$descripcion_producto,$id_marca_producto,$url,$min,$max){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "insert into tb_producto values(null,'$codigo_referencial','$precio','$stock','$descripcion_producto','$url',1,'$min','$max','$id_marca_producto')";
		$val=false;
		if(mysqli_query($cc, $sql)==true){$val=true;}
		mysqli_close($cc);
        return $val;
	}
	public function listar_m_c($table){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from $table order by 1";
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        return $query;
	}
public function listar_marca_categoria($id){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from v_marca_categoria  where id_categoria_producto=$id";
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        return $query;
	}
	public function listar_categoria(){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from tb_categoria_producto";
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        return $query;
	}
	public function listar_productos($campo,$descripcion){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from v_productos where $campo = '$descripcion'";
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        return $query;
	}
		public function update_c_m($id,$descripcion,$table){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "update tb_marca_producto set descripcion_marca = '$descripcion' where id_marca_producto='$id'";
		if($table==='tb_categoria_producto'){
        $sql = "update tb_categoria_producto set descripcion_categoria = '$descripcion' where id_categoria_producto='$id'";
		}
		
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        
	}
	public function eliminar($id){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "update tb_producto set estado=0 where id_producto='$id'";
		$query = mysqli_query($cc, $sql);
		mysqli_close($cc);
        
	}
}