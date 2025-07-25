<?php
namespace App\Models;
use CodeIgniter\Model;

class Press_Release extends Model {
	// public function __construct()
    // {
    //         $db      = \Config\Database::connect();
    // }
    protected $table   = 'press_releases';

    public function get_press_releases( $category=null, $limit=null, $offset=null )
	{
        if ($category!=null ) {
            $query = $this->db->get_where('press_releases', array('category' => $category, 'status' => 1), $limit, $offset);
            return $query->result_array();
        }
        $query = $this->db->getWhere('press_releases', array('status' => 1), $limit, $offset)->orderBy('published_on', 'DESC');
        return $query->result_array();
	}

    public function get_press_release($slug, $admin=false){
        $wh=array('slug' => $slug, 'status' => 1);
        if($admin){ $wh=array('slug' => $slug); }
        $query = $this->db->get_where('press_releases', $wh,1);
        return $query->row_array();
    }

    public function get_press_release_nums( ){
        $result = $self::where('status', 1)->countAllResults();
        return $result;
    }
    public function get($id=null)
    {
        if ($id!=null) {
            $query = $this->db->table($this->table)->join('categories as c', 'c.category_id=press_releases.category')->get_where(array('id' => $id));
            return $query->getRowArray();
        }
        $query = $this->db->table($this->table)->join('categories as c', 'c.category_id=press_releases.category')->orderBy('published_on', 'DESC')->get();
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