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
         <div class="col-sm-7">

         <div class="form-group">
                <i class="fa fa-user"></i>  Cliente:
            <select name="client" id="client" class="form-control" required="required">
                  <option value="">Selecciona Cliente</option>
                  <?php 
                     foreach ($results as $result) {
                     ?>  
                  <option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
                  <?php } ?>
            </select>
          </div>
           
         </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Fecha del servicio:
               <input type="text" name="fecha" class="form-control datepicker" value="<?php echo date("d-m-Y"); ?>" autocomplete="off">
            </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Hora:
               <input type="text" name="hora" class="form-control" value="<?php echo date("H:i:s"); ?>" autocomplete="off">
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
               <table class="table table-condensed">
                  <thead>
                     <tr>
                        <th class="text-left" width="180">Referencia</th>
                        <th class="text-left">Descripción</th>
                        <th class="text-right" width="90">Cantidad</th>
                        <th width="60"></th>
                        <th class="text-right" width="110">Precio</th>
                        <th class="text-right" width="90">Dto. %</th>
                        <th class="text-right" width="130">Neto</th>
                        <th class="text-right" width="115">ITBIS</th>
                        <th class="text-right recargo" width="115" style="display: none;">RE %</th>
                        <th class="text-right irpf" width="115" style="display: none;">IRPF %</th>
                        <th class="text-right" width="140">Total</th>
                     </tr>
                  </thead>
                  <tbody id="lineas_albaran"></tbody>
                  <tbody>
                     <tr class="">
                        <td>
                      
                             <button class="btn btn-green" type="button" id="i_new_line"><i class="fa fa-search-plus"></i> Buscar para añadir</button>
                        </td>
                      
                        <td colspan="4" class="text-right">Totales:</td>
                        <td>  
                           <div id="aneto" class="form-control text-right" style="font-weight: bold;width:100px">0.00</div>
                           <input type="hidden" name="aneto_input" id='aneto_input'>
                        </td>
                        <td>
                           <div id="aiva" class="form-control text-right" style="font-weight: bold;">0.00</div>
                           <input type="hidden" name="aiva_input" id='aiva_input'>
                        </td>
                        <td class="recargo" style="display: none;">
                           <div id="are" class="form-control text-right" style="font-weight: bold;">0.00</div>
                           
                        </td>
                        <td class="irpf" style="display: none;">
                           <div id="airpf" class="form-control text-right" style="font-weight: bold;">-0.00</div>
                        </td>
                        <td>
                           <input type="text" name="atotal" id="atotal" class="form-control text-right" style="font-weight: bold;" value="0" onchange="recalcular()" autocomplete="off">
                        </td>
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
                     <input type="text" name="codpais" class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <span class="text-capitalize">provincia</span>:
                        
                        <input id="ac_provincia" class="form-control" type="text" name="provincia" value="">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Ciudad:
                        
                        <input class="form-control" type="text" name="ciudad" value="">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Código Postal:
                        
                        <input class="form-control" type="text" name="codpostal" value="">
                        
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        Dirección:
                        
                        <input class="form-control" type="text" name="direccion" value="asd" autocomplete="off">
                        
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
            
               <div class="form-group">
                  <span>Forma de pago</span>:
                  <select name="forma_pago" class="form-control">
                     <option value="1" selected="">CONTADO</option>
                     <option value="2">CHEQUE</option>
                     <option value="3">TRANSFERENCIA</option>
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
 
