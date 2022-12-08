<?php require_once "plantilla/parte_superior.html"?>

<link rel="stylesheet" href="static/css/rproducto_estilo.css"> 
<!----------------------------------------------------------->
<div class="container animated fadeIn">
<br>

<div class="card form_pro">
  <h3 class="card-header" align="center">Registro de Productos <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h3>
  <div class="card-body">
  

<div class="row conten_form">
<!--------------------------------------------->
<div class="col-md-6">
<form id="formproductos" method="POST">

<input type="hidden" name="user" value="<?php echo $id_usuario;?>" id="user" class="form-control" readonly>

<small class="form-label">Codigo de barra</small>
<div class="input-group mb-3">
  <input type="text" name="cod_barra" id="cod_barra" class="form-control" 
         placeholder="Digita codigo de barra" aria-label="Digita codigo de barra" required> 
</div>

<!--------------------------------------------->
<small class="form-label">Nombre de producto</small>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="nom_producto" id="nom_producto"
     placeholder="Digita nombre de producto" aria-label="Digita nombre de producto" required>
</div>

<!--------------------------------------------->
<small class="form-label">Cantidad</small>
<div class="input-group mb-3">
  <input type="number" class="form-control" name="cant_product" id="cant_product"
        placeholder="Digita la cantidad de producto" aria-label="Digita la cantidad de producto" required>
</div>
<!---------------------------------------------> 
<small class="form-label">Categoria</small>
<div class="input-group mb-3">
<select class="categori_pro form-select" name="categori_pro" id="categori_pro" required>

</select>
  <button class="btn btn-info" type="button" id="add_catepro" ><i class="fas fa-plus"></i></button>
</div>
<!--------------------------------------------->
<small class="form-label">Proveedor</small>
<div class="input-group mb-3">
  <select class="form-select proveedor_produc" name="proveedor_produc" id="proveedor_produc" required>

  </select>
  <button class="btn btn-info" type="button" id="add_proveedor"><i class="fas fa-plus"></i></button>
</div>
<!--------------------------------------------->
</div>

<!-- user cod_barra nom_producto cant_product pre_compra porcen_utili precio_vta fecha_vence presentacion prescrip laboratorio proveedor_produc -->

<div class="col-md-6">
<div id="por_ganancia"> 

<!--------------------------------------------->
<small class="form-label">Precio de compra</small>
<div class="input-group mb-3">
  <input type="number" class="form-control" name="pre_compra" id="pre_compra"
  placeholder="Digita el precio de compra" aria-label="Digita el precio de compra" required>
</div>
<!----------------------------------------->
<small class="badge bg-dark">Porcentaje de utilidad</small> 
<div class="input-group mb-3">

  <input type="number" class="form-control" name="porcen_utili" id="porcen_utili"
  placeholder="Digita el precio de compra" aria-label="Digita el % de utilidad" required> 

  <span class="input-group-text" id="basic-addon1">
     <img src="static/iconos/porcen.ico" alt="Porcentaje" width="20" height="20">
  </span>
</div>
<!--------------------------------------------->
<small class="form-label">Precio de venta</small>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="precio_vta" id="precio_vta"
         placeholder="Digita precio de venta" aria-label="Digita precio de venta">
</div>
<!--------------------------------------------->
  </div>
</div>

<!--------------------------------------------->

 </div> <!--row-->
 </div> <!--Card Body-->

 <div class="card-footer text-muted" align="right">
<button type="submit" class="btn btn-primary" id="btnproduct">Guargar&nbsp;<i class="fas fa-save"></i></button>
 </div>
 </form>

</div>  <!--Card-->

</div> <!--Container-->

<!----------------------------------------------------------->
<?php require_once "plantilla/parte_inferior.html"?>
<?php require_once "modales/modal_proveedor.php"?>
<?php require_once "modales/modal_categoriapro.php"?> 
<script src="static/js/registrar_productos.js"></script>
  





