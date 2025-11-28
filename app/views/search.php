<?php include 'global/navbar.php'; ?>

<!-- post -->
<div class="container">
	<!--			<div class="row">-->
	<h2 class="mt-5 display-4 text-center rndmBgClr">Search</h2>
	<h4 class="text-center p-2">Search Keyword -> <?php echo $data['searchKeyword']; ?></h4>
	<!-- code of php goes here -->
	<?php foreach ($data['searchData'] as $post): ?>
	
	<div class="col-md-9 mt-5 p-3 border mb-1">
		<h1 class="text-primary"><a href="<?php echo URLROOT ?>/posts/viewPost/<?php echo $post->post_id;?>"><?php echo $post->post_title; ?></a></h1>
		<h5 class="text-primary">By - <?php echo $post->user_name; ?></h5>
		<div class="text-primary font-italic mb-2">
			<?php $post_tags = explode(',',$post->post_tags); ?>
			<?php foreach ($post_tags as $tags): ?>
				<i class="fa fa-tags p-1"><?php echo $tags; ?></i>
			<?php endforeach ?>
		</div>
		<img src="<?php echo POSTIMAGE.$post->post_header_image; ?>" alt="" class="img-fluid">
		<div class="pt-4">
			<p class="text-justify"><?php echo substr($post->post_body,0,200) .'....'; ?></p>
		</div>
		<a href="<?php echo URLROOT ?>/posts/viewPost/<?php echo $post->post_id; ?>" class="btn btn-primary p-2"> Read More <i class="p-2 fa fa-chevron-right"></i></a>
		<hr>
	</div>

	<?php endforeach ?>
	
	<!--			</div>-->
</div>

<!--End post -->



<!--		footer-->
<?php include 'global/footer.php'; ?>