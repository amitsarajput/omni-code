<?php

namespace App\Models;
use CodeIgniter\Model;

class Carousel_Model extends Model {

    protected $table='carousels', $primary='id';

    protected array $casts = [
        'post_meta '        => 'json-array',
    ];

	// public function __construct()
    // {
    //         $this->load->database();
    // }

    public function all($type='carousel')
	{
    	$query = $this->db->table($this->table)->getWhere(array('post_type' => $type));
    	return $query->getResultArray();
	}
    
}