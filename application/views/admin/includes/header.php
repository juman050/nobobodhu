<?php

$class=$this->router->class;
$page_method=$this->router->method;

?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $options['title'].' - '.$page_name;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="mama, handy, service" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo $options['admin_resource'];?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Select 2 css -->
<link rel="stylesheet" href="<?php echo $options['admin_resource'];?>select2/dist/css/select2.min.css" />

<!-- Custom CSS -->
<link href="<?php echo $options['admin_resource'];?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $options['admin_resource'];?>css/font-awesome.min.css" rel="stylesheet"> 
<!-- choosen css -->
<link href="<?php echo $options['admin_resource'];?>css/chosen.min.css" rel="stylesheet">       
<!-- data table css -->
<link href="<?php echo $options['admin_resource'];?>css/jquery.dataTables.min.css" rel="stylesheet"> 
<link rel='stylesheet' type='text/css' href='<?php echo $options['admin_resource'];?>css/jquery-ui.css'/>
<!-- jQuery -->
<script src="<?php echo $options['admin_resource'];?>js/jquery.min.js"></script>
<script type="text/javascript">
     var site_url="<?php echo site_url();?>";
</script>
<!-- Nav CSS -->
<link href="<?php echo $options['admin_resource'];?>css/custom.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
        <?php $this->load->view($root_folder.'/includes/sidebar');?>
        <div id="page-wrapper">
