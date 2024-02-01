        
            <div class="copy_layout">
              <p>Copyright © <?php echo date('Y') ?> | Developed by TheCreativeX </p>
          </div> 
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $options['admin_resource'];?>js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $options['admin_resource'];?>js/metisMenu.min.js"></script>
    <!-- Chosen Js --> 
    <script src="<?php echo $options['admin_resource']?>js/chosen.jquery.min.js"></script>  
    <!-- Data table Js --> 
    <script src="<?php echo $options['admin_resource']?>js/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/buttons.flash.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/jszip.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/pdfmake.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/buttons.print.min.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/vfs_fonts.js"></script>
    <script src="<?php echo $options['admin_resource']?>js/datatable/buttons.colVis.min.js"></script>
    <!-- Select 2 js -->
    <script src="<?php echo $options['admin_resource'];?>select2/dist/js/select2.full.min.js"></script>
    <!-- Notify Js --> 
    <script src="<?php echo $options['admin_resource']?>js/notify.min.js"></script>   
    
    <script src="<?php echo $options['admin_resource'];?>js/jquery-ui.min.js"></script>
    <script src="<?php echo $options['admin_resource'];?>js/custom.js"></script>
    <!-- Validator Js --> 
    <script src="<?php echo $options['admin_resource']?>js/jquery.validate.min.js"></script>
    <script src="<?php echo $options['admin_resource'];?>js/main.js"></script>
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
