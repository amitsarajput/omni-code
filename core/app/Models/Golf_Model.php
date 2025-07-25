<?php
namespace App\Models;
use CodeIgniter\Model;

class Golf_Model extends Model {

    protected $table='golf', $primary='id';
    
    public function all($type='tournament')
	{
    	$query = $this->db->table($this->table)->getWhere(array('post_type' => $type));
    	return $query->getResultArray();
	}
    public function where($where)
    {
        $query = $this->db->table($this->table)->getWhere($where);
        return $query->getResultArray();
    }
    
}