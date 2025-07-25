<?php
namespace App\Models;
use CodeIgniter\Model;

class Brand_Model extends Model {

    private $col_prefix='brand_';
    protected $table='brands';
    
    

    public function brands( $id=null )
	{

        if ($id!=null) {
            $builder = $this->db->table($this->table)->where( $this->col_prefix.'id', $id );            
            $query = $builder->get();
            return $query->getRowArray();            
        }
        $query = $this->db->table($this->table)->get();

        return $query->getResultArray();
	}

    public function get_id($brand)
    {
        
        $query = $this->db->table($this->table)->getWhere(array('brand_slug' => $brand));
        $res=$query->getRowArray();
        //print_r($res['brand_id']);
        //exit;
        return $res['brand_id'];
    }
    
}