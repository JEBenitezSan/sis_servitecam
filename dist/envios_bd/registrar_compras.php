<?php 
include_once "../conexion/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$cod_barra = (isset($_POST['cod_barra'])) ? $_POST['cod_barra'] : '';
$nom_producto  = (isset($_POST['nom_producto'])) ? $_POST['nom_producto'] : ''; 
$cant_product = (isset($_POST['cant_product'])) ? $_POST['cant_product'] : '';

$pre_compra = (isset($_POST['pre_compra'])) ? $_POST['pre_compra'] : '';
$porcen_utili = (isset($_POST['porcen_utili'])) ? $_POST['porcen_utili'] : '';
$precio_vta = (isset($_POST['precio_vta'])) ? $_POST['precio_vta'] : '';


$categori_pro = (isset($_POST['categori_pro'])) ? $_POST['categori_pro'] : '';
$estado = "Disponible";

$fac_num_compra = (isset($_POST['fac_num_compra'])) ? $_POST['fac_num_compra'] : ''; 
$fac_monto_compra = (isset($_POST['fac_monto_compra'])) ? $_POST['fac_monto_compra'] : ''; 
$fac_fech_compra = (isset($_POST['fac_fech_compra'])) ? $_POST['fac_fech_compra'] : ''; 
$proveedor_produc = (isset($_POST['proveedor_produc'])) ? $_POST['proveedor_produc'] : '';

/// Update a los productos de las compras
$id_stock_add = (isset($_POST['id_stock_add'])) ? $_POST['id_stock_add'] : '';  
$cod_barra_add = (isset($_POST['cod_barra_add'])) ? $_POST['cod_barra_add'] : ''; 
$nom_producto_add = (isset($_POST['nom_producto_add'])) ? $_POST['nom_producto_add'] : ''; 
$stock_exi_add = (isset($_POST['stock_exi_add'])) ? $_POST['stock_exi_add'] : ''; 
$new_stock_add = (isset($_POST['new_stock_add'])) ? $_POST['new_stock_add'] : ''; 
$new_total_stock_add = (isset($_POST['new_total_stock_add'])) ? $_POST['new_total_stock_add'] : ''; 
/// validar si hay nuevo precio
$id_precio_add = (isset($_POST['id_precio_add'])) ? $_POST['id_precio_add'] : ''; 
/// validar si hay nuevo precio
$pre_compra_add = (isset($_POST['pre_compra_add'])) ? $_POST['pre_compra_add'] : ''; 
$porcen_utili_add = (isset($_POST['porcen_utili_add'])) ? $_POST['porcen_utili_add'] : ''; 
$prec_vent_add = (isset($_POST['prec_vent_add'])) ? $_POST['prec_vent_add'] : ''; 
$categori_pro_add = (isset($_POST['categori_pro_add'])) ? $_POST['categori_pro_add'] : ''; 
$id_user = (isset($_POST['user'])) ? $_POST['user'] : '';

$busqueda_compra_pro = (isset($_POST['busqueda_compra_pro'])) ? $_POST['busqueda_compra_pro'] : '';

date_default_timezone_set('America/Managua');
$fech_ingre=date("Y-m-d H:i:s");


$opc_compra = (isset($_POST['opc_compra'])) ? $_POST['opc_compra'] : '';

