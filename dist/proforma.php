<?php require_once "plantilla/parte_superior.html"?>
<link rel="stylesheet" href="static/css/proforma_estilo.css"> 
<link rel="stylesheet" href="static/css/animacion.css">

<div class="container-fluid">
<form name="form_proforma" id="form_proforma" method="POST">

  <h2>Genera Proformas</h2>
    <div class="row">
    
            <div class="col-md-8 animated fadeIn">


                <div class="row">
                    <div class="col-md-7">
                    <div class="alert alert-primary" role="alert" id="alerta_primary">
                        <span>Busqueda <i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bordes_input" id="buscar_producfor" placeholder="Buscar">

                    </div>
                    </div>
    
                    <div class="col-md-5 mb-3">
                        <button type="submit" class="btn btn-info mb-2" id="gene_profor"> Generar
                            <i class="fa fa-cog fa-spin fa-fw"></i>
                        </button>

                        <a href="javascript:window.open('print_proforma.php','','width=1000, height=1000, left=580, top=50, toolbar = yes');" class="btn btn-dark mb-2" id="impri_profor">Imprimir
                            <i class="fas fa-print"></i>
                        </a>

                    </div>
               </div>
                
                <!-----------------------Resultado de la busqueda------------------------------------>
                    <div class="table-responsive animated">

                        <table class='table responsive-table table-bordered table-sm' id='tabla' name='produc_resul'>
                            <thead class="table-secondary">
                                <tr align="center">
                                    <th scope="col">#_Id</th>
                                    <th scope="col">Cod_Barra</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Precio_Total</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Sub_total</th>
                                    <th scope="col" class="table-danger">Cod_V</th>
                                    <th scope="col" class="table-danger">Can_V</th>
                                    <th scope="col" class="table-danger">Opc</th>
                                </tr>
                            </thead>
                            <tbody class="tabla-area" id="tablaresul_produtprofor" align="center">


                            </tbody>
                        </table>

                    </div>
                <!----------------------Fin de busqueda-------------------------------------> 
                    <hr>
                <!----------------------Productos agregados---------------------------------> 
                    <div class="alert alert-dark" role="alert">
                        <div class="table-responsive my-2"> 
                                <table class='table responsive-table table-bordered border-primary table-sm' id='tabla' name='produc_resul'>
                                <thead class="table-primary">
                                    <tr align="center">
                                    <th scope="col"><i class="fa fa-key" aria-hidden="true"></i></th>
                                    <th scope="col">Cod_Barra</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Precio_Total</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Sub_total</th>
                                    <th scope="col">Cod_V</th>
                                    <th scope="col">Can_V</th>
                                    <th scope="col">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_clone" align="center">


                                </tbody>
                                </table>
                        </div>
                    </div>
                <!----------------------Productos agregados--------------------------------->  

            </div>
    
<!----------------------Totales--------------------------------->  
<div class="col-md-4 animated fadeIn">
    <div class="alert alert-secondary" role="alert">

            <h5>Proformas: 5</h5>
            <hr class="hr_class">

                    <small class="form-label"><strong>Cliente</strong></small>
                    <div class="input-group mb-3">
                        <select class="form-select js-example-basic-multiple" style="width: 80%" id="selec_control" name="cliente_prof">
                        </select>
                        <button class="btn btn-info agregar_clien" type="button" style="width: 20%" id="agre_cliente">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>

            <div id="cal_vuelto">

                    <small class="form-label"><strong>Sub Total factura</strong></small>
                    <input type="number" class="form-control mb-3 total_fac_com" name="total_profor" id="total_fac_com" placeholder="Sub Total de factura" readonly required>

                    <hr class="hr_class">

                    <input type="hidden" value="<?php echo $id_usuario; ?>" name="user" readonly>

                    <div class="form-floating">
                        <textarea class="form-control" name="condiciones_profor" placeholder="Condiciones" id="tex_condiciones"></textarea>
                        <label for="tex_condiciones">Condiciones</label>
                    </div>

                    <hr class="hr_class">

            </div>

    </div>
</div>
<!----------------------Totales--------------------------------->  

    </div>

</form>
</div>

<?php require_once "plantilla/parte_inferior.html"?>
<?php require_once "modales/modal_cliente.php";?>
<script src="static/js/admin_proforma.js"></script>
  





