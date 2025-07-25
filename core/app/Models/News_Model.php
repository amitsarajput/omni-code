<?php
namespace App\Models;
use CodeIgniter\Model;

class News_Model extends Model {
    protected $table='news';
    protected $primary='id';
    
	// public function __construct()
    // {
    //         $this->load->database();
    // }
    
    public function all_nums(){
        $query = $this->db->get_where($this->table, array('status' => 1));
        return $query->num_rows();
    }
    public function get($id=null)
    {
        if ($id!=null) {
            $query = $this->db->table($this->table)->getWhere(array('id' => $id));
            return $query->getRowArray(); 
        }
        $query = $this->db->table($this->table)->orderBy('published_on', 'DESC')->get();
        return $query->getResultArray();

    }
    
    public function search($q)
    {
        $q=$this->db->escape_str($q);
        $query = $this->db
                ->select('p.*, c.category_title')
                ->from('press_releases as p')
                ->join('categories as c', 'c.category_id=p.category')
                ->like('p.title', $q)
                ->or_like(['p.sub_title'=> $q, 'p.description'=>$q])
                ->where('status',1)
                ->order_by('id', 'DESC')
                ->get();
        return $query->result_array();
    }
}