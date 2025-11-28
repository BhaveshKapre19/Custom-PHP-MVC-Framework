<?php 

/**
 * User Class Controlls The Login And Register
 */
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register(){
    	//Check for the post Request
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//Process the Form
			
			//Sanatise the post array
			
			$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			
			//init the data 
			$data = [
				'name' => trim($_POST['name']),
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'confirm_password' => trim($_POST['confirm_password']),
				'name_error' => '',
				'password_error' => '',
				'email_error' => '',
				'confirm_password_error' => ''
			];

			//validate Email
			if (empty($data['email'])) {
				$data['email_error'] = "Please Enter the Email";
			}else{
				if ($this->userModel->findUserByEmail($data['email'])) {
					$data['email_error'] = "Email Already Exists";
				}
			}

			//Validate the Name
			if (empty($data['name'])) {
				$data['name_error'] = "Please Enter the Name";
			}

			//Validate the password
			if (empty($data['password'])) {
				$data['password_error'] = "Please Enter the Password";
			}elseif (strlen($data['password']) < 6) {
				$data['password_error'] = "Password Must Be Of 6 Charaters Or More";
			}

			//Validate the Confirm_Password
			if (empty($data['confirm_password'])) {
				$data['confirm_password_error'] = "Please Enter the Confirm_Password";
			}else{
				if ($data['confirm_password'] != $data['password']) {
					$data['confirm_password_error'] = "Password And Confirm Password Not Match";
				}
			}

			//make Sure errors are Empty
			if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) 
			{
				//Validate Successs
				
				//Hash Password 
				$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

				//Register User's Data
				if ($this->userModel->register($data)) {
					flash('register_success','You Are Registerd Successfully');
					redirect('users/login');
				}
				else{
					die("Something Went Wrong");
				}
			}
			else{
				//Load Views With Errors
				$this->view('register',$data);
			}
		}
		else{
			//Init Form
			$data = [
				'name' => '',
				'email' => '',
				'password' => '',
				'confirm_password' => '',
				'name_error' => '',
				'password_error' => '',
				'email_error' => '',
				'confirm_password_error' => ''
			];

			//Load The View
			$this->view('register',$data);
		}
	}

    public function login()
	{
		if (isLoggedIn()) {
			redirect("Admin");
		}
		//Check for the post Request
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//Process the Form
			
			//Sanatise the post array
			
			$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			
			//init the data 
			$data = [
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'password_error' => '',
				'email_error' => '',
			];

			//validate Email
			if (empty($data['email'])) {
				$data['email_error'] = "Please Enter the Email";
			}

			//Validate the password
			if (empty($data['password'])) {
				$data['password_error'] = "Please Enter the Password";
			}

			//Check For user/email
			if ($this->userModel->findUserByEmail($data['email'])) {
				# user Found
			}
			else{
				//User Not Found 
				$data['email_error'] = "No User Found ";
			}
			
			//Make Sure The errors Are Empty
			if (empty($data['email_error']) && empty($data['password_error'])) {
				//Validated
				$loggedInUser = $this->userModel->login($data['email'],$data['password']);
				if ($loggedInUser) {
				 	# create Sessions
				 	$this->createUserSession($loggedInUser);
				}
				else{
					//Load The View With Errors
					$data['password_error'] = "Incorrect Password";
					$this->view('login',$data);
				}
			}
			else{
				//Load The Form With Errors
				$this->view('login',$data);
			}
		}
		else{
			//Init Form
			$data = [
				'email' => '',
				'password' => '',
				'password_error' => '',
				'email_error' => '',
			];

			//Load The View
			$this->view('login',$data);
		}
	}

	//Create Sessions
	public function createUserSession($user)
	{
		$_SESSION['user_id'] = $user->user_id;
		$_SESSION['user_name'] = $user->user_name;
		$_SESSION['user_email'] = $user->user_email;
		$_SESSION['user_role'] = $user->user_role;
		$_SESSION['user_image'] = $user->user_image;
		$_SESSION['user_status'] = $user->status;
		redirect('Admin');
	}

	//logout
	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_email']);
		session_destroy();
		redirect('login');
	}
}



?>