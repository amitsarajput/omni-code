<?php
namespace App\Models;
use CodeIgniter\Model;

class Tyre_Reviews_Model extends Model {

    private $col_prefix='';
    protected $table='tyre_reviews';
    
    public function tyre_reviews($tyre_id)
    {
        $query = $this->db->table($this->table)->getWhere(array('tyre_id' => $tyre_id));
        $res = $query->getRowArray();
        return $res;
    }
}