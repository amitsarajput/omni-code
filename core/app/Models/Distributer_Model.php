<?php


/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Distributer_Model extends CI_Model {

	protected $table='distributers';
	protected $primary='id';
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->load->database();
	}

	private function getcurtime(){
		return date('Y-m-j H:i:s');
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_distributer_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		//$this->db->where('email', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_distributer_id_from_distributername($username) {
		
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		//$this->db->where('email', $username);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_distributer($user_id) {
		
		$this->db->from($this->table);
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}


   	public function all()
	{
    	$query = $this->db->get($this->table);
    	return $query->result_array();
	}

    public function find($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary => $id));
        return $query->row_array();
    }

    public function where($where)
    {
        $query = $this->db->get_where($this->table, $where);
        return $query->result_array();
    }
}