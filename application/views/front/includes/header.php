
<!DOCTYPE html>
<html lang="en">
<head>
    <!--=== meta ===-->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $options['title'];?></title>

    <!--=== css fixed ===-->
    <link rel="stylesheet" href="<?php echo $options['public_resource'];?>/css/bootstrap.min.css"><!-- Bootstrap v3.3.7 -->
    <link rel="stylesheet" href="<?php echo $options['public_resource'];?>/css/font-awesome.min.css"><!-- Font Awesome V4.7.0 -->


    <!--=== custom css ===-->
    <link rel="stylesheet" href="<?php echo $options['public_resource'];?>/css/style.css">
    <link rel="stylesheet" href="<?php echo $options['public_resource'];?>/css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<?php 
   $user_logged_in = $this->session->userdata('user_logged_in');
   if($user_logged_in!==null){ ?>
<div class="news-feed-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-6">
                    <div class="logo">
                        <a href="<?php echo site_url('users/index');?>">logo</a>
                        
                    </div>
                    </div>
                     <div class="col-sm-6">
                       <div class="right">
                            <ul class="list-unstyled list-inline">
                              <li><a href="<?php echo site_url('users/index');?>">Home</a></li>
                              <li><a href="<?php echo site_url('users/profile');?>">Profile</a></li>
                                <li><a href="<?php echo site_url('users/interested_people');?>">Interested
                                  <?php
                                    $id = $this->session->userdata('user_id');
                                    $interest  = "select * from interests 
                                             where
                                             interest_id = '$id'
                                             and status = '0' ";
                                    $interest = $this->db->query($interest);
                                    if ($interest->num_rows()>0) {
                                      echo "<i><span>".$interest->num_rows()."</span></i>";
                                    }else{
                                      echo " ";
                                    }
                                    
                                  ?>
                                </a></li>
                                <li><a href="<?php echo site_url('users/conversations');?>"><i class="fa fa-envelope" aria-hidden="true">
                                  <?php
                                    $id = $this->session->userdata('user_id');
                                    $msg  = "select * from messages 
                                             where
                                             recipient_id = '$id'
                                             and seen = '0' ";
                                    $msg = $this->db->query($msg);
                                    if ($msg->num_rows()>0) {
                                      echo "<span>".$msg->num_rows()."</span>";
                                    }else{
                                      echo " ";
                                    }
                                    
                                  ?>
                                </i></a></li>
                                <li class="prof-pic"><a href=""><img src="images/prof-pic.png" alt=""></a></li>
                                <li class="prof-pic"><a href="<?php echo site_url('users/logout');?>">logout</a></li>
                            </ul>
                        </div>
                     </div>
                </div>   
            </div>
        </div>
    </div>

<?php } ?>