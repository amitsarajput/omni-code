<?php
namespace App\Models;
use CodeIgniter\Model;

class Tyres_XI_Model extends Model {
    
    protected $table="tyres";
    
    public function get($id)
    {
        if (!empty($id)){
            $query = $this->db->where_in('id',$id)->get($this->table);
            return $query->result_array();
        }
    }


    // public function insert($data)
    // {
    //     if (!empty($data)) {
    //         $result=$this->db->set($data)->insert($this->table);
    //         return $result;
    //     }  
    // }


    // public function update($data, $id)
    // {
    //     if (!empty($data)) {
    //         $result=$this->db->set($data)->where('id', $id)->update($this->table);
    //         return $result;
    //     }  
    // }

    
}