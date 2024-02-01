
     <section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                    <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-7">
                   <div class="row">
                    <?php 
                      if ($feed_user) {
                        foreach ($feed_user as $feed) {?>

                       <div class="col-md-4">
                           <div class="single-person-info">
                               <div class="persone-img">
                                <?php 
                                  if ($feed['user_photo'] && $feed['photo_access'] == '0') {?>
                                    <img src="<?php echo site_url();?>/uploads/users/<?php echo $feed['user_photo'];?>" class="img-responsive">
                                <?php }else{?>
                                  <img width="120px;" src="<?php echo site_url();?>/resource/front/images/user.png">
                                  <?php }?>
                               </div>
                               <div class="person-containt">
                                   <p><span class="title">Name:</span> <span class="name"><?= $feed['firstname'];?></span></p>
                                   <p><span class="title">Age:</span> <span class="name"><?php 
                                      $yearOnly = date('Y', strtotime($feed['birthday']));
                                      $curryear = date('Y');
                                      $age = $curryear - $yearOnly;
                                      echo $age;
                                      ?></span></p>
                                   <p><span class="title">Country:</span> <span class="name"><?= $feed['country'];?></span></p>
                                   <p><span class="title">Religeon:</span> <span class="name"><?= $feed['religion'];?></span></p>
                                   <p><span class="title">Mariti:</span> <span class="name"><?= $feed['marital_status'];?></span></p>
                               </div>
                               <a href="<?php echo site_url('home/get_user/');?><?= $feed['user_id']?>" class="btn-rounded">More</a>  
                           </div>
                       </div>
                      <?php  
                       }
                      }

                    ?>
                   </div>                   
                </div>
                 <?php $this->load->view($root_folder.'/includes/right-sidebar');?>
            </div>
        </div>             
     </section>