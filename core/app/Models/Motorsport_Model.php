<?php

namespace App\Models;
use CodeIgniter\Model;

class Motorsport_Model extends Model {

    protected $table='motorsport', $primary='id';


	// public function __construct()
    // {
    //         $this->load->database();
    // }

    public function all($type='race')
	{
    	$query = $this->db->table($this->table)->orderBy('id', 'DESC')->getWhere(array('post_type' => $type));
    	return $query->getResultArray();
	}
}