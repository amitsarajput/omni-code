<?php

namespace App\Controllers;
use App\Models\Tyres_Model;
use App\Models\Brand_Model ;
use App\Models\Tyre_Category_Model ;
use App\Models\Icon_Model ;
use App\Models\Excels_Model ;
use App\Models\Tyre_Reviews_Model ;
use App\Models\Press_Release ;
use App\Models\Category_Model ;
use App\Models\Media_Coverage ;
use App\Models\Country_Model ;
use App\Models\Terrain_Category_Model ;
use App\Models\Golf_Model ;
use App\Models\Motorsport_Model ;
use App\Models\Carousel_Model ;
use App\Models\Tyres_XI_Model ;
use App\Models\Submission_Model ;
use App\Models\News_Model ;
use App\Models\Dealers_Model ;
use CodeIgniter\Files\File;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * User class.
 * 
 * @extends CI_Controller
 */

class Admin extends BaseController {

	private $tyres_model,$brand_model,$tc_model,$icon_model,$excels_model,$reviews_model,$press_release,$category_model,$media_coverage,$country_model,$terrain,$golf,$motor,$carousel,$export_import,$submission,$news,$dealers,$session;
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	private $data=array();
	private $views=array();
	
	protected $helpers = ['url','form'];

	public function __construct()
	{
		$this->session = service('session');
		if (!($this->session->get('logged_in'))) { return redirect->to('login'); }
			$this->tyres_model 		=			model(Tyres_Model::class);
			$this->brand_model 		=			model(Brand_Model::class);
			$this->tc_model 		=			model(Tyre_Category_Model::class);
			$this->icon_model 		=			model(Icon_Model::class);
			$this->excels_model 	=			model(Excels_Model::class);
			$this->reviews_model 	=			model(Tyre_Reviews_Model::class);
			$this->press_release 	=			model(Press_Release::class);
			$this->category_model 	=			model(Category_Model::class);
			$this->media_coverage 	=			model(Media_Coverage::class);
			$this->country_model 	=			model(Country_Model::class);
			$this->terrain 			=			model(Terrain_Category_Model::class);
			$this->golf 			=			model(Golf_Model::class);
			$this->motor 			=			model(Motorsport_Model::class);
			$this->carousel 		=			model(Carousel_Model::class);
			$this->export_import 	=			model(Tyres_XI_Model::class);
			$this->submission 		=			model(Submission_Model::class);
			$this->news 			=			model(News_Model::class);
			$this->dealers 			=			model(Dealers_Model::class);
		
		//$this->load->library('form_validation');
		//$this->load->library('upload');
		//$this->form_validation->set_error_delimiters('', '');		
	}

	public function tire_export($id)
    {
    	$this->load->helper('file');
        $this->load->helper('download');
    	$tyre=$this->export_import->get($id);
    	//Export Zip for all the images.
    	$this->load->library('zip');
    	$all_images=[];
    	$all_images=json_decode( $tyre[0]['image'],TRUE );
    	$all_images['features']=[];
    	$features=json_decode($tyre[0]['features'],TRUE);
    	foreach ($features as $key => $value) {
    		$image=$value['image'];
			array_push($all_images['features'], $image);
    	}

    	foreach ($all_images as $key => $data) {
    		if ($key==='featured') {
    			$path="uploads/tire_images/".$data;
    			$this->zip->read_file($path);

    		}else {
    			if ($key==='other') {
    		    	$path="uploads/tire_images/other/";
    		    }else if ($key==='features') {
    		    	$path="uploads/features/";
    		    }
    		    foreach ($data as $value) {
    		    	$this->zip->read_file($path.$value);
    		    }
    		}
    	}
    	$file=$tyre[0]['slug'];

		$tyre=json_encode($tyre);
		$this->zip->add_data($file.".json", $tyre);
    	$this->zip->download($file.".zip");
    }

    public function tire_import($id)
    {    	
		$this->data['id']=$id;
		$this->data['tires']=$this->tyres_model->get_tire($id);
		$this->data['extra_scripts']=['components/bs-datatable.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','tires-import','templates/footer'];

    	if ($this->input->post('botcheck')==='') {
    		$file=$_FILES;
			if ($file['tyre-import']['error']){
				$this->data['error']=['status'=>true,'message'=>'Please select file.'];
				$this->load_view();
			}
			else if (!($file['tyre-import']['type'] =='application/json')){
			    $this->data['error']=['status'=>true,'message'=>'Please upload in JSON format.'];
				$this->load_view();
			}
			else if ($file['tyre-import']['size'] > 10485760) {
			    $this->data['error']=['status'=>true,'message'=>'Please upload under 10MB.'];
				$this->load_view();
			}
			else{
				$json = file_get_contents($file['tyre-import']['tmp_name']);
				$obj  = json_decode($json,TRUE);
				$obj=$obj[0];
				if (!empty($obj) && $id) {
					unset($obj['id']);
					$res=$this->export_import->update($obj, $id);
					if ($res){
						$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
						redirect('admin/tire/import/'.$id);
					}else{
						$this->data['error']=['status'=>true,'message'=>'Error: Can\'t update data'];
						$this->load_view();
					}
				}else{
						$this->data['error']=['status'=>true,'message'=>'Error: File is empty.'];
						$this->load_view();
				}
			}		
		}
		else{
			$this->load_view();
		}
    }

	public function index() 
	{
		if (!($this->session->get('logged_in'))) { redirect('login'); }
	}

	private function load_view()
	{
		$output = '';
		foreach ($this->views as $view) {
			$output .= view('admin/'.$view, $this->data);
		}
		echo $output;
	}

	public function upimage($path, $key, $over=false)
	{
		$data=[];
		$img=$this->request->getFile($key);
		if ($img->isValid() && ! $img->hasMoved()){
			$newName=$img->getName();
			$upimage=$img->move('storage/'. $path, $newName);
			if ($upimage){
				$data = array('success'=>true, 'result' => $newName);
			}else{
				$data = array('success'=>false, 'result' => $img->getError());
			}
		}else {
			$data = array('success'=>false, 'result' => 'No file');
		}
		return $data;
	}

	public function tire()
	{
		$this->data['tires']=$this->tyres_model->get_all_tyres();
		$this->data['extra_stylesheets']=['components/bs-datatable.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','tires','templates/footer'];
		$this->load_view();
		// return view('admin/templates/header',$this->data)
		// 	.view('admin/templates/admin-menu',$this->data)
		// 	.view('admin/tires',$this->data)
		// 	.view('admin/templates/footer',$this->data);
	}

	public function tire_deleted()
	{

		$this->data['tires']=$this->tyres_model->get_all_tyres(true);
		$this->data['extra_stylesheets']=['components/bs-datatable.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','tires-deleted','templates/footer'];
		$this->load_view();

	}
	
	public function tire_edit($id)
	{

		$this->data['extra_stylesheets']=['jquery-ui.css','components/select2.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js','components/select2.full.js','admin-omni.js'];

		$this->data['tires']=$this->tyres_model->get_tire($id);		
		$this->data['brands']=$this->brand_model->brands();		
		$this->data['countries']=$this->country_model->all();		
		$this->data['tyre_categories']=$this->tc_model->get();		
		$this->data['terrains']=$this->terrain->get();	
		$this->data['icons']=$this->icon_model->get();
		$this->views=['templates/header','templates/admin-menu','tires-edit','templates/footer'];
		$this->load_view();
	}

