  <script type="text/javascript">
   

      function show_precio(precio)
      {
         
         return number_format(precio, 2, '.', ' ')+' $';
         
      }
      function show_numero(numero)
      {
         return number_format(numero, 2, '.', ' ');
      }
   </script>

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


<?php echo form_open(null,array("name"=>"form","id"=>"form"));?>
   
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-8">

         <div class="form-group">
            <h2>
            Estado:
            <small>
             <?php if ($data->status==1) {
                     ?>
                        <b>Factura Cobrada</b>
                     <?php
                  }else{
                     ?>
                        <b>Pendiente por cobrar</b>
                     <?php
                     } ?>
            </small>
            </h2>
          </div>

         <div class="col-sm-7">

         <div class="form-group">
                <i class="fa fa-user"></i>  Cliente:
            <select name="client" id="client" class="form-control" required="required">
                  <option value="">Selecciona Cliente</option>
                  <?php 
                     foreach ($resultsClient as $resultc) {
                        if ($data->client==$resultc->id) {
                     ?>  
                  <option value="<?php echo $resultc->id; ?>" selected="selected"><?php echo $resultc->name; ?></option>
                  <?php }else{
                     ?>
                     <option value="<?php echo $resultc->id; ?>"><?php echo $resultc->name; ?></option>
                     <?php
                  }

                  } ?>
            </select>
          </div>

          
           
         </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Fecha del servicio:
               <input type="text" name="fecha" class="form-control datepicker" value="<?php echo date("d-m-Y",strtotime($data->date_service)) ?>" autocomplete="off">
            </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Hora:
               <input type="text" name="hora" class="form-control" value="<?php echo date("H:i:s",strtotime($data->hour)) ?>" autocomplete="off">
            </div>
         </div>
      </div>
   </div>
   
   <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active">
            <a href="#lineas" aria-controls="lineas" role="tab" data-toggle="tab">
               <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
               <span class="hidden-xs">&nbsp; Líneas</span>
            </a>
         </li>
         <li role="presentation">
            <a href="#direccion" aria-controls="direccion" role="tab" data-toggle="tab">
               <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
               <span class="hidden-xs">&nbsp; Dirección</span>
            </a>
         </li>
    
      </ul>
      <div class="tab-content">
         <div role="tabpanel" class="tab-pane active" id="lineas">
            <div class="table-responsive">
             <table class="table table-striped">
                           <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th class="price">Dto. %</th>
                                    <th class="total">Neto</th>
                                    <th class="total">ITBIS</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>   
                                
                            <tbody>

                            <?php foreach ($results as $result) {
                             
                            ?>
                                <tr>
                                    <td><?php echo $result->description ?></td>        
                                    <td><?php echo $result->quantity ?></td>
                                    <td><?php echo number_format($result->price,2); ?></td>
                                    <td class="price"><?php echo number_format($result->discount,2); ?> %</td>
                                    <td class="total"><?php echo number_format($result->neto,2); ?></td>
                                    <td class="total"><?php echo number_format($result->itbis,2); ?> %</td>
                                    <td class="total"><?php echo number_format($result->total,2); ?></td>
                                </tr>

                            <?php } ?>

                             <tr>
                                    <td colspan="5" class="sub_total"></td>
                                    <td class="sub_total"><b>Total Itbis:</b></td>
                                    <td class="sub_total">$<?php echo number_format($data->aiva,2); ?></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5" class="sub_total"></td>
                                    <td class="sub_total"><b>Subtotal:</b></td>
                                    <td class="sub_total">$<?php echo number_format($data->aneto,2); ?></td>
                                </tr>
                                <tr class="total_bar">
                                    <td colspan="5" class="grand_total"></td>
                                    <td class="grand_total"><b>Total:</b></td>
                                    <td class="grand_total">$<?php echo number_format($data->atotal,2); ?></td>
                                </tr>
                            </tbody>
                        </table>
            </div>
         </div>
         <div role="tabpanel" class="tab-pane" id="direccion">
            <div class="container-fluid" style="margin-top: 10px;">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <a href="index.php?page=admin_paises#">País</a>:
                     <input type="text" name="codpais" class="form-control" value="<?php echo $data->country ?>">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <span class="text-capitalize">provincia</span>:
                        
                        <input id="ac_provincia" class="form-control" type="text" name="provincia" value="<?php echo $data->province ?>">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Ciudad:
                        
                        <input class="form-control" type="text" name="ciudad" value="<?php echo $data->city ?>">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Código Postal:
                        
                        <input class="form-control" type="text" name="codpostal" value="<?php echo $data->zip_code ?>">
                        
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        Dirección:
                        
                        <input class="form-control" type="text" name="direccion" value="<?php echo $data->address ?>">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
       
      </div>
   </div>
   
   <div class="container-fluid" style="margin-top: 10px;">
      <div class="row">
         <div class="col-sm-6">
         </div>
         <div class="col-sm-6 text-right">
            <button class="btn btn-sm btn-primary" type="button" onclick="$('#modal_guardar').modal('show');">
               <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar...
            </button>
            <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>invoice/invoices">
               <span class="fa fa-chevron-left"></span> &nbsp; Salir
            </a>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12" style="margin-top: 20px;">
            <div class="form-group">
               Observaciones:
               <textarea class="form-control" name="observaciones" rows="3"><?php echo $data->observation ?></textarea>
            </div>
         </div>
      </div>
   </div>
   
   <div class="modal fade" id="modal_guardar">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title">Guardar como</h4>
           
            </div>
            <div class="modal-body">
               <?php 
                     switch ($data->type) {
                        case '1':
                           ?>
                               <div class="radio">
                                 <label>
                                    <input type="radio" name="tipo" value="1" checked="checked">
                                    Cotización
                                 </label>
                              </div>
                              
                              <div class="radio">
                                 <label>
                                    <input type="radio" name="tipo" value="2">
                                    Factura de cliente
                                 </label>
                              </div>
                           <?php
                           break;

                            case '2':
                           ?>
                               <div class="radio">
                                 <label>
                                    <input type="radio" name="tipo" value="1">
                                    Cotización
                                 </label>
                              </div>
                              
                              <div class="radio">
                                 <label>
                                    <input type="radio" name="tipo" value="2" checked="checked">
                                    Factura de cliente
                                 </label>
                              </div>
                           <?php
                           break;
                        
                     }
                ?>
              
            
               <div class="form-group">
                  <span>Forma de pago</span>:
                  <select name="forma_pago" class="form-control">
                  <?php 
                     switch ($data->payment_method) {
                        case '1':
                           ?>
                           <option value="1" selected="">CONTADO</option>
                           <option value="2">CHEQUE</option>
                           <option value="3">TRANSFERENCIA</option>
                  <?php
                        break;

                        case '2':
                           ?>
                           <option value="1">CONTADO</option>
                           <option value="2" selected="">CHEQUE</option>
                           <option value="3">TRANSFERENCIA</option>
                  <?php
                        break;

                        case '3':
                           ?>
                           <option value="1">CONTADO</option>
                           <option value="2">CHEQUE</option>
                           <option value="3" selected="">TRANSFERENCIA</option>
                  <?php
                        break;
                     }
                ?>
                  </select>
               </div>

               <div class="form-group">
                  <span>Estado</span>:
                  <select name="status" class="form-control">
                  <?php if ($data->status==1) {
                     ?>
                        <option value="1" selected="">Factura Cobrada</option>
                        <option value="2">Pendiente por cobrar</option>
                     <?php
                  }else{
                     ?>
                        <option value="1">Factura Cobrada</option>
                        <option value="2" selected="">Pendiente por cobrar</option>
                     <?php
                     } ?>
                     
                  </select>
               </div>
            </div>
            <div class="modal-footer">
             
               <div class="btn-group">
                  <button class="btn btn-sm btn-primary" type="submit">
                     <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
                  </button>
             
               </div>
            </div>
         </div>
      </div>
   </div>