switch($opc_compra) 
{
	case "add_compra":
            $insertar= "INSERT INTO `stock_productos`(`id_stock_produc`, `cod_barra`, `nombre_product`, `cant_stock`, `id_usuario`)
            VALUES ( NULL,'$cod_barra','$nom_producto','$cant_product','$user')";
            $inser_produc = $conexion->prepare($insertar);
            $inser_produc->execute(); 

            if($inser_produc->rowCount() >= 1)
            {
                        /// Consulto detalles de ultima compra ingresada o bien la que acavan de ingresar
                        $consulta_proveedor= "SELECT `id_compras`,`id_proveedor` 
                                                FROM `compras` 
                                                WHERE `id_usuario` = '$user' 
                                                ORDER BY `id_compras` DESC 
                                                LIMIT 1";
                        $resul_proveedor = $conexion->prepare($consulta_proveedor);
                        $resul_proveedor->execute();
                        $con_id_proveedor = 0;
                        foreach ($resul_proveedor as $row) 
                        { 
                                $con_id_proveedor = $row['id_proveedor']; 
                                $id_compras_max = $row['id_compras'];
                        }

                /// identificar el producto para cargarle el detalle de el
                $consulta= "SELECT `id_stock_produc`,`cod_barra` FROM `stock_productos` 
                WHERE `cod_barra` = '$cod_barra' AND `id_usuario` = '$user'";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();

                $id_stock_consul = 0;
                foreach ($resultado as $row) 
                {
                $id_stock_consul = $row['id_stock_produc'];
                }

                $insertar= "INSERT INTO `detalle_stock_product`(
                                `id_detall_stock_pro`, 
                                `id_stock_produc`, 
                                `nom_producto`, 
                                `cant_producto`, 
                                `id_proveedor`, 
                                `fecha_ingres_stock`, 
                                `estado_produc`,
                                `id_categoria_produc`) 

                        VALUES (NULL,
                                '$id_stock_consul',
                                '$nom_producto',
                                '$cant_product',
                                '$con_id_proveedor',
                                '$fech_ingre',
                                '$estado',
                                '$categori_pro')";
                $detall_stock = $conexion->prepare($insertar);
                $detall_stock->execute(); 

                if($detall_stock->rowCount() >= 1)
                { 
                        $inserprecio ="INSERT INTO `cat_precio`(
                        `id_precio`, 
                        `id_stock_produc`, 
                        `prec_compra`, 
                        `porcen_utili`, 
                        `prec_venta`, 
                        `fecha_ingre_prec`, 
                        `id_usuario`) 

                        VALUES (NULL,'$id_stock_consul','$pre_compra','$porcen_utili','$precio_vta','$fech_ingre','$user')";
                        $inser_precio = $conexion->prepare($inserprecio);
                        $inser_precio->execute();

                        if($inser_precio->rowCount() >= 1)
                        { 
                                /// inserta datos al detalle de compras de productos los que van cargado a la compra
                                $insertar_dellcompra= "INSERT INTO `detalle_compra_product`(
                                        `id_compra_stock_pro`, 
                                        `id_compra`, 
                                        `nom_producto`, 
                                        `cod_barra_compra`,
                                        `cant_producto`, 
                                        `pre_compra_producto`, 
                                        `pre_vent_producto`, 
                                        `fecha_compra_stock`,
                                        `estado_produc`, 
                                        `id_categoria_produc`) 
                                VALUES (NULL,
                                        '$id_compras_max',
                                        '$nom_producto',
                                        '$cod_barra',
                                        '$cant_product',
                                        '$pre_compra',
                                        '$precio_vta',
                                        '$fech_ingre',
                                        '$estado',
                                        '$categori_pro')";
                                $fac_compra_n = $conexion->prepare($insertar_dellcompra);
                                $fac_compra_n->execute();

                                if($fac_compra_n->rowCount() >= 1)
                                {
                                echo 1;
                                } else {0;}
                                
                                
                        } else { echo 0;}

                } else { echo 0;}

            }  else {  echo 0; }

	break;

	case "add_lista_compra":

                $consulta= "SELECT 
                `stock_productos`.`id_stock_produc`,
                `stock_productos`.`cod_barra`,
                `stock_productos`.`nombre_product`,
                `stock_productos`.`cant_stock`,
                `cat_precio`.`id_precio`,
                `cat_precio`.`prec_compra`,
                `cat_precio`.`porcen_utili`,
                `cat_precio`.`prec_venta`,
                `categoria_producto`.`categoria`
                
                FROM `stock_productos` 
                        LEFT JOIN `detalle_stock_product` ON `detalle_stock_product`.`id_stock_produc` = `stock_productos`.`id_stock_produc` 
                        LEFT JOIN `categoria_producto` ON `detalle_stock_product`.`id_categoria_produc` = `categoria_producto`.`id_categoria_produc` 
                        LEFT JOIN `cat_precio` ON `cat_precio`.`id_stock_produc` = `stock_productos`.`id_stock_produc`
                
                    WHERE `stock_productos`.`cod_barra` = '$busqueda_compra_pro'
                    ORDER BY `cat_precio`.`id_precio` DESC LIMIT 1;";
                $lista_stock = $conexion->prepare($consulta);
                $lista_stock->execute();

                $data = $lista_stock->fetchAll(PDO::FETCH_ASSOC);
                if ($data == [])
                {
                echo 0;
                }
                else{
                print json_encode($data, JSON_UNESCAPED_UNICODE);   
                }
		 
	break;

        case "fac_compra":
                $insertar= "INSERT INTO `compras`(`id_compras`, `num_fac_compra`, `id_proveedor`, `fecha_compra`, `total_compra`, `fecha_igreso_user`, `id_usuario`) 
                                            VALUES (NULL,'$fac_num_compra','$proveedor_produc','$fac_fech_compra','$fac_monto_compra','$fech_ingre','$user')";
                $fac_compra_n = $conexion->prepare($insertar);
                $fac_compra_n->execute();

                if($fac_compra_n->rowCount() >= 1)
                { 
                  echo 1; 
                }
                else 
                {
                  echo 0;
                }
        break;

        case "update_add_prod":

                /// Consulto detalles de ultima compra ingresada o bien la que acavan de ingresar
                $consulta_Compra= "SELECT `id_compras`,`id_proveedor` 
                                   FROM `compras` 
                                   WHERE `id_usuario` = '$user' 
                                   ORDER BY `id_compras` DESC 
                                   LIMIT 1";
                $resul_Compra = $conexion->prepare($consulta_Compra);
                $resul_Compra->execute();
                $consul_id_proveedor = 0;
                $id_max_compra = 0;
                foreach ($resul_Compra as $row) 
                {
                        $id_max_compra = $row['id_compras'];
                        $consul_id_proveedor = $row['id_proveedor'];
                }

                /// inserta datos al detalle de compras de productos los que van cargado a la compra
                $insertar_dellcompra= "INSERT INTO `detalle_compra_product`(
                                `id_compra_stock_pro`, 
                                `id_compra`, 
                                `nom_producto`, 
                                `cod_barra_compra`,
                                `cant_producto`, 
                                `pre_compra_producto`, 
                                `pre_vent_producto`, 
                                `fecha_compra_stock`,
                                `estado_produc`, 
                                `id_categoria_produc`) 
                        VALUES (NULL,
                                '$id_max_compra',
                                '$nom_producto_add',
                                '$cod_barra_add',
                                '$new_stock_add',
                                '$pre_compra_add',
                                '$prec_vent_add',
                                '$fech_ingre',
                                '$estado',
                                '$categori_pro_add')";
                $fac_compra_n = $conexion->prepare($insertar_dellcompra);
                $fac_compra_n->execute();

                /// Si se inserta se realiza el update al stock y a detalle de stock de agregan los detalle
                if($fac_compra_n->rowCount() >= 1)
                { 
                        $consulta= "SELECT `id_stock_produc`, `cod_barra`, `nombre_product`, `cant_stock` FROM `stock_productos`
                                    WHERE `cod_barra` = '$cod_barra_add'";
                        $resul_maxcom = $conexion->prepare($consulta);
                        $resul_maxcom->execute();
        
                        $id_stock_produc = 0; $cod_barra = 0; $nombre_product = 0; $cant_stock = 0;
                        foreach ($resul_maxcom as $row) 
                        {
                                $id_stock_produc = $row['id_stock_produc'];
                                $cod_barra = $row['cod_barra'];
                                $nombre_product = $row['nombre_product'];
                                $cant_stock = $row['cant_stock'];
                        }

                        /// se  hace el update al stock actualizandolo a total stock que existe actualmente
                        $update = "UPDATE `stock_productos` SET `cant_stock`='$new_total_stock_add'
                                   WHERE `cod_barra` ='$cod_barra_add'";
                        $update_stock = $conexion->prepare($update);
                        $update_stock->execute();

                        /// se agrega al detalle de stock
                        if($update_stock->rowCount() >= 1)
                        {
                                $inser_dellstock = "INSERT INTO `detalle_stock_product`(
                                                                `id_detall_stock_pro`, 
                                                                `id_stock_produc`, 
                                                                `nom_producto`, 
                                                                `cant_producto`, 
                                                                `id_proveedor`, 
                                                                `fecha_ingres_stock`, 
                                                                `estado_produc`, 
                                                                `id_categoria_produc`) 
                                        
                                                                        VALUES (NULL,
                                                                                '$id_stock_produc',
                                                                                '$nombre_product',
                                                                                '$new_stock_add',
                                                                                '$consul_id_proveedor',
                                                                                '$fech_ingre',
                                                                                '$estado',
                                                                                '$categori_pro_add')";
                                $insertar_detalle = $conexion->prepare($inser_dellstock);
                                $insertar_detalle->execute();

                                if ($id_precio_add === "Nuevo")
                                {
                                        $insert_precio = "INSERT INTO `cat_precio`(`id_precio`, 
                                                                                `id_stock_produc`, 
                                                                                `prec_compra`, 
                                                                                `porcen_utili`, 
                                                                                `prec_venta`, 
                                                                                `fecha_ingre_prec`,
                                                                                `id_usuario`)
                                                                        VALUES (NULL,
                                                                                '$id_stock_produc',
                                                                                '$pre_compra_add',
                                                                                '$porcen_utili_add',
                                                                                '$prec_vent_add',
                                                                                '$fech_ingre',
                                                                                '$id_user')";
                                        $insertprecio = $conexion->prepare($insert_precio);
                                        $insertprecio->execute();
                                } 
       

                                echo 1;
                        } 
                        else 
                        {
                          echo 0;
                        }

                }
                else 
                {
                  echo 0;
                }
        break;

}

$conexion=null;

?>    
