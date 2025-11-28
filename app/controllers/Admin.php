<?php 

/**
 * Admin Controller 
 */
class Admin extends Controller
{
    /**
     * summary
     */
    public function __construct()
    {   
        if (isLoggedIn()) {
            if (isActive()) {
                $this->postModel = $this->model('Post');
                $this->userModel = $this->model('User');
                $this->cateModel = $this->model('Category');
                $this->subModel = $this->model('Subscriber');
            }
            else{
                echo "<script>alert('Alert".$_SESSION['user_name']."you are blocked please contact admin for more information');</script>";

                redirect('Users/logout');
            }
        }
        else {
        redirect('Admin/');
        }
    }

    public function PublishPost($id){
        $this->postModel->changePostStatus($id,'Publish');
        redirect('Admin/');
    }
    public function DraftPost($id)
    {
        $this->postModel->changePostStatus($id,'Draft');
        redirect('Admin/');
    }

    public function index(){
        if (isLoggedIn()) {
            $allUser = $this->userModel->showAllUsers();
            $userCount = $this->userModel->userCount();
            $subCount = $this->subModel->subCount();
            $postCount = $this->postModel->postCount();
            $postData = $this->postModel->getPost();
            $cateCount = $this->cateModel->cateCount();
            $categorieAll = $this->cateModel->getCategories();
            $data = [
                'actClass' => 'Home',
                'subCount' => $subCount,
                'postCount' => $postCount,
                'cateCount' => $cateCount,
                'post_data' => $postData,
                'userCount'=>$userCount,
                'cateData' => $categorieAll,
                'usersData'=>$allUser
            ];
            $this->view('Admin/index',$data);
        }
        else{
            redirect('users/login');
        }
        
    }

