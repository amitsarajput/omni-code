<?php
namespace App\Controllers;
use App\Models\Tyres_Model;
use App\Models\Media_Coverage;
use App\Models\Press_Release;

class Seach extends BaseController {
	
	protected $helpers=['form'];
	private $tyres,$media,$press;

	public function __construct()
    {
		$this->tyres = model(Tyres_Model::class);
		$this->media = model(Media_Coverage::class);
		$this->press = model(Press_Release::class);
    }

	public function index()
	{
		$r=array();
		$q= $this->input->post('q');
		$q=strip_tags($q);
		$q=preg_replace('/[^A-Za-z0-9\-]/', ' ', $q);;
		
		if ($q!=null) {
			$q=$this->db->escape_str($q);
			$r['q']=$q;
			$q=strtolower($q);
			$r['tyre']=$this->tyres->search($q);
 			$r['media']=[];//$this->media->search($q);
 			$r['press']=[];//$this->press->search($q);
			if (empty($r['tyre']) && empty($r['media']) && empty($r['press'])) {
			    $q=str_replace(['/'], ' ', $q);
				$q=explode(' ', strtolower($q));
				foreach ($q as $qs) {
					$r['tyre']=array_merge($this->tyres->search($qs), $r['tyre']);
					/*$r['media']=array_merge($this->media->search($qs), $r['media']);
					$r['press']=array_merge($this->press->search($qs), $r['press']);*/
				}
				$r['tyre']=array_unique($r['tyre'], SORT_REGULAR);
				/*$r['media']=array_unique($r['media'], SORT_REGULAR);
				$r['press']=array_unique($r['press'], SORT_REGULAR);*/
			}
			
		} else {
			$r['q']=null;
		}

		//print_r($r['press']);
		$this->load->view('templates/header', compact('r'));
		$this->load->view('seach');
        $this->load->view('templates/footer');
	}

}
