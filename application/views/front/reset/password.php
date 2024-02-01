<section>
	<div class="container">
		<div class="row">
			<form action="<?php echo site_url('users/change_password');?>/<?= $user_id;?>" method="POST">
                <div class="form-group">
                  <input type="password" name="password" placeholder="Enter new password" class="form-control" required="">
                </div>
                <input type="submit" value="reset" class="btn btn-info">
            </form>
		</div>
	</div>
</section>