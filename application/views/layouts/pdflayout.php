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


    <section class="content">
    	
      
        
        
        <div class="warper container-fluid">
        	
           <?php echo $content_for_layout; ?>
            
        </div>
        <!-- Warper Ends Here (working area) -->
        
        
        <footer class="container-fluid footer">
        	Copyright &copy; <?php echo date("Y"); ?> <a href="http://oriolrivera.com/" target="_blank">Sistema de facturación</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
   
</body>
</html>
