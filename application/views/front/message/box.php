<section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-10">
                   <div class="row">
                      <div class="col-md-6">
                          <h3>Message box</h3>
                          <?php 
                              $id = $this->session->userdata('user_id');
                              $conversation_id = $this->uri->segment(3);
                                 if ($get_msg) { //echo "<pre>"; print_r($get_msg);exit; ?>
                          <div class="message_box">
                            
                                 <?php   foreach ($get_msg as $msg) {?>
                                        <?php if ($msg->sender_id !== $id) {?>
                                          <p><b><?= $msg->firstname;?>:</b> <?= $msg->message;?></p>
                                            <?php
                                        }else{ ?>
                                        <p><b>me:</b> <?= $msg->message;?></p>
                                    <?php     
                                    }
                                }
                                ?>
                          </div>
                          <?php }else{
                                    echo "no message";
                                }

                              ?>
                              <form action="<?php echo site_url('users/reply_message');?>/<?= $conversation_id;?>" method="POST">
                                  <div class="form-group">
                                      <textarea class="form-control" name="message" placeholder="enter some text"></textarea>
                                  </div>
                                  <input type="submit" value="send" class="btn btn-info">
                              </form>
                      </div>
                      <div class="col-md-6">
                        <table class="table">
                            <th>image</th>
                            <th>Name</th>
                            <th>Reply</th>
                            <?php 
                            $id = $this->session->userdata('user_id');
                            if ($get_conversation) {
                                // var_dump($get_conversation);
                                // exit;
                                foreach ($get_conversation as $msg) {
                                    if($msg->user_id !== $id){?>
                                   <tr>
                                       <td><?php if ($msg->user_photo && $msg->photo_access == '0') {?>
                                          <img width="50px" src="<?php echo site_url();?>/uploads/users/<?php echo $msg->user_photo;?>">
                                       <?php }else{?>
                                        <img width="50px;" src="<?php echo site_url();?>/resource/front/images/user.png">
                                        <?php }?></td>
                                       <td><?php echo $msg->firstname;?></td>
                                       <td><a href="<?php echo site_url('users/reply_to');?>/<?php echo $msg->conversation_id;?>" class="btn btn-info">reply</a></td>
                                   </tr>
                                <?php 
                              }
                          }
                            }else{
                                echo "no message";
                            }
                        ?>
                        </table>
                      </div>
                
                   </div>                   
                </div>
            </div>
        </div>             
     </section>