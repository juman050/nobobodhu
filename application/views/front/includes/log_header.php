<header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="logo">
                                <a href="" class="navbar-brand">NoboBodhu</a>
                            </div>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                         <div class=" top-bar">                            
                            <div class="right">
                                <form action="<?php echo site_url('user_authentication/user_login_process')?>" method="POST">
                                    <div class="form-group">
                                      <input class="form-control" type="email" placeholder="Email" name="email" required="">
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="password" placeholder="Password" name="password" required="">
                                      <p><a href="#" data-toggle="modal" data-target="#forgot_pass">forgot password</a></p>                              
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Login</button>                         
                                  </form>                        
                            </div>
                        </div>
                    </div>
                </div>
                        
            </div>               
        </nav>        
    </header>
                          <div class="modal fade" id="forgot_pass" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Send Mail</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo site_url('home/forgot');?>" method="POST">
                                
                                  <div class="form-group">
                                     <input type="email" name="email" placeholder="enter your email" class="form-control">
                                  </div>
                                  <input type="submit" value="Send" class="btn btn-info">
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>