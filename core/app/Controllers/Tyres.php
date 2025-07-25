<?php
namespace App\Controllers;

use App\Models\Tyres_Model ;
use App\Models\Brand_Model ;
use App\Models\Icon_Model ;
use App\Models\Tyre_Reviews_Model ;
use App\Models\Tyre_Video_Section_Model ;

class Tyres extends BaseController {
    
    private $site_key; 
	private $pTf='tires/';
	private $tyres_model,$brand_model,$icon_model,$tyre_reviews_model,$tyre_vs_model;
	
	
	// private $tyres_model = model(Tyres_Model::class);
	// private $brand_model = model(Brand_Model::class);
	// private $icon_model = model(Icon_Model::class);
	// private $tyre_reviews_model = model(Tyre_Reviews_Model::class);
	// private $tyre_vs_model = model(Tyre_Video_Section_Model::class);

	public function __construct()
    {
        $this->site_key=env('RECAPTCHA_SITE_KEY');
		$this->tyres_model = model(Tyres_Model::class);
		$this->brand_model = model(Brand_Model::class);
		$this->icon_model = model(Icon_Model::class);
		$this->tyre_reviews_model = model(Tyre_Reviews_Model::class);
		$this->tyre_vs_model = model(Tyre_Video_Section_Model::class);		
    }
    

	public function radar($slug=null)
	{
		$uri = service('uri');
		$brand='radar';
		$country = 3;
		$brand_id=$this->brand_model->get_id($brand);

		//Admin Preview Check
		if($uri->getSegment(1)=='admin' && $uri->getSegment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
			
		}
		//$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null || $slug=='staging') {

				$data['page_title']="Radar";
                $data['meta_d']="Made For All Radar Tires, the flagship brand of Omni United was launched in 2006. It offers a unique value proposition in its segment.";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js'];			
				$header='templates/header-radar';
				$view='radar';
				if($slug=='staging'){$view='radar-staging';}
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js'];
				
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false);

				$data['icons']=$this->icon_model->get($icons);	
				
