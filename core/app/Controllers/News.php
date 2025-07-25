<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\News_Model ;

class News extends BaseController {


    public function index($page=''){
		
		$data['page_title']='Climate Change';
        $data['meta_d']="";
        $data['meta_k']="climate change";
		$data['sidepanel']=["menu"=>4,"submenu"=>4];
		$model = model(News_Model::class);
		$data['news'] = $model->where('status', 1)->orderBy('published_on', 'DESC')->paginate(10,  '');
		$data['pager'] = $model->pager;

		return view('templates/header', $data).view('media-centre/climate-news', $data).view('templates/footer', $data);
    }

    public function staging($page=''){
    	//$offset=$this->uri->segment(2);
    	//$conf['base_url']=base_url('climate-change-staging');
		//$conf['total_rows']=$this->news->all_nums();
		//$conf=$this->setpagination($conf);
		//$this->pagination->initialize($conf);

		$data['news'] = $this->news->all(6);

		$data['page_title']='Climate Change';
        $data['meta_d']="";
        $data['meta_k']="climate change";
		$data['sidepanel']=["menu"=>4,"submenu"=>4];

		$this->load->view('templates/header', $data);
		$this->load->view('media-centre/climate-news-staging', $data);
        $this->load->view('templates/footer', $data);
    }
	

	public function single($slug){
		$model = model(News_Model::class);
		$data['news'] = $model->where(['slug' => $slug, 'status' => 1])->first();
		if (empty($data['news'])) {
			$this->not_found();
		}else{
	    	$data['page_title']=strip_tags(htmlspecialchars_decode($data['news']['title']));
	        $data['meta_d']="";
	        $data['meta_k']="climate change";
		    $data['sidepanel']=["menu"=>4,"submenu"=>4];
			$data['extra_stylesheets']=['extra-icons.css'];

			return view('templates/header', $data).view('media-centre/climate-news-single', $data).view('templates/footer', $data);
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
