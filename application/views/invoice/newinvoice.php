  <script type="text/javascript">
     // fs_nf0 = 2;
  


      function show_precio(precio)
      {
         
         return number_format(precio, 2, '.', ' ')+' $';
         
      }
      function show_numero(numero)
      {
         return number_format(numero, 2, '.', ' ');
      }
   </script>


<form id="f_new_albaran" class="form" name="f_new_albaran" action="index.php?page=nueva_venta&amp;tipo=factura" method="post">
   <input type="hidden" name="petition_id" value="D3qjpC9UbVYRPxeAgHkOFursJ5TGo8">
   <input type="hidden" id="numlineas" name="numlineas" value="2">
   <input type="hidden" name="cliente" value="000088">
   <input type="hidden" name="redir">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-8">
            <h1 style="margin-top: 5px;">
               <a href="index.php?page=ventas_cliente&amp;cod=000088">test</a>
            </h1>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Fecha:
               <input type="text" name="fecha" class="form-control datepicker" value="<?php echo date("d-m-Y"); ?>" autocomplete="off">
            </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Hora:
               <input type="text" name="hora" class="form-control" value="<?php echo date("H:m:s"); ?>" autocomplete="off">
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
         <li role="presentation">
            <a href="#opciones" aria-controls="opciones" role="tab" data-toggle="tab">
               <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>
               <span class="hidden-xs">&nbsp; Opciones</span>
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
                        <!--    <select name="add_services" id="add_services" class="form-control">
                           <option value="">Seleccione servicio</option>
                           <option value="1">Programacion modulo</option>
                           <option value="2">Programacion web</option>
                           <option value="3">Programacion app movil</option>
                        </select> -->
             <!--                 <input id="i_new_line" class="btn" type="button" placeholder="Buscar para añadir..." autocomplete="off">  -->
                             <button class="btn btn-green" type="button" id="i_new_line"><i class="fa fa-search-plus"></i> Buscar para añadir</button>
                        </td>
                        <td>
                           <a href="#" class="btn btn-sm btn-default" title="Añadir sin buscar" onclick="return add_linea_libre()">
                              <span class="fa fa-plus" aria-hidden="true"></span>
                           </a>
                        </td>
                        <td colspan="4" class="text-right">Totales:</td>
                        <td>  
                           <div id="aneto" class="form-control text-right" style="font-weight: bold;">0.00</div>
                        </td>
                        <td>
                           <div id="aiva" class="form-control text-right" style="font-weight: bold;">0.00</div>
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
                        <select class="form-control" name="codpais">
                        
                           
                           <option value="1">Republica Dominicana</option>
                           
                        
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <span class="text-capitalize">provincia</span>:
                        
                        <input id="ac_provincia" class="form-control" type="text" name="provincia" value="Pontevedra" autocomplete="off">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Ciudad:
                        
                        <input class="form-control" type="text" name="ciudad" value="c">
                        
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Código Postal:
                        
                        <input class="form-control" type="text" name="codpostal" value="123">
                        
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
         <div role="tabpanel" class="tab-pane" id="opciones">
            <div class="container-fluid" style="margin-top: 10px;">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <a href="index.php?page=admin_agente&amp;cod=57">Empleado</a>:
                        <select name="codagente" class="form-control">
                           <option value="57">demo Demo</option>
                           
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <a href="index.php?page=admin_almacenes">Sucursal</a>:
                        <select name="sucursal" class="form-control">
                           
                           <option value="1">Principal</option>
                           
                           
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <a href="index.php?page=contabilidad_series#">Serie</a>:
                        <select name="serie" class="form-control" id="codserie" onchange="usar_serie();recalcular();">
                        
                           
                           <option value="A" selected="">SERIE A</option>
                           
                        
                           
                           <option value="B">Serie B</option>
                           
                        
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <a href="index.php?page=admin_divisas">Divisa</a>:
                        <select name="divisa" class="form-control">
                           
                           <option value="ARS">PESOS (ARG)</option>
                           
                           <option value="BOL">kakin</option>
                           
                           <option value="CLP">PESOS (CLP)</option>
                           
                           <option value="COP">PESOS (COP)</option>
                           
                           <option value="COR">CÓRDOBAS</option>
                           
                           <option value="EUR">EUROS</option>
                           
                           <option value="GTQ">Quetzales</option>
                           
                           <option value="MXN">PESOS (MXN)</option>
                           
                           <option value="PAB">BALBOAS</option>
                           
                           <option value="PEN">NUEVOS SOLES</option>
                           
                           <option value="USD" selected="">DÓLARES EE.UU.</option>
                           
                           <option value="VEF">BOLÍVARES</option>
                           
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        Tasa de conversión a €
                        <input type="text" name="tasaconv" class="form-control" placeholder="(predeterminada)" autocomplete="off">
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
            <button class="btn btn-sm btn-default" type="button" onclick="window.location.href='index.php?page=nueva_venta&amp;tipo=factura';">
               <span class="glyphicon glyphicon-refresh"></span> &nbsp; Reiniciar
            </button>
         </div>
         <div class="col-sm-6 text-right">
            <button class="btn btn-sm btn-primary" type="button" onclick="$('#modal_guardar').modal('show');">
               <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar...
            </button>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12" style="margin-top: 20px;">
            <div class="form-group">
               Observaciones:
               <textarea class="form-control" name="observaciones" rows="3"></textarea>
            </div>
         </div>
      </div>
   </div>
   
   <div class="modal fade" id="modal_guardar">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title">Guardar como...</h4>
               <p class="help-block">
                  Puedes programar ventas usando el plugin
                  <a href="https://www.facturascripts.com/store/producto/plugin-para-programar-albaranes/" target="_blank">albaranes programados</a>.
               </p>
            </div>
            <div class="modal-body">
               
               <div class="radio">
                  <label>
                     <input type="radio" name="tipo" value="presupuesto">
                     Presupuesto para cliente
                  </label>
               </div>
               
               <div class="radio">
                  <label>
                     <input type="radio" name="tipo" value="pedido">
                     Pedido de cliente
                  </label>
               </div>
               
               <div class="radio">
                  <label>
                     <input type="radio" name="tipo" value="albaran">
                     Albarán de cliente
                  </label>
               </div>
               
               <div class="radio">
                  <label>
                     <input type="radio" name="tipo" value="factura" checked="checked">
                     Factura de cliente
                  </label>
               </div>
               
               <div class="form-group">
                  <span class="text-capitalize">número 2:</span>
                  <input class="form-control" type="text" name="numero2" autocomplete="off">
                  <p class="help-block">
                     Puedes usar este campo como desées. Incluso puedes cambiarle el nombre
                     desde Admin &gt; Panel de control &gt; Avanzado.
                  </p>
               </div>
               <div class="form-group">
                  <a href="index.php?page=contabilidad_formas_pago">Forma de pago</a>:
                  <select name="forma_pago" class="form-control">
                  
                     
                     <option value="CONT" selected="">CONTADO</option>
                     
                  
                     
                     <option value="CUOTAS">CUOTAS</option>
                     
                  
                     
                     <option value="GIRE_30">GIRO A 30 DIAS FF</option>
                     
                  
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <div class="pull-left">
                  <div class="checkbox">
                     <label>
                        <input type="checkbox" name="stock" value="TRUE" checked="checked">
                        Descontar de stock
                     </label>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-sm btn-primary" type="button" onclick="this.disabled=true;this.form.submit();" title="Guardar y volver a empezar">
                     <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
                  </button>
                  <button class="btn btn-sm btn-info" type="button" onclick="this.disabled=true;document.f_new_albaran.redir.value='TRUE';this.form.submit();" title="Guardar y ver documento">
                     <span class="glyphicon glyphicon-eye-open"></span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>




 <div class="modal" id="modal_articulos">
   <div class="modal-dialog" style="width: 99%; max-width: 1000px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Buscar artículos</h4>
         </div>
         <div class="modal-body">


            <form id="f_buscar_articulos" name="f_buscar_articulos" action="" method="post" class="form">
               <input type="hidden" name="codcliente" value="000016"/>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="input-group">
                           <input class="form-control" type="text" name="query" autocomplete="off"/>
                           <td class="text-right"><a href="#" onclick="return add_articulo('1056','UMOhZ2luYSB3ZWI=','260000','0','ITBIS13','1')">260 000.00 $</a></td>
                        </div>
                       
                     </div>
                    
                     
                  </div>
               </div>
            </form>





            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="text-left">Nombre</th>
                     <th class="text-right">Precio</th>

                  </tr>
               </thead>

                  <tbody>

                     <tr>
                        <td>
                           <a href="#" onclick="return add_articulo('1','cHJkMQ==','2178.5714','0','IVA21','1')">1 pagina</a> 
                        </td>
                        <td class="text-right">
                           <a href="#" onclick="return add_articulo('1','cHJkMQ==','2178.5714','0','IVA21','1')">$ 2 178.57 </a>
                        </td>                     
                     </tr>


                  </tbody>

            </table>






         </div>

         </div>
      </div>
   </div>
</div>
 