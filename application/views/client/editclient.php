<?php echo form_open(null,array("name"=>"form","id"=>"form"));?>
<div class="pull-right">
	<button class="btn btn-sm btn-primary" type="submit">
	 <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
	</button>
	<a href="<?php echo base_url(); ?>client/clients" class="btn btn-sm btn-danger"><i class="fa fa-back"></i> Salir</a>
</div>

<div class="col-sm-11">

   <?php
      if($this->session->flashdata("mensaje")!='' )
      {
          echo $this->session->flashdata("mensaje");
      }
      ?>
      <?php
      $validation_error=validation_errors("<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>","</div>");
      if($validation_error != "")
      {
          echo $validation_error;
      }
      ?>
</div>
<div role="tabpanel">
	<ul class="nav nav-tabs">
	   <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">Datos generales</a></li>
	  <li role="presentation"><a href="#banca" aria-controls="banca" role="tab" data-toggle="tab">Cuenta Bancaria</a></li>
	</ul>



	 <div class="tab-content">
	        <div role="tabpanel" class="tab-pane active" id="general">

        

            <div class="panel panel-default" id="panel_generales" style="display: block;">
               <div class="panel-heading">
                  <h3 class="panel-title">Datos generales</h3>
               </div>
               <div class="panel-body">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              Nombre:
                              <input class="form-control" type="text" name="name" value="<?php echo $result->name;?>">
                              <p class="help-block">Nombre por el que se conoce al cliente. Para uso interno.</p>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="form-group">
                              Razón social:
                              <input class="form-control" type="text" name="razonsocial" value="<?php echo $result->razon_social;?>" >
                              <p class="help-block">Nombre oficial del cliente, para las facturas y otros documentos.</p>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              CIF/NIF:
                              <input class="form-control" type="text" name="cifnif" value="<?php echo $result->cif_nif;?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 1:
                              <input class="form-control" type="text" name="telefono1" value="<?php echo $result->phone_one;?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 2:
                              <input class="form-control" type="text" name="telefono2" value="<?php echo $result->phone_two;?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Fax:
                              <input class="form-control" type="text" name="fax" value="<?php echo $result->fax;?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Email:
                              <input class="form-control" type="text" name="email" value="<?php echo $result->email;?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Web:
                              <input class="form-control" type="text" name="web" value="<?php echo $result->web;?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                       
                     </div>
                 
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              Observaciones:
                              <textarea class="form-control" name="observaciones" rows="3"><?php echo $result->observation;?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <!--    <div class="panel-footer text-right">
               <small class="pull-left">Fecha de alta: 01-01-1970</small>
              
            </div> -->
            </div>
            
           
        

		  
	       	</div> <!-- end tap general -->

	       	<div role="tabpanel" class="tab-pane" id="banca">
			
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Principal</h3>
                  </div>
                  <div class="panel-body">
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <span class="text-capitalize">País:</span>
                           <input type="text" name="pais" class="form-control" value="<?php echo $result->country; ?>">
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <span class="text-capitalize">provincia</span>:
                        <input class="form-control" type="text" name="provincia" id="ac_provincia" value="<?php echo $result->province; ?>" >
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        Ciudad:
                        <input class="form-control" type="text" name="ciudad" value="<?php echo $result->city; ?>">
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        Código Postal:
                        <input class="form-control" type="text" name="codpostal" value="<?php echo $result->code_zip; ?>">
                     </div>
                     <div class="form-group col-lg-9 col-md-9 col-sm-9">
                        Dirección:
                        <input class="form-control" type="text" name="direccion" value="<?php echo $result->address; ?>" >
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        <span class="text-capitalize">Municipio</span>:
                        <input class="form-control" type="text" name="municipio" value="<?php echo $result->town; ?>" >
                     </div>
                     <div class="form-group col-lg-3 col-md-4 col-sm-3">
                        
                        <div class="checkbox">
                        <label>
                           <?php if ($result->billing_address==1) {
                              ?>
                               <input type="checkbox" name="dirfact" value="TRUE" checked="checked">
                              <?php
                           }else{
                              ?>
                              <input type="checkbox" name="dirfact" value="TRUE">
                              <?php
                              } ?>
                          
                           Dirección de facturación
                        </label>
                        </div>
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-6">
                        Descripción:
                        <input class="form-control" type="text" name="descripcion" value="<?php echo $result->description; ?>" >
                     </div>
                  </div>
                  <div class="panel-footer text-right">                  
                  </div>
               </div>
              <div id="panel_cuentasb" class="pseudotab_cli" style="display: ;">
         
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <h3 class="panel-title">Cuenta bancaria</h3>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-8">
                           <div class="form-group">
                           <span>Banco</span>:
                              <input class="form-control" type="text" name="banco" value="<?php echo $result->back; ?>" >
                           </div>
                        </div>
                      <!--   <div class="col-md-4 text-right">
                         <div class="btn-group">
                            <a class="btn btn-sm btn-danger" onclick="delete_cuenta('1');">
                               <span class="glyphicon glyphicon-trash"></span> &nbsp; Eliminar
                            </a>
                            <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
                               <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
                            </button>
                         </div>
                      </div> -->
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <span>Numero de cuenta</span>:
                              <input class="form-control" type="text" name="nocuenta" value="<?php echo $result->no_account; ?>" maxlength="28" >
                           </div>
                        </div>
                      
                     </div>
                  </div>
               </div>
            
  <!-- 
            <button class="btn btn-sm btn-success" type="submit">
                     <span class="glyphicon glyphicon-floppy-disk"></span> Nueva cuenta bancaria
                  </button> -->
         </div> 
         
	       	</div> <!-- end tap banca -->
	 </div> <!-- end tap content -->
</div> <!-- end tap panel -->

<?php echo form_close();?>