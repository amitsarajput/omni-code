<?php
namespace App\Models;
use CodeIgniter\Model;

class Country_Model extends Model {

    private $col_prefix='counrty_';
    protected $table='countries';
    protected $primaryKey='counrty_id';
    
    public function all()
	{
        $query = $this->db->table($this->table)->get();
        return $query->getResultArray();
	}

    public function find($id=null)
    {
        if ($id!=null) {
            $query = $this->db
                    ->where( $this->col_prefix.'id', $id )
                    ->get();
            return $query->getRowArray();            
        }
    }

    public function find_id($str)
    {
        $query = $this->db->table($this->table)->where(array('country_name' => $str))
                    ->or_where(array('country_code' => $str))
                    ->get();;
        $res = $query->getRowArray();
        return $res['brand_id'];
    }   

}