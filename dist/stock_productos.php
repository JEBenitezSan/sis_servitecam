<?php require_once "plantilla/parte_superior.html"?>
<!----------------------------------------------------------->
<div class="container-fluid animated fadeIn">

<div class="alert alert-primary">
   <form name="form_codbarra" id="form_codbarra" method="post" action="cod_barra.php">
      <div class="row">

          <div class="col-md-5">
                <h2 align="center">Stock Productos &nbsp;&nbsp;<img src="static/iconos/stock.ico" alt="Exito" width="52" height="52"></h2>
          </div>
       
              <div class="col-md-4">
                  <small class="form-label">Codigo de producto</small>
                  <div class="input-group mb-3">
                    <input type="text" name="cod_barra" id="cod_barra" class="form-control" 
                                        placeholder="Generar código de barra" aria-label="Generar código de barra" required> 
                    <button class="btn btn-info" type="submit" id="add_proveedor"><i class="fas fa-paper-plane"></i></button>
                  </div>

              </div>
       
          
      </div>
   </form>
</div>


<div class="table-responsive my-2"> 
      <table class='table table-bordered table-hover table-sm' id='stock_productos' style="width: 100%;">
        <thead class="table-primary">
          <tr align="center">
            <th scope="col"><i class="fa fa-key" aria-hidden="true"></i></th>
            <th scope="col">Cod_Barra</th>
            <th scope="col">Nombre</th>
            <th scope="col">Stock</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Tipo_Producto</th>
            <th scope="col">ID_P</th>
            <th scope="col">P_compra</th>
            <th scope="col">%_Utilidad</th>
            <th scope="col">P_Venta</th>
            <th scope="col">ID_Std</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody align="center">

            <tfoot class="table-primary">
                <tr align="center">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
            </tfoot>
        </tbody>
      </table>
</div>


</div>

<!----------------------------------------------------------->
<?php require_once "plantilla/parte_inferior.html"?>
<?php require_once "modales/modal_editar_stock.php";?>

<script src="static/js/admin_stock.js"></script>





