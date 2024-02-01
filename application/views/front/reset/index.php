<section>
	<div class="container">
		<div class="row">
			<form action="<?php echo site_url('users/confirm_reset');?>/<?= $user_id;?>" method="POST">
                <div class="form-group">
                  <input type="text" name="code" class="form-control" required="">
                </div>
                <input type="submit" value="reset" class="btn btn-info">
            </form>
		</div>
	</div>
</section>