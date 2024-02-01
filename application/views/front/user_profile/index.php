
     <section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  <?php $this->load->view('front/includes/search'); ?>
                </div>
                 <div class="col-md-7">
                   <h5 class="heading-5">Users details</h5>
                   <div class="col-md-7">
                     <?php if ($get_user && $get_user->photo_access == '0') {?>
                    <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user->user_photo;?>">
                  <?php }else{?>
                    <img width="120px;" src="<?php echo site_url();?>/resource/front/images/user.png">
                    <?php }?>
            <p>Name: <?= $get_user->firstname;?></p>
            <p>Gender: <?= $get_user->gender;?></p>
            <p>Marital Status: <?= $get_user->marital_status;?></p>
            <p>Body Type: <?= $get_user->body_type;?></p>
            <p>height: <?= $get_user->height."''";?></p>
            <p>Blood group: <?= $get_user->blood_group;?></p>
            <p>Country: <?= $get_user->country;?></p>
            <p>Education: <?= $get_user->education;?></p>
            <p>Major subject: <?= $get_user->major_subject;?></p>
            <p>profession: <?= $get_user->profession;?></p>
            <p>Work place: <?= $get_user->work_place;?></p>
            <p>Mother tongue: <?= $get_user->mother_tongue;?></p>
            
                    
                   </div>
                   <div class="col-md-5">
                    <p>About: <?= $get_user->about_yourself;?></p>
                    <p>Family background: <?= $get_user->family_background;?></p>
                     <?php 
                        $interest_id = $this->uri->segment(3);
                        $id = $this->session->userdata('user_id');
                        $query = $this->db->get_where('interests',array('user_id' => $id,'interest_id'=>$interest_id));
                        if($query->num_rows()>0) {
                            echo "<b>interest sent.</b>";
                        }else{?>
                    <a href="<?php echo site_url('users/interested');?>/<?= $get_user->user_id;?>" class="btn btn-primary">Interested</a>
                    <?php } if($id !== null){ ?>
                    
                    <!-- Trigger the modal with a button -->
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#msgbox">Send Message</button>
                      <?php }?>
                   </div>

                      <!-- Modal -->
                      <div class="modal fade" id="msgbox" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Message</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo site_url('users/send_message');?>" method="POST">
                                <input type="hidden" name="recipient_id" value="<?php echo $interest_id?>">
                                  <div class="form-group">
                                      <textarea class="form-control" name="message" placeholder="Enter some text" required=""></textarea>
                                  </div>
                                  <input type="submit" value="Send" class="btn btn-success">
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                 <div class="col-md-3 right-sidebar">
                    <h5 class="heading-5">Popular posts</h5>
                    
                </div>
            </div>
        </div>             
     </section>