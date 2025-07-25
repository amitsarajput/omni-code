<?php
namespace App\Models;
use CodeIgniter\Model;

class Icon_Model extends Model {

    private $col_prefix='icon_';
    protected $table='icons';
    

    public function get( $id=null )
    {
        $builder=$this->db->table($this->table);
        if (!empty($id) && is_array($id)) {
            $res=array();
            foreach ($id as  $id) { 
                $query = $builder->where($this->col_prefix.'id', $id)->get();
                array_push($res, $query->getRowArray()); 
            }
                return $res;

        }

        if ($id!=null && !is_array($id) ) {
            $query =$builder->where( $this->col_prefix.'id', $id )->get();
            //$query = $this->db->get();
            return $query->getRowArray();            
        }

        $query = $builder->get();
        return $query->getResultArray();
    }
    
}