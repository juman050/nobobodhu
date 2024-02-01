
          <div class="header">
            <h1 class="page-title"><?php echo $page_name;?></h1>
         </div>

          <!-- slider row start -->
            <div class="row">
              <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 default-grid-item">
                  <div class="card portlets portlets-info">
                     <div class="card-header text-uppercase">
                        Home Text
                        <div class="f-right">
                           <a href="javascript:;"><i class="fa fa-minus"></i></a>
                           <a href="javascript:;"><i class="fa fa-refresh"></i></a>
                           <a href="javascript:;"><i class="fa fa-close"></i></a>
                        </div>
                     </div>
                     <div class="card-block">
                       <form action="" method="post" id="home-page-text-form">
                        <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">Project Title : </label>
                             </div>
                             <div class="col-md-10">
                                  <input type="text" class="form-control"  placeholder="Project Title.." name="project_title" value="<?php echo $home_data['project-title'];?>">
                              </div>
                              
                          </div>
                          <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">Start project Btn : </label>
                             </div>
                             <div class="col-md-10">
                                  <input type="text" class="form-control"  placeholder="Btn Title.." name="project_btn" value="<?php echo $home_data['project-btn'];?>">
                              </div>
                              
                          </div>
                          
                          <div class="form-group row home-page-upload-bar">
                                <div class="col-md-12 text-center">
                                     <button class="btn btn-lg btn-success" id="home-page-text-btn" >Update</button>
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

            <!-- slider row start -->
            <div class="row">
              <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 default-grid-item">
                  <div class="card portlets portlets-info">
                     <div class="card-header text-uppercase">
                        Slider Text
                        <div class="f-right">
                           <a href="javascript:;"><i class="fa fa-minus"></i></a>
                           <a href="javascript:;"><i class="fa fa-refresh"></i></a>
                           <a href="javascript:;"><i class="fa fa-close"></i></a>
                        </div>
                     </div>
                     <div class="card-block">
                      <form action="" method="post" id="slider-text-form">
                        <div id="slider_text_list">
                          <?php 

                            $slider_texts=json_decode($home_data['slider-text']);
                            if(count($slider_texts)>0){
                              $si=0;
                              foreach ($slider_texts as $stext) { 
                          ?>
                          <div class="form-group row">
                             <div class="col-md-10">
                                  <input type="text" class="form-control" id="InputNormal"  placeholder="Slider text" name="slider_text[]" value="<?php echo $stext;?>">
                              </div>
                              <?php if($si>0){ ?>
                              <div class="col-md-2">
                                  <button class="btn btn-danger btn-icon waves-effect waves-light" ><i class="fa fa-minus"></i></button>
                              </div>
                               <?php } ?>
                          </div>
                          <?php $si++;} }else { ?>
                           <div class="form-group row">
                              <div class="col-md-10">
                                   <input type="text" class="form-control" id="InputNormal"  placeholder="Slider text" name="slider_text[]">
                               </div>
                               
                           </div>
                           <?php } ?>

                        </div>
                        <div class="form-group row">
                              <div class="col-md-2">
                                   <button class="btn btn-info" id="slider_text_list_btn" type="button" >Add More</button>
                               </div>
                              
                        </div>
                        <div class="form-group row slider-upload-bar">
                              <div class="col-md-12 text-center">
                                   <button class="btn btn-lg btn-success" id="update-sdtxt-btn" >Update</button>
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
            
   
  