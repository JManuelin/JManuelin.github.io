<?php 

require_once('cnxn.php');
class m_comprobante {
	
	public function registrar_comprobante($opc,$lblNumero,$sumTotal,$cbocomprobante){
        session_start();
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$total=$sumTotal;		
		$igv=0;       
		if($cbocomprobante==2){
       	$igv=($total*$_SESSION['igv']);		
		}
		$subTotal=($total-$igv);
		$sql = "insert into tb_comprobante values (null,'$lblNumero',now(),'$sumTotal','$subTotal','$igv','$cbocomprobante','$opc')";
		mysqli_query($cc,$sql);
		return mysqli_insert_id($cc) ;
		mysqli_close($cc);
		
	}
	public function listar_tiposComprobantes(){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select * from tb_tipo_comprobante where estado=1";		
   		$rs=  mysqli_query($cc, $sql);
        return $rs;
        mysqli_close($cc);
	}
	public function listar_n_comprobante($id_){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select max(numero_comprobante)maximoval from tb_comprobante where id_tipo_comprobante='$id_'";		
   		$rs=  mysqli_query($cc, $sql);
        return $rs;
        mysqli_close($cc);
	}
	public function listar_comprobante($numComprobante,$tipoComprobante){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "
         select 
c.numero_comprobante , h.numero_hab,c.fecha , c.precio_total,th.descripcion habitacion , tc.descripcion comprobante
from tb_detalle_alquiler d , tb_comprobante c , tb_habitacion h ,  tb_tipo_habitacion th,tb_tipo_comprobante tc
where d.id_comprobante=c.id_comprobante and h.id_habitacion =d.id_habitacion and th.id_tipo_habitacion=h.id_tipo_habitacion
and tc.id_tipo_comprobante = c.id_tipo_comprobante and numero_comprobante= '$numComprobante' and  tc.descripcion='$tipoComprobante' 
		";		
   		$rs=  mysqli_query($cc, $sql);
        return $rs;
        mysqli_close($cc);
	}
public function listar_detalle_venta($id_){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select c.numero_comprobante,tc.descripcion,c.fecha ,c.tipo_registro,
				cp.descripcion_categoria,m.descripcion_marca,pr.descripcion_producto,
				dpr.cantidad,dpr.precio,dpr.importe,
				c.precio_total,c.subtotal,c.IGV_IVA from tb_comprobante c,
				tb_tipo_comprobante tc,
				tb_detalle_pedido dp,
				tb_pedido p,
				tb_detalle_producto dpr,
				tb_producto pr,
				tb_marca_producto m,
				tb_categoria_producto cp,
                tb_cm_producto cm
				where c.id_tipo_comprobante = tc.id_tipo_comprobante
				and c.id_comprobante=dp.id_comprobante
				and p.id_pedido=dp.id_pedido
				and dpr.id_pedido=p.id_pedido
				and dpr.id_producto=pr.id_producto
				and m.id_marca_producto=cm.id_marca_producto
				and cp.id_categoria_producto=cm.id_categoria_producto
				and c.id_comprobante='$id_'";		
   		$rs=  mysqli_query($cc, $sql);
        return $rs;
        mysqli_close($cc);
	}

}

 ?>




