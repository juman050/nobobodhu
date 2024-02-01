<section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-10">
                   <div class="row">
                      <div class="col-md-6">
                        <h3>Chat List</h3>
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