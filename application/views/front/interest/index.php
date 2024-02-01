<section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-7">
                   <div class="row">
                      <div class="col-md-12">
                        <h3>people have interest on you</h3>
                        <ul>
                            <?php

                            if ($get_interest) {
                              foreach ($get_interest as $list) {?>
                               <li> <a href="<?php echo site_url('home/get_user');?>/<?= $list->user_id ?>"><?= $list->firstname;?></a></li>
                            <?php  }
                            }

                            ?>
                        </ul>
                      </div>
                   </div>                   
                </div>
            </div>
        </div>             
     </section>