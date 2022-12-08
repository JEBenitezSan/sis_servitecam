<div class="modal fade" id="modal_add_categoriapro" tabindex="-4" aria-labelledby="modal_add_categoriaproLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header" style="background-color:#0dcaf0">    
        <h5 class="modal-title" id="modal_add_categoriaproLabel">Registrar nueva categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="actua_categoriapro"></button>
      </div>

      <div class="modal-body">
      <!---------------------------------------------------------------->
      <div class="col-md-12">
  
        <form id="add_form_categoriapro" method="POST">
              
              <div class="row form-group align-content-center">
              <div class="input-group">
              
                    <div class="col-md-12">
                      <!-----------------------------------------------------> 
                      <input type="hidden" name="user_modal_catpro" value="<?php echo $id_usuario;?>" id="user_modal_catpro" readonly>
                      <input type="hidden" name="opc_catpro" value="add_catpro" id="opc_catpro" readonly>

                      <div class="form-floating mb-3">  
                        <input type="text" value="" id="categoria_pro" name="categoria_pro" class="form-control" placeholder="Digita categoria de producto" required>
                        <label for="categoria_pro">Digita categoría de producto</label>
                      </div>
                      <!----------------------------------------------------->
                      <div class="form-floating mb-3"> 
                        <input type="text" value="" id="descrip_cat" name="descrip_cat" class="form-control" placeholder="Descripcion de categoria" required>
                        <label for="descrip_cat">Descripción de categoría</label>
                      </div>
                      <!----------------------------------------------------->
                    </div>

              </div>
              </div>
              
      </div>
      <!----------------------------------------------------------------------------------------->
      </div>

      <div class="modal-footer">
          <button type="submit" class="btn btn-info">
          Agregar <i class="far fa-save"></i>
 
          </button>  
      </form>	
      </div>


    </div>
  </div>
</div>


	

						
  