<?php echo form_close();?>




 <div class="modal" id="modal_articulos">
   <div class="modal-dialog" style="width: 99%; max-width: 1000px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Buscar servicios</h4>
         </div>
         <div class="modal-body">


            <form id="f_buscar_articulos" name="f_buscar_articulos" action="" method="post" class="form">
             
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                     
                           <input class="form-control" type="hidden" name="query" autocomplete="off"/>

                       
                        <?php $resultsServices=$this->services_model->getServicesManager(); ?>
                           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>

                              <tr>                              
                              <th class="text-left">Código</th>
                              <th class="text-left">Nombre</th>
                              <th class="center">Precio</th>
                           </tr>
                                
                            </thead>
                            <tbody>
                              <?php foreach ($resultsServices as $result) {
                                
                              ?>                               
                                   <tr class="odd gradeX">
                                       <td><?php echo $result->id_service; ?></td>
                                       <td><a href="#" onclick="return add_articulo('<?php echo $result->id_service; ?>','<?php echo base64_encode($result->name); ?>','<?php echo $result->price; ?>','0','ITBIS13','1')"><?php echo $result->name; ?></a></td>
                                       <td class="center"><a href="#" onclick="return add_articulo('<?php echo $result->id_service; ?>','<?php echo base64_encode($result->name); ?>','<?php echo $result->price; ?>','0','ITBIS13','1')"><?php echo number_format($result->price,2); ?></a></td>                                 
                                   </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        
                       
                     </div>
                    
                     
                  </div>
               </div>
            </form>
         </div>

         </div>
      </div>
   </div>
</div>
 
