<?php 
/**
 * This IS the post Page Controller
 */
class Posts extends Controller
{
  
  function __construct()
  {
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
    $this->cateModel = $this->model('Category');
  }

  //index Pages 
  public function index()
  {
    $post = $this->postModel->getPost();
    $user = $this->userModel->showAllUsers();
    $categorie = $this->cateModel->getCategories();
    $data = [
      'title' => 'Posts',
      'banner_Header_Text' => 'Post',
      'banner_Sub_Text' => 'All Post',
      'post' => $post,
      'user' => $user,
      'categorie' => $categorie,
      //'max' => $LikedPosts
    ];
    $this->view('posts',$data);
  }

  public function viewPost($postId)
  {
    $postById = $this->postModel->getpostById($postId);
    $categorie = $this->cateModel->getCategories();
    $user = $this->userModel->showAllUsers();
    $data = [
      'title' => $postById->post_title,
      'banner_Header_Text' => $postById->post_title,
      'banner_Sub_Text' => $postById->user_name,
      'postData' => $postById,
      'categorie' => $categorie,
      'user'=>$user
    ];

    $this->view('post',$data);
  }

  public function Search()
  {
    $keyword = filter_var($_GET['search'],FILTER_SANITIZE_STRING);

    $categorie = $this->cateModel->getCategories();

    $search = $this->postModel->searchPost($keyword);

    $data = [
      'banner_Header_Text' => 'Search',
      'banner_Sub_Text' => '',
      'title' => 'Search',
      'searchData' => $search,
      'categorie' => $categorie,
      'searchKeyword' => $keyword
    ];

    $this->view('search',$data);
  }

 public function Categorie($catName)
  {
    $cate = $this->cateModel->getCategoriesByName($catName);
    $dataOfCate = $this->postModel->getCategoriesPost($cate->categorie_id);
    $user = $this->userModel->showAllUsers();
    $categorie = $this->cateModel->getCategories();
    $data = [
      'title' => $catName,
      'banner_Sub_Text' => '',
      'banner_Header_Text' => $catName,
      'catePostData' => $dataOfCate,
      'user' => $this->userModel->showAllUsers(),
      'categorie' => $categorie
    ];

    $this->view('categorie',$data);
  }

  public function Author($AuthId)
  {
    $dataOfAuthor=$this->userModel->findUserById($AuthId);
    $dataOfAuth = $this->postModel->getAuthorPost($AuthId);
    $user = $this->userModel->showAllUsers();
    $categorie = $this->cateModel->getCategories();
    $data = [
      'title' => $dataOfAuthor->user_name,
      'banner_Sub_Text' => '',
      'banner_Header_Text' => $dataOfAuthor->user_name,
      'AuthPostData' => $dataOfAuth,
      'user' => $user,
      'categorie' => $categorie
    ];

    $this->view('Author',$data);
  }
}



?>