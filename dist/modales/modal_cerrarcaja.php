<div class="modal fade" id="modal_cerrar_caja" tabindex="-1" aria-labelledby="exampleCerrarCaja" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #c9422a; color:white"> 	
        <h5 class="modal-title" id="exampleCerrarCaja" >Cerrar Caja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="form_cerrar_caja">
      <div class="modal-body">

            <!-----------------------------------------------------> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">
                <i class="fas fa-money-bill"></i>&nbsp;<strong>Monto entrada de Caja</strong></label>
                <input type="text" value="" id="monto_cerrar_caja" name="monto_cerrar_caja" class="caja_css form-control" placeholder="Digite monto para cerrar caja" required readonly>
            </div>
            <!-----------------------------------------------------> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">
                <i class="fas fa-money-bill"></i>&nbsp;<strong>Cierre total Caja</strong></label>
                <input type="text" value="" id="monto_final_caja" name="monto_final_caja" class="caja_css form-control" placeholder="Digite monto cierre caja" required readonly>
            </div>
            <!-----------------------------------------------------> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">
                <i class="fas fa-prescription-bottle"></i>&nbsp;<strong>Descripcion de cierre</strong></label>
                <input type="text" value="" id="descripcion_cerrarcaja" name="descripcion_cerrarcaja" class="caja_css form-control" placeholder="Descripcion de cerrar caja" required>
            </div>
            <!----------------------------------------------------->

      </div>
        <input type="hidden" name="usermodal_caja_cerrar" value="<?php echo $id_usuario;?>" id="usermodal_caja_cerrar" readonly>
        <input type="hidden" name="opc_caja" value="cerrar_caja" id="opc_caja" readonly>
        <input type="hidden" name="estado_caja" value="Cerrado" id="estado_caja" readonly>
        <input type="hidden" name="id_caja" value="" id="id_caja" readonly>


      <div class="modal-footer">
        <div align='right'>
            <button class="btn btn_perso_s" id="cerrar_caja_btn" type="submit" style="color:white">
             Cerrar caja
            </button>
        </div>
      </div>
    </form>

    </div>
  </div>
</div>