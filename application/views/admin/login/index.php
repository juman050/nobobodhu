<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="mama, handy, service" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo $options['admin_resource'];?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo $options['admin_resource'];?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $options['admin_resource'];?>css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?php echo $options['admin_resource'];?>js/jquery.min.js"></script>
<!-- Nav CSS -->
<link href="<?php echo $options['admin_resource'];?>css/custom.css" rel="stylesheet">

</head>

<body id="login">
    <div class="login-logo">

    </div>
      <h2 class="form-heading">Admin login</h2>
      <div class="app-cam">
        <form action="<?php echo site_url("siteadmin/login");?>" method="post" id="login-form">
          <input type="text" name="user_name" class="text" placeholder="Username">
          <input type="password" name="user_pass" placeholder="Password">
          <div class="submit"><input type="submit" value="Login"></div>
        </form>
      </div>
       <div class="copy_layout login">
          <p>Copyright © <?php echo date('Y') ?> | Developed by TheCreativeX </p>
       </div>
      
    <!-- /#wrapper -->
    <script type="text/javascript">
     var site_url="<?php echo site_url();?>";
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $options['admin_resource'];?>js/bootstrap.min.js"></script>    
    <script src="<?php echo $options['admin_resource']?>js/jquery.validate.min.js"></script>  
    <script src="<?php echo $options['admin_resource']?>js/notify.min.js"></script>   

<script type="text/javascript">
  function showNotifyJs(error_msg,type){

      $.notify(
        error_msg, 
    
        {
          position:"top right",
          autoHide: true,
          // if autoHide, hide after milliseconds
          autoHideDelay: 5000,
          className: type
        }
        

       );
}
</script>
     <?php if($this->session->flashdata('notification_msg')){ 
      $notification_type=$this->session->flashdata('notification_type');
      ?>

    <script type="text/javascript">
      jQuery(function($){
        var notification_msg="<?php echo $this->session->flashdata('notification_msg');?>";
        var notification_type="<?php echo $notification_type;?>";
        showNotifyJs(notification_msg,notification_type);
      });
    </script>

    <?php } ?>

    <script type="text/javascript">
    jQuery(function($){
      



      $( "#login-form" ).validate({
        rules: {
            
            user_name: {
                 required: true,
                 uniqueUsername: true               
                },
            user_pass:  {
                 required: true,
                 //uniquePassword: true,
                 //minlength: 5
               }
           
           
           
        },
        messages: {    
           user_name: {
            required:'<span style="color:red;">User Name Required!</span>'

            },     
           user_pass:{
                required: '<span style="color:red;">Password Required!</span>',
                //uniquePassword: "Password Doesn't Match!"
                //minlength: "Minimum 5 Charracters!"

              }
          
        }
        
      });
});
    </script> 
</body>
</html>