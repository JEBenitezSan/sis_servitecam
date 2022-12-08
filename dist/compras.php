<?php require_once "plantilla/parte_superior.html"?>
<!-------------------------------------------------------->
<div class="container">
<div class="row">
    <div class="col-md-9">
        <h3>Compras y entradas</h3>
    </div>
</div>
</div>

<div class="container-fluid">
<div class="alert alert-primary animated fadeIn" role="alert">
<form id="form_fac_compra" method="post">
<div class="row">

    <div class="col-md-4">
            <small class="form-label">Num Factura</small>
            <div class="input-group mb-2">
            <input type="text" class="form-control" name="fac_num_compra" id="fac_num_compra" 
                    placeholder="Digita el total de factura" required>
            </div>
 
            <small class="form-label">Monton</small>
            <div class="input-group mb-2">
            <input type="number" class="form-control" name="fac_monto_compra" id="fac_monto_compra" 
                    placeholder="Digita el total de factura" required>
            </div>
    </div>

    <div class="col-md-5">
            <small class="form-label">Fecha Factura</small>
            <div class="input-group mb-2">
            <input type="date" class="form-control" name="fac_fech_compra" id="fac_fech_compra" 
                    placeholder="Fecha compra" required>
             <input type="hidden" name="user" value="<?php echo $id_usuario;?>" id="user" readonly>
             <input type="hidden" name="opc_compra" value="fac_compra" id="opc_compra" readonly>
                    
            </div>

            <small class="form-label">Proveedor</small>   
            <div class="input-group mb-2">
            <select class="form-select proveedor_produc" name="proveedor_produc" id="proveedor_produc" required>

            </select>
            <button class="btn btn-info" type="button" id="add_proveedor"><i class="fas fa-plus"></i></button>
            </div>
    </div>

    <div class="col-md-3">
            <small class="form-label">Registrar</small>
            <button type="submit" class="btn btn-primary mb-2" id="btn_submit_compra"
             style="width: 100%">
            <strong>Guardar compra</strong>
           </button>

           <small class="form-label">Nueva compra</small>
            <button type="button" class="btn btn-info mb-2" id="btn_new_campra"
             style="width: 100%">
            <strong>Nuevo compra</strong>
           </button>
    </div>

</div> 
</form> 
</div>   
</div>

<div style="display: none;" id="mostar_input" class="animated fadeIn">
<div class="container">
<div class="alert alert-dark" role="alert">
<div class="col-md-6">

    <div class="input-group">
        <input type="text" name="busqueda_compra_pro" id="busqueda_compra_pro" class="form-control" 
            placeholder="Digita codigo de barra"> 
            
        <button type="button" class="btn btn-primary" 
        id="btnbusq_compra_pro">
        <i class="fa fa-search" aria-hidden="true"></i> Buscar
    </button>
    </div>
</div> 
</div> 
</div>
</div>

<!------------------------------Tabla-------------------------------------> 
<div style="display: none;" id="mostar_tabla" class="animated fadeIn">
<div class="container">
<div class="table-responsive"> 
      <table class='table responsive-table table-bordered border-primary' id='tabla' name='produc_resul'>
        <thead class="table-primary">
          <tr align="center">
            <th scope="col"><i class="fa fa-key" aria-hidden="true"></i></th>
            <th scope="col">Cod_Barra</th>
            <th scope="col">Nombre</th>
            <th scope="col">Stock</th>
            <th scope="col" class="table-danger">ID_Pre</th>
            <th scope="col" class="table-danger">C$ P_Comp</th>
            <th scope="col" class="table-danger">% Utili</th>
            <th scope="col" class="table-danger">C$ P_Ven</th>
            <th scope="col">Categoria</th>
            <th scope="col">Agregar</th>
          </tr>
        </thead>
        <tbody id="producto_existe" align="center">

        </tbody>
        </table>
</div>
</div>
</div>
<!------------------------------Tabla------------------------------------->

<div style="display: none;" id="mostar_form" class="animated fadeIn">
<div class="container">
<!-----------------------------Formulario---------------------------------------------------->
                <div class="card form_pro">
                <h3 class="card-header" style="background-color: #cce5ff" align="center">
                Registro de Productos 
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                </h3>
                <div class="card-body">
                

                <div class="row conten_form">
                <!--------------------------------------------->
                <div class="col-md-6">
                <form id="formproductos" method="POST">

                <input type="hidden" name="user" value="<?php echo $id_usuario;?>" id="user" readonly>
                <input type="hidden" name="opc_compra" value="add_compra" id="opc_compra" readonly>

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
                <small class="form-label">Categoria</small>
                <div class="input-group mb-3">
                <select class="categori_pro form-select" name="categori_pro" id="categori_pro" required>

                </select>
                <button class="btn btn-info add_catepro" type="button" id="add_catepro" ><i class="fas fa-plus"></i></button>
                </div>
                <!--------------------------------------------->
                </div>

                <!--user cod_barra nom_producto cant_product pre_compra porcen_utili precio_vta fecha_vence presentacion prescrip laboratorio proveedor_produc2 -->

                <div class="col-md-6" id="por_ganancia">
                <!--------------------------------------------->
                <small class="form-label">Cantidad</small>
                <div class="input-group mb-3">
                <input type="number" class="form-control" name="cant_product" id="cant_product"
                        placeholder="Digita la cantidad de producto" aria-label="Digita la cantidad de producto" required>
                </div>
                <!---------------------------------------------> 
                <small class="form-label">Precio de compra</small>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="pre_compra" id="pre_compra"
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
                        placeholder="Digita precio de venta" aria-label="Digita precio de venta" readonly required>
                </div>
                <!--------------------------------------------->
                <!----------------------------------------------------------------------------------
                <small class="form-label">Proveedor</small>
                <div class="input-group mb-3">
                <select class="form-select proveedor_produc2" name="proveedor_produc2" id="proveedor_produc2" required>

                </select>
                <button class="btn btn-info" type="button" id="add_proveedor"><i class="fas fa-plus"></i></button>
                </div>
               
                --------------------------------------------->
                </div>

                </div> <!--row-->
                </div> <!--Card Body-->

                <div class="card-footer text-muted" align="right" style="background-color: #cce5ff">
                <button type="submit" class="btn btn-primary" id="btnproduct">Guargar&nbsp;<i class="fas fa-save"></i></button>
                </div>
                </form>

                </div>  <!--Card-->

<!-----------------------------Formulario---------------------------------------------------->
</div>
</div>

<!-------------------------------------------------------->
<?php require_once "plantilla/parte_inferior.html"?>
<?php require_once "modales/modal_proveedor.php"?>
<?php require_once "modales/modal_categoriapro.php"?>
<?php require_once "modales/modal_addstock.php"?>
<script src="static/js/compras.js"></script>