    public function addPost(){
        $categorie = $this->cateModel->getCategories();
        if ($_SERVER['REQUEST_METHOD']=="POST") {

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'actClass' => 'Home',
                'post_categorie' => trim($_POST['post_categorie']),
                'post_title' => trim( $_POST['post_title']),
                'post_content' => trim( $_POST['post_content']),
                'post_tags' => trim($_POST['post_tags']),
                'post_author' => $_SESSION['user_id'],
                'post_title_error' => '',
                'post_categorie_error' => '',
                'post_tags_error' => '',
                'post_content_error' => ''
            ];




            if (empty($data['post_title'])) {
                $data['post_title_error'] = "Please Enter the Title";
            }

            if (empty($data['post_categorie'])) {
                $data['post_categorie_error'] = "Please Enter the categorie";
            }

            if (empty($data['post_content'])) {
                $data['post_content_error'] = "Please Enter the Content";
            }

            if (empty($data['post_tags'])) {
                $data['post_tags_error'] = "Please Enter the tags";
            }

            //make Sure errors are Empty
            if (empty($data['post_title_error']) && empty($data['post_categorie_error']) && empty($data['post_content_error']) && empty($data['post_tags_error'])) 
            {
                //Validate Successs
                
                $data['post_image'] = ImageUpload($_FILES);

                if($this->postModel->AddPost($data)){
                    $data['script'] = "<script>alert('Insert Success');</script>";
                }
                $this->view('Admin/addPost',$data);
            }
            else{
                //Load Views With Errors
                $data['script'] = "<script>alert('Something went Wrong Please Relode Cause -> Empty Feilds');</script>";
                $this->view('Admin/addPost',$data);
            }
        }
        else {
            $data = [
                'actClass' => 'Home',
                'post_categorie' => $categorie,
                'post_title' => '',
                'post_content' => '',
                'post_tags' => '',
                'post_author' => '',
                'post_title_error' => '',
                'post_categorie_error' => '',
                'post_tags_error' => '',
                'post_content_error' => ''
            ];
            $this->view('Admin/addPost',$data);
        }
    }

    public function editPost($id)
    {
        $categorie = $this->cateModel->getCategories();
        $editPost = $this->postModel->getpostById($id);
        if ($_SERVER['REQUEST_METHOD']=="POST") {

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'post_id' => $id,
                'post_categorie' => trim($_POST['post_categorie']),
                'post_title' => trim( $_POST['post_title']),
                'post_content' => trim( $_POST['post_content']),
                'post_tags' => trim($_POST['post_tags']),
                'post_author' => $_SESSION['user_id'],
                'post_title_error' => '',
                'post_categorie_error' => '',
                'post_tags_error' => '',
                'post_content_error' => ''
            ];




            if (empty($data['post_title'])) {
                $data['post_title_error'] = "Please Enter the Title";
            }

            if (empty($data['post_categorie'])) {
                $data['post_categorie_error'] = "Please Enter the categorie";
            }

            if (empty($data['post_content'])) {
                $data['post_content_error'] = "Please Enter the Content";
            }

            if (empty($data['post_tags'])) {
                $data['post_tags_error'] = "Please Enter the tags";
            }

            //make Sure errors are Empty
            if (empty($data['post_title_error']) && empty($data['post_categorie_error']) && empty($data['post_content_error']) && empty($data['post_tags_error'])) 
            {
                //Validate Successs
                
                $data['post_image'] = ImageUpload($_FILES);

                if($this->postModel->EditPost($data)){
                    $data['script'] = "<script>alert('Update Success');</script>";
                }
                $this->view('Admin/editPost',$data);
            }
            else{
                //Load Views With Errors
                $data['script'] = "<script>alert('Something went Wrong Please Relode Cause -> Empty Feilds');</script>";
                $this->view('Admin/editPost',$data);
            }
        }
        else {
            $data = [
                'post_categorie' => $categorie,
                'post_title' => $editPost->post_title,
                'post_content' => $editPost->post_body,
                'post_tags' => $editPost->post_tags,
                'post_image' => $editPost->post_header_image,
                'post_author' => '',
                'post_title_error' => '',
                'post_categorie_error' => '',
                'post_tags_error' => '',
                'post_content_error' => ''
            ];
            $this->view('Admin/editPost',$data);
        }
    }

    public function DeletePost($id)
    {
        if($this->postModel->DeletePost($id)){
            redirect('Admin/');
        }
    }

    public function DeleteCategorie($id)
    {
        if($this->cateModel->deleteCategorie($id)){
            redirect('Admin/');
        }
    }

    public function AddCategorie(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data=[
                'categorie_name'=>trim($_POST['categorie_name']),
                'categorie_created_by'=>$_SESSION['user_id']
            ];
            if (empty($data['categorie_name'])) {
                $data['cate_error'] = "Please Enter the categorie name";
            }

            if (empty($data['cate_error'])) {
                if ($this->cateModel->addCategorie($data)) {
                    $data['script'] = "<script>alert('Insert Of Categorie Successs');</script>";
                    redirect('Admin');
                }
                else{
                    $data['script'] = "<script>alert('Something went Wrong Please Relode Cause -> Empty Feilds');</script>";
                }
            }
        }
        else{
            $this->view('Admin');
        }
    }

    public function updateCategorie($id){
        $cate = $this->cateModel->getCategoriesById($id);
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $data=[
                'categorie_name'=>trim($_POST['categorie_name']),
                'categorie_id'=>$id
            ];
            if (empty($data['categorie_name'])) {
                $data['cate_error'] = "Please Enter the categorie name";
            }

            if (empty($data['cate_error'])) {
                if ($this->cateModel->updateCategorie($data)) {
                    $data['script'] = "<script>alert('Insert Of Categorie Successs');</script>";
                }
                else{
                    $data['script'] = "<script>alert('Something went Wrong Please Relode Cause -> Empty Feilds');</script>";
                }
                $this->view('Admin/updateCategorie',$data);
            }
            $this->view('Admin/updateCategorie',$data);
        }
        else{

            $data=[
                'catename' => $cate->categorie_name 
            ];

            $this->view('Admin/updateCategorie',$data);
            
        }
    }



    public function Profile()
    {
        $userData = $this->userModel->userEmailData($_SESSION['user_email']);
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'userName' => rtrim($_POST['name']),
                'userEmail' => rtrim($_POST['email']),
                'userfblink' => rtrim($_POST['fbLink']),
                'usertwlink' => rtrim($_POST['twiterlink']),
                'userYtlink' => rtrim($_POST['ytLink']),
                'userBio'=>rtrim($_POST['bio']),
                'name_error'=>'',
                'email_error'=>'',
                'fblink_error'=>'',
                'twlink_error'=>'',
                'ytlink_error'=>'',
                'bio_error'=>'',
                'pass_error'=>'',
                'userImage'=>$_FILES['profImg']
            ];

            if (empty($data['userName'])) {
                $data['name_error'] = "Please Enter the name";
            }

           

            if (empty($data['userEmail'])) {
                $data['email_error'] = "Please Enter the Email";
            }

            if (empty($data['userfblink'])) {
                $data['fblink_error'] = "Please Enter the Facebook Link";
            }

            if (empty($data['usertwlink'])) {
                $data['twlink_error'] = "Please Enter the Twitter Link";
            }

            if (empty($data['userYtlink'])) {
                $data['ytlink_error'] = "Please Enter the Youtube Link";
            }

            if (empty($data['userBio'])) {
                $data['bio_error'] = "Please Enter the Bio";
            }


            //make Sure errors are Empty
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['fblink_error']) && empty($data['twlink_error']) && empty($data['ytlink_error']) && empty($data['bio_error']) ) 
            {
                //Validate Successs
                //
                //
                //
                //
                

                if (empty($data['userImage'])) {
                    $data['userImage'] = $userData->user_image;
                }
                else{
                    $data['userImage'] = UploadProfileImage($_FILES);
                }

                $data['userID'] = $userData->user_id;

                if($this->userModel->editUser($data)){
                    $data['script'] = "<script>alert('Update Success');</script>";
                }
                else{
                    $data['script'] ="<script>alert('Something Went Wrong');</script>";
                }
                $this->view('Admin/Profile',$data);
            }
            else{
                //Load Views With Errors
                $data['script'] = "<script>alert('Something went Wrong Please Relode Cause -> Empty Feilds');</script>";
                $this->view('Admin/Profile',$data);
            }
        }
        else{
            $data=[
                'actClass' => 'Profile',
                'userName' => $userData->user_name,
                'userEmail' => $userData->user_email,
                'userfblink' => $userData->user_facebook_link,
                'usertwlink' => $userData->user_twitter_link,
                'userYtlink' => $userData->user_youtube_link,
                'userbio'=>$userData->user_bio,
                'name_error'=>'',
                'email_error'=>'',
                'fblink_error'=>'',
                'twlink_error'=>'',
                'ytlink_error'=>'',
                'bio_error'=>'',
                'userImage'=> $userData->user_image
            ];
            $this->view('Admin/Profile',$data);
        }
    }
}

?>