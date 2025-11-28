    <section>
      <div class="container-fluid">
        <div class="row mb-5">
          <!-- posts -->
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
           <table class="table table-light table-hover text-center p-3">
            <h3 class="text-center font-weight-bold p-2"><br> POST'S <br><br> <section><a href="<?php echo URLROOT ;?>/Admin/addPost" class="btn btn-primary"><span class="fas fa-plus">&nbsp;</span>Add Post</a></section></h3>
             <thead>
              <tr>
               <th>Id</th>
               <th>Post Image</th>
               <th>Post Title</th>
               <th>Post Categorie</th>
               <th>Post Created At</th>
               <th>Status</th>
               <th>Edit</th>
               <th>Delete</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                <?php //print_r($data['post_data']['0']); ?>
                <?php foreach ($data['post_data'] as $Pdata): ?>
                    <tr>
                    <td><?php echo $Pdata->post_id; ?></td>
                    <td><img src="<?php echo URLROOT; ?>/postImages/<?php echo $Pdata->post_header_image; ?>" alt="Image" width='100' height='50'></td>
                    <td><?php echo $Pdata->post_title; ?></td>
                    <td><?php echo $Pdata->categorie_name; ?></td>
                    <td><?php echo $Pdata->post_created_at ?></td>
                    <?php if ($Pdata->post_status =="Draft"): ?>
                      <td><a href="<?php echo URLROOT ?>/Admin/PublishPost/<?php echo $Pdata->post_id; ?>" class="btn btn-success">Publish</a></td>
                    <?php else: ?>
                      <td><a href="<?php echo URLROOT ?>/Admin/DraftPost/<?php echo $Pdata->post_id; ?>" class="btn btn-warning">Draft</a></td>
                    <?php endif ?>
                    <td><a href="<?php echo URLROOT ?>/Admin/editPost/<?php echo $Pdata->post_id; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="<?php echo URLROOT ?>/Admin/DeletePost/<?php echo $Pdata->post_id; ?>" class="btn btn-danger">Delete</a></td> 
                    </tr>
                <?php endforeach ?>
               </tr>
             </tbody>
           </table> 
          </div>
          <!-- end Post -->
          <!-- Categorie -->
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
           <table class="table table-light table-hover text-center p-3">
            <h3 class="text-center font-weight-bold p-2"><br><br> Categorie <br><br><section><a href="#" data-toggle="modal" data-target="#CategorieModel" class="btn btn-primary"><span class="fas fa-plus">&nbsp;</span>Add Categorie</a></section></h3>
             <thead>
              <tr>
               <th>Id</th>
               <th>Categorie</th>
               <th>Created At</th>
               <th>Delete</th>
               </tr>
             </thead>
             <tbody>
              <?php foreach ($data['cateData'] as $dataCate): ?>
                <tr>
                 <td><?php echo $dataCate->categorie_id; ?></td>
                 <td><?php echo $dataCate->categorie_name; ?></td>
                 <td><?php echo $dataCate->categorie_created_at; ?></td>

                 <?php 

                 //$_SESSION['cateid'] = $dataCate->categorie_id; 
                 //$_SESSION['cateName'] = $dataCate->categorie_name; 

                  ?>
                 <!-- <td><a href='#' data-toggle="modal" data-target="#CategorieUpModel" class="btn btn-primary">Edit</a></td> -->
                 <td><a href="<?php echo URLROOT ?>/Admin/DeleteCategorie/<?php echo $dataCate->categorie_id; ?>" class="btn btn-danger">DELETE</a></td>
               </tr>
              <?php endforeach ?>
             </tbody>
           </table> 
          </div>
          <!--End Categorie -->

          
          <?php if ($_SESSION['user_role']=="Admin"): ?>
            <!-- User -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
             <table class="table table-light table-hover text-center p-3">
              <h3 class="text-center font-weight-bold p-2"><br><br> Users <br><br><section><!-- <a href="#" data-toggle="modal" data-target="#UserAdd" class="btn btn-primary"><span class="fas fa-plus">&nbsp;</span>Add Categorie</a></section></h3> -->
               <thead>
                <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Created At</th>
                 <th>Current Status</th>
                 <th>Status</th>
                 <th>Delete</th>
                 </tr>
               </thead>
               <tbody>
                <?php foreach ($data['usersData'] as $dataUser): ?>
                  <tr>
                   <td><?php echo $dataUser->user_id; ?></td>
                   <td><?php echo $dataUser->user_name; ?></td>
                   <td><?php echo $dataUser->created_at; ?></td>
                   <td><?php echo $dataUser->status; ?></td>
                    <?php if ($dataUser->status =="InActive"): ?>
                      <td><a href="<?php echo URLROOT ?>/Admin/ActiveUser/<?php echo $dataUser->user_id; ?>" class="btn btn-success">Activate</a></td>
                    <?php else: ?>
                        <?php if ($dataUser->user_role =='Admin'): ?>
                          <td><a href="<?php echo URLROOT ?>/Admin/InActiveUser/<?php echo $dataUser->user_id; ?>" class="btn btn-warning disabled">Block</a></td>
                        <?php else: ?>
                          <td><a href="<?php echo URLROOT ?>/Admin/InActiveUser/<?php echo $dataUser->user_id; ?>" class="btn btn-warning">Block</a></td>
                        <?php endif ?>
                        
                    <?php endif ?>
                   <td><a href="<?php echo URLROOT ?>/Admin/DeleteUser/<?php echo $dataUser->user_id; ?>" class="btn btn-danger">DELETE</a></td>
                 </tr>
                <?php endforeach ?>
               </tbody>
             </table> 
            </div>
            <!--End User -->
          <?php endif ?>
         </div>
      </div>
    </section>