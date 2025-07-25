<?php
namespace App\Models;
use CodeIgniter\Model;

class Submission_Model extends Model {

    protected $table='submissions', $primary='id';
    protected $allowedFields=['post_meta','post_type','status'];
    
    public function all($type='tyre-registration')
	{
    	$query = $this->db->table($this->table)->orderBy('id', 'DESC')->getWhere(array('post_type' => $type));
    	return $query->getResultArray();
	}
    public function where($where, $limit=null)
    {
        $query = $this->db->table($this->table)->getWhere($where, $limit);
        return $query->getResultArray();
    }

    public function where_json($where, $type)
    {
        $query = $this->db->table($this->table)->select('post_meta')->where('post_type', $type)->get();

        return $query->getRowArray();
    }    
}