
  <div class="warper container-fluid" id="printContent">
       <img src="<?php echo base_url(); ?>public/assets/images/logo.jpg" alt="Logo" width="200">
            
            <div class="page-header">
                         <?php 
                            switch ($data->type) {
                                case '1':
                                    $typeFact = "Cotización";
                                    break;   

                                case '2':
                                    $typeFact = "Factura de cliente";
                                    break;

                                
                            } ?>
                <h1><?php echo $typeFact; ?> <small># <?php echo $data->id_invoice; ?></small></h1>
                                    

            </div>

             <div class="pull-right">
                   
                    <a href="<?php echo base_url(); ?>invoice/invoices" class="btn btn-sm btn-danger"><i class="fa fa-back"></i> Salir</a>
                </div>

            
                        <dl>
                          <dt>Fecha de creación de Factura </dt>
                          <dd><?php echo date("d/m/Y",strtotime($data->date_added)); ?> / Hora : <?php echo date("h:i:s A",strtotime($data->date_added)); ?></dd>
                        </dl>
            
            
            
                <div class="page-header text-right"><h3 class="no-margn"><?php echo $dataClient->razon_social ?></h3></div>
                
                <hr>
                
                <div class="row">
                
                    <div class="col-md-6">

                        <dl>
                          <dt>Forma de pago </dt>
                          <?php 
                            switch ($data->payment_method) {
                                case '1':
                                    $typePayment = "CONTADO";
                                    break;   

                                case '2':
                                    $typePayment = "CHEQUE";
                                    break;

                                case '3':
                                    $typePayment = "TRANSFERENCIA";
                                    break;
                                
                            } ?>

                            
                                <dd> <?php echo  $typePayment; ?></dd>
                           
                          
                        </dl>

                    <?php if ($dataClient->billing_address==1) {  ?>
                        <address>
                          <strong>Razón social: </strong><?php echo $dataClient->razon_social ?><br>
                          <a href="mailto:#"><?php echo $dataClient->email ?></a>
                          <strong>Dirección.</strong><br>
                          <?php echo $dataClient->address ?>, <?php echo $dataClient->province ?><br>
                          <?php echo $dataClient->city ?>, <?php echo $dataClient->country ?><br>
                          <abbr title="Phone">Teléfono :</abbr> <?php echo $dataClient->phone_one ?>
                        </address>
                    <?php }else{
                        ?>
                        <address>
                          <strong>Razón social: </strong><?php echo $dataClient->razon_social ?><br>
                          <a href="mailto:#"><?php echo $dataClient->email ?></a>
                          <strong>Dirección.</strong><br>
                          <?php echo $data->address ?>, <?php echo $data->province ?><br>
                          <?php echo $data->city ?>, <?php echo $data->country ?><br>
                          <abbr title="Phone">Teléfono :</abbr> <?php echo $dataClient->phone_one ?>
                        </address>

                        <?php } ?>
                      
                    </div>
                    
                    <div class="col-md-6 text-right">
                    
                        <dl>
                          <dt>Fecha del servicio</dt>
                          <dd><?php echo date("d/m/Y",strtotime($data->date_service)); ?> / Hora : <?php echo date("h:i A",strtotime($data->hour)); ?></dd>
                        </dl>
                        <address>
                           <a href="mailto:#"><?php echo $dataClient->name ?></a>
                         <br>
                          <?php echo $dataClient->address ?>, <?php echo $dataClient->province ?><br>
                          <?php echo $dataClient->city ?>, <?php echo $dataClient->country ?><br>
                          <abbr title="Phone">Teléfono :</abbr> <?php echo $dataClient->phone_one ?>
                        </address>
                        
                    </div>
                
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
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
                
                <div class="row">
                    
                    <div class="col-lg-6 text-right">
                        <button class="btn btn-success" type="button" id="print"><i class="fa fa-print"></i> Imprimir Factura</button>
                    </div>
                </div>
                    
            
                    
            
            
            
            
        </div>


         