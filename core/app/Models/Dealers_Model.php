<?php
namespace App\Models;
use CodeIgniter\Model;

class Dealers_Model extends Model {
    protected $table='dealers';
    protected $primary='id';
    
    public function all($limit=null, $offset=null )
	{
        $query = $this->db->order_by('published_on', 'DESC')->get_where($this->table, array('status' => 1,'deleted_on' => null), $limit, $offset);
        return $query->result_array();
	}

    public function all_with_unpublished($limit=null, $offset=null )
	{
        $query = $this->db->order_by('published_on', 'DESC')->get_where($this->table, array('deleted_on' => null), $limit, $offset);
        return $query->result_array();
	}

    public function all_trashed($limit=null, $offset=null )
	{
        $query = $this->db->order_by('published_on', 'DESC')->get_where($this->table, array('deleted_on !=' => null), $limit, $offset);
        return $query->result_array();
	}

    // public function find($slug){
    //     $query = $this->db->get_where($this->table, array('slug' => $slug, 'status' => 1),1);
    //     return $query->row_array();
    // }

    public function all_nums(){
        $query = $this->db->get_where($this->table, array('status' => 1,'deleted_on' => null));
        return $query->num_rows();
    }
    

    public function get($id=null)
    {
        if ($id!=null) {
            $query = $this->db->table($this->table)->get_where(array('id' => $id,'deleted_on' => null));
            return $query->getRowArray();
        }
        $query = $this->db->table($this->table)->orderBy('published_on', 'DESC')->where('deleted_on', null)->get();
        return $query->getResultArray();

    }
    
    public function search($q)
    {
        $q=$this->db->escape_str($q);
        $query = $this->db
                ->select('p.*')
                ->from($this->table.' as p')
                ->like('p.title', $q)
                ->where('status',1)
                ->order_by('id', 'DESC')
                ->get();
        return $query->result_array();
    }
}