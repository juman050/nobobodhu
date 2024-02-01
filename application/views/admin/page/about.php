
         <div class="header">
            <h1 class="page-title"><?php echo $page_name;?></h1>
         </div>
            
             <!-- Our about row start -->
             <div class="row">
                 <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 default-grid-item">
                    <div class="card portlets portlets-info">
                       <div class="card-header text-uppercase">
                          <h3 class="text-center">Our about Section</h3>
                          
                       </div>
                       <div class="card-block">
                        <form action="" method="post" id="about-page-text-form">
                          <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">about Title : </label>
                             </div>
                             <div class="col-md-10">
                                  <input type="text" class="form-control"  placeholder="Title.." name="about_title" value="<?php echo $about_data['about-title'];?>">
                              </div>
                              
                          </div>

                          <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">about text : </label>
                             </div>
                             <div class="col-md-10">
                                  <textarea class="form-control" placeholder="about text.." name="about_text" rows="4"><?php echo $about_data['about-text'];?></textarea>
                                  
                              </div>
                              
                          </div>
                          <div class="form-group row about-page-upload-bar">
                                <div class="col-md-12 text-center">
                                     <button class="btn btn-lg btn-success" id="about-page-text-btn" >Update</button>
                                     <div class="preloader6">
                                       <hr>
                                     </div>
                                 </div>
                                
                          </div>

                        </form>
                       </div>
                    </div>
                  </div>
             </div>