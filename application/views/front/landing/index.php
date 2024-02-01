<?php $this->load->view('front/includes/log_header'); ?>
    <!-- Modal -->

<section class="singup-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="singup-inner">
                            <h1>create your account. it's free</h1>
                                <div class="row">
                                    <form action="<?php echo site_url('home/new_user_registration')?>" method="POST">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <input type="text" placeholder="First Name " name="firstname" class="form-control" required="">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <input type="text" placeholder="Last Name Here" name="lastname" class="form-control" required="">
                                                </div>  
                                            </div> 
                                             <div class="form-group">
                                                <input type="email" placeholder="Email" name="email" class="form-control" required="">
                                            </div> 
                                             <div class="form-group">
                                                <input type="password" placeholder="New Password" class="form-control" name="password" required="">
                                            </div>  
                                            <div class="row">                                                
                                                <div class="col-sm-6 form-group">
                                                    <p><label for="exampleInputDOB1">Birthday</label></p>
                                                    <input type="date" class="form-control" id="exampleInputDOB1" name="birthday" placeholder="Date of Birth" required="">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                     <p><label>Gender</label></p>
                                                     <div class="radio-inner form-control">
                                                         <label class="radio-inline">
                                                            <input type="radio"  name="gender" value="Male" required="">Male
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio"  name="gender" value="Female" required="">Female
                                                        </label>
                                                     </div>                                                      
                                                </div>        
                                            </div>
                                            <div class="form-group">
                                                <p><label>Account created by</label></p>
                                                <div class="radio-inner form-control">
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="account_created_by" value="Self" required="">Self
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="account_created_by" value="Parents" required="">Parents
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="account_created_by" value="Brothers" required="">Brothers
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="account_created_by" value="Sisters" required="">Sisters
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="account_created_by" value="Relative" required="">Relative
                                                    </label>
                                                </div>                                                        
                                            </div>
                                            <div class="form-group">
                                                <p><label>Marital status</label></p>
                                                <div class="radio-inner form-control">
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="marital_status" required="" value="UnMarried">UnMarried
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="marital_status" value="Married" required="">Widow(er)
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="marital_status" value="Divorced" required="">Divorced
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  name="marital_status" value="Separated" required="">Separated
                                                    </label>
                        
                                                </div>                                                        
                                            </div> 
                                            <h4><a href="">Tram and condition</a></h4>
                                            <div class="text-center">
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="login-remember" type="checkbox"  value="1" required="">Are you agree?
                                                    </label>
                                                </div>
                                            </div>                
                                            <button type="submit" class="btn btn-lg btn-info create-account-btn">Create Account</button>                   
                                        </div>
                                    </form> 
                                </div>                            
                        </div>                        
                    </div>
                </div>
            </div>            
    </section>

    <section class="search-section">
        <div class="container">
            <div class="title text-center"><h4>Find Someone</h4></div>
            <form action="<?php echo site_url('home/find_user');?>" method="POST">
                <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="search-inner">
                        <div class="row">
                            <div class="col-md-2 col-sm-6">
                                <div class="label-txt text-center">Looking for</div>
                                <div class="white_txt">
                                    <select  class="form-control form-group-margin" name="gender">
                                        <option value="Female">Woman</option>
                                        <option value="Male">Man</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="label-txt text-center">Country</div>
                                <div class="white_txt ">
                                      <select name="country" class="form-control form-group-margin">
                                        <option value="">Not selected</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="England">England</option>
                                        <option value="Canada" >Canada</option>
                                        <option value="America">America</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="label-txt text-center">Religion</div>
                                <div class="white_txt ">
                                    <select  class="form-control form-group-margin" name="religion">
                                        <option value="Muslim">Muslim</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddish">Buddish</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="label-txt ">Marital Status</div>
                                <div class="white_txt ">
                                    <select  class="form-control form-group-margin" name="marital_status">
                                        <option value="UnMarried">UnMarried</option>
                                        <option value="Widow(er)">Widow(er)</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12 text-center">
                                <div class="label-txt ">Age</div>
                                <div class="age-wrap">
                                    <div class="age-inner">
                                        <select  class="form-control border-none" name="age_from">
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                        </select>
                                    </div>
                                    <div class="search-to">to</div>
                                    <div class="age-inner">
                                        <select class="form-control border-none" name="age_to">
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-lg btn-info search-btn">Search</button>
                </div>   
            </div>
            </form>
        </div>
                

    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-item">
                                <div class="icon">
                                    <img src="" alt="">
                                </div>
                                <h4>Lorem ipsum dolor </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur.</p>
                            </div>                                
                        </div>
                        <div class="col-md-4">
                            <div class="single-item">
                                <div class="icon">
                                    <img src="" alt="">
                                </div>
                                <h4>Lorem ipsum dolor </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur.</p>
                            </div>                                
                        </div>
                        <div class="col-md-4">
                            <div class="single-item">
                                <div class="icon">
                                    <img src="" alt="">
                                </div>
                                <h4>Lorem ipsum dolor </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur.</p>
                            </div>                                
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>