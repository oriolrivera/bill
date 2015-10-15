
<div id="content">
			<div id="content-header">
				<h1>Editar Perfil</h1>
				<div class="btn-group pull-right">
					<a href="<?php echo base_url(); ?>panel/" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Salir</a>
					
				</div>
			</div>
		
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
					<!-- 	<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-align-justify"></i>									
							</span>
							
						</div> -->
							
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

							<div class="widget-content nopadding">

								<?php echo form_open(null,array("name"=>"form","id"=>"form","class"=>"form-horizontal"));?>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Nombre</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="text" name="name" id="name" class="form-control input-sm" value="<?php echo $result->name;?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Apellido</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="text" name="lastname" id="lastname" class="form-control input-sm" value="<?php echo $result->lastname;?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Correo electrónico:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo $result->email;?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Login:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="text" name="login" id="login" class="form-control input-sm" value="<?php echo $result->user;?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Password actual:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="password" name="passact" id="passact" class="form-control input-sm"  />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Nuevo Password:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="password" name="pass" id="pass" class="form-control input-sm"  />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Confirmar Password:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="password" name="confirpass" id="confirpass" class="form-control input-sm"  />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Foto:</label>
										<div class="col-sm-7 col-md-6 col-lg-7">
											<input type="file" name="photo" id="photo" class="form-control input-sm"  />
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">Descripción</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<textarea rows="5" name="details" id="editor1"  class="ckeditor"><?php echo $result->details;?></textarea>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
									</div>
								<?php echo form_close();?>

							</div>
						</div>						
					</div>
				</div>

			
			</div>
		</div>