				$header='templates/header';
				$view='radar-single';
			}
			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

				
			//print_r('here');
			//exit;

			return view($header, $data).view($this->pTf.$view, $data).view('templates/footer', $data);
        }

	}
	
	public function radar_staging($slug=null)
	{
		$brand='radar';
		$country = 3;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);
		}
		//$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);
		//print_r($data['tyres']);
		//die();
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{

			if ($slug==null) {
				$data['page_title']="Radar";
                $data['meta_d']="Made For All Radar Tires, the flagship brand of Omni United was launched in 2006. It offers a unique value proposition in its segment.";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js'];			
				$header='templates/header-radar';
				$view='radar-staging';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false);

				$data['icons']=$this->icon_model->get($icons);	
				
				$header='templates/header';
				$view='radar-staging-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			$this->load->view($header, $data);
			if ($slug==null) {
				//$this->load->view('templates/radar-country-menu', $data);
			}
			$this->load->view($this->pTf.$view, $data);
	        $this->load->view('templates/footer', $data);
        }

	}

	public function radar_eu($slug=null, $logged_in=false)
	{
		$uri = service('uri');
		$brand='radar-eu';
		$country = 2;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($uri->getSegment(1)=='admin' && $this->uri->segment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
		}
		
		//$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);

		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Radar Europe";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js',"omni-contact.js","gm-uk.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap","https://js.testfreaks.com/onpage/omni-united.com-radar/head.js","testfreaks.js","https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
				
				$header='templates/header-radar';
				$view='radar-eu';
			}else{
				
			
			    $data['tyre_vs_section']=$this->tyre_vs_model->asArray()->find($data['tyres']['id']);
				//var_dump($data['tyres']);
				//exit;
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js',"https://js.testfreaks.com/onpage/omni-united.com-radar/head.js","https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false);

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-eu-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			return view($header, $data).view($this->pTf.$view, $data).view('templates/footer', $data);
    	}

	}

	public function radar_eu_staging($slug=null, $logged_in=false)
	{
		$brand='radar-eu';
		$country = 2;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='preview'){
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);
		}
		
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null || $slug==='staging') {
				$data['page_title']="Radar Europe";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js',"omni-contact.js","gm-uk.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap","https://js.testfreaks.com/onpage/omni-united.com-radar/head.js","testfreaks.js"];
				
				$header='templates/header-radar';
				
				$view='radar-eu-staging';
			}else{
			    $data['tyre_vs_section']=$this->tyre_vs_model->find($data['tyres']['id']);
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js',"https://js.testfreaks.com/onpage/omni-united.com-radar/head.js"];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false);

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-eu-staging-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			$this->load->view($header, $data);
			if ($slug==null) {
				//$this->load->view('templates/radar-country-menu', $data);
			}
			$this->load->view($this->pTf.$view, $data);
	        $this->load->view('templates/footer', $data);
    	}

	}

	public function radar_us($slug=null)
	{
		$uri = service('uri');
		$brand = 'radar-us';
		$country = 1;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($uri->getSegment(1)=='admin' && $uri->getSegment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
		}
		
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{

			if ($slug==null) {
				$data['page_title']="Radar US";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js',"gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap","https://js.testfreaks.com/onpage/omni-united.com-radar/head.js","testfreaks.js"];
				
				$header='templates/header-radar';
				$view='radar-us';
			}else{
			    $data['tyre_reviews']=$this->tyre_reviews_model->tyre_reviews($data['tyres']['id']);
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js',"https://js.testfreaks.com/onpage/omni-united.com-radar/head.js"];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-us-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			return view($header, $data).view($this->pTf.$view, $data).view('templates/footer', $data);
	    }
	}

	public function radar_us_staging($slug=null)
	{
		$brand = 'radar-us';
		$country = 1;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='preview'){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);
		}
		
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{

			if ($slug==null) {
				$data['page_title']="Radar US";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js',"gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"];
				
				$header='templates/header-radar';
				$view='radar-us-staging';
			}else{
			    
			    $data['tyre_reviews']=$this->tyre_reviews_model->tyre_reviews($data['tyres']['id']);
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-us-staging-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			$this->load->view($header, $data);
			if ($slug==null) {
				//$this->load->view('templates/radar-country-menu', $data);			
			}
			$this->load->view($this->pTf.$view, $data);
	        $this->load->view('templates/footer', $data);
	    }
	}
	

	public function radar_ca($slug=null)
	{
		$uri = service('uri');
		$brand = 'radar-ca';
		$country = 4;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($uri->getSegment(1)=='admin' && $uri->getSegment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country);
		}
		
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{

			if ($slug==null) {
				$data['page_title']="Radar CA";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js', "gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"];
				
				$header='templates/header-radar';
				$view='radar-ca';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-ca-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			return view($header, $data).view($this->pTf.$view, $data).view('templates/footer', $data);
	    }
	}

	public function radar_ca_staging($slug=null)
	{
		$brand = 'radar-ca';
		$country = 4;
		$brand_id=$this->brand_model->get_id($brand);
		//Admin Preview Check
		if($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='preview'){
		    //if($this->logged_in()){
		      $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);  
		    //}
		    
		}else{
		    $data['tyres'] = $this->tyres_model->get_tyres_frontend($slug, $brand_id, $country, true);
		}
		
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Radar CA";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['components/bs-select.css'];
				$data['extra_scripts']=['omni.js','components/bs-select.js', "gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"];
				
				$header='templates/header-radar';
				$view='radar-ca-staging';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css','components/bs-select.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js','components/bs-select.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$data['icons']=$this->icon_model->get($icons);
				
				$header='templates/header';
				$view='radar-ca-staging-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>1];
			$data['rcmm']=["rcmenu"=>1,"rcsubmenu"=>1];

			$this->load->view($header, $data);
			if ($slug==null) {
				//$this->load->view('templates/radar-country-menu', $data);			
			}
			$this->load->view($this->pTf.$view, $data);
	        $this->load->view('templates/footer', $data);
	    }
	}
	

	public function patriot($slug=null, $logged_in=false)
	{
		
		$brand='patriot';
		$country = 3;
		$brand_id=$this->brand_model->get_id($brand);
		$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country,$logged_in);
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Patriot";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_scripts']=['omni.js'];
				$v='patriot';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$icons=$this->icon_model->get($icons);
				$data['icons']=$icons;
				$v='patriot-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>2];
			return view('templates/header', $data).view($this->pTf.$v, $data).view('templates/footer', $data);
	    }
	}

	public function radar_tbr($slug=null, $logged_in=false)
	{
		$brand='tbr';
		if ($slug==null) {
			$data['page_title']="Radar TBR";
            $data['meta_d']="";
            $data['meta_k']="";
			$data['extra_scripts']=['omni.js'];
			$v='radar-tbr';
			$data['sidepanel']=["menu"=>2,"submenu"=>9];
		    return view('templates/header', $data).view($this->pTf.$v, $data).view('templates/footer', $data);
		}
	}

	public function radar_tbr_staging($slug=null, $logged_in=false)
	{
		$brand='tbr';
		if ($slug==null) {
			$data['page_title']="Radar TBR";
            $data['meta_d']="";
            $data['meta_k']="";
			$data['extra_scripts']=['omni.js'];
			$v='radar-tbr-staging';
			$data['sidepanel']=["menu"=>2,"submenu"=>9];
		    $this->load->view('templates/header', $data);
		    $this->load->view($this->pTf.$v, $data);
            $this->load->view('templates/footer', $data);
		}
	}

	public function american_tourer($slug=null)
	{
		$brand='american-tourer';
		$country = 2;
		$brand_id=$this->brand_model->get_id($brand);
		$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="American Tourer";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_scripts']=['omni.js'];
				$v='american-tourer';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$icons=$this->icon_model->get($icons);
				$data['icons']=$icons;
				$v='american-tourer-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>3];
			return view('templates/header', $data).view($this->pTf.$v, $data).view('templates/footer', $data);
	    }
	}

	public function agora($slug=null)
	{
		$brand='agora';
		$country = 3;
		$brand_id=$this->brand_model->get_id($brand);
		$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Agora";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_scripts']=['omni.js'];
				$v='agora';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$icons=$this->icon_model->get($icons);
				$data['icons']=$icons;
				$v='agora-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>8];
			$this->load->view('templates/header', $data);
			$this->load->view($this->pTf.$v, $data);
	        $this->load->view('templates/footer', $data);
	    }
	}

	public function tecnica($slug=null)
	{
		$brand='tecnica';
    	$country = 3;
		$brand_id=$this->brand_model->get_id($brand);
		$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id, $country);
		if (empty($data['tyres'])) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Tecnica";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_scripts']=['omni.js'];
				$v='tecnica';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css'];
				$data['extra_scripts']=['jquery.singletyre.js','jquery.print.min.js','omni.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$icons=$this->icon_model->get($icons);
				$data['icons']=$icons;
				$v='tecnica-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>4];
			return view('templates/header', $data).view($this->pTf.$v, $data).view('templates/footer', $data);
	    }
	}

	public function roadlux($slug=null)
	{
		$brand='roadlux';
		$brand_id=$this->brand_model->get_id($brand);
		$data['tyres'] = $this->tyres_model->get_tyres($slug, $brand_id);
		if (empty($data['tyres']) && $slug!=null) {
			$this->not_found();
		}else{
			if ($slug==null) {
				$data['page_title']="Roadlux";
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_scripts']=['omni.js'];
				$v='roadlux';
			}else{
				$data['page_title']=strip_tags(htmlspecialchars_decode($data['tyres']['title']));
                $data['meta_d']="";
                $data['meta_k']="";
				$data['extra_stylesheets']=['print.css'];
				$data['extra_scripts']=['jquery.singletyre.js','omni.js'];
				$icons=json_decode($data['tyres']['icons'], $assoc_array = false );

				$icons=$this->icon_model->get($icons);
				$data['icons']=$icons;
				$v='roadlux-single';
			}

			$data['sidepanel']=["menu"=>2,"submenu"=>5];
			return view('templates/header', $data).view($this->pTf.$v, $data).view('templates/footer', $data);
	    }
	}

	public function preview($slug=null)
	{
		//if (!($this->session->userdata('logged_in'))) { redirect('login'); }
		if ($slug===null) { redirect('login'); }
		if ($slug!==null) { 
			$brand=$this->uri->segment(3);
			$brand=str_replace('-', '_', $brand);
			$this->$brand($slug, true);
		}
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
