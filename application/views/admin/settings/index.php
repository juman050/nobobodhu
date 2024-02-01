<div class="graphs">
    <div class="xs">
        <h3><?php echo $page_name;?></h3>
        <hr>
        <!-- service row start -->
        <div class="setting-tab">
            <form action="<?php echo site_url('siteadmin/settings/index');?>" method="post" enctype="multipart/form-data">
                  <!-- Setting tab -->
                  <ul class="nav nav-tabs md-tabs" role="tablist">
                       <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#genral" role="tab"><i class="fa fa-settings"></i>&nbsp;General</a>
                           <div class="slide"></div>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><i class="fa fa-ui-user"></i>&nbsp;Profile</a>
                           <div class="slide"></div>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#contact" role="tab"><i class="fa fa-contacts"></i>&nbsp;Contact</a>
                           <div class="slide"></div>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#social" role="tab"><i class="fa fa-ui-social-link"></i>&nbsp;</i>Social</a>
                           <div class="slide"></div>
                       </li>
                   </ul>

                    
                   <div class="tab-content">
                       <div class="tab-pane active" id="genral" role="tabpanel">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group row">
                              <div class="col-md-2">
                                <label class="col-form-label f-w-600">Color Logo</label>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group">
                                    <input type="file" class="form-control" name="header_logo">
                                    
                                 </div>
                              </div>
                              <div class="col-md-4" style="background-color: rgba(84, 83, 83, 0.5);padding: 15px;border: 2px solid #fff;">
                                <img src="<?php echo site_url().'/uploads/settings/'.$settings['logo-header'];?>" width="200">
                               </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-2">
                                <label class="col-form-label f-w-600">White Logo</label>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group">
                                    <input type="file" class="form-control" name="footer_logo">
                                    
                                 </div>
                              </div>
                               <div class="col-md-4" style="background-color: rgba(84, 83, 83, 0.5);padding: 15px;border: 2px solid #fff;">
                              
                                <img src="<?php echo site_url().'/uploads/settings/'.$settings['logo-footer'];?>" width="200">
                               </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-2">
                                <label class="col-form-label f-w-600">Pre Loader Image</label>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group">
                                    <input type="file" class="form-control" name="pre_loader_img">

                                    
                                 </div>
                              </div>
                              <div class="col-md-4" style="background-color: rgba(84, 83, 83, 0.5);padding: 15px;border: 2px solid #fff;">
                                <img src="<?php echo site_url().'/uploads/settings/'.$settings['pre-loader-img'];?>" width="200">
                               </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <label class="col-form-label f-w-600">Show Preloader</label>
                              </div>
                              <div class="col-md-3">
                                 <div class="input-group">
                                  <?php 
                                  if($settings['pre-loader']=='0'){
                                    $chk="";
                                  }else{
                                    $chk="checked";
                                  }
                                  ?>
                                  <input type="checkbox" class="form-control" name="show_preloder" value="1" <?php echo $chk;?>>
                                 </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          
                       </div>
                       <div class="tab-pane" id="profile" role="tabpanel">
                            <div class="row">
                              <div class="col-lg-12">
                               <div class="form-group row">
                                 <div class="col-md-2">
                                   <label class="col-form-label f-w-600">User Name</label>
                                 </div>
                                 <div class="col-md-10">
                                    <div class="input-group">
                                       <input type="text" class="form-control" placeholder="Username" name="user_name" value="<?php echo $this->session->userdata('user_name');?> " disabled>
                                    </div>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <div class="col-md-2">
                                   <label class="col-form-label f-w-600">Password</label>
                                 </div>
                                 <div class="col-md-10">
                                    <div class="input-group">
                                       <input type="password" class="form-control" placeholder="password" name="user_pass" value="">
                                    </div>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <div class="col-md-2">
                                   <label class="col-form-label f-w-600">Confirm Password</label>
                                 </div>
                                 <div class="col-md-10">
                                    <div class="input-group">
                                       <input type="password" class="form-control" placeholder="confirm password" name="user_cpass" value="">
                                    </div>
                                 </div>
                               </div>

                              </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="contact" role="tabpanel">
                          <div class="row">
                            <div class="col-lg-12">
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Email</label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                     <input type="email" class="form-control" placeholder="Email" name="email_ad" value="<?php echo $settings['email'];?>">
                                  </div>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Phone</label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                     <input type="text" class="form-control" placeholder="Phone" name="phone_no" value="<?php echo $settings['phone'];?>">
                                  </div>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Address</label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                    <textarea class="form-control" name="office_address" id="address_setting2" placeholder="Address" rows="4"><?php echo $settings['address'];?></textarea>
                                  </div>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Hours of Operation </label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                    <textarea class="form-control" name="hours_of_operation" id="hours_of_operation" placeholder="Hours of Operation" rows="6"><?php echo $settings['hour-of-operation'];?></textarea>
                                  </div>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Map Lattitude</label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                     <input type="text" class="form-control" placeholder="Lattitude" name="lattitude" value="<?php echo $settings['map-lat'];?>">
                                  </div>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-md-2">
                                 <label class="col-form-label f-w-600">Map Logitude</label>
                               </div>
                               <div class="col-md-10">
                                  <div class="input-group">
                                     <input type="text" class="form-control" placeholder="Longitude" name="longitude" value="<?php echo $settings['map-lan'];?>">
                                  </div>
                               </div>
                             </div>
                          </div>
                         </div>
                       </div>
                       <div class="tab-pane" id="social" role="tabpanel">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group row">
                                <div class="col-md-12">
                                   <div class="input-group">
                                      <span class="input-group-btn"><button type="button" class="btn btn-info shadow-none addon-btn waves-effect waves-light"><i class="fa fa-facebook"></i></button></span>
                                      <input type="text" class="form-control" placeholder="Facebook Link" name="facebook-link" value="<?php echo $settings['fb-link'];?>">
                                   </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-12">
                                   <div class="input-group">
                                      <span class="input-group-btn"><button type="button" class="btn btn-info shadow-none addon-btn waves-effect waves-light"><i class="fa fa-twitter"></i></button></span>
                                      <input type="text" class="form-control" placeholder="Twitter Link" name="twitter-link" value="<?php echo $settings['tw-link'];?>">
                                   </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-12">
                                   <div class="input-group">
                                      <span class="input-group-btn"><button type="button" class="btn btn-info shadow-none addon-btn waves-effect waves-light"><i class="fa fa-linkedin"></i></button></span>
                                      <input type="text" class="form-control" placeholder="Linkedin Link" name="linkedin-link" value="<?php echo $settings['ln-link'];?>">
                                   </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-12">
                                   <div class="input-group">
                                      <span class="input-group-btn"><button type="button" class="btn btn-info shadow-none addon-btn waves-effect waves-light"><i class="fa fa-instagram"></i></button></span>
                                      <input type="text" class="form-control" placeholder="Instagram Link" name="instra-link" value="<?php echo $settings['insta-link'];?>">
                                   </div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                       </div>
                       <button type="submit" class="btn btn-success waves-effect waves-light m-r-30" name="update">Update</button>
            </form>
          </div>
          </div>
         <!-- Setting tab -->
    </div>
</div>

 


    
    
    