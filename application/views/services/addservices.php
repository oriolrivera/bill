<div class="page-header"><h1>Crear Servicio</h1></div>
<?php echo form_open(null,array("name"=>"form","id"=>"form"));?>
<div class="pull-right">
	<button class="btn btn-sm btn-primary" type="submit">
	 <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
	</button>
	<a href="<?php echo base_url(); ?>services/managerservices" class="btn btn-sm btn-danger"><i class="fa fa-back"></i> Salir</a>
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
<div class="push"></div>
<div class="row">
<div class="col-sm-12">
 <div class="panel panel-default" id="panel_generales" style="display: block;">
               <div class="panel-heading">
                  <h3 class="panel-title">Datos</h3>
               </div>


   <div class="container-fluid">
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              Nombre:
                              <input class="form-control" type="text" name="name" value="<?php echo set_value("name");?>">
                              <p class="help-block">Nombre del servicio.</p>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="form-group">
                             Nombre encargado:
                              <input class="form-control" type="text" name="encargado" value="<?php echo set_value("encargado");?>" >
                              <p class="help-block">Nombre de encargado del servicio.</p>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Precio:
                              <input class="form-control" type="text" name="precio" value="<?php echo set_value("precio");?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                      <div class="col-sm-2">
                           <div class="form-group">
                              Itbis:
                              <input class="form-control" type="text" name="itbis" value="<?php echo set_value("itbis");?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 1 encargado:
                              <input class="form-control" type="text" name="telefono1" value="<?php echo set_value("telefono1");?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 2 encargado:
                              <input class="form-control" type="text" name="telefono2" value="<?php echo set_value("telefono2");?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Fax encargado:
                              <input class="form-control" type="text" name="fax" value="<?php echo set_value("fax");?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Email encargado:
                              <input class="form-control" type="text" name="email" value="<?php echo set_value("email");?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Web encargado:
                              <input class="form-control" type="text" name="web" value="<?php echo set_value("web");?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                       
                     </div>
                 
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              Descripción:
                              <textarea class="form-control" id="ckeditor" name="descripcion" rows="3"><?php echo set_value("descripcion");?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
</div>
</div>

</div>

                  <?php echo form_close();?>

