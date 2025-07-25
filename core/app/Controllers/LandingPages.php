<?php
namespace App\Controllers;
use App\Models\Tyres_Model ;
use App\Models\Brand_Model ;
use App\Models\Icon_Model ;

class LandingPages extends BaseController {
    
    private $site_key;
	
	public function __construct()
    {
        $this->site_key=env('RECAPTCHA_SITE_KEY');
        $this->tyres_model = model(Tyres_Model::class);
        $this->brand_model = model(Brand_Model::class);
        $this->icon_model = model(Icon_Model::class);
    }

    
    private $data=array();
    private $views=array();

    private function load_view()
    {
        // foreach ($this->views as $view) {
        //     $this->load->view('landing-pages/'.$view, $this->data);
        // }
        $output = '';
		foreach ($this->views as $view) {
			$output .= view('landing-pages/'.$view, $this->data);
		}
		echo $output;
    }

    public function radar_us(){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $this->views=['templates/header','radar-us','templates/footer'];

		return $this->load_view();
    }
    
    public function radar_us_two(){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $this->views=['../templates/header','radar-us-2','../templates/footer'];

        $this->load_view();
    }
    
    public function radar_landing_three($slug=null){
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $this->data['landingpage3slug']='radar-us/campaign';
	                $this->load->helper('form');
		            $this->load->library('form_validation');
		            $this->form_validation->set_error_delimiters('', '');
        $brand = 'radar-us-landing';
		$country = 1;
		$brand_id=$this->brand_model->get_id($brand);
		
		//Admin Preview Check
		if($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='preview'){
		    if($this->logged_in()){
		      $this->data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    }
		}else{
		    $this->data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
		}
		
		//$this->data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
        $this->views[]='templates/header';
        
        if($slug!==null){
            //Load single page
            $this->data['page_title']=strip_tags(htmlspecialchars_decode($this->data['tyres']['title']));
            $this->data['meta_d']="";
            $this->data['meta_k']="";
			$this->data['extra_stylesheets']=['print.css'];
			$this->data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','omni-contact2.js', "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
			$icons=json_decode($this->data['tyres']['icons'], $assoc_array = false );
			$this->data['icons']=$this->icon_model->get($icons);
            $this->views[]='radar-landing-3-single';
        }else{
            $this->views[]='radar-landing-3';
        }
        
        $this->views[]='../templates/footer';

        $this->load_view();
    }
    
    
    
    public function renegade_x($extra=false){
        
        if($extra && $extra=='download-flyer'){
            $this->load->helper('download');
            force_download('pdfs/renegade-x-us/renegade_x_us_a4_sept_2022.pdf',NULL);
            exit();
        }
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=['moovie.css'];
        $this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","js-cloudimage-360-view.min.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key,"https://js.testfreaks.com/onpage/omni-united.com-radar/head.js"];
        
        if($extra && $extra=='staging'){
            $this->views=['../templates/header','renegade-x-staging','../templates/footer'];
        }
        else {$this->views=['../templates/header','renegade-x','../templates/footer'];}

