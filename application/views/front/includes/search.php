<div class="search-inner">
                        <form action="<?php echo site_url('home/find_user');?>" method="POST">
                          <div class="row">
                            <div class="col-xs-12">
                                <div class="label-txt text-center">Looking for</div>
                                <div class="white_txt">
                                  <select  class="form-control form-group-margin" name="gender">
                                        <option value="Female">Woman</option>
                                        <option value="Male">Man</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
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
                            <div class="col-xs-12">
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
                            <div class="col-xs-12">
                                <div class="label-txt text-center">Marital Status</div>
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

                            <div class="col-xs-12 text-center">
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
                        <input type="submit" class="btn btn-rounded" value="search" /> 
                        </form>
                    </div>