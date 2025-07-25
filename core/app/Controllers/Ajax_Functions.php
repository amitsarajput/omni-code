<?php
namespace App\Controllers;
use App\Models\Tyres_Model ;
use App\Models\Brand_Model ;
use App\Models\Tyre_Category_Model ;
use App\Models\Icon_Model ;
use App\Models\Press_Release ;
use App\Models\Category_Model ;
use App\Models\Media_Coverage ;
use App\Models\Golf_Model ;
use App\Models\Motorsport_Model ;
use App\Models\Carousel_Model ;
use App\Models\Submission_Model ;
use App\Models\News_Model ;
use App\Models\Dealers_Model ;

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Ajax_Functions extends BaseController {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */

	private $id='';
	private $action='';
	private $post_type='';
	private $elements='';
	private $sorted='';
	private $session; 
	private $result=array(); 

	protected $helpers = ['url','form'];

	public function __construct()
	{
		$this->session = service('session');
		$this->logged_in();
	}

	function index(){
			return $this->response->setJSON(['status' => 'success', 'message' => 'AJAX works!']);
	}


	public function item_delete()
	{
		$this->fetch_post_data();
		$this->load_model();
		$result['status']='success';
		$result['message']=$this->m->delete($this->id);
		$this->show_result();
	}


	public function item_delete_force()
	{
		$this->fetch_post_data();
		$this->load_model();
		$result['status']='success';
		$result['message']=$this->m->delete_force($this->id);
		$this->show_result();
	}


	public function item_restore()
	{
		$this->fetch_post_data();
		$this->load_model();
		$result['status']='success';
		$result['message']=$this->m->restore($this->id);
		$this->show_result();
	}

	public function item_clone()
	{
		$this->fetch_post_data();
		$this->load_model();
		$result['status']='success';
		$result['message']=$this->m->clone($this->id);
		$this->show_result();
	}

	public function item_updatestatus()
	{
		$this->fetch_post_data();
		if($this->post_type!=''){
			$this->load_model();
		 	$this->result['status']='success';
		 	$this->result['message']=$this->m->updatestatus($this->id);
	 		$this->show_result();
		}
	}

	public function item_reorder()
	{
		$this->fetch_post_data();
		if($this->post_type!=''){
			$this->load_model();
			$images=$this->m->get_col_value($this->id, 'image');
			$images=json_decode($images['image'], true);
			if ($images['other']!=$this->sorted) {
				$images['other']=$this->sorted;
				$data=['image'=>json_encode( $images )];
				$this->m->update($this->id, $data);
				$this->result['status']='success';
				$this->result['message']='Data Updated.';
			}else{
				$this->result['status']='error';
				$this->result['message']='No Change.';
			}
	 		$this->show_result();

		}
	}

	public function tire_reorder()
	{

		$this->fetch_post_data();
		if($this->post_type!=''){
			$this->load_model();
			$da=$this->sorted;
			$daup=array();
			$len=count($this->sorted);
			for ($i=0; $i < $len; $i++) { 
				$daup[$i]=["id"=>$da[$i], "tyre_order"=>$i];
			}

			$tyre_order=$this->m->update_order($daup);

			$this->result['status']='success';
			$this->result['message']='Data update.';
		}
		$this->show_result();

	}

	public function image_delete()
	{
		$filen=$this->request->getPost('image');
		$filename='storage/tire_images/other/'.$this->request->getPost('image');
		if (file_exists($filename)) {

			if (unlink($filename)) {
				$this->result['status']='success';
				$this->result['message']=$filen.' Deleted.';
			}else{
				$this->result['status']='error';
				$this->result['message']=$filen.' Not Deleted.';		
			}
			
		}else{
				$this->result['status']='error';
				$this->result['message']=$filen. 'Deos not exist in the directory.';				
			}
		$this->show_result();
	}


	private function fetch_post_data()
	{
		if ($this->request->getPost('id')) {
			$this->id = $this->request->getPost('id');
		}
		if ($this->request->getPost('action')) {
			$this->action = $this->request->getPost('action');
		}		
		if ($this->request->getPost('type')) {
			$this->post_type = $this->request->getPost('type');
		}		
		if ($this->request->getPost('element')) {
			$this->elements = $this->request->getPost('element');
		}
		if ($this->request->getPost('sorted')) {
			$this->sorted = $this->request->getPost('sorted');
		}

		if ($this->action=='' || $this->post_type=='') {
			$result['status']='error';
			$result['message'] = $this->action.$this->post_type.'No Data recieved';
			echo json_encode($result);
		}
	}

	private function load_model()
	{
		if ($this->post_type!='') {
			switch ($this->post_type) {
				case 'tire':
					$this->m=model(Tyres_Model::class);	
					break;
				case 'brand':
					$this->m=model(Brand_Model::class);
					break;
				case 'tire-category':
					$this->m=model(Tyre_Category_Model::class);
					break;
				case 'icon':
					$this->m=model(Icon_Model::class);
					break;
				case 'pr':
					$this->m=model(Press_Release::class);
					break;
				case 'cat':
					$this->m=model(Category_Model::class);
					break;
				case 'mc':
					$this->m=model(Media_Coverage::class);
					break;
				case 'terrain':
					$this->m=model(Media_Coverage::class);
					break;
				case 'golf':
					$this->m=model(Golf_Model::class);
					break;
				case 'motor':
					$this->m=model(Motorsport_Model::class);
					break;
				case 'carousel':
					$this->m=model(Carousel_Model::class);
					break;
				case 'submisson':
					$this->m=model(Submission_Model::class);
					break;
				case 'news':
					$this->m=model(News_Model::class);
					break;
				case 'dealer':
					$this->m=model(Dealers_Model::class);
					break;
			}
		}
	}

	public function show_result()
	{
		//return $this->response->setJSON($this->result);
		echo json_encode($this->result);
	}

	public function logged_in()
	{
		if (!($this->session->get('logged_in'))) { redirect('login'); }
	}
}