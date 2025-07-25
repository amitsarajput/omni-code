<?php
namespace App\Models;
use CodeIgniter\Model;

class Media_Coverage extends Model {

    protected $table   = 'media_coverages';

    public function get_media_coverages( $category=null, $limit=null, $offset=null , $admin=false)
	{
        if ($category!=null ) {
            $query = $this->db->get_where('media_coverages', array('category' => $category, 'status' => 1), $limit, $offset);
            return $query->result_array();
        }
        
        if($admin){
            $query = $this->db->order_by('published_on', 'DESC')->get('media_coverages', $limit, $offset);
        }else{
            $query = $this->db->order_by('published_on', 'DESC')->get_where('media_coverages', array('status' => 1) , $limit, $offset);
        }
        return $query->result_array();
	}

    public function get_media_coverage($slug){
        $query = $this->db->get_where('media_coverages', array('slug' => $slug, 'status' => 1),1);
        return $query->row_array();
    }

    public function get_media_coverage_nums( $category=null ){
        if ($category!=null) {
            $query = $this->db->get_where('media_coverages', array('category' => $category, 'status' => 1));
        return $query->num_rows();
        }
        $query = $this->db->get_where('media_coverages', array('status' => 1));
        return $query->num_rows();
    }

    public function get( $id=null)
    {
        if ($id!=null) {
            $query = $this->db->table($this->table)->join('categories as c', 'c.category_id=media_coverages.category')->getWhere(array('id' => $id));
            return $query->getRowArray();
        }
        $query = $this->db->table($this->table)->join('categories as c', 'c.category_id=media_coverages.category')->orderBy('published_on', 'DESC')->get();
        return $query->getResultArray();
    }
    
    public function search($q)
    {
        $q=$this->db->escape_str($q);
        $query = $this->db
                ->select('m.*, c.category_title')
                ->from('media_coverages as m')
                ->join('categories as c', 'c.category_id=m.category')
                ->like('m.title', $q)
                ->or_like(['m.media_house'=> $q])
                ->where('status',1)
                ->order_by('id', 'DESC')
                ->get();
        return $query->result_array();
    }
}