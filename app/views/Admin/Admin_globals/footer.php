<!-- footer -->
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row border-top pt-3">
            <div class="col-lg-6 text-center">
              <ul class="list-inline">
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">Prashant</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">about</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">support</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">bolg</a>
                </li>
              </ul>
            </div>
             <div class="col-lg-6 text-center">
              <p>&copy; 2018 COpyright made with <i class="fas fa-heart text-danger"></i> by <span class="text-success">Prashant</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT ?>/ckeditor/ckeditor.js"></script>
    <script src="<?php echo URLROOT ?>/ckfinder/ckfinder.js"></script>
    <script>
      CKEDITOR.replace( 'postContent', {
          filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
          filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          filebrowserWindowWidth: '1000',
          filebrowserWindowHeight: '700'
      } );
</script>
    <script src="<?php echo URLROOT ?>/js/Admin_script.js" type="text/javascript"></script>
    <!-- Scripts -->
  </body>
</html>


<!-- end Document -->