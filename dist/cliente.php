<?php require_once "plantilla/parte_superior.html"?>
<!----------------------------------------------------------->
<div class="container-fluid animated fadeIn">
<style> 
 .buttons-html5{
    background-color: #cce5ff !important;
    border-color: #b8daff !important;
 }
 .buttons-colvis {
    background-color: #cce5ff !important;
    border-color: #b8daff !important;
 }
.buttons-print{
    background-color: #cce5ff !important;
    border-color: #b8daff !important;
 }

</style>

<div class="col-md-6">

<div class="alert alert-primary" role="alert">
<div class="row">

    <div class="col-md-6">
     <h3>Clientes</h3>
    </div>

    <div class="col-md-6">
        <button type="button" class="btn btn-primary" style="width:100%" id="agre_cliente">
        Agregar cliente <img src="static/iconos/new_add_user.ico" alt="Agregar Cliente" width="32" height="32">
    </button> 
   </div>

</div>
</div>

</div>


  <br>

 
<div class="col-md-12">
        <div class="table-responsive">   
        <table id="tabla_clientes" class="table table-sm table-bordered border-primary" style="width:100%">
            <thead class="table-primary">
                <tr align="center">
                        <th scope="col">Num_Fac</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Acciones</th>
                </tr>
            </thead>

                <tbody align="center">

                </tbody>

        </table>	
        </div>
</div>


</div>

<!----------------------------------------------------------->
<?php require_once "plantilla/parte_inferior.html"?>
<?php require_once "modales/modal_cliente.php";?>
<script src="static/js/cliente_crud.js"></script>
  





