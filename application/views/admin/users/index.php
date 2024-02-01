<div class="graphs">
  <h3><?php echo $page_name;?></h3>
  <hr>
     <div class="xs">
      <form role="form" class="form-horizontal">
            <div class="form-group">
              <label class="col-md-2 control-label">User Email</label>
              <div class="col-md-8">
                <div class="input-group">             
                  <input class="form-control searchOptns" type="text" placeholder="search by email" id="email_name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-8">
                <div class="input-group">             
                  <button type="button" class="btn btn-success searchOptns" id="column_search" name="column_search" >Search</button>
                </div>
              </div>
            </div>
            
      </form>
        <table id="user_table" class="table dt-responsive table-bordered nowrap">
              <thead>
                <th><?php echo lang('sl_no');?></th>
                <th><?php echo lang('user');?> <?php echo lang('name');?></th>
                <th><?php echo lang('email');?></th>
                <th><?php echo lang('image');?></th>
                <th><?php echo lang('action');?></th>
              </thead>

              <tbody>
                 
              </tbody>
        </table>
     </div>
</div>
        

<div class="modal fade" tabindex="-1" role="dialog" id="delete-column">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo lang('delete')." ".lang('user');?></h4>
      </div>
      <div class="modal-body">
        <?php echo lang('delete_confirm');?>
        <input type="hidden" value="" class="delete-action">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('cancel')?></button>
        <button type="button" class="btn btn-primary do-delete-btn"><?php echo lang('yes')?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





    
    
    