<?php

namespace App\Models;
use CodeIgniter\Model;

class Tyres_Model extends Model {
    protected $db;
    protected $table='tyres';
    protected $useSoftDeletes = true;
    protected $allowedFields=['title','brand','category','terrain_category','vehicle_type','description','icons','image','features','sizes_extra_columns','slug','external_link','country','legend','tyre_order','search_tag','status','premium_tyre','created_on','updated_on','published_on'];
    protected $deletedField  = 'deleted_at';

    public function get_tyres_frontend( $slug=null, $brand=null, $country=1, $logged_in=false )
	{
        if ($slug!=null ) {
            $getWhere=['slug' => $slug,'brand' => $brand,'country'=>$country, 'deleted_at'=>null, 'status' => 1];
            if ($logged_in) {
                array_pop($getWhere);
            }
        	$query = $this->db->table($this->table)->join('brands as b', 'b.brand_id=tyres.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=tyres.category')
                ->join('terrain_categories as tercat', 'tercat.ter_cat_id=tyres.terrain_category')
                ->join('countries as cntry', 'cntry.country_id=tyres.country')
                ->getWhere($getWhere);
        	return $query->getRowArray();
        }

        $g_where=['brand' => $brand,'country'=>$country, 'deleted_at'=>null, 'status' => 1];
        if ($logged_in) {
            array_pop($g_where);
        }
        $query = $this->db->table($this->table)->select('title,brand,category,terrain_category,image,slug,external_link,search_tag,status,premium_tyre,b.brand_slug,tc.tc_title,tr.ter_cat_title')
                ->join('brands as b', 'b.brand_id=tyres.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=tyres.category')
                ->join('terrain_categories as tr', 'tr.ter_cat_id=tyres.terrain_category')
                //->join('countries as cntry', 'cntry.country_id=tyres.country')
                ->orderBy('tyre_order','ASC')
                ->where($g_where)->get();
        //$query = $this->db->get('tyres');
		//print_r($query->getResultArray());
		//die();
        //return $this->db->last_query();
        return $query->getResultArray();
	}

    public function get_tyres( $slug=null, $brand=null, $country=1, $logged_in=false )
	{
        if ($slug!=null ) {
            $getWhere=['slug' => $slug,'brand' => $brand,'country'=>$country, 'status' => 1];
            if ($logged_in) {
                array_pop($getWhere);
            }
        	$query = $this->db->table($this->table)->join('brands as b', 'b.brand_id=tyres.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=tyres.category')
                ->join('terrain_categories as tercat', 'tercat.ter_cat_id=tyres.terrain_category')
                ->join('countries as cntry', 'cntry.country_id=tyres.country')
                ->getWhere($getWhere);
        	return $query->getRowArray();
        }


        $query = $this->db->table($this->table)->join('brands as b', 'b.brand_id=tyres.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=tyres.category')
                ->join('terrain_categories as tr', 'tr.ter_cat_id=tyres.terrain_category')
                ->join('countries as cntry', 'cntry.country_id=tyres.country')
                ->orderBy('tyre_order','ASC')
                ->getWhere(array('brand' => $brand,'country'=>$country,'status' => 1));

        //return $this->db->last_query();
        return $query->getResultArray();
	}

    public function get_all_tyres($deleted=false)
    {
        $where=['deleted_at'=>null];
        if($deleted===true){ $where=['deleted_at!='=> null]; }
        $query = $this->db->table($this->table)
                //->select('t.*, b.brand_title as brand_name,b.brand_slug, tc.tc_title as category, cntry.country_code')
                //->from('tyres as t')
                ->join('brands as b', 'b.brand_id=tyres.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=tyres.category')
                ->join('countries as cntry', 'cntry.country_id=tyres.country')
                ->where($where)
                ->orderBy('id', 'DESC')->get();
        
                
        return $query->getResultArray();
    }

    public function get_tire($id)
    {
        if ($id!=null){
            $query = $this->db->table($this->table)->join('brands as b', 'b.brand_id=tyres.brand')->getWhere(array('id' => $id));
            return $query->getRowArray();
        }
    }

    public function get_tire_video_section($id)
    {
        if ($id!=null){
            $query = $this->db->table($this->table)->getWhere('tyre_video_section ', array('tyre_id' => $id));
            return $query->row_array();
        }
    }

    public function get_for_reorder($brand,$filter){

        $query = $this->db->table($this->table)->select('t.id, t.title, b.brand_title as brand_name, cntry.country_code')
                ->from('tyres as t')
                ->join('brands as b', 'b.brand_id=t.brand')
                ->join('countries as cntry', 'cntry.country_id=t.country')
                ->where(array('brand'=>$brand, 'search_tag'=>$filter, 'deleted_at'=>null))
                ->order_by('tyre_order', 'ASC')->get();
        return $query->result_array();
    }
    

    public function get_col_value($id, $col)
    {
        $query = $this->db->table($this->table)->select($col)->where('id', $id)->get();
        return $query->getRowArray();
    }

    public function count_tires($data=array())
    {
        if (!empty($data)) {
            $query = $this->db->table($this->table)->getWhere($data);
            return $query->getNumRows();
        }
    }

    public function checkunique($column, $val){
        $query = $this->db->table($this->table)->getWhere(array($column=>$val))->get();
        if($query->getNumRows()){
            return false;
        }else{
            return true;
        }
    }

    public function updatestatus($id)
    {
        $upval='';
        $query = $this->db->table($this->table)->select('status')->where('id', $id)->get();
        $old_res = $query->getRowArray();;
        $old_res['status']==1?$upval='0':$upval='1';

        $nquery=$this->db->table($this->table)->where('id', $id)->set('status',$upval)->update();

        if ($nquery) {
            return $upval;
        }else{
            return "can\'t update";
        }
    }


    public function search($q)
    {
        $q=$this->db->escape_str($q);
        $query = $this->db
                ->select('t.*, b.brand_title as brand_name,b.brand_slug ,tc.tc_title as category, cntry.country_code')
                ->from('tyres as t')
                ->join('brands as b', 'b.brand_id=t.brand')
                ->join('tyre_categories as tc', 'tc.tc_id=t.category')
                ->join('terrain_categories as tr', 'tr.ter_cat_id=t.terrain_category')
                ->join('countries as cntry', 'cntry.country_id=t.country')                
                ->like('t.title', $q)
                ->or_like(['b.brand_title'=> $q,'t.vehicle_type'=> $q,'tc.tc_title'=> $q, 'tr.ter_cat_title'=>$q, 't.description'=>$q, 't.sizes'=>$q, ])
                ->where('status',1)
                ->order_by('id', 'DESC')
                ->get();
        return $query->result_array();
    }
    public function delete($id = null, bool $purge = false)
    {
        if ($id!=null ) {
            $data=['deleted_at'=>date('Y-m-d H:i:s')];
            $result=$this->db->table($this->table)->where('id', $id)->set($data)->update();
            return $result;
        }
    }

    public function restore($id)
    {
        if ($id!=null ) {
            $data=['deleted_at'=>null];
            $result=$this->db->table($this->table)->where('id', $id)->set($data)->update();
            return $result;
        }
    }

    public function delete_force($id)
    {
        $result = $this->db->table($this->table)->where('id', $id)->delete();
        return $result;
    }
    
}