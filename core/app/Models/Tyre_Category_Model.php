<?php
namespace App\Models;
use CodeIgniter\Model;

class Tyre_Category_Model extends Model {

    private $col_prefix='tc_';
    protected $table='tyre_categories';
    

    public function get( $id=null )
	{
        if ($id!=null) {
            $query = $this->db->table($this->table)->where( $this->col_prefix.'id', $id )->get();            
            return $query->getRowArray();            
        }
        $query = $this->db->table($this->table)->get();
        return $query->getResultArray();
	}
}