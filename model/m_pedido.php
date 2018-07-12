<?php 
require_once('cnxn.php');
class m_pedido 

{   function registro_detalle_pedido($_idcomprobante,$_idpedido){
       $con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="insert into tb_detalle_pedido values(null,'$_idcomprobante','$_idpedido','registrado')";
		$rs=mysqli_query($cn,$sql);
		mysqli_close($cn);
		
}
	function listar_pedidos_porclientes($_id){
       $con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="select * from tb_pedido where usuario='$_id' and estado='entregado'";
		$rs=mysqli_query($cn,$sql);
		return $rs;
		mysqli_close($cn);
}

	function atender_pedido($op,$id){
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="update tb_pedido set estado='$op' where id_pedido='$id'";
		mysqli_query($cn,$sql);
		mysqli_close($cn);
	}
	function registrar_pedido($usuario)
	{
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="insert into tb_pedido values(null,now(),'$usuario','0')";
		mysqli_query($cn,$sql);
		return mysqli_insert_id($cn) ;
		mysqli_close($cn);
	}
	function registar_detalle_pedido($s1,$s2,$s3,$s4,$s5)
	{
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="insert into tb_detalle_producto values(null,'$s1','$s2','$s3','$s4','$s5')";
		mysqli_query($cn,$sql);
		
		mysqli_close($cn);
	}
	function listar_pedidos()
	{
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="select * from tb_pedido  where estado='0' order by 2";
		$rs=mysqli_query($cn,$sql);
		return $rs;
		mysqli_close($cn);
		
	}
	function listar_pedidos_atendidos(){
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="select * from tb_pedido group by 3,4 having estado='entregado'";
		$rs=mysqli_query($cn,$sql);
		return $rs;
		
		mysqli_close($cn);
	}
	function listar_pedidos_detalle($id_)
	{
		$con= new cnxn();
		$cn=$con->abrirConextion();
		$sql="select dp.id_producto,m.descripcion_marca , c.descripcion_categoria,p.descripcion_producto , p.precio ,dp.cantidad,dp.importe,pe.usuario
				from tb_producto p , tb_marca_producto m , tb_categoria_producto c ,tb_detalle_producto dp,tb_pedido pe
				where p.id_marca_producto=m.id_marca_producto and c.id_categoria_producto=p.id_categoria_producto and
				dp.id_producto=p.id_producto and dp.id_pedido=pe.id_pedido and  pe.id_pedido='$id_'";
		$rs=mysqli_query($cn,$sql);
		return $rs;
		mysqli_close($cn);
		
	}
	function ver_solicitante($id_){
		    $con= new cnxn();
				$cn=$con->abrirConextion();
				$sql="select p.ID_PERSONA,p.numero_documento,concat(p.nombres_persona,' / ',p.apellidopater_persona,' / ',p.apellidomater_persona)cliente from tb_persona p
                      where  p.ID_PERSONA='$id_'";
				$rs=mysqli_query($cn,$sql);
				return $rs;
				mysqli_close($cn);
	}
	function listarpedidosentregados($id_){
		 $con= new cnxn();
				$cn=$con->abrirConextion();
				$sql="SELECT 
    p.id_pedido,
    p.fecha,
    c.descripcion_categoria,
    m.descripcion_marca,
    pr.descripcion_producto,
    dp.cantidad,
    dp.precio,
    dp.importe
FROM
    tb_pedido p,
    tb_detalle_producto dp,
    tb_producto pr,
    tb_marca_producto m,
    tb_categoria_producto c,
    tb_cm_producto mp
WHERE
    p.id_pedido = dp.id_pedido
        AND mp.id_marca_producto = m.id_marca_producto
        AND mp.id_categoria_producto = c.id_categoria_producto
        AND dp.id_producto = pr.id_producto
        AND p.usuario = '$id_'
        AND p.estado = 'entregado'";
				$rs=mysqli_query($cn,$sql);
				return $rs;
				mysqli_close($cn);
	}
}
 ?>