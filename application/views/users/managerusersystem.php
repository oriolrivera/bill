			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					  <button type="button" id="delete-usersystem" class="btn btn-primary">Eliminar</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

		<div id="content">
		<div  class="page-title">
			<div  class="title-env">
				<h1 class="title">Gestor de Usuarios</h1>
			
			</div>
			<div class="breadcrumb-env">
		
					<ol class="breadcrumb bc-1">
						<li>
							<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Home</a>
						</li>
						<li>
							<a href="#">Gestor de Usuarios</a>
						</li>
						
					</ol>
					
		</div>
		</div>
			

			<?php
	            if($this->session->flashdata("mensaje")!='' )
	            {
	                echo $this->session->flashdata("mensaje");
	            }
            ?>
				
				<div class="row">

					<div class="widget-title">
								<span class="icon with-checkbox">
										
								</span>
							
								<div class="pull-right btn-right">
									<a href="<?php echo base_url(); ?>users/addusersystem" class="btn btn-success">Nuevo</a>
								</div>

								<div class="pull-right btn-right">
							
									<a href="#box-config" data-toggle="modal" class="config btn btn-danger">Eliminar selección</a>
								</div>
							</div>
							<div class="push"></div>
					<div class="col-xs-12 panel panel-default">


						
						<div class="widget-box">
						
							<div class="widget-content nopadding">
								<div id="allDel">
											<form action="" method="post" name="form" id="form">
								<table class="table table-bordered table-striped table-hover with-check">
									<thead>
										<tr>
											<th><input type="checkbox"  id="checkAll" name="checkAll"> <a href="" title="Eliminar Selección" class="tip-bottom"></th>
											<th>#</th>
										
											<th>Nombre</th>
											<th>Estado</th>
											<th>Fecha de creación</th>
											<th>Editar</th>
										</tr>
									</thead>
									<tbody>
									
												<?php foreach ($results as $result) { ?>
													
												
												<tr>
													<td>
													<?php if ($result->id==1) {
														?>
															<input type="checkbox" name="adminUser[]" value="<?php echo $result->id; ?>">
														<?php
													}else{
														?>
															<input type="checkbox" name="delete[]" value="<?php echo $result->id; ?>">
														<?php
														} ?>
													</td>
													<td><?php echo $result->id; ?></td>											
													<td><?php echo $result->user; ?></td>
													<td><?php if ($result->status==1) {
															?>
														<button class="btn btn-success btn-xs" type="buttom">Activo</button>
														<?php
															}else{
														?>
															<button class="btn btn-danger btn-xs" type="buttom">Desactivado</button>
														<?php
													} ?></td>
													<td><?php echo $result->created_at; ?></td>
													<td><a href="<?php echo base_url(); ?>users/updateusersystem/<?php echo $result->id; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a></td>
													
												</tr>

												<?php } ?>
										
									
									</tbody>
								</table>	
									</form>
										</div>
								
									  <ul class="pagination">
									  
									    <li><a href="#">Total: <?php echo $count; ?></a></li>
									
									  </ul>
									
									<?php echo $this->pagination->create_links(); ?>
									 				
							</div>
						</div>
						
							<div class="push"></div>
					</div>
				</div>
				</div>
