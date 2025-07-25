<?php
namespace App\Models;
use CodeIgniter\Model;

class Terrain_Category_Model extends Model {
    
    
    protected $table='terrain_categories';
    public function get( $id=null)
	{
		if ($id!=null) {
        	$query = $this->db->table($this->table)->getWhere(array('ter_cat_id' => $id));
        	return $query->getRowArray();
        }

        $query = $this->db->table($this->table)->get();
        return $query->getResultArray();
	}

    public function get_id($cat)
    {
        $query = $this->db->table($this->table)->getWhere(array('ter_cat_slug' => $cat));
        $res = $query->getRowArray();
        return $res['ter_cat_id'];
    }
}