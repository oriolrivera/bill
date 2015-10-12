  <div class="pull-right">
  	<a href="<?php echo base_url(); ?>invoice/newinvoice" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo Factura</a>
  	<a href="" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
  </div>
  <br><br>
  <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>
                    <div class="panel-body">
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>

                            	<tr>
			                     <th><input type="checkbox"  id="checkAll" name="checkAll"></th>
			                     <th class="text-left">Código</th>
			                     <th class="text-left">Nombre</th>
			                     <th class="text-left">CIF/NIF</th>
			                     <th class="text-left">email</th>
			                     <th class="text-left">Teléfono</th>
			                     <th class="text-left">Observaciones</th>
			                     <th class="text-right">Editar</th>
			                  </tr>
                                
                            </thead>
                            <tbody>
                            	<?php for ($i=0; $i <10 ; $i++) {  ?>                            	
	                                <tr class="odd gradeX">
	                                <td><input type="checkbox" name="delete[]" value="<?php echo $i; ?>"></td>
	                                    <td>Código</td>
	                                    <td>Nombre</td>
	                                    <td>CIF/NIF</td>
	                                    <td>email</td>
	                                    <td>Teléfono</td>
	                                    <td class="center">Observaciones</td>
	                                    <td class="center"><a href="" class="btn btn-info btn-circle btn-flat"><i class="fa fa-pencil-square-o"></i></a></td>
	                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

