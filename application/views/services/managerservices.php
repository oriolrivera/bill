  <div class="pull-right">
  	<a href="<?php echo base_url(); ?>services/addservices" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo Servicio</a>
  	<a href="" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
  </div>
  <br><br>
  <div class="panel panel-default">
                    <div class="panel-heading">Servicios</div>
                    <div class="panel-body">
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>

                            	<tr>
			                     <th><input type="checkbox"  id="checkAll" name="checkAll"></th>
			                     <th class="text-left">Código</th>
			                     <th class="text-left">Nombre</th>
			                     <th class="center">Precio</th>
			                     <th class="text-right">Editar</th>
			                  </tr>
                                
                            </thead>
                            <tbody>
                            	<?php foreach ($results as $result) {
                                
                              ?>                            	
	                                <tr class="odd gradeX">
	                                <td><input type="checkbox" name="delete[]" value="<?php echo $result->id_service; ?>"></td>
	                                    <td><?php echo $result->id_service; ?></td>
	                                    <td><?php echo $result->name; ?></td>
	                                    <td class="center"><?php echo number_format($result->price,2); ?></td>
	                                    <td class="center"><a href="<?php echo $result->id_service; ?>" class="btn btn-info btn-circle btn-flat"><i class="fa fa-pencil-square-o"></i></a></td>
	                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

