<?php
namespace App\Models;
use CodeIgniter\Model;

class Tyre_Video_Section_Model extends Model {

    private $col_prefix='';
    protected $table='tyre_video_section';
    protected $db;

	public function __construct()
    {
        $this->db = db_connect();
    }

    public function all( $id=null )
	{

        if ($id!=null) {
            $this->db->where( $this->col_prefix.'id', $id );
            $query = $this->db->get($this->table);
            return $query->row_array();            
        }
        $query = $this->db->get($this->table);

        return $query->result_array();
	}
}