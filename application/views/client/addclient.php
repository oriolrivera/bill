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
	  <li role="presentation"><a href="#banca" aria-controls="banca" role="tab" data-toggle="tab">Cuentas Bancarias</a></li>
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
                              <input class="form-control" type="text" name="name" value="<?php echo set_value("name");?>">
                              <p class="help-block">Nombre por el que se conoce al cliente. Para uso interno.</p>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div class="form-group">
                              Razón social:
                              <input class="form-control" type="text" name="razonsocial" value="<?php echo set_value("razonsocial");?>" >
                              <p class="help-block">Nombre oficial del cliente, para las facturas y otros documentos.</p>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              CIF/NIF:
                              <input class="form-control" type="text" name="cifnif" value="<?php echo set_value("cifnif");?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 1:
                              <input class="form-control" type="text" name="telefono1" value="<?php echo set_value("telefono1");?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Teléfono 2:
                              <input class="form-control" type="text" name="telefono2" value="<?php echo set_value("telefono2");?>" >
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              Fax:
                              <input class="form-control" type="text" name="fax" value="<?php echo set_value("fax");?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Email:
                              <input class="form-control" type="text" name="email" value="<?php echo set_value("email");?>" >
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              Web:
                              <input class="form-control" type="text" name="web" value="<?php echo set_value("web");?>" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              <a href="index.php?page=ventas_clientes#grupos">Grupo de clientes</a>:
                              <select class="form-control" name="codgrupo">
                                 <option value="---">Ninguno</option>
                                 <option value="---">-----</option>
                                 
                                 <option value="1">Distribución</option>
                                 
                                 <option value="2">Visita museo estándar</option>
                                 
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              <a href="index.php?page=contabilidad_series#">Serie</a>:
                              <select class="form-control" name="codserie">
                                 
                                 <option value="A" selected="">SERIE A</option>
                                 
                                 <option value="B">Serie B</option>
                                 
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              <a href="index.php?page=admin_divisas">Divisa</a>:
                              <select class="form-control" name="coddivisa">
                              
                                 
                                 <option value="ARS">PESOS (ARG)</option>
                                 
                              
                                 
                                 <option value="BOL">kakin</option>
                                 
                              
                                 
                                 <option value="CLP">PESOS (CLP)</option>
                                 
                              
                                 
                                 <option value="COP">PESOS (COP)</option>
                                 
                              
                                 
                                 <option value="COR">CÓRDOBAS</option>
                                 
                              
                                 
                                 <option value="EUR">EUROS</option>
                                 
                              
                                 
                                 <option value="MXN">PESOS (MXN)</option>
                                 
                              
                                 
                                 <option value="PAB">BALBOAS</option>
                                 
                              
                                 
                                 <option value="PEN">NUEVOS SOLES</option>
                                 
                              
                                 
                                 <option value="USD" selected="">DÓLARES EE.UU.</option>
                                 
                              
                                 
                                 <option value="VEF">BOLÍVARES</option>
                                 
                              
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <a href="index.php?page=contabilidad_formas_pago">Forma de pago</a>:
                              <select class="form-control" name="codpago">
                                 
                                 <option value="CONT" selected="">CONTADO</option>
                                 
                                 <option value="CUOTAS">CUOTAS</option>
                                 
                                 <option value="GIRE_30">GIRO A 30 DIAS FF</option>
                                 
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              Régimen IVA:
                              <select class="form-control" name="regimeniva">
                                 
                                 <option value="General" selected="">General</option>
                                 
                                 <option value="Exento">Exento</option>
                                 
                              </select>
                              <label>
                                 <input type="checkbox" name="recargo" value="TRUE">
                                 Aplicar recargo de equivalencia
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <a href="index.php?page=admin_agentes">Empleado asignado</a>:
                              <select class="form-control" name="codagente">
                                 <option value="---">Ninguno</option>
                                 <option value="---">-----</option>
                                 
                                 <option value="133">010101 Demo</option>
                                 
                                 <option value="144"> Demo</option>
                                 
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              Observaciones:
                              <textarea class="form-control" name="observaciones" rows="3"><?php echo set_value("observaciones");?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <!--    <div class="panel-footer text-right">
               <small class="pull-left">Fecha de alta: 01-01-1970</small>
              
            </div> -->
            </div>
            
            <div class="modal fade" id="modal_debaja" tabindex="-1" role="dialog">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                        </button>
                        
                        <h4 class="modal-title">
                           <span class="glyphicon glyphicon-lock"></span>
                           &nbsp; ¿Deseas dar de baja al cliente?
                        </h4>
                        <p class="help-block">
                           Este cliente ya tiene facturas o albaranes relacionados,
                           por lo que no es recomendable eliminarlo.
                        </p>
                        
                     </div>
                     <div class="modal-body">
                        <div class="checkbox">
                           <label>
                              
                              <input type="checkbox" name="debaja" value="TRUE">
                              
                              Dar de baja al cliente.
                           </label>
                           <p class="help-block">
                              Desaparecerá de las búsquedas en facturas, albaranes, etc.
                              Pero seguirá en el listado de clientes por si cambias de idea.
                           </p>
                        </div>
                        <div class="text-right">
                           <button class="btn btn-sm btn-primary" type="submit">
                              <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
       
     

         
         <div class="table-responsive pseudotab_cli" id="div_subcuentas" style="display: none;">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="text-left">Ejercicio</th>
                     <th></th>
                     <th class="text-left">Subcuenta + Descripción</th>
                     <th class="text-right">Debe</th>
                     <th class="text-right">Haber</th>
                     <th class="text-right">Saldo</th>
                  </tr>
               </thead>
               
               <tbody><tr>
                  <td><div class="form-control">2017</div></td>
                  <td class="text-right">
                     <a class="btn btn-sm btn-default" href="index.php?page=subcuenta_asociada&amp;cli=000037&amp;idsc=4459">
                        <span class="glyphicon glyphicon-wrench"></span>
                     </a>
                  </td>
                  <td>
                     <div class="form-control">
                        <a href="index.php?page=contabilidad_subcuenta&amp;id=4459">4300000037</a> Alejandro
                     </div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
               </tr>
               
               <tr>
                  <td><div class="form-control">2014</div></td>
                  <td class="text-right">
                     <a class="btn btn-sm btn-default" href="index.php?page=subcuenta_asociada&amp;cli=000037&amp;idsc=2225">
                        <span class="glyphicon glyphicon-wrench"></span>
                     </a>
                  </td>
                  <td>
                     <div class="form-control">
                        <a href="index.php?page=contabilidad_subcuenta&amp;id=2225">4300000037</a> Alejandro
                     </div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 $</div>
                  </td>
               </tr>
               
               <tr>
                  <td><div class="form-control">0001</div></td>
                  <td class="text-right">
                     <a class="btn btn-sm btn-default" href="index.php?page=subcuenta_asociada&amp;cli=000037&amp;idsc=3002">
                        <span class="glyphicon glyphicon-wrench"></span>
                     </a>
                  </td>
                  <td>
                     <div class="form-control">
                        <a href="index.php?page=contabilidad_subcuenta&amp;id=3002">4300000037</a> Alejandro
                     </div>
                  </td>
                  <td>
                     <div class="form-control text-right">33 180.57 €</div>
                  </td>
                  <td>
                     <div class="form-control text-right">0.00 €</div>
                  </td>
                  <td>
                     <div class="form-control text-right">33 180.57 €</div>
                  </td>
               </tr>
               
               <tr>
                  <td colspan="6" class="text-center">
                     <a class="btn btn-sm btn-block btn-success" href="index.php?page=subcuenta_asociada&amp;cli=000037">Asignar una nueva subcuenta...</a>
                  </td>
               </tr>
            </tbody></table>
         </div>

		  
	       	</div> <!-- end tap general -->

	       	<div role="tabpanel" class="tab-pane" id="banca">
			
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Principal</h3>
                  </div>
                  <div class="panel-body">
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <a href="index.php?page=admin_paises#">País</a>
                        <select class="form-control" name="pais">
                        
                        <option value="ARG">Argentina</option>
                        
                        <option value="CHL">Chile</option>
                        
                        <option value="COL">Colombia</option>
                        
                        <option value="ECU" selected="">Ecuador</option>
                        
                        <option value="ESP">España</option>
                        
                        <option value="MEX">México</option>
                        
                        <option value="NIC">Nicaragua</option>
                        
                        <option value="PAN">Panamá</option>
                        
                        <option value="PER">Perú</option>
                        
                        <option value="SSV">El Salvador</option>
                        
                        <option value="VEN">Venezuela</option>
                        
                        </select>
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <span class="text-capitalize">provincia</span>:
                        <input class="form-control" type="text" name="provincia" id="ac_provincia" value="GUAYAS" >
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        Ciudad:
                        <input class="form-control" type="text" name="ciudad" value="GUAYAQUIL">
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        Código Postal:
                        <input class="form-control" type="text" name="codpostal" value="">
                     </div>
                     <div class="form-group col-lg-9 col-md-9 col-sm-9">
                        Dirección:
                        <input class="form-control" type="text" name="direccion" value="C/ vfgdfgd" >
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        <span class="text-capitalize">apartado</span>:
                        <input class="form-control" type="text" name="apartado" value="" >
                     </div>
                     <div class="form-group col-lg-3 col-md-4 col-sm-3">
                        <div class="checkbox">
                        <label>
                           <input type="checkbox" name="direnvio" value="TRUE" checked="checked">
                           Dirección de envío
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                           <input type="checkbox" name="dirfact" value="TRUE" checked="checked">
                           Dirección de facturación
                        </label>
                        </div>
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-6">
                        Descripción:
                        <input class="form-control" type="text" name="descripcion" value="Principal" >
                     </div>
                  </div>
                  <div class="panel-footer text-right">                  
                  </div>
               </div>

                   <div id="panel_cuentasb" class="pseudotab_cli" style="display: ;">
            
          
               <input type="hidden" name="codcuenta" value="1">
               <input type="hidden" name="codcliente" value="000037">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <h3 class="panel-title">Cuenta bancaria #1</h3>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-8">
                           <div class="form-group">
                              <input class="form-control" type="text" name="descripcion" value="scotiabank" placeholder="Cuenta principal" >
                           </div>
                        </div>
                        <div class="col-md-4 text-right">
                           <div class="btn-group">
                              <a class="btn btn-sm btn-danger" onclick="delete_cuenta('1');">
                                 <span class="glyphicon glyphicon-trash"></span> &nbsp; Eliminar
                              </a>
                              <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
                                 <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <a target="_blank" href="http://es.wikipedia.org/wiki/International_Bank_Account_Number">IBAN</a>:
                              <input class="form-control" type="text" name="iban" value="111111" maxlength="28" placeholder="ES12345678901234567890123456" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              Calcular IBAN:
                              <input class="form-control" type="text" name="ciban" maxlength="20" placeholder="ENTIDAD SUCURSAL DC CUENTA" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <a target="_blank" href="http://es.wikipedia.org/wiki/Society_for_Worldwide_Interbank_Financial_Telecommunication">SWIFT</a> o BIC:
                              <input class="form-control" type="text" name="swift" value="" maxlength="11" >
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            
           <!--  
           <div class="panel panel-success">
              <div class="panel-heading">
                 <h3 class="panel-title">
                    <a id="b_nueva_cuenta" href="#">Nueva cuenta bancaria...</a>
                 </h3>
              </div>
           </div> -->
            <button class="btn btn-sm btn-success" type="submit">
                     <span class="glyphicon glyphicon-floppy-disk"></span> Nueva cuenta bancaria
                  </button>
         </div>
         
	       	</div> <!-- end tap banca -->
	 </div> <!-- end tap content -->
</div> <!-- end tap panel -->

<?php echo form_close();?>