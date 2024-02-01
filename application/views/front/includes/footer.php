<div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav>
                            <ul class="list-unstyled list-inline">
                                <li><a href="<?php echo site_url('users/index') ?>">Home</a></li>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li><a href="">Help&Support</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
    </div>
    <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright">&copy; 2018 All Rights Reserved by TheCreativeX</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-network">
                          <?php if ($settings['fb-link']!="") { ?>
                                   <li><a href="<?php echo $settings['fb-link'];?>"><i class="icon fa fa-facebook"></i></a></li>
                                   <?php } ?>
                                   <?php if ($settings['tw-link']!="") { ?>
                                     <li><a href="<?php echo $settings['ln-link'];?>"><i class="icon fa fa-linkedin"></i></a></li>
                                   <?php } ?>
                                   <?php if ($settings['ln-link']!="") { ?>
                                   <li><a href="<?php echo $settings['ln-link'];?>" class="ln"><i class="fa fa-linkedin"></i></a></li>
                                   <?php } ?>
                                   <?php if ($settings['insta-link']!="") { ?>
                                   <li><a href="<?php echo $settings['insta-link'];?>"><i class="icon fa fa-instagram"></i></a></li>
                                   <?php } ?>
                            
                           
                           
                            

                        </ul>
                    </div>
                </div>
            </div>
    </footer>

    <!--=== fixed js ===-->
    <script src="<?php echo $options['public_resource'];?>js/jquery.min.js"></script> <!-- jQuery v3.1.1 -->
    <script type="text/javascript" src="<?php echo $options['public_resource'];?>js/bootstrap.min.js"></script> <!-- Bootstrap v3.3.7 -->
    <script src="<?php echo $options['admin_resource']?>js/notify.min.js"></script>  
    <!--=== custom js ===-->
    <script type="text/javascript" src="<?php echo $options['public_resource'];?>js/custom.js"></script>
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
</body>
</html>