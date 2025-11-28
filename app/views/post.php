<?php include 'global/navbar.php'; ?>
			<!-- post -->
			<div class="container">
				<!--			<div class="row">-->
				<div class="col-md-12 mt-5 p-3 text-center">
					<h1 class="text-primary display-4 text-center"><?php echo $data['postData']->post_title; ?></h1>
					<img src="<?php echo POSTIMAGE.$data['postData']->post_header_image; ?>" alt="Image" class="img-fluid">
					<h5 class="text-primary text-center mt-2">By - <a href="#"><?php echo $data['postData']->user_name; ?></a></h5>
					<div class="text-primary font-italic mb-2 mt-1 text-center">
						<h5>Tags</h5>
						<?php $post_tags = explode(',',$data['postData']->post_tags); ?>
						<?php foreach ($post_tags as $tags): ?>
							<i class="fa fa-tags p-1"><?php echo $tags; ?></i>
						<?php endforeach ?>
					</div>
					
					<div class="mt-4 postContent">
						<p class="text-justify p-4 font-italic"><?php echo $data['postData']->post_body; ?></p>
					</div>
					<hr>
				</div>
				
				<!--			</div>-->
			</div>
			
			<!--End post -->
		
		
		
<?php include 'global/footer.php'; ?>