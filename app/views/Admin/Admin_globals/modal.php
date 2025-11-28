<!-- modal -->
<div class="modal fade" id="sign-out">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Want To Leave?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        Press Log-Out to Leave
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
        <a href="<?php echo URLROOT ?>/users/logout" class="btn btn-danger">Log-Out</a>
      </div>
    </div>
  </div>
</div>
<!-- end -->


<!-- modal  Add Categorie-->
<div class="modal fade" id="CategorieModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Categorie</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?php echo URLROOT; ?>/Admin/AddCategorie" method="post">
          <div class="form-group">
            <label for="categorie_name">Categorie Name</label>
            <input type="text" name="categorie_name" class="form-control" >
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Add Categorie</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end Add Categorie-->


<!-- modal  Update Categorie-->
<!-- <div class="modal fade" id="CategorieUpModel">
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
</div> -->
<!-- end Update Categorie-->