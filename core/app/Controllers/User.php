<?php
namespace App\Controllers;
use App\Models\User_Model ;

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends BaseController {

	public $user_model,$session,$validaiton;
	protected $helpers = ['form'];
	

	public function __construct() {
		$this->user_model=model(User_Model::class);
		$this->session = service('session');
		$this->validaiton = service('validation');
	}
	
	
	public function index() {
		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|min_length[10]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header', $data);
			$this->load->view('user/register/register', $data);
			$this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$phone    = $this->input->post('phone');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($name, $username, $email, $phone, $password)) {
				
				// user creation ok
				$this->load->view('templates/header', $data);
				$this->load->view('user/register/register_success', $data);
				$this->load->view('templates/footer', $data);
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('templates/header', $data);
				$this->load->view('user/register/register', $data);
				$this->load->view('templates/footer', $data);
				
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
	    $this->session->keepFlashdata('login_redirect');
		
		if ((strtolower($this->request->getMethod()) !== 'post')) {			
            return view('templates/header').view('user/login/login').view('templates/footer');
        }else {
			$validation=service('validation');
			// set validation rules
			$validation->setRules([
				'username' => ['label' => 'Username', 'rules' => 'required|alpha_numeric'],
				'password' => ['label' => 'Password', 'rules' => 'required'],
			]);
			$data = $this->request->getPost(['username', 'password']);
			if (!$validation->run($data)) {
				return view('templates/header').view('user/login/login').view('templates/footer');
			} else {
				$username = $this->request->getPost('username');
				$password = $this->request->getPost('password');
				$check_login=$this->user_model->resolve_user_login($username, $password);
				if ($check_login) {				
					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user($user_id);
					// set session user datas
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
					$_SESSION['is_admin']     = (bool)$user->is_admin;
					// user login ok
					if($this->session->getFlashdata('login_redirect') !== null ){
						return redirect($this->session->getFlashdata('login_redirect'));
					}
					return redirect()->to('admin');
					
					var_dump('here');
					exit;
	
					
				} else {
					
					// login failed
					$data->error = 'Wrong username or password.';
					
					// send error to the view
					return view('templates/header', $data).view('user/login/login', $data).view('templates/footer', $data);
					
				}
			}
		}
		
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('templates/header', $data);
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('templates/footer', $data);
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
	
}