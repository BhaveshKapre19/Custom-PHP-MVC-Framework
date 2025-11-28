<?php include 'Admin_globals/navbar.php'; ?>
<div class="row">
	<div class="col-md-8 text-center" style="margin-left: 290px;">
		<img src="<?php echo GetImageURLOfUsers($_SESSION['user_name'],$_SESSION['user_id'],$data['userImage']); ?>" alt="" class="rounded img-fluid m-2 p-5" width="40%" height="30%" id="pImg">
		<h3>Edit Profile</h3>
		<div class="p-4 m-3">
			<form action="<?php echo URLROOT ?>/Admin/Profile" method="post" class="text-center" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="profImg" id="imgProf" class="form-control" style="display: none;">
				</div>

				<div class="form-group">m
					<label for="name"><h3>Name</h3></label>
					<input type="text" name="name" id="imgProf" class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['userName']; ?>">
					<span class="invalid-feedback">
						<?php echo $data['name_error']; ?>
					</span>
				</div>
				<div class="form-group">
					<label for="email"><h3>Email</h3></label>
					<input type="text" name="email" id="" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['userEmail']; ?>">
					<span class="invalid-feedback">
						<?php echo $data['email_error']; ?>
					</span>
				</div>
				
				<div class="form-group">
					<label for="fblink"><h3>Facebook</h3></label>
					<input type="text" name="fbLink" id="" class="form-control <?php echo (!empty($data['fblink_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['userfblink']; ?>">
					<span class="invalid-feedback">
						<?php echo $data['fblink_error']; ?>
					</span>
				</div>
				
				<div class="form-group">
					<label for="twiterlink"><h3>Twitter</h3></label>
					<input type="text" name="twiterlink" id="" class="form-control <?php echo (!empty($data['twlink_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['usertwlink']; ?>">
					<span class="invalid-feedback">
						<?php echo $data['twlink_error']; ?>
					</span>
				</div>
				<div class="form-group">
					<label for="name"><h3>Youtube</h3></label>
					<input type="text" name="ytLink" id="" class="form-control <?php echo (!empty($data['ytlink_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['userYtlink'] ?>">
					<span class="invalid-feedback">
						<?php echo $data['ytlink_error']; ?>
					</span>
				</div>
				<div class="form-group">
					<label for="bio"><h3>BIO</h3></label>
					<textarea name="bio" id="user_bio" cols="90" rows="00" class="form-control"><?php 
					echo $data['userbio'];
					?></textarea>
				</div>
				<input type="submit" name="" id="" class="btn btn-primary" value="UPDATE">
			</form>
		</div>
	</div>
</div>

<script><?php if(isset($data['script'])){echo $data['script'];} ?></script>
<?php include 'Admin_globals/footer.php'; ?>