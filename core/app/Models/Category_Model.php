<?php
namespace App\Models;
use CodeIgniter\Model;


class Category_Model extends Model {
    
    protected $table='categories';
    protected $primary='category_id';

    public function get( $id=null)
	{
		if ($id!=null ) {
        	$query = $this->db->table($this->table)->getWhere(array('category_id' => $id));
        	return $query->getRowArray();
        }

        $query = $this->db->table($this->table)->getWhere();
        return $query->getResultArray();
	}
    public function get_id($cat)
    {
        $query = $this->db->table($this->table)->getWhere(array('category_slug' => $cat));
        $res = $query->getRowArray();
        return $res['category_id'];
    }
    
}