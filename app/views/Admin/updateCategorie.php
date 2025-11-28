
<!-- navbar -->
  <?php include 'Admin_globals/navbar.php'; ?>
<!--end inc navbar -->

<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
  <form action="" method="post">
    <div class="form-group">
      <input type="text" name="catename" id="" class="form-control" value="<?php echo $data['catename'] ?>">
    </div>
    <input type="submit" name="UpdateCate" id="" class="btn btn-primary">
  </form>
</div>
    
  <!-- footers -->
  <?php include 'Admin_globals/footer.php'; ?>
  <!--end  footers and Docs -->