	public function tire_update($id)
	{
		$validation = service('validation');
		$this->data['extra_stylesheets']=['jquery-ui.css','components/select2.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js','components/select2.full.js','admin-omni.js'];

		$this->data['tires']=$this->tyres_model->get_tire($id);		
		$this->data['brands']=$this->brand_model->brands();		
		$this->data['tyre_categories']=$this->tc_model->get();
		$this->data['countries']=$this->country_model->all();		
		$this->data['terrains']=$this->terrain->get();	
		$this->data['icons']=$this->icon_model->get();
		$this->views=['templates/header','templates/admin-menu','tires-edit','templates/footer'];
		if ($this->request->getPost('submit')) {
			$oldvals=$this->tyres_model->get_tire($id);
			
			$validation->setRule('title', 'Title', 'trim|required|min_length[4]');
			$validation->setRule('brand', 'Brand', 'trim|required|numeric');
			$validation->setRule('category', 'Category', 'trim|required|numeric');
			$validation->setRule('terrain_category', 'Terrain Category', 'trim|required|numeric');
			$validation->setRule('vehicle_type.*', 'Vehicle Type', 'trim|required');
			$validation->setRule('icons.*', 'Icons', 'trim|required');
			$validation->setRule('slug', 'Slug', 'trim|required|alpha_dash|min_length[4]|is_unique[tyres.slug,tyres.slug,'.$oldvals['slug'].']');
			$validation->setRule('external_link', 'External Link', 'trim');
			$validation->setRule('description', 'Description', 'trim');
			$validation->setRule('country', 'Country', 'trim|required|numeric');
			$validation->setRule('search_tag', 'Search Tag', 'trim|required');
			$validation->setRule('premium_tyre', 'Search Tag', 'permit_empty');

			//$is_unique =  '';
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->data['error']=['status'=>true,'message'=>$validation->listErrors()];
				$this->load_view();
			}else{
				$post = $validation->getValidated();
				$post['title']=esc($post['title']);
				$post['external_link']=esc($post['external_link']);
				$post['vehicle_type']=implode("/", $post['vehicle_type']);
				$post['icons']=json_encode( $post['icons'] );
				if(isset($post['premium_tyre']) && $post['premium_tyre']==='on'){
				    $post['premium_tyre']=true;
				}else{ $post['premium_tyre']=null; }
				$updata=array();
				foreach ($post as $key => $value) {
					if ($post[$key]!=$oldvals[$key]) {
						$updata[$key]=$value;
					}
				}
				if (empty($updata)) {
					return redirect()->back();
				}
				$update=$this->tyres_model->update($id,$updata);
				if ($update) {
					$this->session->setFlashData(['status'=>'success', 'message'=>"Data updated."]);
					return redirect()->to('admin/tire');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Data can\'t be updated.'];
					$this->load_view();
				}
			}
		}else{
			$this->load_view();
		}
	}

	public function tire_new()
	{
		$this->data['extra_stylesheets']=['jquery-ui.css','components/select2.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js','components/select2.full.js','admin-omni.js'];
		
		$this->data['brands']=$this->brand_model->brands();		
		$this->data['tyre_categories']=$this->tc_model->get();		
		$this->data['terrains']=$this->terrain->get();	
		$this->data['countries']=$this->country_model->all();			
		$this->data['icons']=$this->icon_model->get();
		$this->views=['templates/header','templates/admin-menu','tires-add','templates/footer'];

		$this->load_view();
	}

	public function tire_save()
	{		
		$validation = service('validation');
		$this->data['extra_stylesheets']=['jquery-ui.css','components/select2.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js','components/select2.full.js','admin-omni.js'];
		
		$this->data['brands']=$this->brand_model->brands();		
		$this->data['tyre_categories']=$this->tc_model->get();		
		$this->data['terrains']=$this->terrain->get();	
		$this->data['countries']=$this->country_model->all();			
		$this->data['icons']=$this->icon_model->get();
		$this->views=['templates/header','templates/admin-menu','tires-add','templates/footer'];
		
		if ($this->input->getPost('submit')) {

			$validation->setRule('title', 'Title', 'trim|required|min_length[4]');
			$validation->setRule('brand', 'Brand', 'trim|required|numeric');
			$validation->setRule('category', 'Category', 'trim|required|numeric');
			$validation->setRule('terrain_category', 'Terrain Category', 'trim|required|numeric');
			$validation->setRule('vehicle_type.*', 'Vehicle Type', 'trim|required');
			$validation->setRule('icons.*', 'Icons', 'trim|required');
			$validation->setRule('slug', 'Slug', 'trim|required|alpha_dash|min_length[4]|is_unique[tyres.slug,tyres.slug,'.$oldvals['slug'].']');
			$validation->setRule('external_link', 'External Link', 'trim');
			$validation->setRule('description', 'Description', 'trim');
			$validation->setRule('country', 'Country', 'trim|required|numeric');
			$validation->setRule('search_tag', 'Search Tag', 'trim|required');
			$validation->setRule('premium_tyre', 'Search Tag', 'permit_empty');
		
			$post=$this->request->getPost();
			unset($post['submit']);

			if (!$validation->run($post)) {
				$this->data['error']=['status'=>true,'message'=>$validation->listErrors()];
				$this->load_view();
			}else{
				$post = $validation->getValidated();
				$post['title']=esc($post['title']);
				$post['vehicle_type']=implode("/", $post['vehicle_type']);
				$post['icons']=json_encode( $post['icons'] );
				
				if(isset($post['premium_tyre']) && $post['premium_tyre']==='on'){
					$post['premium_tyre']=true;
				}else{ $post['premium_tyre']=null; }
				
				if ($post['slug']==null) {
					$post['slug']=url_title($post['title'], 'dash', TRUE);
				}

				$updata=array();
				foreach ($post as $key => $value) {				
						$updata[$key]=$value;
				}

				$update=$this->tyres_model->insert($updata);
				if ($update) {
					$this->session->setFlashData(['status'=>'success', 'message'=>"Data updated."]);
					return redirect()->to('admin/tire');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Data can\'t be updated.'];
					$this->load_view();
				}
			}
		}else{
			$this->load_view();
		}
	}

	public function tire_images($id)
	{
		$this->data['extra_stylesheets']=['components/bs-filestyle.css', 'jquery-ui.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js', 'components/bs-filestyle.js','admin-omni.js'];
		$this->data['tires']=$this->tyres_model->get_tire($id);	

		$this->data['brands']=$this->brand_model->brands();
		$this->views=['templates/header','templates/admin-menu','tires-images','templates/footer'];	
		//If form is submited
		if (!$this->request->is('post')) {
			$this->load_view();
		}else {
			if ($this->request->getPost('submit')) {
				$replace=false;
				if ($this->request->getPost('replace')) {
					$replace=TRUE;
				}
	
				$old_images=json_decode( $this->data['tires']['image'], true );
				$upfiles=array();
				
				$featured=$this->upimage('tire_images/', 'featured', true);
				if ($featured['success']){
					$upfiles['featured']=$featured['result'];
				}
				
				$files = $this->request->getFileMultiple('other');
				$i=0;
				//$upfiles['other']=[];
				foreach ($files as $file) {
					if ($file->getSize() == 0 || $file->getError() !== UPLOAD_ERR_OK) { $i++; continue; }
					$other=$this->upimage('tire_images/other/', 'other.'.$i, true);
					if ($other['success']){ $upfiles['other'][]=$other['result']; }
					$i++;
				}
				
				if (!$replace){
					$upfiles['other']=array_merge($old_images['other']??array(), $upfiles['other']??[]); 
				}
				
				$dainsert=array();
				if (isset($upfiles['featured'])){
					$dainsert['featured']=$upfiles['featured'];
				}else{
					$dainsert['featured']=$old_images['featured'];
				}

				if (isset($upfiles['other'])){
					$dainsert['other']=$old_images['other'];
				}else{
					$dainsert['other']=$old_images['other'];
				}


				$update_res=$this->tyres_model->update($id, ['image'=>json_encode($dainsert)]);

				if ($update_res){
					$this->session->setFlashData(['status'=>'success', 'message'=>"Files updated."]);
					return redirect()->to("admin/tire/images/$id");
				}else{
					$this->data['error']=['status'=>true, 'message'=>'Files can not be uploaded.'];
					$this->load_view();
				}
				
				
			}else{
				$this->load_view();
			}
		}
	}

	public function tire_features($id)
	{
		if ($this->request->is('post')) {
			$validation = service('validation');
	    	$oldvals=$this->tyres_model->get_tire($id);
	    	$oldvals=json_decode( $oldvals['features'], true );

	    	$validation->setRule('feature_title.*', 'Title', 'trim|required|min_length[4]');
	    	$validation->setRule('feature_desc.*', 'Description', 'trim|required|min_length[4]');
			$post=$this->request->getPost();
	    	if ($validation->run($post)) {
	    		//text data
	    		$da=array();
		    	$pos=$this->request->getPost();
		    	unset($pos['submit']);
		    	foreach ($pos as $key => $value) {
		    		$key=="feature_title"? $dakey='title':$dakey='description';
		    		if (is_array($value)) {
		    			$e=0;
		    			foreach ($value as $val) {
		    				$da[$e][$dakey]=esc($val);
		    				$e++;
		    			}
	    			}
	    		}

				// $files = $_FILES;

				// for($i=0; $i< count($files['feature_image']['name']); $i++)
			    // {
			    //     $_FILES['feature_image']['name']= $files['feature_image']['name'][$i];
			    //     $_FILES['feature_image']['type']= $files['feature_image']['type'][$i];
			    //     $_FILES['feature_image']['tmp_name']= $files['feature_image']['tmp_name'][$i];
			    //     $_FILES['feature_image']['error']= $files['feature_image']['error'][$i];
			    //     $_FILES['feature_image']['size']= $files['feature_image']['size'][$i];

			    //     if ($_FILES['feature_image']['name']!='') {
			    //     	$data = $this->upimage('features/', 'feature_image', true);
				//         if ($data['success']) {
				//         	$da[$i]['image']=$data['result']['file_name'];
				// 		}else{
				// 			$da[$i]['image']=$oldvals[$i]['image'];
				// 		}
			    //     }else{
			    //     	$da[$i]['image']=$oldvals[$i]['image'];
			    //     }
			    // }
				$files = $this->request->getFileMultiple('feature_image');
				$i=0;
				foreach ($files as $file) {
					$da[$i]['image']=$oldvals[$i]['image'];
					if ($file->getSize() == 0 || $file->getError() !== UPLOAD_ERR_OK) { $i++; continue; }
					$features_images=$this->upimage('features/', 'feature_image.'.$i, true);
					if ($features_images['success']){ 
						$da[$i]['image']=$features_images['result']; 
					}
					$i++;
				}
				

				$update_res=$this->tyres_model->update($id, ['features'=>json_encode($da)]);
				if ($update_res) {
					$this->session->setFlashData(['status'=>'success', 'message'=>"Data updated."]);
	    			return redirect()->to('admin/tire/');
				}else{
					$this->session->setFlashData(['status'=>'error', 'message'=>"Data can not be uploaded."]);
	    			return redirect()->to('admin/tire/features/$id');
				}

	    	}else{
	    		//relaod with errors
	    		$this->data['extra_stylesheets']=['components/bs-filestyle.css'];
				$this->data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js'];

				$this->data['tires']=$this->tyres_model->get_tire($id);		
				$this->data['brands']=$this->brand_model->brands();
				
				$this->views=['templates/header','templates/admin-menu','tires-features','templates/footer'];	
				$this->load_view();
	    	}
	    	
	    }else{
	    	$this->data['extra_stylesheets']=['components/bs-filestyle.css'];
			$this->data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js'];

			$this->data['tires']=$this->tyres_model->get_tire($id);		
			$this->data['brands']=$this->brand_model->brands();	
			
			$this->views=['templates/header','templates/admin-menu','tires-features','templates/footer'];	
			$this->load_view();

	    }
	}

	public function tire_sizes($id)
	{
		$sizes_file='';

		if ($this->input->post('submit')) {

			$post=$this->input->post();
			unset($post['submit']);
			if (!empty($post['sizes_extra_columns'])) {
				$sizes_extra_columns=json_encode( $post['sizes_extra_columns'] );
				$this->tyres_model->update($id, ['sizes_extra_columns'=>$sizes_extra_columns, 'updated_on'=>date("Y-m-d H:i:s")]);
			}else{
				$this->tyres_model->update($id, ['sizes_extra_columns'=>null, 'updated_on'=>date("Y-m-d H:i:s")]);
			}

			if (!empty($post['legend'])) {
				$legend=html_escape( trim($post['legend']) );
				$this->tyres_model->update($id, ['legend'=>$legend, 'updated_on'=>date("Y-m-d H:i:s")]);
			}else{
				$this->tyres_model->update($id, ['legend'=>null, 'updated_on'=>date("Y-m-d H:i:s")]);
			}
			

			$tire=$this->tyres_model->get_tire($id);
	    	$oldvals=$tire['sizes'];

	    	$files = $_FILES;
	    	//Uploading file
	    	if($files['sizes']['error'] == UPLOAD_ERR_OK) {
	    		$upfiles=array();
	    		$path='tire_sizes/';
	    		$key='sizes';

		    	$_FILES[$key]['name']= $files[$key]['name'];
		        $_FILES[$key]['type']= $files[$key]['type'];
		        $_FILES[$key]['tmp_name']= $files[$key]['tmp_name'];
		        $_FILES[$key]['error']= $files[$key]['error'];
		        $_FILES[$key]['size']= $files[$key]['size'];
		        $data = $this->upimage($path, $key, true);

		        if ($data['success']) {
		        	$upfiles[$key]=$data['result'];
		        	//Check xlsx
		        	if ($upfiles[$key]['file_ext']==='.xlsx') {
		        		//Reading File
	        			$inputFileName = './uploads/'.$path.$upfiles[$key]['file_name'];
	        			$sizes=$this->excels_model->readfile($inputFileName);

	        			if (!empty($sizes)) {
	        				$sizes=json_encode( $sizes );

	        				if ($oldvals!==$sizes) {
	        					$update_res=$this->tyres_model->update($id, ['sizes'=>$sizes, 'updated_on'=>date("Y-m-d H:i:s")]);

								if ($update_res) {
									$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
									//Delete uploaded file.
									unlink($inputFileName);
					    			redirect("admin/tire");
								}else{
									//Technical DB Error.
									$this->session->set_flashdata(['status'=>'error', 'message'=>"Data can not be updated."]);
					    			redirect("admin/tire/sizes/$id");
								}

	        				}else{
	        					//Same data uploaded.
								$this->session->set_flashdata(['status'=>'error', 'message'=>"No change in data."]);
				    			redirect("admin/tire/sizes/$id");
								}
	        				
	        			}else{
	        				//Error in format.
				        	$this->session->set_flashdata(['status'=>'error', 'message'=>"Error in format."]);
			    			redirect("admin/tire/sizes/$id");
	        			}

		        	}

		        }else{
		        	//Upload Error 
		        	$this->session->set_flashdata(['status'=>'error', 'message'=>"Can not upload file."]);
	    			redirect("admin/tire/sizes/$id");
		        }
		    }else{
	        	//Error no file selected.
	    		$this->session->set_flashdata(['status'=>'error', 'message'=>"No files selected."]);
	    		redirect("admin/tire/sizes/$id");
	    	}

		}else{
	    		//relaod with errors
	    		$data['extra_stylesheets']=['components/bs-filestyle.css'];
				$data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js'];

				$data['tires']=$this->tyres_model->get_tire($id);
				$data['oldvals']=json_decode( $data['tires']['sizes'], true );
				if (!empty($data['oldvals'])) {
					$file_xlsx=$this->excels_model->createfile($data['oldvals'], $data['tires']['slug'], array_keys($data['oldvals'][0]));
					$data['tires']['oldsizes']=$file_xlsx;						
				}else{
					$data['tires']['oldsizes']='No-File.xlsx';
				}

				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/admin-menu', $data);
				$this->load->view('admin/tires-sizes', $data);
				$this->load->view('admin/templates/footer', $data);

	    	}
	}
	
	public function tire_reviews($id){
	    $data['tires']=$this->tyres_model->get_tire($id);
	    $data["reviews"]=$this->reviews_model->tyre_reviews($id);
	    $v_reviews=json_decode($data["reviews"]['video_reviews'], true);
	    
	    //If the form posted
	    if($this->input->post('submit')){
	        $post=$this->input->post('review');
			//print_r($post);
	        $files = $_FILES;
			unset($post['submit']);
			
			$this->form_validation->set_rules('review[0][url]', 'URL', 'trim|required|min_length[4]');
			
	    	if ($this->form_validation->run()) {
    			//text data cleaning
        		
        		
    		
			$da=array();
    	    	foreach ($post as $key=>$value) {
    	    	    $da[$key]=[];
    	    		if (is_array($value)) {
    	    		    foreach ($value as $inkey=>$inval) {
    	    				$da[$key][$inkey]=html_escape($inval);
    	    				
    	    			}
        			}
        		}
			
			
			
        		
        		for($i=0; $i< count($files['review']['name']); $i++)
			    {
			        $_FILES['review']['name']= $files['review']['name'][$i]['poster'];
			        $_FILES['review']['type']= $files['review']['type'][$i]['poster'];
			        $_FILES['review']['tmp_name']= $files['review']['tmp_name'][$i]['poster'];
			        $_FILES['review']['error']= $files['review']['error'][$i]['poster'];
			        $_FILES['review']['size']= $files['review']['size'][$i]['poster'];

			        if ($_FILES['review']['name']!=='') {
			        	$image_data = $this->upimage('video-reviews-posters/', 'review', true);
				        if ($image_data['success'] && $image_data['result']['file_name']!==null) {
				        	$da[$i]['poster']=$image_data['result']['file_name'];
						}else{
							$da[$i]['poster']=$v_reviews[$i]['poster'];
						}
			        }else{
			        	$da[$i]['poster']=$v_reviews[$i]['poster'];
			        }
			    }
			    
			
			    
			    $update_res=$this->reviews_model->review_update($id, ['video_reviews'=>json_encode($da)]);
				if ($update_res) {
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
	    			redirect("admin/tire/reviews/$id");
				}else{
					$this->session->set_flashdata(['status'=>'error', 'message'=>"Data can not be uploaded."]);
	    			redirect("admin/tire/reviews/$id");
				}
			    
			    
        		
	    	}
	    	
			
	    }
	    else
	    {
	        //print_r($data["reviews"]);
	        //die();
    		$data['extra_stylesheets']=['components/bs-filestyle.css'];
    		$data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js','repeater-field.min.js','repleater-field-init.js'];
    
    		$this->load->view('admin/templates/header', $data);
    		$this->load->view('admin/templates/admin-menu', $data);
    		$this->load->view('admin/tire-reviews', $data);
    		$this->load->view('admin/templates/footer', $data);
	    }
	    
	}
	
	
	public function tire_video_section($id)
	{
	    if ($this->input->post('submit')) {
        	$this->form_validation->set_rules('content', 'Content', 'trim');
        	if ($this->form_validation->run()==false) {
				$data['error']=['status'=>true,'message'=>validation_errors()];
			}else{
				$post=$this->input->post();
    			unset($post['submit']);
    			$indata=[];
    		    $id=$post['id'];
    		    $tyre_id=$post['tyre_id'];
    		    $indata['tyre_id']=$post['tyre_id'];
    		    $indata['content']=$post['content'];
    		    //$indata['content']=html_escape($post['content']);
    		    $data['result']=$this->tyres_model->update_table($id, $indata, 'tyre_video_section');
    		    $this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/tire/video-section/'.$tyre_id);
			}
			
	    }else{
	    		//relaod with errors
	    		$data['extra_stylesheets']=['components/bs-filestyle.css'];
				$data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js'];
				$data['tires']=$this->tyres_model->get_tire($id);
				$data['video_section']=$this->tyres_model->get_tire_video_section($id);
				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/admin-menu', $data);
				$this->load->view('admin/tire-video-section', $data);
				$this->load->view('admin/templates/footer', $data);

	    	}
	}

	public function tire_clone($id)
	{
		$id=$this->tyres_model->item_clone($id);
		redirect('admin/tire/edit/'.$id);
	}

	public function tire_reorder()
	{
		$brand='radar';
		$filter='car/cuv/suv';
		$validation = service('validation');
		$this->data['extra_stylesheets']=['jquery-ui.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js','admin-omni.js'];

		$this->data['brands'] =$this->brand_model->brands();
		$this->data['tires']=array();
		$this->views=['templates/header','templates/admin-menu','tires-reorder','templates/footer'];
		if ($this->request->getPost('submit')) {

			$validation->set_rule('brand', 'Brand', 'trim|required|numeric');
			$validation->set_rule('search_tag', 'Search Tag', 'trim|required');
			$data = $this->request->getPost(['username', 'password']);
			if (!$validation->run($data)) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];

			}else{
				$post=$this->input->getPost();
				$this->data['tires'] =	$this->tyres_model->get_for_reorder($post['brand'],$post['search_tag']);
			}
		}

		$this->load_view();


	}


	public function brands()
	{
		$data['brands'] =$this->brand_model->brands();
		foreach ($data['brands'] as $key => $value) {
			$data['brands'][$key]['tire_count']=$this->tyres_model->count_tires(['brand'=>$value['brand_id']]);
		}

		$data['extra_stylesheets']=['components/bs-datatable.css'];
		$data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];

		return view('admin/templates/header', $data)
			.view('admin/templates/admin-menu', $data)
			.view('admin/brands/brands',$data)
			.view('admin/templates/footer', $data);
	}

	public function brand_edit($id=null)
	{
		if ($id != null) {
			$data['brand'] =$this->brand_model->brands($id);

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/admin-menu', $data);
			$this->load->view('admin/brands/brand-edit',$data);
			$this->load->view('admin/templates/footer', $data);
		}
	}

	public function brand_update($id=null)
	{
		//echo $id;
		// set validation rules
		$brand_ov =$this->brand_model->brands($id);
		if($this->input->post('title') != $brand_ov['brand_title']) {
	       $is_unique =  '|is_unique[brands.brand_title]';
	    } else {
	       $is_unique =  '';
	    }
		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces|min_length[4]'.$is_unique);
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('id', 'Id', 'trim|numeric');

		if ($this->form_validation->run() === false) {

			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/brand/edit/'.$id);

		}else{
			$up_data['brand_title']=$this->input->post('title');
			$up_data['brand_status']=$this->input->post('status')=='on' ? '1' : '0';
			$up_data['brand_slug']= url_title($up_data['brand_title'], 'dash', TRUE);
			if ($this->brand_model->brandupdate($id, $up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/brands');
			}
		}
	}

	public function brand_add()
	{
		
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/admin-menu');
		$this->load->view('admin/brands/brand-add');
		$this->load->view('admin/templates/footer');
	}

	public function brand_save()
	{

		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces|min_length[4]|is_unique[brands.brand_title]');
        $this->form_validation->set_rules('status', 'Status');
        //$this->form_validation->set_rules('id', 'Id', 'trim|numeric');

		if ($this->form_validation->run() === false) {

			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/brand/edit/'.$id);

		}else{
			$up_data['brand_title']=$this->input->post('title');
			$up_data['brand_status']=$this->input->post('status')=='on' ? '1' : '0';
			$up_data['brand_slug']= url_title($up_data['brand_title'], 'dash', TRUE);
			if ($this->brand_model->brandinsert($up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data Added.']);
				redirect('admin/brands');
			}
		}
	}

	public function tyre_category()
	{
		$data['tyre_categories'] =$this->tc_model->get();
		foreach ($data['tyre_categories'] as $key => $value) {
			$data['tyre_categories'][$key]['tire_count']=$this->tyres_model->count_tires(['category'=>$value['tc_id']]);
		}

		$data['extra_stylesheets']=['components/bs-datatable.css'];
		$data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];

		return view('admin/templates/header', $data)
			.view('admin/templates/admin-menu', $data)
			.view('admin/tyre-category/tc',$data)
			.view('admin/templates/footer', $data);
	}

	public function tyre_category_edit($id)
	{
		if ($id != null) {
			$data['tyre_category'] =$this->tc_model->get($id);

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/admin-menu', $data);
			$this->load->view('admin/tyre-category/tc-edit',$data);
			$this->load->view('admin/templates/footer', $data);
		}
	}

	public function tyre_category_update($id)
	{
		//echo $id;
		// set validation rules
		$tc_ov =$this->tc_model->get($id);
		if($this->input->post('title') != $tc_ov['tc_title']) {
	       $is_unique =  '|is_unique[tyre_categories.tc_title]';
	    } else {
	       $is_unique =  '';
	    }
		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces|min_length[4]'.$is_unique);
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('id', 'Id', 'trim|numeric');

		if ($this->form_validation->run() === false) {

			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/tire-category/edit/'.$id);

		}else{
			$up_data['tc_title']=$this->input->post('title');
			$up_data['tc_status']=$this->input->post('status')=='on' ? '1' : '0';
			if ($this->tc_model->update($id, $up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/tire-category');
			}
		}
	}

	public function tyre_category_add()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/admin-menu');
		$this->load->view('admin/tyre-category/tc-add');
		$this->load->view('admin/templates/footer');
	}

	public function tyre_category_save()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces|min_length[4]|is_unique[tyre_categories.tc_title]');
        $this->form_validation->set_rules('status', 'Status');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/tire-category/add');
		}else{
			$up_data['tc_title']=$this->input->post('title');
			$up_data['tc_status']=$this->input->post('status')=='on' ? '1' : '0';
			if ($this->tc_model->insert($up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/tire-category');
			}
		}
	}

	public function icons()
	{
		$data['icons'] =$this->icon_model->get();

		$data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];

		return view('admin/templates/header', $data)
			.view('admin/templates/admin-menu', $data)
			.view('admin/icons/icons',$data)
			.view('admin/templates/footer', $data);
	}

	public function icons_edit($id)
	{
		if ($id != null) {
			$data['icon'] =$this->icon_model->get($id);

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/admin-menu', $data);
			$this->load->view('admin/icons/icon-edit',$data);
			$this->load->view('admin/templates/footer', $data);
		}
	}

	public function icons_update($id)
	{
		$icon_ov =$this->icon_model->get($id);
		if($this->input->post('title') != $icon_ov['icon_title']) {
	       $is_unique =  '|is_unique[icons.icon_title]';
	    } else {
	       $is_unique =  '';
	    }

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]'.$is_unique);
		$this->form_validation->set_rules('class', 'Class', 'trim|required|alpha_dash|min_length[2]');
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('id', 'Id', 'trim|numeric');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/icons/edit/'.$id);
		}else{
			$up_data['icon_title']=$this->input->post('title');
			$up_data['icon_class']=$this->input->post('class');
			$up_data['icon_status']=$this->input->post('status')=='on' ? '1' : '0';
			if ($this->icon_model->update($id, $up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/icons');
			}
		}
	}

	public function icons_add()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/admin-menu');
		$this->load->view('admin/icons/icon-add');
		$this->load->view('admin/templates/footer');
	}

	public function icons_save()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|is_unique[icons.icon_title]');
		$this->form_validation->set_rules('class', 'Class', 'trim|required|alpha_dash|min_length[3]');
        $this->form_validation->set_rules('status', 'Status');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata(['status'=>'error', 'message'=>validation_errors()]);
			redirect('admin/icons/add');
		}else{
			$up_data['icon_title']=$this->input->post('title');
			$up_data['icon_class']=$this->input->post('class');
			$up_data['icon_status']=$this->input->post('status')=='on' ? '1' : '0';
			if ($this->icon_model->insert($up_data)) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>'Data updated.']);
				redirect('admin/icons');
			}
		}
	}

	public function pr()
	{
		$this->data['prs'] =$this->press_release->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'press-releases/pr', 'templates/footer'];
		$this->load_view();
	}

	public function pr_edit($id)
	{
		
		$this->data['pr']=$this->press_release->get($id);			
		$this->data['cprs'] =$this->category_model->get();

		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'press-releases/pr-edit', 'templates/footer'];
		$this->load_view();

	}


	public function pr_add($error=null)
	{		
		$this->data['cprs'] =$this->category_model->get();

		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'press-releases/pr-add', 'templates/footer'];
		$this->load_view();
	}

	public function pr_update($id)
	{
		$pr =$this->press_release->get($id);

		if($this->input->post('slug') != $pr['slug']) {
	       $is_unique =  '|is_unique[press_releases.slug]';
	    } else {
	       $is_unique =  '';
	    }

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('sub_title', 'Sub Title', 'trim|min_length[4]');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required|alpha_dash|min_length[4]'.$is_unique);
        $this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('published_on', 'Published On', 'trim|callback_mysql_date_regex_check');

		if ($this->form_validation->run()==false) {
			$this->data['error']=['status'=>true,'message'=>validation_errors()];
			$this->pr_edit($id);
		}else{
			$post=$this->input->post();
			$post['title']=html_escape($post['title']);
			$post['sub_title']=html_escape($post['sub_title']);
			$post['description']=$post['description'];
			$updata=array();
			unset($post['submit']);			
			foreach ($post as $key => $value) {
				if ($post[$key]!=$pr[$key]) {
					$updata[$key]=$value;
				}
			}
			$update=$this->press_release->update($id,$updata);
			if ($update) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
				redirect('admin/pr');
			}else{
				$this->data['error']=['status'=>true,'message'=>'No data change detected.'];
				$this->pr_edit($id,$this->input->post(),$error);
			}
		}
	}

	public function pr_save()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('sub_title', 'Sub Title', 'trim|min_length[4]');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|alpha_dash|min_length[4]|is_unique[press_releases.slug]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('published_on', 'Published On', 'trim|callback_mysql_date_regex_check');

		if ($this->form_validation->run()==false) {
			$this->data['error']=['status'=>true,'message'=>validation_errors()];
			$this->pr_add();
		}else{
			$post=$this->input->post();
			$post['title']=html_escape($post['title']);
			$post['sub_title']=html_escape($post['sub_title']);
			$post['description']=html_escape($post['description']);
			if ($post['slug']==null) {
				$post['slug']=url_title($post['title'],'-',true);
			}
			$updata=array();
			unset($post['submit']);			
			foreach ($post as $key => $value) {
				$updata[$key]=$value;
			}
			$update=$this->press_release->insert($updata);
			if ($update) {
				$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
				redirect('admin/pr');
			}else{
				$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
				$this->pr_add();
			}
		}
	}

	public function cat()
	{
		$this->data['cats'] =$this->category_model->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'categories/cat', 'templates/footer'];
		$this->load_view();
	}

	public function cat_add()
	{
		$col_perfix='category_';
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','categories/cat-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|is_unique[categories.category_title]');
			$this->form_validation->set_rules('slug', 'Slug', 'trim|alpha_dash|min_length[4]|is_unique[categories.category_slug]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				if ($post['slug']=='') {
					$post['slug']=url_title($post['title'],'-',true);
				}
				unset($post['submit']);			

				$updata=array();
				foreach ($post as $key => $value) {
					$updata[$col_perfix.$key]=$value;
				}
				$update=$this->category_model->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/cat');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}


	public function cat_edit( $id )
	{
		$col_perfix='category_';
		$this->data['cat'] =$this->category_model->get($id);
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','categories/cat-edit','templates/footer'];

		if ($this->input->post('submit')) {
			$is_unique_title='';
			if ($this->input->post('title') != $this->data['cat']['category_title']) {
				$is_unique_title='|is_unique[categories.category_title]';
			}
			$is_unique_slug='';
			if ($this->input->post('slug') != $this->data['cat']['category_slug']) {
				$is_unique_slug='|is_unique[categories.category_slug]';
			}
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]'.$is_unique_title);

			$this->form_validation->set_rules('slug', 'Slug', 'trim|alpha_dash|min_length[4]'.$is_unique_slug);

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				if ($post['slug']=='') {
					$post['slug']=url_title($post['title'],'-',true);
				}
				unset($post['submit']);			

				$updata=array();
				foreach ($post as $key => $value) {
					if ($this->data['cat'][$col_perfix.$key]!= $post[$key]) {
						$updata[$col_perfix.$key]=$value;
					}
				}
				$update=$this->category_model->update($id,$updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/cat');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: No change in data.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}

	public function mc()
	{
		$this->data['amenu']=3;
		$this->data['mcs'] =$this->media_coverage->get();
		$this->data['cs'] =$this->category_model->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'media-coverages/mc', 'templates/footer'];
		$this->load_view();
	}

	public function mc_add()
	{
		$this->data['amenu']=3;
		$col_perfix='';
		$this->data['cs'] =$this->category_model->get();
		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','media-coverages/mc-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
        	$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
        	$this->form_validation->set_rules('media_house', 'Media House', 'trim|required');
        	$this->form_validation->set_rules('hyperlink', 'Hyperlink', 'trim|required');
        	$this->form_validation->set_rules('published_on', 'Published On', 'trim|required|callback_mysql_date_regex_check',['mysql_date_regex_check'=>'The %s field value is not correct. Please check.']);

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				if ($post['published_on']==null) {
					unset($post['published_on']);
				}

				unset($post['submit']);			

				$updata=array();
				foreach ($post as $key => $value) {
					$updata[$col_perfix.$key]=$value;
				}
				$update=$this->media_coverage->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/mc');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}


	public function mc_edit( $id )
	{
		$this->data['amenu']=3;
		$col_perfix='';
		$this->data['mc'] =$this->media_coverage->get($id);
		$this->data['cs'] =$this->category_model->get();
		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','media-coverages/mc-edit','templates/footer'];

		if ($this->input->post('submit')) {
		    

    		if($this->input->post('slug') != $this->data['mc']['slug']) {
    	       $is_unique =  '|is_unique[media_coverages.slug]';
    	    } else {
    	       $is_unique =  '';
    	    }

			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
		    $this->form_validation->set_rules('slug', 'Slug', 'trim|required|alpha_dash|min_length[4]'.$is_unique);
        	$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
        	$this->form_validation->set_rules('media_house', 'Media House', 'trim|required');
        	$this->form_validation->set_rules('hyperlink', 'Hyperlink', 'trim|required');
        	$this->form_validation->set_rules('published_on', 'Published On', 'trim|required|callback_mysql_date_regex_check',['mysql_date_regex_check'=>'The %s field value is not correct. Please check.']);


			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				if ($post['published_on']==null) {
					unset($post['published_on']);
				}
				unset($post['submit']);

				$updata=array();
				foreach ($post as $key => $value) {
					if ($this->data['mc'][$col_perfix.$key]!= $post[$key]) {
						$updata[$col_perfix.$key]=$value;
					}
				}
				$update=$this->media_coverage->update($id,$updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/mc');
				}else{
					$this->data['error']=['status'=>true,'message'=>'No change in data provided.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}

	public function terrain()
	{
		$this->data['amenu']=1;
		$this->data['terrains'] =$this->terrain->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'terrain/terrain', 'templates/footer'];
		$this->load_view();
	}

	public function terrain_add()
	{
		$this->data['amenu']=1;
		$col_perfix='ter_cat_';
		$this->data['extra_stylesheets']=['omni-icon-font.css'];
		$this->data['extra_scripts']=['admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','terrain/terrain-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]');
        	$this->form_validation->set_rules('slug', 'Slug', 'trim|alpha_dash|min_length[2]|is_unique[terrain_categories.ter_cat_slug]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				unset($post['submit']);			

				$updata=array();
				foreach ($post as $key => $value) {
					$updata[$col_perfix.$key]=$value;
				}
				$update=$this->terrain->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/terrain');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}


	public function terrain_edit( $id )
	{
		$this->data['amenu']=1;
		$col_perfix='ter_cat_';
		$this->data['terrain'] =$this->terrain->get($id);
		$this->data['extra_stylesheets']=['omni-icon-font.css'];
		$this->data['extra_scripts']=['admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','terrain/terrain-edit','templates/footer'];

		if ($this->input->post('submit')) {

			if($this->input->post('slug') != $this->data['terrain']['ter_cat_slug']) {
		       $is_unique = '|is_unique[terrain_categories.ter_cat_slug]';
		    } else { $is_unique = ''; }

			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]');
        	$this->form_validation->set_rules('slug', 'Slug', 'trim|alpha_dash|min_length[2]'.$is_unique);

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				unset($post['submit']);
                
				$updata=array();
				
				foreach ($post as $key => $value) {
					if ($this->data['terrain'][$col_perfix.$key]!= $post[$key]) {
						$updata[$col_perfix.$key]=$value;
					}
				}
				$update=$this->terrain->update($id,$updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/terrain');
				}else{
					$this->data['error']=['status'=>true,'message'=>'No change in data provided.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}

	public function golf_tournaments()
	{
		$this->data['amenu']=4;
		$this->data['records'] =$this->golf->all('tournament');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'golf/tournament', 'templates/footer'];
		$this->load_view();
	}

	public function golf_tournament_add()
	{
		$this->data['amenu']=4;
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','golf/tournament-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct']);
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|differs[start_date]|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[tournament]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}				
				unset($post['submit']);
				if (strtotime($post['start_date'])<strtotime($post['end_date'])) {
					$updata=array();
					$updata['post_type']=$post['post_type'];
					unset($post['post_type']);
					$updata['post_meta']=json_encode($post);

					$update=$this->golf->insert($updata);
					if ($update) {
						$this->data['error']=[];
						$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
						redirect('admin/golf-tournaments');
					}else{
						$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
						$this->load_view();
					}
				}else{
						$this->data['error']=['status'=>true,'message'=>'End Date must be greater than Start Date field.'];
						$this->load_view();
					}
			}
		}else{	
			$this->load_view();
		}
	}
	
	public function golf_tournament_edit($id)
	{
		$this->data['amenu']=4;
		$this->data['record'] =$this->golf->find($id);
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','golf/tournament-edit','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct']);
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|differs[start_date]|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.Here']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[tournament]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);
				if (strtotime($post['start_date'])<strtotime($post['end_date'])) {
					$updata=array();
					$updata['post_type']=$post['post_type'];
					unset($post['post_type']);
					$updata['post_meta']=json_encode($post);
					
					$update=$this->golf->update($id, $updata);
					if ($update) {
						$this->data['error']=[];
						$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
						redirect('admin/golf-tournaments');
					}else{
						$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
						$this->load_view();
					}
				}else{
						$this->data['error']=['status'=>true,'message'=>'End date must be greater than Start date field.'];
						$this->load_view();
					}
			}
		}else{
			$this->load_view();
		}
	}


	public function golf_highlights()
	{
		$this->data['amenu']=4;
		$this->data['records'] =$this->golf->all('highlight');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'golf/highlight', 'templates/footer'];
		$this->load_view();
	}
	
	public function golf_highlight_add()
	{
		$this->data['amenu']=4;
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','golf/highlight-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('pos', 'POS', 'trim|required|alpha_dash');
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|differs[start_date]|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.Here']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[highlight]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();	
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);
				
				$updata=array();
				$updata['post_type']=$post['post_type'];
				unset($post['post_type']);
				$updata['post_meta']=json_encode($post);

				$update=$this->golf->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/golf-highlights');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}
	
	public function golf_highlight_edit($id)
	{
		$this->data['amenu']=4;
		$this->data['record'] =$this->golf->find($id);
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','golf/highlight-edit','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('pos', 'POS', 'trim|required|alpha_dash');
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|differs[start_date]|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[highlight]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();					
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);

				$updata=array();
				$updata['post_type']=$post['post_type'];
				unset($post['post_type']);
				$updata['post_meta']=json_encode($post);
				
				$update=$this->golf->update($id, $updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/golf-highlights');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}

			}
		}else{
			$this->load_view();
		}
	}


	public function races()
	{
		$this->data['amenu']=5;
		$this->data['records'] =$this->motor->all('race');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'motorsport/races', 'templates/footer'];
		$this->load_view();
	}
	public function race_add()
	{
		$this->data['amenu']=5;
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','motorsport/race-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('category', 'Category', 'trim');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct']);
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[race]');
        	print_r($this->input->post());
			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();						
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);
				if (strtotime($post['start_date'])<=strtotime($post['end_date'])) {
					$updata=array();
					$updata['post_type']=$post['post_type'];
					unset($post['post_type']);
					$updata['post_meta']=json_encode($post);

					$update=$this->motor->insert($updata);
					if ($update) {
						$this->data['error']=[];
						$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
						redirect('admin/races');
					}else{
						$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
						$this->load_view();
					}
				}else{
						$this->data['error']=['status'=>true,'message'=>'End Date must be greater than or equal to Start Date field.'];
						$this->load_view();
					}
			}
		}else{	
			$this->load_view();
		}
	}
	public function race_edit($id)
	{
		$this->data['amenu']=5;
		$this->data['record'] =$this->motor->find($id);
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','motorsport/race-edit','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('category', 'Category', 'trim');
			$this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct']);
        	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|differs[start_date]|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[race]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();						
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);
				if (strtotime($post['start_date'])<strtotime($post['end_date'])) {
					$updata=array();
					$updata['post_type']=$post['post_type'];
					unset($post['post_type']);
					$updata['post_meta']=json_encode($post);
					
					$update=$this->motor->update($id, $updata);
					if ($update) {
						$this->data['error']=[];
						$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
						redirect('admin/races');
					}else{
						$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
						$this->load_view();
					}
				}else{
						$this->data['error']=['status'=>true,'message'=>'End date must be greater than Start date field.'];
						$this->load_view();
					}
			}
		}else{
			$this->load_view();
		}
	}


	public function wins()
	{
		$this->data['amenu']=5;
		$this->data['records'] =$this->motor->all('win');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'motorsport/wins', 'templates/footer'];
		$this->load_view();
	}
	
	public function win_add()
	{
		$this->data['amenu']=5;
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','motorsport/win-add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('pos', 'POS', 'trim|required');
			$this->form_validation->set_rules('driver', 'Driver', 'trim|required');
        	$this->form_validation->set_rules('date', 'End Date', 'trim|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[win]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();						
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);

				$updata=array();
				$updata['post_type']=$post['post_type'];
				unset($post['post_type']);
				$updata['post_meta']=json_encode($post);

				$update=$this->motor->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/wins');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}
	
	public function win_edit($id)
	{
		$this->data['amenu']=5;
		$this->data['record'] =$this->motor->find($id);
		$this->data['extra_stylesheets']=['components/datepicker.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','motorsport/win-edit','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('pos', 'POS', 'trim|required');
			$this->form_validation->set_rules('driver', 'Driver', 'trim|required');
        	$this->form_validation->set_rules('date', 'Date', 'trim|required|callback_date_regex_check',['date_regex_check'=>'The %s field value is not correct.']);
        	$this->form_validation->set_rules('post_type', 'Post type', 'trim|required|alpha|min_length[3]|in_list[win]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();						
				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);
				$updata=array();
				$updata['post_type']=$post['post_type'];
				unset($post['post_type']);
				$updata['post_meta']=json_encode($post);
				
				$update=$this->motor->update($id, $updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/wins');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{
			$this->load_view();
		}
	}


	public function carousels()
	{
		$this->data['amenu']=6;
		$this->data['records'] =$this->carousel->all('carousel');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'carousel/all', 'templates/footer'];
		$this->load_view();
	}
	
	public function carousel_add()
	{
		$this->data['amenu']=6;
		$this->data['extra_stylesheets']=['components/bs-filestyle.css', 'jquery-ui.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js', 'components/bs-filestyle.js','admin-omni.js'];

		$this->views=['templates/header','templates/admin-menu','carousel/add','templates/footer'];

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();	
				$post['images']=array();

				foreach ($post as $key => $value) {
					$post[$key]=html_escape($value);
				}
				unset($post['submit']);

				$updata=array();
				$updata['post_type']=$post['post_type'];
				unset($post['post_type']);
				$updata['post_meta']=json_encode($post);

				$update=$this->carousel->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/carousels');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}
	
	public function carousel_edit($id)
	{
		$this->data['amenu']=6;
		$this->data['record'] =$this->carousel->find($id);
		$this->data['extra_stylesheets']=['components/bs-filestyle.css', 'jquery-ui.css','omni-admin.css'];
		$this->data['extra_scripts']=['jquery-ui.js', 'components/bs-filestyle.js','admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','carousel/edit','templates/footer'];

		if ($this->input->post('upload')) {
			$post=$this->input->post();
			$merge_with_old=true;
			if ($this->input->post('replace')) {
				$merge_with_old=false;
			}
			unset($post['upload'],$post['files']);
			$files=$_FILES;

			if($files['items']['error'][0] == UPLOAD_ERR_OK) {
	    		$upfiles=array();
	    		$path='carousel_images/';

	    		foreach ($files as $key=>$value) {
					if (is_array($value['name'])) {
					 	$count=count($value['name']);
					 	for( $i=0; $i < $count; $i++ )
					    {
					        $_FILES[$key]['name']= $files[$key]['name'][$i];
					        $_FILES[$key]['type']= $files[$key]['type'][$i];
					        $_FILES[$key]['tmp_name']= $files[$key]['tmp_name'][$i];
					        $_FILES[$key]['error']= $files[$key]['error'][$i];
					        $_FILES[$key]['size']= $files[$key]['size'][$i];
					        $data = $this->upimage($path, $key, true);
					        if ($data['success']) {
					        	$upfiles[]=$data['result']['file_name'];
					        }
					    }
					}
				}
				$post_data=json_decode($this->data['record']['post_meta'],true);
				if ($merge_with_old) {
					$upfiles=array_merge($upfiles, $post_data['images']);
				}
				$post_data['images']=$upfiles;
				$updata['post_meta']=json_encode($post_data);
				$update=$this->carousel->update($id, $updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/carousel/edit/'.$id);
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
				
			}
		} else if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('attached_to', 'Page Slug', 'trim|required|alpha_dash|min_length[3]');
			$this->form_validation->set_rules('images', 'Images', 'trim|required');

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				$post['title']=html_escape($post['title']);
				$post['images']=json_decode($post['images'], false);
				
				$updata=array();
				$updata['post_type']=$post['post_type'];
				$updata['attached_to']=$post['attached_to'];
				unset($post['post_type'],$post['submit'],$post['attached_to']);

				$updata['post_meta']=json_encode($post);

				$update=$this->carousel->update($id, $updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
					redirect('admin/carousel/edit/'.$id);
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{
			$this->load_view();
		}
	}
	
	public function form_tire_registrations()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/tire-registrations', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_tire_registrations($this->data['records']);
		    $xlheader=['First Name','Last Name','Email','Street Address 1','Street Address 2','City','State','Zip','Dealer Name','Dealer Street Address 1','Dealer Street Address 2', 'Dealer City', 'Dealer State', 'Dealer Zip','Brand','Pattern','Purchase Date','Quantity 1', 'Dot 1','Quantity 2', 'Dot 2','Quantity 3', 'Dot 3','Quantity 4', 'Dot 4','Quantity 5', 'Dot 5','Quantity 6', 'Dot 6'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Tire_registrations_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}

	public function form_dataprep_tire_registrations($data)
	{
		$prodata=[];
		foreach ($data as $key => $value) {
			$rowdata=[];
			$raw1=json_decode($value['post_meta'], true);
			$customer=$raw1['customer-information'] ;
			foreach ($customer as $customerlabel => $customerfeed) {
				$rowdata['customer-'.$customerlabel]=$customerfeed;
			}
			$dealer=$raw1['dealer-information'] ;
			foreach ($dealer as $dealerlabel => $dealerfeed) {
				$rowdata['dealer-'.$dealerlabel]=$dealerfeed;
			}
			$tyre=$raw1['tyre-information'];
			foreach ($tyre as $tyrelabel => $tyrefeed) {
				if ($tyrelabel==='quantity' || $tyrelabel==='dot' ) {
					continue;
				}else{
					$rowdata['tyre-'.$tyrelabel]=$tyrefeed;
				}
			}

			$quadot=[];
			for ($i=1; $i < 7 ; $i++) {
				if (isset($tyre['quantity'][$i-1]) && isset($tyre['dot'][$i-1])) {
					$qua=$tyre['quantity'][$i-1];
					$dot=$tyre['dot'][$i-1];
				}else { $qua='-'; $dot='-'; }
				$quadot['quantity-'.$i]=$qua;
				$quadot['dot-'.$i]=$dot;
			}
			foreach ($quadot as $quadotkey => $quadotval) {
				$rowdata['tyre-'.$quadotkey]=$quadotval;
			}
			$prodata[]=$rowdata;
		}

		return $prodata;
	}
	
	public function form_subscibers()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('subscriber');
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/subscribers', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Email','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Subscibers_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}

	public function form_dataprep_subscibers($data)
	{
	    
		$prodata=[];
		
		foreach ($data as $key => $value) {
		    if(empty($value) || !is_array($value) || $value== null || $value== ''){
		        continue;}
		    $rowdata=[];
			$raw=json_decode($value['post_meta'], true);
			if(empty($raw) || !is_array($raw) || $raw== null || $raw== ''){
			    continue;}
			foreach ($raw as $slabel => $svalue) {
			    if(empty($svalue) || $svalue== null || $svalue== ''){
			        $svalue== '- ';}
				$rowdata[$slabel]=$svalue;
			}
			$prodata[]=$rowdata;
			
		}
		
		
		return $prodata;
	}
	
	public function form_subscibers_tnt()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('subscriber-tnt');
		
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/subscribers-tnt', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Email','Wholesaler','Retailer','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Subscibers_TNT_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}
	
	public function form_order_inquiry()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('radar-us-campaign-order-inquiry');
		
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/order-inquiry', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Company Name','Email','Phone','Address/Location','Message','Wholesaler','Retailer','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Order_Inquiry_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}
	
	public function form_contact_inquiry()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('contact_enquiry');
		//print_r($this->data['records']);
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/contact-enquiry', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Email','Region','Country','Message','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Contact_Inquiry_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}
	
	public function form_dealer_locator_inquiry()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('dealerlocator');
		
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/dealer-locator-enquiry', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Email','Location','Message','Region','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Dealer_Inquiry_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}
	
	public function form_radaruspremium_enquiry()
	{
		$this->data['amenu']=8;
		$this->data['records'] =$this->submission->all('radartires-premium-inquiry');
		
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'submisison/radar-us-premium', 'templates/footer'];
		if(!empty($this->data['records'])){
		    $xldata=$this->form_dataprep_subscibers($this->data['records']);
		    $xlheader=['Name','Company','Email','Mobile','Address/Location','Message','Wholesaler','Retailer','Consumer','Campaign','Date'];
		    $this->data['submissons_filename']=$this->excels_model->xlfile($xldata, 'Radar_US_Premium_'.date(strtotime('today')), true, $xlheader);
		}else{
		    $this->data['submissons_filename']='nodata.xlsx';
		}
		$this->load_view();
	}
	
	

	public function news(){
		$this->data['amenu']=9;
		$this->data['records']=$this->news->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'news/all', 'templates/footer'];
		$this->load_view();
	}

	public function news_add(){
		$this->data['amenu']=9;
		$col_perfix='';
		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','components/bs-filestyle.css', 'jquery-ui.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'jquery-ui.js', 'components/bs-filestyle.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','news/add','templates/footer'];

		if ($this->input->post()) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
        	$this->form_validation->set_rules('sub_title', 'Sub Title', 'trim');
        	$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
        	$this->form_validation->set_rules('source', 'Source', 'trim');
        	$this->form_validation->set_rules('excerpt', 'Excerpt', 'trim');
        	$this->form_validation->set_rules('featured_image_position', 'Image Position', 'trim');
        	$this->form_validation->set_rules('description', 'Description', 'trim');
        	$this->form_validation->set_rules('published_on', 'Published On', 'trim|required|callback_mysql_date_regex_check',['mysql_date_regex_check'=>'The %s field value is not correct. Please check.']);

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{

				$post=$this->input->post();
				unset($post['submit']);
				
				$files=$_FILES;
				if (!empty($files)) {
					$handled_files=$this->handle_files($files, 'featured_image');
					$post['featured_image']=$handled_files[0];
				}else{
					unset($post['featured_image']);
				}
				
				if (isset($post['source']) && $post['source'] !=='') {
					$source=preg_split('/\r\n|\r|\n/',$post['source']);
					$source=json_encode($source);
					$post['source']=$source;
				}
				$updata=array();
				foreach ($post as $key => $value) {
					$updata[$col_perfix.$key]=$value;
				}
				$update=$this->news->insert($updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated. File data".json_encode($handled_files)]);
					redirect('admin/news');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}

	public function news_edit($id){
		$this->data['amenu']=9;
		$this->data['record'] =$this->news->get($id);
		$col_perfix='';
		$this->data['extra_stylesheets']=['components/datepicker.css','components/timepicker.css','components/bs-filestyle.css', 'jquery-ui.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/moment.js','components/datepicker.js','components/timepicker.js', 'jquery-ui.js', 'components/bs-filestyle.js', 'admin-omni.js'];
		$this->views=['templates/header','templates/admin-menu','news/edit','templates/footer'];

		if ($this->input->post()) {

			if($this->input->post('slug') != $this->data['record']['slug']) {
		       $is_unique =  '|is_unique[news.slug]';
		    } else {
		       $is_unique =  '';
		    }

			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]');
			
        	$this->form_validation->set_rules('featured_image_position', 'Image Position', 'trim');
        	$this->form_validation->set_rules('sub_title', 'Sub Title', 'trim');
        	$this->form_validation->set_rules('slug', 'Slug', 'trim|required|alpha_dash|min_length[4]'.$is_unique);
        	$this->form_validation->set_rules('source', 'Source', 'trim');
        	$this->form_validation->set_rules('excerpt', 'Excerpt', 'trim');
        	$this->form_validation->set_rules('description', 'Description', 'trim');
        	$this->form_validation->set_rules('published_on', 'Published On', 'trim|required|callback_mysql_date_regex_check',['mysql_date_regex_check'=>'The %s field value is not correct. Please check.']);

			if ($this->form_validation->run()==false) {
				$this->data['error']=['status'=>true,'message'=>validation_errors()];
				$this->load_view();
			}else{
				$post=$this->input->post();
				unset($post['submit']);

				$files=$_FILES;
				if (!empty($files)) {
					$handled_files=$this->handle_files($files, 'featured_image');
					$post['featured_image']=$handled_files[0];
				}else{
					unset($post['featured_image']);
				}
				if($files['featured_image']['error'][0] !== UPLOAD_ERR_OK){
				    unset($post['featured_image']);
				}
				
				if (isset($post['source']) && $post['source'] !=='') {
					$source=preg_split('/\r\n|\r|\n/',$post['source']);
					$source=json_encode($source);
					$post['source']=$source;
				}
				$updata=array();
				foreach ($post as $key => $value) {
					$updata[$col_perfix.$key]=$value;
				}
				$update=$this->news->update($id,$updata);
				if ($update) {
					$this->data['error']=[];
					$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated File data:".json_encode($files).json_encode($this->upload->display_errors())]);
					redirect('admin/news');
				}else{
					$this->data['error']=['status'=>true,'message'=>'Error: Can\'t add the post.'];
					$this->load_view();
				}
			}
		}else{	
			$this->load_view();
		}
	}
	
	

	public function dealers(){
		$this->data['amenu']=10;
		$this->data['records']=$this->dealers->get();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'dealers/all', 'templates/footer'];
		$this->load_view();
	}
	
	

	public function dealers_deleted(){
		$this->data['amenu']=10;
		$this->data['records']=$this->dealers->get_trashed();
		$this->data['extra_stylesheets']=['components/bs-datatable.css','omni-icon-font.css'];
		$this->data['extra_scripts']=['components/bs-datatable.js', 'admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'dealers/all-deleted', 'templates/footer'];
		$this->load_view();
	}
	
	

	public function dealers_add(){
	    if ($this->input->post()) {
    		$this->data['mode']='add';
	        $this->dealers_post_data();
		}
    		$this->data['amenu']=10;
    		$this->data['extra_stylesheets']=['omni-icon-font.css'];
    		$this->data['extra_scripts']=['admin-omni.js'];
    		$this->views=['templates/header', 'templates/admin-menu', 'dealers/add', 'templates/footer'];
    		$this->load_view();
		
	}
	
	

	public function dealers_edit($id){
		if ($this->input->post()) {
    		$this->data['mode']='edit';
		    $this->dealers_post_data($id);
		}
		$this->data['amenu']=10;
		$rec=$this->dealers->get($id);
		$this->data['record']=json_decode($rec['post_meta'],true);
		$this->data['record']['id']=$id;
		$this->data['extra_stylesheets']=['omni-icon-font.css'];
		$this->data['extra_scripts']=['admin-omni.js'];
		$this->views=['templates/header', 'templates/admin-menu', 'dealers/edit', 'templates/footer'];
		$this->load_view();
	}
	
	

	private function dealers_post_data($id=null){
	    if($id!==null){
	        $this->data['old_data']=$this->dealers->get($id);
	    }
	    $this->form_validation->set_rules('dealer', 'Dealer', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('state', 'State', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim');
        $this->form_validation->set_rules('country_code', 'Country Code', 'trim');
        $this->form_validation->set_rules('postal', 'Postal', 'trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('lat', 'Lat', 'trim');
        $this->form_validation->set_rules('lng', 'Lng', 'trim');
        $this->form_validation->set_rules('direction', 'Direction', 'trim');
		if ($this->form_validation->run()==false) {
			$this->data['error']=['status'=>true,'message'=>validation_errors()];
		}else{
			$post=$this->input->post();
			print_r($post);
			unset($post['submit']);
			$updata=array();
			
			foreach ($post as $key => $value) {
				$updata['post_meta'][$key]=$value;
			}
			$updata['dealer']=$updata['post_meta']['dealer'];
			$updata['country']=$updata['post_meta']['country'];
			$updata['post_meta']=json_encode($updata['post_meta']);
			
			if(isset($this->data['mode'])){
			    if($this->data['mode']==='add'){
			        $update=$this->dealers->insert($updata);
			    }
			    if($this->data['mode']==='edit'){
			        $updata['status']=$this->data['old_data']['status'];
			        $update=$this->dealers->update($id, $updata);
			    }
			}
			if ($update) {
				$this->data['error']=['status'=>false];
				$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
			}else{
				$this->data['error']=['status'=>true,'message'=>'Error.'];
			}
			
			
		}
	}
	
	public function dealers_add_bulk(){
		
		$sizes_file='';

		if ($this->input->post()) {

			$post=$this->input->post();
			unset($post['submit']);

			$dealers=$this->dealers->all();
	    	$olddealers=[];
	    	foreach ($dealers as $dealer){
	    	    $olddealers[]=json_decode($dealer['post_meta'],true);
	    	}

	    	$files = $_FILES;
	    	//Uploading file
	    	if($files['dealers']['error'] == UPLOAD_ERR_OK) {
	    		$upfiles=array();
	    		$path='dealers/';
	    		$key='dealers';

		    	$_FILES[$key]['name']= $files[$key]['name'];
		        $_FILES[$key]['type']= $files[$key]['type'];
		        $_FILES[$key]['tmp_name']= $files[$key]['tmp_name'];
		        $_FILES[$key]['error']= $files[$key]['error'];
		        $_FILES[$key]['size']= $files[$key]['size'];
		        $data = $this->upimage($path, $key, true);

		        if ($data['success']) {
		        	$upfiles[$key]=$data['result'];
		        	//Check xlsx
		        	if ($upfiles[$key]['file_ext']==='.xlsx') {
		        		//Reading File
	        			$inputFileName = './uploads/'.$path.$upfiles[$key]['file_name'];
	        			$sizes=$this->excels_model->readfile($inputFileName);
	        			
	        			

	        			if (!empty($sizes)) {
	        				$sizes=json_encode( $sizes );

	        				if ($oldvals!==$sizes) {
	        					$update_res=$this->tyres_model->update($id, ['sizes'=>$sizes, 'updated_on'=>date("Y-m-d H:i:s")]);

								if ($update_res) {
									$this->session->set_flashdata(['status'=>'success', 'message'=>"Data updated."]);
									//Delete uploaded file.
									unlink($inputFileName);
					    			redirect("admin/tire");
								}else{
									//Technical DB Error.
									$this->session->set_flashdata(['status'=>'error', 'message'=>"Data can not be updated."]);
					    			redirect("admin/tire/sizes/$id");
								}

	        				}else{
	        					//Same data uploaded.
								$this->session->set_flashdata(['status'=>'error', 'message'=>"No change in data."]);
				    			redirect("admin/tire/sizes/$id");
								}
	        				
	        			}else{
	        				//Error in format.
				        	$this->session->set_flashdata(['status'=>'error', 'message'=>"Error in format."]);
			    			redirect("admin/tire/sizes/$id");
	        			}

		        	}

		        }else{
		        	//Upload Error 
		        	$this->session->set_flashdata(['status'=>'error', 'message'=>"Can not upload file."]);
	    			redirect("admin/tire/sizes/$id");
		        }
		    }else{
	        	//Error no file selected.
	    		$this->session->set_flashdata(['status'=>'error', 'message'=>"No files selected."]);
	    		redirect("admin/tire/sizes/$id");
	    	}

		}else{
	    		//relaod with errors
	    		$data['extra_stylesheets']=['components/bs-filestyle.css'];
				$data['extra_scripts']=['components/bs-filestyle.js','admin-omni.js'];

				$data['tires']=$this->tyres_model->get_tire($id);
				$data['oldvals']=json_decode( $data['tires']['sizes'], true );
				if (!empty($data['oldvals'])) {
					$file_xlsx=$this->excels_model->createfile($data['oldvals'], $data['tires']['slug'], array_keys($data['oldvals'][0]));
					$data['tires']['oldsizes']=$file_xlsx;						
				}else{
					$data['tires']['oldsizes']='No-File.xlsx';
				}

				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/admin-menu', $data);
				$this->load->view('admin/tires-sizes', $data);
				$this->load->view('admin/templates/footer', $data);

	    	}
	}
	


	public function handle_files($files, $field='file')
	{
	    $upfiles=array();
		if($files[$field]['error'][0] == UPLOAD_ERR_OK) {
	    		$path='news/';

    		foreach ($files as $key=>$value) {
				if (is_array($value['name'])) {
				 	$count=count($value['name']);
				 	for( $i=0; $i < $count; $i++ )
				    {
				        $_FILES[$key]['name']= $files[$key]['name'][$i];
				        $_FILES[$key]['type']= $files[$key]['type'][$i];
				        $_FILES[$key]['tmp_name']= $files[$key]['tmp_name'][$i];
				        $_FILES[$key]['error']= $files[$key]['error'][$i];
				        $_FILES[$key]['size']= $files[$key]['size'][$i];
				        $data = $this->upimage($path, $key, true);
				        if ($data['success']) {
				        	$upfiles[]=$data['result']['file_name'];
				        }
				    }
				}
			}
		}
		return $upfiles;
	}


	public function mysql_date_regex_check($str)
    {	
    	$status=FALSE;
    	$reg ='/^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])(?:( [0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$/';
        if (preg_match($reg, $str))
        {
        	$date=explode(' ', $str); 
        	$date=$date[0]; $date=explode('-', $date);
        	$y=$date[0]; $m=$date[1]; $d=$date[2];
        	if (checkdate($m, $d, $y)) {
    			$status=TRUE;
        	}
        }
    	return $status;
    }



	public function date_regex_check($str)
    {
    	$status=FALSE;
    	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$str)) {
	    	$date=explode('-', $str);
	    	if (checkdate( $date[1], $date[2], $date[0])) {
	    		$status=TRUE;
			}
    	}
    	return $status;
    }



}