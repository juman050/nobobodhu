<?php $user_logged_in = $this->session->userdata('user_logged_in');
    if ($user_logged_in == null) { $this->load->view('front/includes/log_header');} ?>
<section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-7">
                   <div class="row">
                       <?php 
                       	if ($result) {
                       		foreach ($result as $value) { ?>
                        <div class="col-md-4">
                           <div class="single-person-info">
                               <div class="persone-img">
                                <?php 
                                  if ($value['user_photo'] && $value['photo_access'] == '0') {?>
                                    <img src="<?php echo site_url();?>/uploads/users/<?php echo $value['user_photo'];?>" class="img-responsive">
                                <?php }else{?>
                    <img width="120px;" src="<?php echo site_url();?>/resource/front/images/user.png">
                    <?php }?>
                               </div>
                               <div class="person-containt">
                                   <p><span class="title">Name:</span> <span class="name"><?= $value['firstname'];?></span></p>
                                   <p><span class="title">Age:</span> <span class="name"><?php 
                                      $yearOnly = date('Y', strtotime($value['birthday']));
                                      $curryear = date('Y');
                                      $age = $curryear - $yearOnly;
                                      echo $age;
                                      ?>
                                    	
                                    </span></p>
                                   <p><span class="title">Country:</span> <span class="name"><?= $value['country'];?></span></p>
                                   <p><span class="title">Religeon:</span> <span class="name"><?= $value['religion'];?></span></p>
                                   <p><span class="title">Marital:</span> <span class="name"><?= $value['marital_status'];?></span></p>
                               </div>
                               <a href="<?php echo site_url('home/get_user/');?><?= $value['user_id']?>" class="btn-rounded">More</a>  
                           </div>
                       </div>
                       <?php 
                          }
                       	}else{
                       		echo "not found";
                       	}
                       ?>
                   </div>                   
                </div>
                 <div class="col-md-3 right-sidebar">
                    <h5 class="heading-5">Popular posts</h5>
                    
                </div>
            </div>
        </div>             
     </section>