<?php


/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Distributer extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */

	public function __construct() {
	    $this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->load->model('Distributer_Model','distributer_model');
		
	}
	
	
	public function index() {
		if ($this->session->userdata('distributer')) { redirect('/dealer'); }
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = [];
		
		// set validation rules
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|min_length[10]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[distributers.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header', $data);
			//$this->load->view('user/register/register', $data);
			$this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$phone    = $this->input->post('phone');
			$password = $this->input->post('password');
			
			if ($this->distributer_model->create_user($name, $username, $email, $phone, $password)) {
				// user creation ok
				$this->load->view('templates/header', $data);
				//$this->load->view('user/register/register_success', $data);
				$this->load->view('templates/footer', $data);
				
			} else {
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				// send error to the view
				$this->load->view('templates/header', $data);
				//$this->load->view('user/register/register', $data);
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

		if ($this->session->userdata('distributer')) { redirect('/dealer'); }
		// create the data object
		$data = [];
		if ($this->input->post('username') && $this->input->post('password')) {
			// set validation rules
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == false) {
				// validation not ok, send validation errors to the view
				$data['error']=['status'=>true,'message'=>'Username or Password is incorrrect.'];
				$this->load->view('templates/header', $data);
				$this->load->view('pages/distributers-login', $data);
				$this->load->view('templates/footer', $data);				
			} else {
				
				// set variables from the form
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$username=strip_tags($username);
				$password=strip_tags($password);
				$username=$this->db->escape_str($username);
				$password=$this->db->escape_str($password);
				
				if ($this->distributer_model->resolve_distributer_login($username, $password)) {
					
					$user_id = $this->distributer_model->get_distributer_id_from_distributername($username);
					$user    = $this->distributer_model->get_distributer($user_id);
					
					// set session user datas
					$_SESSION['distributer']['id']              = (int)$user->id;
					$_SESSION['distributer']['name']            = (string)$user->username;
					$_SESSION['distributer']['display_name']    = (string)$user->name;
					$_SESSION['distributer']['brand']           = (string)$user->brand;
					$_SESSION['distributer']['logged_in']       = (bool)true;
					
					// user login ok
					redirect('/dealer');

					
				} else {
					// login failed
					$data['error']=['status'=>true,'message'=>'Username or Password is incorrrect.'];
					$this->load->view('templates/header', $data);
					$this->load->view('pages/distributers-login', $data);
					$this->load->view('templates/footer', $data);
				}
				
			}
		} else {
			//$data['error']=['status'=>true,'message'=>'Username and Password are required.'];
			$data['page_title']='Dealer Login';
            $data['meta_d']="";
            $data['meta_k']="";
        	$data['sidepanel']=["menu"=>2,"submenu"=>7];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/distributers-login', $data);
			$this->load->view('templates/footer', $data);
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		if (isset($_SESSION['distributer']) && $_SESSION['distributer']['logged_in'] === true) {
			
			// remove session datas
			unset($_SESSION['distributer']);
			
			// user logout ok
			$this->load->view('templates/header');
			$this->load->view('pages/distributers-login');
			$this->load->view('templates/footer');
			
		} else {
			// redirect him to site root
			redirect('dealer-page');
			
		}
		
	}
	
	
	public function not_found()
	{
	    
		$data['page_title']='404 Page Not Found';
    	$this->load->view('templates/header', $data);
        $this->load->view('pages/err404', $data);
        $this->load->view('templates/footer', $data);
	}
	
}