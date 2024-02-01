
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 p-0">
                  <div class="main-header">
                     <h4><?php echo $page_name;?></h4>
                      
                  </div>
               </div>
            </div>


            
             <!-- Our contact row start -->
             <div class="row">
                 <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 default-grid-item">
                    <div class="card portlets portlets-info">
                       <div class="card-header text-uppercase">
                          Our Faq Section
                          <div class="f-right">
                             <a href="javascript:;"><i class="icofont icofont-minus"></i></a>
                             <a href="javascript:;"><i class="icofont icofont-refresh"></i></a>
                             <a href="javascript:;"><i class="icofont icofont-close"></i></a>
                          </div>
                       </div>
                       <div class="card-block">
                        <form action="<?php echo site_url('siteadmin/pages/add_faq'); ?>" method="post">
                          <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">Faq question : </label>
                             </div>
                             <div class="col-md-10">
                                <input type="text" class="form-control"  placeholder="question.." name="faq_question" value="">
                              </div>
                              
                          </div>

                          <div class="form-group row">
                            <div class="col-md-2 text-right">
                               <label class="form-control-label">Faq answer : </label>
                             </div>
                             <div class="col-md-10">
                                <textarea class="form-control" placeholder="answer.." name="faq_answer" rows="16"></textarea>
                                  
                              </div>
                              
                          </div>
                          <div class="form-group row privacy-page-upload-bar">
                                <div class="col-md-12 text-center">
                                     <button class="btn btn-lg btn-success">Add</button>
                                     <div class="preloader6">
                                       <hr>
                                     </div>
                                 </div>
                                
                          </div>

                        </form>
                       </div>
                       <div class="data_table_main">
                        <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
                          <thead>
                            <tr>
                              <th>Sl no</th>
                              <th>question</th>
                              <th>answer</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              if ($faq_data):    
                              $count=1; 
                              foreach ($faq_data as  $faq_datas) { ?>
                            <tr>
                              <td><?php echo $count++; ?></td>
                              <td><?php echo $faq_datas->faq_question; ?></td>
                              <td><?php echo $faq_datas->faq_answer; ?></td>                             
                              <td>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger waves-effect waves-light delete-faq" data-id="<?php echo $faq_datas->faq_id; ?>">
                                  <i class="icofont icofont-delete"></i>
                                </a>
                              </td>
                            </tr>
                            <?php
                               } 
                              endif;
                              ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
             </div>

               
              


              
<!-- This is Delete Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-warning-sign"></span>
          Are you sure you want to delete this Record?
        </div>
      </div>
      <div class="modal-footer ">
        <a href="#" class="btn btn-success delete-link" >
          <span class="glyphicon glyphicon-ok-sign"></span>
          Yes
        </a>
        <a type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
          No
        </a>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
   <!-- /.modal-dialog --> 
</div>
<!-- End of delete modal -->