        $this->load_view();
    }
    
    
    
    public function renegade_x_ca($extra=false){
        
        if($extra && $extra=='download-flyer'){
            $this->load->helper('download');
            force_download('pdfs/renegade-x-us/renegade_x_us_a4_sept_2022.pdf',NULL);
            exit();
        }
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=['moovie.css'];
        $this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","js-cloudimage-360-view.min.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        
        if($extra && $extra=='staging'){
            $this->views=['../templates/header','renegade-x-ca-staging','../templates/footer'];
            //return view('../templates/header', $data) .view('renegade-x-ca-staging'.$page, $data) .view('../templates/footer', $data);
        }
        else {
            $this->views=['../templates/header','renegade-x-ca','../templates/footer'];
            //return view('../templates/header', $data) .view('renegade-x-ca', $data) .view('../templates/footer', $data);
        }

        $this->load_view();
    }
    
    
    
    public function renegade_x_eu($extra=false){
        
        if($extra && $extra=='download-flyer'){
            $this->load->helper('download');
            force_download('pdfs/renegade-x-us/renegade_x_us_a4_sept_2022.pdf',NULL);
            exit();
        }
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=['moovie.css'];
        $this->data['extra_scripts']=["omni-contact2.js",'jquery.singletyre.js',"moovie.js","moovie_init.js","js-cloudimage-360-view.min.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        
        if($extra && $extra=='staging'){
            $this->views=['../templates/header','renegade-x-eu-staging','../templates/footer'];
        }
        else {$this->views=['../templates/header','renegade-x-eu','../templates/footer'];}

        $this->load_view();
    }
    
    
    
    public function renegade_x_row($extra=false){
        
        if($extra && $extra=='download-flyer'){
            $this->load->helper('download');
            force_download('pdfs/renegade-x-us/renegade_x_us_a4_sept_2022.pdf',NULL);
            exit();
        }
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=['moovie.css'];
        $this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","js-cloudimage-360-view.min.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        
        if($extra && $extra=='staging'){
            $this->views=['../templates/header','renegade-x-row-staging','../templates/footer'];
        }
        else {$this->views=['../templates/header','renegade-x-row','../templates/footer'];}

        $this->load_view();
    }
    
    
    
    public function renegade_at_pro($staging=false){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js","js-cloudimage-360-view.min.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        //$this->views=['../templates/header','renegade-at-pro','../templates/footer'];
        
        if($staging && $staging=='staging'){
            $this->views=['../templates/header','renegade-at-pro','../templates/footer'];
        }

        $this->load_view();
    }
    
    
    
    public function renegade_at_5($staging=false){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        //$this->views=['../templates/header','renegade-at-pro','../templates/footer'];
        
        if($staging && $staging=='staging'){
            $this->views=['../templates/header','renegade-at-5','../templates/footer'];
        }

        $this->load_view();
    }
    
    
    
    public function renegade_r_7($staging=false){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        //$this->views=['../templates/header','renegade-at-pro','../templates/footer'];
        
        if($staging && $staging=='staging'){
            $this->views=['../templates/header','renegade-r-7','../templates/footer'];
        }

        $this->load_view();
    }
    
    
    
    public function renegade_rt($staging=false){
        
        $this->data=[];
        $this->data['sidepanel']=["menu"=>1,"submenu"=>1];
        $this->data['page_title']='Radar Tires';
        $this->data['meta_k']="";
        $this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=[];
        $this->data['extra_scripts']=["omni-contact2.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        //$this->views=['../templates/header','renegade-at-pro','../templates/footer'];
        
        if($staging && $staging=='staging'){
            $this->views=['../templates/header','renegade-rt','../templates/footer'];
        }

        $this->load_view();
    }
    
    
	
	function radar_tires_premium($staging=null)
	{
	    $page="radar-tires-premium";
	    if($staging=='staging'){ $page="radar-tires-premium-staging";}
	    $this->data['sidepanel']=["menu"=>2,"submenu"=>1];
        $this->data['page_title']='Radar Tires Premium';
        $this->data['meta_k']="";
    	$this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=["Gobold High Bold.css","Circular-Rotating-Slider/rotating-slider.css"];
    	$this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","Circular-Rotating-Slider/jquery.rotating-slider.js","Circular-Rotating-Slider/jquery.rotating-slider.init.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $components="../components/";
        
        if($staging && $staging=='staging'){
            $page="radar-tires-premium-staging";
        }
        
        $this->views=[
            '../templates/header-radar-full',
            $page,
            '../templates/footer'
            ];
        $this->load_view();
	}
    
    
	
	function radar_tyres_premium()
	{
	    $page="radar-tyres-premium";
	    $this->data['sidepanel']=["menu"=>2,"submenu"=>1];
        $this->data['page_title']='Radar Tires Premium';
        $this->data['meta_k']="";
    	$this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=["Gobold High Bold.css","Circular-Rotating-Slider/rotating-slider.css"];
    	$this->data['extra_scripts']=["omni-contact2.js","Circular-Rotating-Slider/jquery.rotating-slider.js","Circular-Rotating-Slider/jquery.rotating-slider.init.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $components="../components/";
        
        $this->views=[
            '../templates/header-radar-tyre-full',
            $page,
            '../templates/footer'
            ];
        $this->load_view();
	}
    
    
	
	function radartires_red()
	{
	    $page="radar-tires-red";
	    $this->data['sidepanel']=["menu"=>2,"submenu"=>1];
        $this->data['page_title']='Radar RED';
        $this->data['meta_k']="";
    	$this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=["Gobold High Bold.css","Circular-Rotating-Slider/rotating-slider.css"];
    	$this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","Circular-Rotating-Slider/jquery.rotating-slider.js","Circular-Rotating-Slider/jquery.rotating-slider.init.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $components="../components/";
        
        $this->views=[
            '../templates/header-radar-full',
            $page,
            '../templates/footer'
            ];
        return $this->load_view();
	}
    
    
	
	function radartires_red_staging()
	{
	    $page="radar-tires-red-staging";
	    $this->data['sidepanel']=["menu"=>2,"submenu"=>1];
        $this->data['page_title']='Radar RED';
        $this->data['meta_k']="";
    	$this->data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
        $this->data['extra_stylesheets']=["Gobold High Bold.css","Circular-Rotating-Slider/rotating-slider.css"];
    	$this->data['extra_scripts']=["omni-contact2.js","moovie.js","moovie_init.js","Circular-Rotating-Slider/jquery.rotating-slider.js","Circular-Rotating-Slider/jquery.rotating-slider.init.js", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
        $components="../components/";
        
        $this->views=[
            '../templates/header-radar-full',
            $page,
            '../templates/footer'
            ];
        $this->load_view();
	}
    
    
	private function logged_in(){
	    $current_url=uri_string();
	    if (!($this->session->userdata('logged_in'))) { 
	        $this->session->set_flashdata('login_redirect',$current_url);
	        redirect('login'); 
	    }else{return true;}
	}
	
	public function not_found()
	{
	    
		$data['page_title']='404 Page Not Found';
    	$this->load->view('templates/header', $data);
        $this->load->view('pages/err404', $data);
        $this->load->view('templates/footer', $data);
	}
	

}