<?php include 'Admin_globals/navbar.php'; ?>
<div class="row">
	<div class="col-md-8 text-center" style="margin-left: 290px;">
		<img src="" alt="" class="rounded img-fluid m-2 p-5" width="40%" height="30%" id="pHimg">
		<h3>Edit Post</h3>

		<img src="https://fakeimg.pl/640x360" alt="postHeader" id="ImgPrev" class="img-fluid" width="300" height="400">
		<div class="p-4 m-3">
			<form action="" method="post" class="text-center" enctype="multipart/form-data">
				<div class="form-group">
					<label for="postHeaderImg"><h3>Post Header Image</h3></label>
					<input type="file" name="postHeaderImg" id="imgPost" class="form-control" style="display: none">
				</div>
				<div class="form-group">
					<label for="title"><h3>Title</h3></label>
					<input type="text" name="post_title" id="" class="form-control <?php echo (!empty($data['post_title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post_title']; ?>">

					<span class="invalid-feedback">
						<?php echo $data['post_title_error']; ?>
					</span>
				</div>
				<div class="form-group">
					<label for="tags"><h3>Tags</h3></label>
					<input type="text" name="post_tags" id="" class="form-control <?php echo (!empty($data['post_tags_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post_tags']; ?>">

					<span class="invalid-feedback">
						<?php echo $data['post_tags_error']; ?>
					</span>
				</div>
				<div class="form-group">
					<label for="categorie"><h3>Categorie</h3></label>
					<select name="post_categorie" id="" class="form-control">
						<?php foreach ($data['post_categorie'] as $cate): ?>
							<option value="<?php echo $cate->categorie_id; ?>"><?php echo $cate->categorie_name; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="post_content"><h3>Post Body</h3></label>
					<textarea name="post_content" id="postContent" cols="30" rows="10" class="<?php echo (!empty($data['post_content_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post_content']; ?>"></textarea>

					<span class="invalid-feedback">
						<?php echo $data['post_content_error']; ?>
					</span>
				</div>
			
			
				<input type="submit" name="add_post" id="" class="btn btn-primary" value="Add Post">
			</form>
		</div>
	</div>
</div>


<?php if (isset($data['script'])) {
	echo $data['script'];
} ?>
<?php include 'Admin_globals/footer.php'; ?>

<?php 



?>
