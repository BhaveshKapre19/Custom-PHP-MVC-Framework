
<!-- navbar -->
  <?php include 'Admin_globals/navbar.php'; ?>
<!--end inc navbar -->
<div class="modal fade" id="CategorieUpModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Categorie</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="categorie_name">Categorie Name</label>
            <input type="text" name="categorie_name" class="form-control" value="<?php //echo $_SESSION['cateName'] ?>">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update Categorie</button>
      </div>
      </form>
    </div>
  </div>
</div>


    
  <!-- footers -->
  <?php include 'Admin_globals/footer.php'; ?>
  <!--end  footers and Docs -->