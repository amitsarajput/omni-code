<?php


class Dealers extends CI_Controller {
    

	public function __construct()
    {		
        $this->load->model('Dealers_Model','mod');
        $this->load->library('pagination');
    }

    public function index($page=''){
    	$offset=$this->uri->segment(2);
    	$conf['base_url']=base_url('climate-change');
		$conf['total_rows']=$this->mod->all_nums();
		$conf=$this->setpagination($conf);
		$this->pagination->initialize($conf);

		$data['news'] = $this->mod->all($conf['per_page'], $offset);

		$data['page_title']='Climate Change';
        $data['meta_d']="";
        $data['meta_k']="climate change";
		$data['sidepanel']=["menu"=>4,"submenu"=>4];

		$this->load->view('templates/header', $data);
		$this->load->view('dealers/climate-news', $data);
        $this->load->view('templates/footer', $data);
    }

    public function staging($page=''){
    	//$offset=$this->uri->segment(2);
    	//$conf['base_url']=base_url('climate-change-staging');
		//$conf['total_rows']=$this->news->all_nums();
		//$conf=$this->setpagination($conf);
		//$this->pagination->initialize($conf);

		$data['news'] = $this->mod->all_with_unpublished(6);

		$data['page_title']='Climate Change';
        $data['meta_d']="";
        $data['meta_k']="climate change";
		$data['sidepanel']=["menu"=>4,"submenu"=>4];

		$this->load->view('templates/header', $data);
		$this->load->view('dealers/dealers-staging', $data);
        $this->load->view('templates/footer', $data);
    }

	public function setpagination($data=array()){
		$conf['attributes'] = ['class' => 'page-link'];
		$conf['per_page']=18;
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

	public function single($slug){
		$data['news'] = $this->mod->find($slug);
		if (empty($data['news'])) {
			$this->not_found();
		}else{

	    	$data['page_title']=strip_tags(htmlspecialchars_decode($data['news']['title']));
	        $data['meta_d']="";
	        $data['meta_k']="climate change";
		    $data['sidepanel']=["menu"=>4,"submenu"=>4];
			$data['extra_stylesheets']=['extra-icons.css'];

			$this->load->view('templates/header', $data);
			$this->load->view('media-centre/climate-news-single', $data);
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
