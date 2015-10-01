  <div class="container">
    	<div class="row">
    	<div class="col-lg-4 col-lg-offset-4">
        	<h3 class="text-center">Sistema Facturación </h3>
            <p class="text-center">Iniciar sesión</p>
            <hr class="clean">

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


        	<?php echo form_open(null,array("name"=>"loginform","id"=>"login","class"=>"login-form fade-in-effect"));?>
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="username" class="form-control"  placeholder="Nombre de usuario">
              </div>
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" name="password" class="form-control"  placeholder="Password">
              </div>
           <!--    <div class="form-group">
             <label class="cr-styled">
                 <input type="checkbox" ng-model="todo.done">
                 <i class="fa"></i> 
             </label>
             Remember me
           </div> -->
        	  <button type="submit" class="btn btn-purple btn-block">Iniciar sesión</button>
           <?php echo form_close();?>


            <hr>
            
       
        </div>
        </div>
    </div>