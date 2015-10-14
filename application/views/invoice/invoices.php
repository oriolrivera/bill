 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  <h4 class="modal-title">Borrar</h4>
		</div>
		<div class="modal-body">
		  ¿Realmente desea Borrar esta selección?
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		  <button type="button" id="delete-invoice" class="btn btn-danger">Eliminar</button>
		</div>
	  </div>
	</div>
  </div>

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


  <div class="pull-right">
  	<a href="<?php echo base_url(); ?>invoice/newinvoice" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo Factura</a>
  	<a href="javascript:;" onclick="jQuery('#modal').modal('show', {backdrop: 'fade'});" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
  </div>
  <br><br>
  <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>
                    <div class="panel-body">
                    <form action="" method="post" name="form" id="form">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>

                            	<tr>
			                     <th><input type="checkbox"  id="checkAll" name="checkAll"></th>
			                     <th class="text-left">Código</th>
			                     <th class="text-left">Cliente</th>
			                     <th class="text-left">Observaciones</th>
			                     <th class="text-left">Total</th>
			                     <th class="text-left">Fecha</th>
			                     <th class="text-left">Fecha de entrega</th>
			                     <th class="text-right">Editar</th>
			                  </tr>
                                
                            </thead>
                            <tbody>
                            	<?php foreach ($results as $result) {
                            	  ?>                            	
	                                <tr class="odd gradeX">
	                                <td><input type="checkbox" name="delete[]" value="<?php echo $result->id_invoice; ?>"></td>
	                                    <td><?php echo $result->id_invoice; ?></td>
	                                    <td><?php echo $result->client; ?></td>
	                                    <td><?php echo $result->observation; ?></td>
	                                    <td>$<?php echo number_format($result->atotal,2); ?></td>
	                                    <td><?php echo date("d-m-Y",strtotime($result->date_added)); ?></td>
	                                    <td><?php echo date("d-m-Y",strtotime($result->date_service)); ?></td>
	                                   
	                                    <td class="center"><a href="<?php echo $result->id_invoice; ?>" class="btn btn-info btn-circle btn-flat"><i class="fa fa-pencil-square-o"></i></a></td>
	                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>

                    </div>
                </div>

