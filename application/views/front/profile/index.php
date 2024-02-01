
     <section class="news-feed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-sidebar">
                  
                  <?php if ($get_user_data) {?>
                    <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user_data->user_photo;?>">
                  <?php }else{?>
                    <img width="120px;" src="<?php echo site_url();?>/resource/front/images/user.png">
                    <?php }?>
                    <?php
                      if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                        $protocol = 'https://';
                        }
                        else {
                        $protocol = 'http://';
                        }

                        $current_link = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        
                    ?>
                    <br>
                     
                     <br>
                    <?php $this->load->view('front/includes/search'); ?>
                    
                   
                </div>
                 <div class="col-md-10">
                   <h5 class="heading-5">Edit profile</h5>
              <?php 
              if ($get_user_data) {?>
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal">Personal Information </a></li>
                    <li><a data-toggle="tab" href="#preferance">Your Preferance </a></li>
                    <li><a data-toggle="tab" href="#menu2">Upload picture</a></li>
                    <li><a data-toggle="tab" href="#menu3">Change password</a></li>
                    <li><a data-toggle="tab" href="#gallery">Gallery</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">
                      <div class="well">
                      <form action="<?php echo site_url('users/update_personal_info')?>" method="POST">
                        
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="email" value="<?php echo $get_user_data->email ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="fname">first name:</label>
                          <input type="text" class="form-control" name="firstname" id="fname" value="<?php echo $get_user_data->firstname ?>">
                        </div>
                        <div class="form-group">
                          <label for="lanme">last name:</label>
                          <input type="text" class="form-control" name="lastname" id="lanme" value="<?php echo $get_user_data->lastname ?>">
                        </div>
                        <div class="form-group">
                          <label for="gender">gender:</label>
                          <select class="form-control" name="gender">
                            <option value="Male" <?php if($get_user_data->gender == "Male"){ echo "selected"; }?>>Male</option>
                            <option value="Female" <?php if($get_user_data->gender == "Female"){ echo "selected"; }?>>Female</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="mobile_number">mobile number:</label>
                          <input type="tel" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $get_user_data->mobile_number ?>">
                        </div>

                        <div class="form-group">
                          <label for="bday">Birthday:</label>
                          <input type="text" class="form-control" name="birthday" id="bday" value="<?php echo $get_user_data->birthday ?>">
                        </div>
                        <div class="form-group">
                          <label for="marital_status">Marital status:</label>
                          <select class="form-control" name="marital_status">
                            <option value="Married" <?php if($get_user_data->marital_status == "Married"){ echo "selected"; }?>>Married</option>
                            <option value="UnMarried" <?php if($get_user_data->marital_status == "UnMarried"){ echo "selected"; }?>>UnMarried</option>
                            <option value="Divorced" <?php if($get_user_data->marital_status == "Divorced"){ echo "selected"; }?>>Divorced</option>     
                            <option value="Separated" <?php if($get_user_data->marital_status == "Separated"){ echo "selected"; }?>>Separated</option>
                            <option value="Widow(er)" <?php if($get_user_data->marital_status == "Widow(er)"){ echo "selected"; }?>>Widow(er)</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="account_created_by">Account Created By:</label>
                          <select class="form-control" name="account_created_by">
                            <option value="Self" <?php if($get_user_data->account_created_by == "Self"){ echo "selected"; }?>>Self</option>
                            <option value="Parents" <?php if($get_user_data->account_created_by == "Parents"){ echo "selected"; }?>>Parents</option>
                            <option value="Brothers" <?php if($get_user_data->account_created_by == "Brothers"){ echo "selected"; }?>>Brothers</option>
                            <option value="Sisters" <?php if($get_user_data->account_created_by == "Sisters"){ echo "selected"; }?>>Sisters</option>
                            <option value="Relative" <?php if($get_user_data->account_created_by == "Relative"){ echo "selected"; }?>>Relative</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="have_children">Have children</label>
                          <select class="form-control" name="have_children">
                            <option value="">Not selected</option>
                            <option value="1" <?php if($get_user_data->have_children == "1"){ echo "selected"; }?>>Not Applicable</option>
                            <option value="2" <?php if($get_user_data->have_children == "2"){ echo "selected"; }?>>No children</option>
                            <option value="3" <?php if($get_user_data->have_children == "3"){ echo "selected"; }?>>Yes living with me</option>

                            <option value="4" <?php if($get_user_data->have_children == "4"){ echo "selected"; }?>>Yes not living with me</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="height">height</label>
                          <select class="form-control" name="height">
                            <option value="">Not selected</option>
                            <option value="5" <?php if($get_user_data->height == "5"){ echo "selected"; }?>>5ft</option>
                            <option value="5.2" <?php if($get_user_data->height == "5.2"){ echo "selected"; }?>>5ft 2in</option>
                            <option value="5.3" <?php if($get_user_data->height == "5.3"){ echo "selected"; }?>>5ft 3in</option>
                            <option value="5.4" <?php if($get_user_data->height == "5.4"){ echo "selected"; }?>>5ft 4in</option>
                            <option value="5.5" <?php if($get_user_data->height == "5.5"){ echo "selected"; }?>>5ft 5in</option>
                            <option value="5.6" <?php if($get_user_data->height == "5.6"){ echo "selected"; }?>>5ft 6in</option>
                            <option value="5.7" <?php if($get_user_data->height == "5.7"){ echo "selected"; }?>>5ft 7in</option>
                            <option value="5.8" <?php if($get_user_data->height == "5.8"){ echo "selected"; }?>>5ft 8in</option>
                            <option value="5.9" <?php if($get_user_data->height == "5.9"){ echo "selected"; }?>>5ft 9in</option>
                            <option value="5.10" <?php if($get_user_data->height == "5.10"){ echo "selected"; }?>>5ft 10in</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="body_type">body type</label>
                          <select class="form-control" name="body_type">
                            <option value="">select one</option>
                            <option value="average" <?php if($get_user_data->body_type == "average"){ echo "selected"; }?>>average</option>
                            <option value="slim" <?php if($get_user_data->body_type == "slim"){ echo "selected"; }?>>slim</option>
                            <option value="heavy" <?php if($get_user_data->body_type == "heavy"){ echo "selected"; }?>>heavy</option>

                            <option value="other" <?php if($get_user_data->body_type == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="complexion">complexion</label>
                          <select class="form-control" name="complexion">
                            <option value="">select one</option>
                            <option value="fair" <?php if($get_user_data->complexion == "fair"){ echo "selected"; }?>>fair</option>
                            <option value="veryfair" <?php if($get_user_data->complexion == "veryfair"){ echo "selected"; }?>>veryfair</option>
                            <option value="dark" <?php if($get_user_data->complexion == "dark"){ echo "selected"; }?>>dark</option>

                            <option value="other" <?php if($get_user_data->complexion == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>


                        <div class="form-group">
                          <label for="zodiac_sign">zodiac_sign</label>
                          <select class="form-control" name="zodiac_sign">
                            <option value="">select one</option>
                            <option value="aries" <?php if($get_user_data->zodiac_sign == "aries"){ echo "selected"; }?>>aries</option>
                            <option value="cancer" <?php if($get_user_data->zodiac_sign == "cancer"){ echo "selected"; }?>>cancer</option>
                            <option value="other" <?php if($get_user_data->zodiac_sign == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="blood_group">blood group</label>
                          <select class="form-control" name="blood_group">
                            <option value="">select one</option>
                            <option value="a+" <?php if($get_user_data->blood_group == "a+"){ echo "selected"; }?>>A+</option>
                            <option value="o+" <?php if($get_user_data->blood_group == "o+"){ echo "selected"; }?>>O+</option>
                            <option value="b+" <?php if($get_user_data->blood_group == "b+"){ echo "selected"; }?>>B+</option>
                            <option value="ab+" <?php if($get_user_data->blood_group == "ab+"){ echo "selected"; }?>>AB+</option>
                            <option value="a-" <?php if($get_user_data->blood_group == "a-"){ echo "selected"; }?>>A-</option>
                            <option value="o-" <?php if($get_user_data->blood_group == "o-"){ echo "selected"; }?>>O-</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="education">Education</label>
                          <select class="form-control" name="education">
                            <option value="">select one</option>
                            <option value="ssc" <?php if($get_user_data->education == "ssc"){ echo "selected"; }?>>ssc</option>
                            <option value="hsc" <?php if($get_user_data->education == "hsc"){ echo "selected"; }?>>hsc</option>
                            <option value="bsc" <?php if($get_user_data->education == "bsc"){ echo "selected"; }?>>bsc</option>
                            <option value="bba" <?php if($get_user_data->education == "bba"){ echo "selected"; }?>>bba</option>
                            <option value="ba" <?php if($get_user_data->education == "ba"){ echo "selected"; }?>>ba</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="profession">profession</label>
                          <select class="form-control" name="profession">
                            <option value="">select one</option>
                            <option value="Teacher" <?php if($get_user_data->profession == "Teacher"){ echo "selected"; }?>>Teacher</option>
                            <option value="Doctor" <?php if($get_user_data->profession == "Doctor"){ echo "selected"; }?>>Doctor</option>
                            <option value="Engineer" <?php if($get_user_data->profession == "Engineer"){ echo "selected"; }?>>Engineer</option>
                            <option value="Businessmen" <?php if($get_user_data->profession == "Businessmen"){ echo "selected"; }?>>Businessmen</option>
                            <option value="other" <?php if($get_user_data->profession == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="annual_income">annual income</label>
                          <select class="form-control" name="annual_income">
                            <option value="">select one</option>
                            <option value="1" <?php if($get_user_data->annual_income == "1"){ echo "selected"; }?>>10,000-20,000</option>
                            <option value="2" <?php if($get_user_data->annual_income == "2"){ echo "selected"; }?>>20,000-30,000</option>
                            <option value="3" <?php if($get_user_data->annual_income == "3"){ echo "selected"; }?>>30,000-50,000</option>
                            <option value="4" <?php if($get_user_data->annual_income == "4"){ echo "selected"; }?>>50,000-100000</option>
                            <option value="5" <?php if($get_user_data->annual_income == "5"){ echo "selected"; }?>>100000+</option>
                            <option value="other" <?php if($get_user_data->annual_income == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="religion">Religion</label>
                          <select class="form-control" name="religion">
                            <option value="">select one</option>
                            <option value="Muslim" <?php if($get_user_data->religion == "Muslim"){ echo "selected"; }?>>Muslim</option>
                            <option value="Hindu" <?php if($get_user_data->religion == "Hindu"){ echo "selected"; }?>>Hindu</option>
                            <option value="Buddish" <?php if($get_user_data->religion == "Buddish"){ echo "selected"; }?>>Buddish</option>
                            <option value="Christian" <?php if($get_user_data->religion == "Christian"){ echo "selected"; }?>>Christian</option>
                            <option value="Other" <?php if($get_user_data->religion == "Other"){ echo "selected"; }?>>Other</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="mother_tongue">mother tongue</label>
                          <select class="form-control" name="mother_tongue">
                            <option value="">select one</option>
                            <option value="Bangla" <?php if($get_user_data->mother_tongue == "Bangla"){ echo "selected"; }?>>Bangla</option>
                            <option value="English" <?php if($get_user_data->mother_tongue == "English"){ echo "selected"; }?>>English</option>
                            <option value="Hindi" <?php if($get_user_data->mother_tongue == "Hindi"){ echo "selected"; }?>>Hindi</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="mother_tongue">about youself</label>
                          <textarea class="form-control" name="about_yourself" placeholder="about youself"><?= $get_user_data->about_yourself;?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="mother_tongue">family background</label>
                          <textarea class="form-control" name="family_background" placeholder="family background"><?= $get_user_data->family_background;?></textarea>
                        </div>

                        <div class="form-group">
                          <label>district</label>
                          <select name="district" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Sylhet" <?php if($get_user_data->district == "Sylhet"){ echo "selected"; }?>>Sylhet</option>
                            <option value="Dhaka" <?php if($get_user_data->district == "Dhaka"){ echo "selected"; }?>>Dhaka</option>
                            <option value="Chittagong" <?php if($get_user_data->district == "Chittagong"){ echo "selected"; }?>>Chittagong</option>
                            <option value="Comilla" <?php if($get_user_data->district == "Comilla"){ echo "selected"; }?>>Comilla</option>
                            <option value="Khulna" <?php if($get_user_data->district == "Khulna"){ echo "selected"; }?>>Khulna</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>country</label>
                          <select name="country" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Bangladesh" <?php if($get_user_data->country == "Bangladesh"){ echo "selected"; }?>>Bangladesh</option>
                            <option value="India" <?php if($get_user_data->country == "India"){ echo "selected"; }?>>India</option>
                            <option value="England" <?php if($get_user_data->country == "England"){ echo "selected"; }?>>England</option>
                            <option value="Canada" <?php if($get_user_data->country == "Canada"){ echo "selected"; }?>>Canada</option>
                            <option value="America" <?php if($get_user_data->country == "America"){ echo "selected"; }?>>America</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label>postal code</label>
                            <input type="text" name="postal_code" value="<?= $get_user_data->postal_code;?>" class="form-control" placeholder="postal code">
                        </div>
                        <div class="form-group">
                            <label>residency status</label>
                            <select name="residency_status" class="form-control">
                              <option value="">Not selected</option>
                              <option value="1" <?php if($get_user_data->residency_status == "1"){ echo "selected"; }?>>Permanent resident</option>
                              <option value="2" <?php if($get_user_data->residency_status == "2"){ echo "selected"; }?>>Student visa</option>
                              <option value="3" <?php if($get_user_data->residency_status == "3"){ echo "selected"; }?>>citizen</option>
                              <option value="4" <?php if($get_user_data->residency_status == "4"){ echo "selected"; }?>>work permit</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>City of residence</label>
                            <input type="text" name="city_of_residence" value="<?= $get_user_data->city_of_residence;?>" class="form-control" placeholder="city of residence">
                        </div>
                        <div class="form-group">
                            <label>state of residence</label>
                            <input type="text" name="state_of_residence" value="<?= $get_user_data->state_of_residence;?>" class="form-control" placeholder="state of residence">
                        </div>
                        <div class="form-group">
                          <label>country of origin</label>
                          <select name="country_of_origin" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Bangladesh" <?php if($get_user_data->country_of_origin == "Bangladesh"){ echo "selected"; }?>>Bangladesh</option>
                            <option value="India" <?php if($get_user_data->country_of_origin == "India"){ echo "selected"; }?>>India</option>
                            <option value="England" <?php if($get_user_data->country_of_origin == "England"){ echo "selected"; }?>>England</option>
                            <option value="Canada" <?php if($get_user_data->country_of_origin == "Canada"){ echo "selected"; }?>>Canada</option>
                            <option value="America" <?php if($get_user_data->country_of_origin == "America"){ echo "selected"; }?>>America</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>            
                    </form>  
                   </div>

                      
                    
                    </div>
                    <div id="preferance" class="tab-pane fade">
                      <div class="well">
                      <form action="<?php echo site_url('users/update_preferance_info')?>" method="POST">
                        <div class="form-group">
                          <label for="preferance_gender">gender:</label>
                          <select class="form-control" name="preferance_gender">
                            <option value="Male" <?php if($get_user_data->preferance_gender == "Male"){ echo "selected"; }?>>Male</option>
                            <option value="Female" <?php if($get_user_data->preferance_gender == "Female"){ echo "selected"; }?>>Female</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Age range from</label>
                          <select class="form-control" name="preferance_age_from">
                            <option value="18" <?php if($get_user_data->preferance_age_from == "18"){ echo "selected"; }?>>18</option>
                            <option value="19" <?php if($get_user_data->preferance_age_from == "19"){ echo "selected"; }?>>19</option>
                            <option value="20" <?php if($get_user_data->preferance_age_from == "20"){ echo "selected"; }?>>20</option>
                            <option value="21" <?php if($get_user_data->preferance_age_from == "21"){ echo "selected"; }?>>21</option>
                            <option value="22" <?php if($get_user_data->preferance_age_from == "22"){ echo "selected"; }?>>22</option>
                            <option value="23" <?php if($get_user_data->preferance_age_from == "23"){ echo "selected"; }?>>23</option>
                            <option value="24" <?php if($get_user_data->preferance_age_from == "24"){ echo "selected"; }?>>24</option>
                            <option value="25" <?php if($get_user_data->preferance_age_from == "25"){ echo "selected"; }?>>25</option>
                            <option value="26" <?php if($get_user_data->preferance_age_from == "26"){ echo "selected"; }?>>26</option>
  
                          </select>
                          <label>to</label>
                          <select class="form-control" name="preferance_age_to">
                            <option value="19" <?php if($get_user_data->preferance_age_to == "19"){ echo "selected"; }?>>19</option>
                            <option value="20" <?php if($get_user_data->preferance_age_to == "20"){ echo "selected"; }?>>20</option>
                            <option value="21" <?php if($get_user_data->preferance_age_to == "21"){ echo "selected"; }?>>21</option>
                            <option value="22" <?php if($get_user_data->preferance_age_to == "22"){ echo "selected"; }?>>22</option>
                            <option value="23" <?php if($get_user_data->preferance_age_to == "23"){ echo "selected"; }?>>23</option>
                            <option value="24" <?php if($get_user_data->preferance_age_to == "24"){ echo "selected"; }?>>24</option>
                            <option value="25" <?php if($get_user_data->preferance_age_to == "25"){ echo "selected"; }?>>25</option>
                            <option value="26" <?php if($get_user_data->preferance_age_to == "26"){ echo "selected"; }?>>26</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Height range</label>
                          <select class="form-control" name="preferance_height_from">
                            <option value="4.1" <?php if($get_user_data->preferance_height_from == "4.1"){ echo "selected"; }?>>4.1"</option>
                            <option value="4.2" <?php if($get_user_data->preferance_height_from == "4.2"){ echo "selected"; }?>>4.2"</option>
                            <option value="4.3" <?php if($get_user_data->preferance_height_from == "4.3"){ echo "selected"; }?>>4.3"</option>
                            <option value="4.4" <?php if($get_user_data->preferance_height_from == "4.4"){ echo "selected"; }?>>4.4"</option>
                            <option value="4.5" <?php if($get_user_data->preferance_height_from == "4.5"){ echo "selected"; }?>>4.5"</option>
                            <option value="4.6" <?php if($get_user_data->preferance_height_from == "4.6"){ echo "selected"; }?>>4.6"</option>
                            <option value="4.7" <?php if($get_user_data->preferance_height_from == "4.7"){ echo "selected"; }?>>4.7"</option>
                            <option value="4.8" <?php if($get_user_data->preferance_height_from == "4.8"){ echo "selected"; }?>>4.8"</option>
                            <option value="4.9" <?php if($get_user_data->preferance_height_from == "4.9"){ echo "selected"; }?>>4.9"</option>

  
                          </select>
                          <label>to</label>
                          <select class="form-control" name="preferance_height_to">
                            <option value="5" <?php if($get_user_data->preferance_height_to == "5"){ echo "selected"; }?>>5"</option>
                            <option value="5.1" <?php if($get_user_data->preferance_height_to == "5.1"){ echo "selected"; }?>>5.1"</option>
                            <option value="5.2" <?php if($get_user_data->preferance_height_to == "5.2"){ echo "selected"; }?>>5.2"</option>
                            <option value="5.3" <?php if($get_user_data->preferance_height_to == "5.3"){ echo "selected"; }?>>5.3"</option>
                            <option value="5.4" <?php if($get_user_data->preferance_height_to == "5.4"){ echo "selected"; }?>>5.4"</option>
                            <option value="5.5" <?php if($get_user_data->preferance_height_to == "5.5"){ echo "selected"; }?>>5.5"</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="preferance_marital_status">Marital status:</label>
                          <select class="form-control" name="preferance_marital_status">
                            <option value="">Select One</option>
                            <option value="Married" <?php if($get_user_data->preferance_marital_status == "Married"){ echo "selected"; }?>>Married</option>
                            <option value="UnMarried" <?php if($get_user_data->preferance_marital_status == "UnMarried"){ echo "selected"; }?>>UnMarried</option>
                            <option value="Divorced" <?php if($get_user_data->preferance_marital_status == "Divorced"){ echo "selected"; }?>>Divorced</option>     
                            <option value="Separated" <?php if($get_user_data->preferance_marital_status == "Separated"){ echo "selected"; }?>>Separated</option>
                            <option value="Widow(er)" <?php if($get_user_data->preferance_marital_status == "Widow(er)"){ echo "selected"; }?>>Widow(er)</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>country</label>
                          <select name="preferance_country" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Bangladesh" <?php if($get_user_data->preferance_country == "Bangladesh"){ echo "selected"; }?>>Bangladesh</option>
                            <option value="India" <?php if($get_user_data->preferance_country == "India"){ echo "selected"; }?>>India</option>
                            <option value="England" <?php if($get_user_data->preferance_country == "England"){ echo "selected"; }?>>England</option>
                            <option value="Canada" <?php if($get_user_data->preferance_country == "Canada"){ echo "selected"; }?>>Canada</option>
                            <option value="America" <?php if($get_user_data->preferance_country == "America"){ echo "selected"; }?>>America</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="preferance_have_children">Have children</label>
                          <select class="form-control" name="preferance_have_children">
                            <option value="">Not selected</option>
                            <option value="1" <?php if($get_user_data->preferance_have_children == "1"){ echo "selected"; }?>>Not Applicable</option>
                            <option value="2" <?php if($get_user_data->preferance_have_children == "2"){ echo "selected"; }?>>No children</option>
                            <option value="3" <?php if($get_user_data->preferance_have_children == "3"){ echo "selected"; }?>>Yes living with me</option>

                            <option value="4" <?php if($get_user_data->preferance_have_children == "4"){ echo "selected"; }?>>Yes not living with me</option>
                          </select>
                        </div>



                        <div class="form-group">
                          <label for="preferance_body_type">body type</label>
                          <select class="form-control" name="preferance_body_type">
                            <option value="">select one</option>
                            <option value="average" <?php if($get_user_data->preferance_body_type == "average"){ echo "selected"; }?>>average</option>
                            <option value="slim" <?php if($get_user_data->preferance_body_type == "slim"){ echo "selected"; }?>>slim</option>
                            <option value="heavy" <?php if($get_user_data->preferance_body_type == "heavy"){ echo "selected"; }?>>heavy</option>

                            <option value="other" <?php if($get_user_data->preferance_body_type == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="preferance_education">Education</label>
                          <select class="form-control" name="preferance_education">
                            <option value="">select one</option>
                            <option value="ssc" <?php if($get_user_data->preferance_education == "ssc"){ echo "selected"; }?>>ssc</option>
                            <option value="hsc" <?php if($get_user_data->preferance_education == "hsc"){ echo "selected"; }?>>hsc</option>
                            <option value="bsc" <?php if($get_user_data->preferance_education == "bsc"){ echo "selected"; }?>>bsc</option>
                            <option value="bba" <?php if($get_user_data->preferance_education == "bba"){ echo "selected"; }?>>bba</option>
                            <option value="ba" <?php if($get_user_data->preferance_education == "ba"){ echo "selected"; }?>>ba</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="preferance_profession">profession</label>
                          <select class="form-control" name="preferance_profession">
                            <option value="">select one</option>
                            <option value="Teacher" <?php if($get_user_data->preferance_profession == "Teacher"){ echo "selected"; }?>>Teacher</option>
                            <option value="Doctor" <?php if($get_user_data->preferance_profession == "Doctor"){ echo "selected"; }?>>Doctor</option>
                            <option value="Engineer" <?php if($get_user_data->preferance_profession == "Engineer"){ echo "selected"; }?>>Engineer</option>
                            <option value="Businessmen" <?php if($get_user_data->preferance_profession == "Businessmen"){ echo "selected"; }?>>Businessmen</option>
                            <option value="other" <?php if($get_user_data->preferance_profession == "other"){ echo "selected"; }?>>other</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="preferance_religion">Religion</label>
                          <select class="form-control" name="preferance_religion">
                            <option value="">select one</option>
                            <option value="Muslim" <?php if($get_user_data->preferance_religion == "Muslim"){ echo "selected"; }?>>Muslim</option>
                            <option value="Hindu" <?php if($get_user_data->preferance_religion == "Hindu"){ echo "selected"; }?>>Hindu</option>
                            <option value="Buddish" <?php if($get_user_data->preferance_religion == "Buddish"){ echo "selected"; }?>>Buddish</option>
                            <option value="Christian" <?php if($get_user_data->preferance_religion == "Christian"){ echo "selected"; }?>>Christian</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="preferance_mother_tongue">mother tongue</label>
                          <select class="form-control" name="preferance_mother_tongue">
                            <option value="">select one</option>
                            <option value="Bangla" <?php if($get_user_data->preferance_mother_tongue == "Bangla"){ echo "selected"; }?>>Bangla</option>
                            <option value="English" <?php if($get_user_data->preferance_mother_tongue == "English"){ echo "selected"; }?>>English</option>
                            <option value="Hindi" <?php if($get_user_data->preferance_mother_tongue == "Hindi"){ echo "selected"; }?>>Hindi</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label>district</label>
                          <select name="preferance_district" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Sylhet" <?php if($get_user_data->preferance_district == "Sylhet"){ echo "selected"; }?>>Sylhet</option>
                            <option value="Dhaka" <?php if($get_user_data->preferance_district == "Dhaka"){ echo "selected"; }?>>Dhaka</option>
                            <option value="Chittagong" <?php if($get_user_data->preferance_district == "Chittagong"){ echo "selected"; }?>>Chittagong</option>
                            <option value="Comilla" <?php if($get_user_data->preferance_district == "Comilla"){ echo "selected"; }?>>Comilla</option>
                            <option value="Khulna" <?php if($get_user_data->preferance_district == "Khulna"){ echo "selected"; }?>>Khulna</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label>residency status</label>
                            <select name="preferance_residency_status" class="form-control">
                              <option value="">Not selected</option>
                              <option value="1" <?php if($get_user_data->preferance_residency_status == "1"){ echo "selected"; }?>>Permanent resident</option>
                              <option value="2" <?php if($get_user_data->preferance_residency_status == "2"){ echo "selected"; }?>>Student visa</option>
                              <option value="3" <?php if($get_user_data->preferance_residency_status == "3"){ echo "selected"; }?>>citizen</option>
                              <option value="4" <?php if($get_user_data->preferance_residency_status == "4"){ echo "selected"; }?>>work permit</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>City of residence</label>
                            <input type="text" name="city_of_residence" value="<?= $get_user_data->city_of_residence;?>" class="form-control" placeholder="city of residence">
                        </div>
                        <div class="form-group">
                            <label>state of residence</label>
                            <input type="text" name="preferance_state" value="<?= $get_user_data->preferance_state;?>" class="form-control" placeholder="state of residence">
                        </div>
                        <div class="form-group">
                          <label>country of origin</label>
                          <select name="preferance_origin" class="form-control">
                            <option value="">Not selected</option>
                            <option value="Bangladesh" <?php if($get_user_data->preferance_origin == "Bangladesh"){ echo "selected"; }?>>Bangladesh</option>
                            <option value="India" <?php if($get_user_data->preferance_origin == "India"){ echo "selected"; }?>>India</option>
                            <option value="England" <?php if($get_user_data->preferance_origin == "England"){ echo "selected"; }?>>England</option>
                            <option value="Canada" <?php if($get_user_data->preferance_origin == "Canada"){ echo "selected"; }?>>Canada</option>
                            <option value="America" <?php if($get_user_data->preferance_origin == "America"){ echo "selected"; }?>>America</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>            
                    </form>  
                    </div>
                  </div>
                    <div id="menu2" class="tab-pane fade">
                      <div class="well">
                        <h3>upload picture</h3>
                         <form action="<?php echo site_url('users/update_user_photo')?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <br>
                              <input type="checkbox" name="photo_access" value="1" <?php if($get_user_data->photo_access =='1'){echo "checked";}?>>check if you want to make your photo private ?
                              <input type="file" name="user_photo" class="form-control">
                            </div>
                            <input type="submit" value="upload" class="btn btn-primary">
                         </form>
                      </div>
                    </div>
                    
                    <div id="menu3" class="tab-pane fade">
                      <div class="well">
                        <form action="<?php echo site_url('users/update_password')?>" method="POST">
                          <div class="form-group">
                            <input type="password" name="password" placeholder="enter new password" class="form-control" required="">
                          </div>
                          <input type="submit" class="btn btn-success" value="change password">
                        </form>
                      </div>
                    </div>

                    <div id="gallery" class="tab-pane fade">
                      <div class="well">
                        <h3>upload Gallery</h3>
                         <form action="<?php echo site_url('users/update_gallery')?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group"> 
                            <?php  
                             if($get_user_data->gallery1){?>
                              <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user_data->gallery1;?>">
                            <?php 
                              }
                            ?>                            
                              <input type="file" name="gallery1" class="form-control">
                            </div>
                            <div class="form-group">
                            <?php  
                             if($get_user_data->gallery2){?>
                              <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user_data->gallery2;?>">
                            <?php 
                              }
                            ?>                             
                              <input type="file" name="gallery2" class="form-control">
                            </div>
                            <div class="form-group"> 
                            <?php  
                             if($get_user_data->gallery3){?>
                              <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user_data->gallery3;?>">
                            <?php 
                              }
                            ?>                             
                              <input type="file" name="gallery3" class="form-control">
                            </div>
                            <div class="form-group">
                            <?php  
                             if($get_user_data->gallery4){?>
                              <img width="120px;" src="<?php echo site_url();?>/uploads/users/<?php echo $get_user_data->gallery4;?>">
                            <?php 
                              }
                            ?>                           
                              <input type="file" name="gallery4" class="form-control">
                            </div>
                            <input type="submit" value="upload" class="btn btn-primary">
                         </form>
                      </div>
                    </div>

                  </div> 
            <?php  
              }
           ?>   
                </div>
            </div>
        </div>             
     </section>