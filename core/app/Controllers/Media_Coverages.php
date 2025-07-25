<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\Media_Coverage ;

class Media_Coverages extends BaseController {

	

    public function index($page=''){
		
		$data['page_title']='Media Coverages';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['page_url']='media-coverage';
        $data['sidepanel']=["menu"=>5,"submenu"=>2];
		$model = model(Media_Coverage::class);
		$data['coverages'] = $model->where('status', 1)->orderBy('published_on', 'DESC')->paginate(10,  '');
		$data['pager'] = $model->pager;
		

		return view('templates/header', $data).view('media-coverages', $data).view('templates/footer', $data);
    }
    

    public function index_staging($page=''){
    	$offset=$this->uri->segment(2);

    	$conf['base_url']=base_url('media-coverage');
		$conf['total_rows']=$this->media_coverage->get_media_coverage_nums();
		$conf=$this->setpagination($conf);
		$this->pagination->initialize($conf);
		
    	$data['page_title']='Media Coverages';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['page_url']='media-coverage';
        $data['sidepanel']=["menu"=>5,"submenu"=>2];
		$data['categories'] = $this->category_model->get();
		$data['coverages'] = $this->media_coverage->get_media_coverages(null, $conf['per_page'], $offset, true);

		$this->load->view('templates/header', $data);
		$this->load->view('media-coverages', $data);
        $this->load->view('templates/footer', $data);
    }

    /*public function all($page=''){
    	$offset=$this->uri->segment(2);

    	$conf['base_url']=base_url('media-coverage-all');
		$conf['total_rows']=$this->media_coverage->get_media_coverage_nums();
		$conf=$this->setpagination($conf);
		$this->pagination->initialize($conf);
		
    	$data['page_title']='Media Coverages';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['page_url']='media-coverage-all';
        $data['sidepanel']=["menu"=>5,"submenu"=>2];
		$data['categories'] = $this->category_model->get();
		$data['coverages'] = $this->media_coverage->get_media_coverages(null, $conf['per_page'], $offset);

		$this->load->view('templates/header', $data);
		$this->load->view('media-coverages', $data);
        $this->load->view('templates/footer', $data);
    }*/

	public function setpagination($data=array()){
		$conf['attributes'] = ['class' => 'page-link'];
		$conf['per_page']=10;
		$conf['full_tag_open'] = '<ul class="pagination">';
		$conf['full_tag_close'] = '</ul>';
		$conf['prev_link'] = '&laquo;';
		$conf['prev_tag_open'] = '<li class="page-item">';
		$conf['prev_tag_close'] = '</a></li>';
		$conf['next_link'] = '&raquo;';
		$conf['next_tag_open'] = '<li class="page-item">';
		$conf['next_tag_close'] = '</li>';
		$conf['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$conf['cur_tag_close'] = '</a></li>';
		$conf['num_tag_open'] = '<li class="page-item">';
		$conf['num_tag_close'] = '</a></li>';
		return array_merge($data,$conf);
	}

	public function category($category=null)
	{ 
		$category_id=$this->category_model->get_id($category);		
		if ($category_id==null) {
			$this->not_found();
		}else{
			$offset=$this->uri->segment(4);
			$conf['base_url']=base_url('media-coverages/category/'.$category);
			$conf['total_rows']=$this->media_coverage->get_media_coverage_nums($category_id);
			$conf=$this->setpagination($conf);
			$this->pagination->initialize($conf);

			$data['categories'] = $this->category_model->get();
			$data['coverages'] = $this->media_coverage->get_media_coverages($category_id,$conf['per_page'], $offset);
			if (empty($data['coverages'])) {
				$this->not_found();
			}else{
	    		$data['page_title']='Media Coverages';
		        $data['meta_d']="";
		        $data['meta_k']="";
	        	$data['sidepanel']=["menu"=>5,"submenu"=>2];

				$this->load->view('templates/header', $data);
				$this->load->view('media-coverages', $data);
		        $this->load->view('templates/footer', $data);
	    	}
	    }
	}

	public function single($slug){
		$data['coverages'] = $this->media_coverage->get_media_coverage($slug);
		if (empty($data['coverages'])) {
			$this->not_found();
		}else{
	    	$data['page_title']=strip_tags(htmlspecialchars_decode($data['coverages']['title']));
	        $data['meta_d']="";
	        $data['meta_k']="";
			$data['sidepanel']=["menu"=>5,"submenu"=>1];

			$this->load->view('templates/header', $data);
			$this->load->view('media-coverage-single', $data);
	        $this->load->view('templates/footer', $data);
    	}
	}

	public function not_found()
	{
	    
		$data['page_title']='404 Page Not Found';
		
    	$this->load->view('templates/header', $data);
        $this->load->view('pages/err404', $data);
        $this->load->view('templates/footer', $data);
	}

}
