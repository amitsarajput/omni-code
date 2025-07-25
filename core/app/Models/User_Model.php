<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends Model {
	
	protected $table='users';
	
	public function create_user($name, $username, $email, $phone, $password) {
		
		$data = array(
			'name'   		=> $name,
			'username'   	=> $username,
			'email'      	=> $email,
			'phone'      	=> $phone,
			'password'   	=> $this->hash_password($password),
			'created_on' 	=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('users', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {	
		$query=$this->db->table($this->table)->select('password')->where('username', $username)->get();
		$hash = $query->getRow('password');	
		return $this->verify_password_hash($password, $hash);		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		$query=$this->db->table($this->table)->select('id')->where('username', $username)->get();
		return $query->getRow('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		$query=$this->db->table($this->table)->where('id', $user_id)->get();
		return $query->getRow();
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
	
}