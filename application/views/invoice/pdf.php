
<?php if ($dataClient->billing_address==1) {  
             $razon_socia = $dataClient->razon_social;
             $address = $dataClient->address;
             $email = $dataClient->email;
             $province = $dataClient->province;
             $city = $dataClient->city;
             $country = $dataClient->country;
             $phone_one = $dataClient->phone_one;
      }else{
             $razon_socia = $dataClient->razon_social;
             $address = $dataClient->address;
             $email = $dataClient->email;
             $province = $data->province;
             $city = $dataClient->city;
             $country = $data->country;
             $phone_one = $dataClient->phone_one;
      }

      switch ($data->type) {
              case '1':
                  $typeFact = "Cotización";
                  break;   

              case '2':
                  $typeFact = "Factura de cliente";
                  break;

              
          }


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
              
          }
  ?>


                        
  

<?php 




$bodyHtml=' 

<!DOCTYPE html>
<html lang="es">

  <head>

      <link rel="stylesheet" href="'.base_url().'public/assets/css/bootstrap/bootstrap.css" /> 
      <link rel="stylesheet" href="'.base_url().'public/assets/css/plugins/datatables/jquery.dataTables.css" />
      <link href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="'.base_url().'public/assets/css/app/app.v1.css" />
      <link rel="stylesheet" href="'.base_url().'public/assets/css/style.css" />
  </head>

      <body data-ng-app>

      
        <img src="'.base_url().'public/assets/images/logo.jpg" alt="Logo" width="200">
          <div class="warper container-fluid">
        	
            <div class="page-header">
              <h1>'.$typeFact.' <small># '.$data->id_invoice.'</small></h1>   
            </div>
                        <dl>
                          <dt>Fecha de creación de Factura </dt>
                          <dd>'.date("d/m/Y",strtotime($data->date_added)).' / Hora : '.date("h:i:s A",strtotime($data->date_added)).'</dd>
                        </dl>
            
            
            
                <div class="page-header text-right"><h3 class="no-margn">'.$dataClient->razon_social.'</h3></div>
                
                <hr>
                
                <div class="row">
                
                    <div class="col-md-6">

                      <dl>
                          <dt>Forma de pago </dt>
                                <dd> '.$typePayment.' </dd>
                        </dl>

                        <address>
                          <strong>Razón social: </strong>'.$razon_socia.'<br>
                          <a href="mailto:#">'.$email.'</a>
                          <strong>Dirección.</strong><br>
                          '.$address.', '.$province.'<br>
                          '.$city.', '.$country.'<br>
                          <abbr title="Phone">Teléfono :</abbr> '.$phone_one.'                      
                        </address>
                                          
                    </div>
                    
                    <div class="col-md-8 text-right">
                    
                        <dl>
                          <dt>Fecha del servicio</dt>
                          <dd>'.date("d/m/Y",strtotime($data->date_service)).' / Hora : '.date("h:i A",strtotime($data->hour)).'</dd>
                        </dl>
                        <address>
                           '.$dataClient->name.'
                         <br>
                          '.$dataClient->address.', '.$dataClient->province.'<br>
                          '.$dataClient->city.', '.$dataClient->country.'<br>
                          <abbr title="Phone">Teléfono :</abbr> '.$dataClient->phone_one.'           
                           </address>
                        
                    </div>
                
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered">
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
                                
                            <tbody>';
                      foreach ($results as $result) {
                            $bodyHtml.='

                                <tr>
                                    <td>'.$result->description.'</td>			
                                    <td>'.$result->quantity.'</td>
                                    <td class="price">'.number_format($result->price,2).' %</td>
                                    <td class="total">'.number_format($result->discount,2).'</td>
                                    <td class="total">'.number_format($result->neto,2).'</td>
                                    <td class="total">'.number_format($result->itbis,2).' %</td>
                                    <td class="total">'.number_format($result->total,2).'</td>
                                </tr>
                            ';
                      }

                            $bodyHtml.='
                            
                             <tr>
                                    <td colspan="5" class="sub_total"></td>
                                    <td class="sub_total"><b>Total Itbis:</b></td>
                                    <td class="sub_total">$'.number_format($data->aiva,2).'</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5" class="sub_total"></td>
                                    <td class="sub_total"><b>Subtotal:</b></td>
                                    <td class="sub_total">$'.number_format($data->aneto,2).'</td>
                                </tr>
                                <tr class="total_bar">
                                    <td colspan="5" class="grand_total"></td>
                                    <td class="grand_total"><b>Total:</b></td>
                                    <td class="grand_total">$'.number_format($data->atotal,2).'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
           
        </div>

        </body>
</html>

  '; 


      $mpdf=new mPDF(); 
      $nameFile="Factura_no_".$data->id_invoice."_".date("Y-m-d H:i:s").".pdf";
      $mpdf->WriteHTML($bodyHtml);
      $mpdf->Output($nameFile,'I');
      exit;

  ?>