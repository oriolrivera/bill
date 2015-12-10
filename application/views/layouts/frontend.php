<!DOCTYPE html>
<html lang="es">

<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $this->layout->getTitle()?></title>

	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap/bootstrap.css" /> 

	 <!-- datatables Styling  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/plugins/datatables/jquery.dataTables.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/app/app.v1.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body data-ng-app>

	
    <!-- Preloader -->
    <div class="loading-container">
      <div class="loading">
        <div class="l1">
          <div></div>
        </div>
        <div class="l2">
          <div></div>
        </div>
        <div class="l3">
          <div></div>
        </div>
        <div class="l4">
          <div></div>
        </div>
      </div>
    </div>
    <!-- Preloader -->
    	
    
	<aside class="left-panel">
    		
            <div class="user text-center">
                  <img src="http://oriolrivera.com/public/img/oriol.jpg" class="img-circle" alt="...">
                  <h4 class="user-name">Oriol Rivera</h4>
                  
              <!--     <div class="dropdown user-login">
                 <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
                   <i class="fa fa-circle status-icon available"></i> Available <i class="fa fa-angle-down"></i>
                 </button>
                                  
                 </div> -->	 
            </div>
            
            
            
            <nav class="navigation">
            	<ul class="list-unstyled">
                  <li class="active">
                    <a href="<?php echo base_url(); ?>panel"><i class="fa fa-bookmark-o"></i><span class="nav-label">Panel</span></a>
                  </li>	

                  <li class="has-submenu"><a href="#"><i class="fa fa-comment-o"></i> <span class="nav-label">Gestor de Clientes</span></a>
                      <ul class="list-unstyled">
                          <li><a href="<?php echo base_url(); ?>client/clients">Clientes</a></li>
                          <li><a href="<?php echo base_url(); ?>client/addclient">Crear Cliente</a></li>
                          <li><a href="#">Presupuesto a Clientes</a></li>
                          
                        </ul>
                    </li>

                  
                  <li>
                    <a href="<?php echo base_url(); ?>services/managerservices"><i class="fa fa-bookmark-o"></i><span class="nav-label">Servicios</span></a>
                  </li>  
<!-- 
                  <li>
                    <a href="<?php echo base_url(); ?>/bill/panel"><i class="fa fa-bookmark-o"></i><span class="nav-label">Suplidor</span></a>
                  </li> -->
                  
                  <li class="has-submenu"><a href="#"><i class="fa fa-comment-o"></i> <span class="nav-label">Gestor de Facturas</span></a>
                      <ul class="list-unstyled">
                          <li><a href="<?php echo base_url(); ?>invoice/invoices">Facturas</a></li>
                          <li><a href="<?php echo base_url(); ?>invoice/newinvoice">Crear Factura</a></li>
                          <li><a href="#">Factura Pendiente por pagar</a></li>
                      
                        </ul>
                  </li>

                    <li class="has-submenu"><a href="#"><i class="fa fa-comment-o"></i> <span class="nav-label">Gestor Usuarios</span></a>
                    	<ul class="list-unstyled">
                          <li><a href="<?php echo base_url(); ?>users/managerusersystem">Usuarios</a></li>
                        	<li><a href="<?php echo base_url(); ?>users/addusersystem">Crear usuario del sistema</a></li>
                          
                        </ul>
                    </li>


                 
                </ul>
            </nav>
            
    </aside>
    <!-- Aside Ends-->
    
    <section class="content">
    	
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
         
          
            
            <ul class="nav-toolbar">
            	
           

                 <li> 
                   <nav class="navbar-default hidden-xs" role="navigation">
                    <ul class="nav navbar-nav">
                    
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">Configuración <span class="caret"></span></a>
                      <ul role="menu" class="dropdown-menu">                       
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>users/profile">Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>logout">Cerrar Sessión</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </li>
            </ul>


           
        </header>
        <!-- Header Ends -->
        
        
        <div class="warper container-fluid">
        	
           <?php echo $content_for_layout; ?>
            
        </div>
        <!-- Warper Ends Here (working area) -->
        
        
        <footer class="container-fluid footer">
        	Copyright &copy; <?php echo date("Y"); ?> Sistema de facturación, Desarrollado por <a href="http://oriolrivera.com/" target="_blank">Oriol Rivera</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
    
    
    <!-- JQuery v1.9.1 -->
	<script src="<?php echo base_url(); ?>public/assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Globalize -->
    <script src="<?php echo base_url(); ?>public/assets/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- Data Table -->
     <script src="<?php echo base_url(); ?>public/assets/js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/datatables/DT_bootstrap.js"></script>
      <script src="<?php echo base_url(); ?>public/assets/js/plugins/datatables/jquery.dataTables-conf.js"></script>
   
  
   
    <!-- Custom JQuery -->
  <script src="<?php echo base_url(); ?>public/assets/js/app/custom.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/bootstrap/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/route.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/assets/js/scripts.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/plugins/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/plugins/ckeditor/adapters/jquery.js"></script>

   <script>
              $(function(){

                $("#print").click(function(){
                    w=window.open();
                    w.document.write($('#printContent').html());
                    w.print();
                    w.close();
                });

              });
          </script>

  <script>

    fs_nf0 = 2;
   all_impuestos = [{"codimpuesto":"ITBIS18","codsubcuentarep":null,"codsubcuentasop":null,"descripcion":"ITBIS 18%","iva":18,"recargo":0}];
   //cliente = {"codcliente":"000088","nombre":"test","razonsocial":"test","cifnif":"132213","telefono1":"1232","telefono2":"","fax":"","email":"","web":"","codserie":"A","coddivisa":"USD","codpago":"CONT","codagente":null,"codgrupo":null,"debaja":false,"fechabaja":null,"fechaalta":"07-10-2015","observaciones":"","regimeniva":"General","recargo":false};
  
   
   $(document).ready(function() {
      usar_serie();
      recalcular();
   });


  </script>
  
</body>
</html>
