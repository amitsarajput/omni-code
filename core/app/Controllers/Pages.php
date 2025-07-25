<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Motorsport_Model ;
use App\Models\Carousel_Model ;

class Pages extends BaseController {
    
    //private $site_key="6Lf5EBknAAAAAI3EPPWS6ly67xTDJe5ArFFShaXV";
    private $site_key;
	
	public function __construct()
    {
        $this->site_key=env('RECAPTCHA_SITE_KEY');
    }

    public function index()
    {
		return view('templates/header').view('home').view('templates/footer');
    }
    
    public function view($page = 'who-we-are')
	{
        
        $validation = service('validation');

	        if ( ! file_exists(APPPATH.'Views/pages/'.$page.'.php'))
	        {
                $this->not_found();
                
	        }else{
	            
	            //print_r($page);
    
    	        if ($page=='contact-us') {
                    helper('form');
    	        	$data['page_title']='Contact us';
                    $data['meta_d']="Contact Us If you are interested in purchasing any of the tires on our website, please fill in the above form with your name, email ID, city, state, zip code and country, and we will send you the address of our nearest retailer.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>6,"submenu"=>1];
    	        	$data['extra_scripts']=['omni-contact.js', "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
	                //$this->load->helper('form');
		            //$this->load->library('form_validation');
		            //$validation->set_error_delimiters('', '');
    	        }
	            
	            if ($page=='who-we-are') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>1];
                    $data['page_title']='Who We Are';
                    $data['meta_k']="";
    	        	$data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
    	        }
	            
	            
	            
	            if ($page=='who-we-are-staging') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>1];
                    $data['page_title']='Who We Are';
                    $data['meta_k']="";
    	        	$data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
    	        }
    
    	        if ($page=='misson-vision') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>2];
    	        	$data['page_title']='Our Vision and Mission';
                    $data['meta_d']="Our Vision A Culture and Spirit To Move Our Products, Brands and Ideas, Faster, Further and Freer Innovation is in our blood. We capture trends earlier, thereby designing products and creating enduring brands that speak to the aspirations and lifestyles of today's customers.";
                    $data['meta_k']="";
    	        }
    
    	        if ($page=='our-values') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>3];
    	        	$data['page_title']='Our Values';
                    $data['meta_d']="Value Chain A Global Footprint With A Sustainable Value Chain Omni United strives to deliver innovative products of outstanding quality and value to our consumers. Over the last decade, as we have grown, so has the impact of our activities in the world.";
                    $data['meta_k']="";
    	        }
    
    	        if ($page=='our-values-staging') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>3];
    	        	$data['page_title']='Our Values';
                    $data['meta_d']="Value Chain A Global Footprint With A Sustainable Value Chain Omni United strives to deliver innovative products of outstanding quality and value to our consumers. Over the last decade, as we have grown, so has the impact of our activities in the world.";
                    $data['meta_k']="";
    	        }
    
    	        /*if ($page=='ceo-messages') {
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>4];
    	        	$data['page_title']='Message From The CEO';
                    $data['meta_d']="Message From The CEO CEO’s Message – 2018 CEO’s Message – 2017 CEO’s Message – 2015 Dear Friends, Thanks for visiting the Omni United website. I am delighted to inform you that in the past year, Omni United continued on its path of discovery and innovation.";
                    $data['meta_k']="";
    	        }*/
    
    	        if ($page=='leadership') {
    	        	$data['page_title']='Our Leadership Team';
                    $data['meta_d']="Our Leadership Team Gajendra Singh Sareen Founder, President and CEO G.S. Sareen is the Founder, President and CEO of Omni United, one of the fastest growing global companies in the tire industry.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>5];
    	        	$data['extra_scripts']=array('plugins/jquery.gridder.js','plugins/jquery.gridder.int.js');
    	        }
    
    	        if ($page=='omni-sync') {
    	        	$data['page_title']='OmniSync';
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>8,"submenu"=>1];
    	        	//$data['extra_scripts']=array('plugins/jquery.gridder.js','plugins/jquery.gridder.int.js');
    	        }
    
    	        if ($page=='leadership-staging') {
    	        	$data['page_title']='Our Leadership Team';
                    $data['meta_d']="Our Leadership Team Gajendra Singh Sareen Founder, President and CEO G.S. Sareen is the Founder, President and CEO of Omni United, one of the fastest growing global companies in the tire industry.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>5];
    	        	$data['extra_scripts']=array('plugins/jquery.gridder.js','plugins/jquery.gridder.int.js');
    	        }
    
    	        if ($page=='leadership-stagging2') {
    	        	$data['page_title']='Our Leadership Team';
                    $data['meta_d']="Our Leadership Team Gajendra Singh Sareen Founder, President and CEO G.S. Sareen is the Founder, President and CEO of Omni United, one of the fastest growing global companies in the tire industry.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>5];
    	        	$data['extra_scripts']=array('plugins/jquery.gridder.js','plugins/jquery.gridder.int.js');
    	        }
    
    	        if ($page=='awards') {
    	        	$data['page_title']='Awards';
                    $data['meta_d']="Awards We Are On The Right Path 2018 Super Golden Bull Award 2018 The Super Golden Bull Award recognizes Singapore registered Corporations who have recorded substantial growth over the last 3 years.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>6];
    	        }
    
    	        if ($page=='our-story') {
    	        	$data['page_title']='Our Story';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>1,"submenu"=>7];
    	        	$data['extra_stylesheets']=['horizontal_timeline.2.0.css','horizontal_timeline.2.0-omni.css'];
    	        	$data['extra_scripts']=['js/jquery-mobile.min.js','horizontal_timeline.2.0.js','horizontal_timeline.2.0.int.js'];
    	        }

                if ($page=='north-america-dealer-locator') {
                    $data['page_title']='Dealer Locator - North America';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>7];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                }

                if ($page=='north-america-dealer-locator-staging') {
                    $data['page_title']='Dealer Locator - North America';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>7];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm-staging.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                }

                if ($page=='uk-europe-dealer-locator') {
                    $data['page_title']='Dealer Locator - UK';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>8];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm-uk.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                }

                if ($page=='uk-europe-dealer-locator-staging') {
                    $data['page_title']='Dealer Locator - UK';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>8];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm-uk-staging.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                }

                if ($page=='buy-radar-tires') {
                    $data['page_title']='Buy Radar Tires';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>7];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"];
                }

                if ($page=='buy-radar-tires-staging') {
                    $data['page_title']='Buy Radar Tires';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>7];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"];
                }

                if ($page=='buy-radar-tires-dealers') {
                    $data['page_title']='Buy Radar Tires Dealers';
                    $data['meta_k']="";
                    $data['meta_d']="Mobilizing Life Through Speed's, Innovation, Entrepreneurship and Sustainability, Omni United is one of the most dynamic and fastest growing tire companies in the world.";
                    $data['sidepanel']=["menu"=>2,"submenu"=>7];
                    $data['extra_stylesheets']=[];
                    $data['extra_scripts']=["omni-contact.js","gm.js","https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap", "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                }
    
    	        if ($page=='t-and-c') {
    	        	$data['page_title']='404';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>6];
    	        }
    
    	        if ($page=='motorsport-staging') {
                    $motor = model(Carousel_Model::class);
                    $slider = model(Carousel_Model::class); 

                    $race_data=$motor->where(['post_type'=>'race','status'=>1]);
                    $win_data=$motor->where(['post_type'=>'win']);
                    $slider_data=$slider->where(['attached_to'=>$page,'status'=>1], 1);
                    $races=['upcoming'=>[],'previous'=>[]];
                    $wins=[];
                    foreach ($race_data as $race){
                        $record=json_decode( $race['post_meta'], true );
                        $record['date']=$this->createdate($record['start_date'],$record['end_date']);
                        //if (strtotime($record['end_date'])>=strtotime('today'))
                        if (strtotime($record['end_date'])>=strtotime('1st January 2024')) {
                            $key='upcoming';
                        }else{
                            $key='previous';                            
                        }
                        $races[$key][]= $record;
                    }
                    $data['races']=$races;

                    foreach ($win_data as $win) {
                        $record=json_decode( $win['post_meta'], true );
                        $record['date']=date('F Y',strtotime($record['date']));
                        $year=date('Y',strtotime($record['date']));
                        $wins[$year][]=$record;
                    }
                    krsort($wins);
                    $data['wins']=$wins;
                    if ($slider_data) {
                        foreach ($slider_data as $slider){
                            $record=json_decode( $slider['post_meta'], true );
                            $data['slider']= $record;
                        }
                    }

                    $data['page_title']='Radar Motorsport';
                    $data['meta_d']="Motorsports Pushing The Limits Race WinsRace TiresRacing TeamRace CalendarGalleryIn 2013 Omni United decided to sponsor an off-road racing team in the US, designing tires for off-road desert racing.";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>3,"submenu"=>1];
                }
    
    	        if ($page=='motorsport') {

                    $motor = model(Motorsport_Model::class);
                    $slider = model(Carousel_Model::class); 
                    
                    $race_data=$motor->where(['post_type'=>'race','status'=>1])->findAll();
                    $win_data=$motor->where(['post_type'=>'win','status'=>1])->findAll();
                    $slider_data=$slider->where(['attached_to'=>$page,'status'=>1])->findAll();
                    //print_r($race_data);
                    //exit;
                    $races=['upcoming'=>[],'previous'=>[]];
                    $wins=[];
                    if(!empty($race_data)){
                        foreach ($race_data as $race){
                            $record=json_decode( $race['post_meta'], true );
                            $record['date']=$this->createdate($record['start_date'],$record['end_date']);
                            if (strtotime($record['end_date'])>=strtotime('1st January 2024')) {
                                $key='upcoming';
                            }else{
                                $key='previous';                            
                            }
                            $races[$key][]= $record;
                        }
                    }
                    $data['races']=$races;

                    foreach ($win_data as $win) {
                        $record=json_decode( $win['post_meta'], true );
                        $record['date']=date('F Y',strtotime($record['date']));
                        $year=date('Y',strtotime($record['date']));
                        $wins[$year][]=$record;
                    }
                    krsort($wins);
                    $data['wins']=$wins;
                    if ($slider_data) {
                        
                        foreach ($slider_data as $slider){
                            $record=json_decode( $slider['post_meta'], true );
                            $data['slider']= $record;
                        }
                    }

                    $data['page_title']='Radar Motorsport';
                    $data['meta_d']="Motorsports Pushing The Limits Race WinsRace TiresRacing TeamRace CalendarGalleryIn 2013 Omni United decided to sponsor an off-road racing team in the US, designing tires for off-road desert racing.";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>3,"submenu"=>1];
                }
    
    	        if ($page=='golf') {
                    $this->load->model('Golf_Model','golf');
                    $this->load->model('Carousel_Model','slider');
                    $tournaments_data=$this->golf->where(['post_type'=>'tournament', 'status'=>1]);
                    $highlights_data=$this->golf->where(['post_type'=>'highlight', 'status'=>1]);
                    $slider_data=$this->slider->where(['attached_to'=>$page,'status'=>1], 1);
                    $tournaments=['upcoming'=>[],'previous'=>[]];
                    $highlights=array();
                    foreach ($tournaments_data as $tournament){
                        $record=json_decode( $tournament['post_meta'], true );
                        $record['date']=$this->createdate($record['start_date'],$record['end_date']);
                        if (strtotime($record['end_date'])>=strtotime('today')) {
                            $key='upcoming';
                        }else{
                            $key='previous';                            
                        }
                        $tournaments[$key][]= $record;
                    }
                    $data['tournaments']=$tournaments;

                    foreach ($highlights_data as $highlight) {
                        $record=json_decode( $highlight['post_meta'], true );
                        $year=date('Y',strtotime($record['end_date']));
                        $highlights[$year][]=$highlight;
                    }
                    krsort($highlights);
                    $data['highlights']=$highlights;
                    if ($slider_data) {
                        foreach ($slider_data as $slider){
                            $record=json_decode( $slider['post_meta'], true );
                            $data['slider']= $record;
                        }
                    }

                    $data['page_title']='Golf';
                    $data['meta_d']="Jodi Ewart Shadoff LPGA Golfer Brand Ambassador, Radar TiresOmni UnitedinApril, 2016 appointed its first global, corporate, player sponsorship with the signing of LPGA golfer, Jodi Ewart Shadoff. Jodi is a fast- rising star in the prestigious Ladies Professional Golf Association ranking of women golfers worldwide. She is a professional golfer since 2010 and qualified for the LPGA Tour in 2011.";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>3,"submenu"=>2];
                }
    
    	        if ($page=='relief-efforts') {
    	        	$data['page_title']='Relief Efforts';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>5];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='social-responsibility') {
    	        	$data['page_title']='Social Responsibility';
                    $data['meta_d']="Social Responsibility Our Commitment to Breast Cancer Research We cannot transform the world alone, but we want to demonstrate that if a small company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. G.S.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>1];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='environmental-responsibility') {
    	        	$data['page_title']='Environmental Responsibility';
                    $data['meta_d']="Responsibility Our Commitment to BCRF &amp; The Environment We cannot transform the world alone, but we want to demonstrate that if a small company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. G.S.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>2];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='environmental-responsibility-staging') {
    	        	$data['page_title']='Environmental Responsibility';
                    $data['meta_d']="Responsibility Our Commitment to BCRF &amp; The Environment We cannot transform the world alone, but we want to demonstrate that if a small company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. G.S.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>2];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='environmental-responsibility-staging2') {
    	        	$data['page_title']='Environmental Responsibility';
                    $data['meta_d']="Responsibility Our Commitment to BCRF &amp; The Environment We cannot transform the world alone, but we want to demonstrate that if a small company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. G.S.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>2];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='environmental-responsibility-staging3') {
    	        	$data['page_title']='Environmental Responsibility';
                    $data['meta_d']="Responsibility Our Commitment to BCRF &amp; The Environment We cannot transform the world alone, but we want to demonstrate that if a small company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. G.S.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>2];
    	        	$data['extra_scripts']=['jquery.waypoints.min.js','jquery.counterup.min.js','jquery.counterup.int.min.js'];
    	        }
    
    	        if ($page=='contact-us-googlecaptcha') {
    	        	$data['page_title']='Contact us Google Captcha';
                    $data['meta_d']="Contact Us If you are interested in purchasing any of the tires on our website, please fill in the above form with your name, email ID, city, state, zip code and country, and we will send you the address of our nearest retailer.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>6,"submenu"=>1];
    	        	$data['extra_scripts']=['omni-contact.js', "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
	                $this->load->helper('form');
		            $this->load->library('form_validation');
		            $this->form_validation->set_error_delimiters('', '');
    	        }
    
    	        if ($page=='contact-us-staging') {
    	        	$data['page_title']='Contact us';
                    $data['meta_d']="Contact Us If you are interested in purchasing any of the tires on our website, please fill in the above form with your name, email ID, city, state, zip code and country, and we will send you the address of our nearest retailer.";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>6,"submenu"=>1];
    	        	$data['extra_scripts']=['omni-contact.js'];
	                $this->load->helper('form');
		            $this->load->library('form_validation');
		            $this->form_validation->set_error_delimiters('', '');
    	        }
    
                if ($page=='vehicle-sponsorship-us') {
                    $data['page_title']='Vehicle Sponsorship';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>6,"submenu"=>1];
                    $data['extra_scripts']=['omni-contact.js', "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                    $this->load->helper('form');
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('', '');
                }
    
                if ($page=='tire-registration') {
                    $data['page_title']='Tire Registration';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>6,"submenu"=>1];
                    $data['extra_stylesheets']=['components/datepicker.css'];
                    $data['extra_scripts']=['components/moment.js','components/datepicker.js','omni-contact.js', "https://www.google.com/recaptcha/enterprise.js?render=".$this->site_key];
                    $this->load->helper('form');
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('', '');
                }
    
    	        if ($page =='limited-warranty-american-tourer') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>7,"submenu"=>4];
    	        }
    
    	        /*if ($page =='limited-warranty-american-tourer-us-removed') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>7,"submenu"=>5];
    	        }*/
    
    	        if ($page =='limited-warranty-radar') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>7,"submenu"=>2];
    	        }
    
    	        if ($page =='limited-warranty-radar-us') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>1];
    	        }

                /*if ($page =='limited-warranty-1010') {
                    $data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    $data['sidepanel']=["menu"=>2,"submenu"=>1];
                }*/
    
    	        if ($page =='limited-warranty-patriot') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>7,"submenu"=>3];
    	        }
    
    	        if ($page =='limited-warranty-patriot-us') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>7,"submenu"=>3];
    	        }
                
    
    	        if ($page =='limited-warranty-tecnica') {
    	        	$data['page_title']='Warranty';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>4];
    	        }
    
    	        if ($page =='european-tyre-labeling') {
    	        	$data['page_title']='European Tyre Labeling';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        }
    
    	        if ($page =='new-european-tyre-labeling') {
    	        	$data['page_title']='New European Tyre Labeling';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        }
    
                if ($page =='covid-assistance') {
                    $data['page_title']='COVID-19 Assistance';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>4,"submenu"=>3];
                }
    
                if ($page =='dealer') {
                    $data['page_title']='Dealer Corner';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>7];
                }
                
    
    	        if ($page =='radar-rpx-800-test-results') {
    	        	$data['page_title']='Radar Test Results ';
                    $data['meta_d']="";
                    $data['meta_k']="";
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>10];
    	        }
    
                if ($page =='privacy-policy') {
                    $data['page_title']='Privacy Policy';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$data['sidepanel']=["menu"=>2,"submenu"=>7];
                }
    
                if ($page =='real-people-group') {
                    $data['page_title']='REAL PEOPLE, REAL PERFORMANCE';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$page="radar-red";
                    $data['sidepanel']=["menu"=>1,"submenu"=>8];
                }
    
                if ($page =='olli-seppala') {
                    $data['page_title']='Olli Seppälä';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$page="radar-red";
                    $data['sidepanel']=["menu"=>1,"submenu"=>8];
                }
    
                if ($page =='stephane-clepkens') {
                    $data['page_title']='Stéphane Clepkens';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$page="radar-red";
                    $data['sidepanel']=["menu"=>1,"submenu"=>8];
                }
    
                if ($page =='fabrizio-giugiaro') {
                    $data['page_title']='Fabrizio Giugiaro';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$page="radar-red";
                    $data['sidepanel']=["menu"=>1,"submenu"=>8];
                }
    
    	        if ($page=='red-partner') {
    	        	$data['sidepanel']=["menu"=>2,"submenu"=>1];
    	        	$data['page_title']='Red Partner';
                    $data['meta_d']="Value Chain A Global Footprint With A Sustainable Value Chain Omni United strives to deliver innovative products of outstanding quality and value to our consumers. Over the last decade, as we have grown, so has the impact of our activities in the world.";
                    $data['meta_k']="";
    	        }
                
                // Newsletters
    
                if ($page =='newsletter-september2024') {
                    $data['page_title']='Newsletter September 2024';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$data['sidepanel']=["menu"=>2,"submenu"=>7];
                }
    	        return view('templates/header', $data) .view('pages/'.$page, $data) .view('templates/footer', $data);
	        }
	}
	
	
	function newsletter($page=null)
	{
	    if($page==null){$this->not_found();}
	    
	    if ( ! file_exists(APPPATH.'views/pages/newsletter/'.$page.'.php'))
	        {
                $this->not_found();
                
	        }else{
	            
	            
        	    if ($page =='september2024') {
                    $data['page_title']='Newsletter September 2024';
                    $data['meta_d']="";
                    $data['meta_k']="";
                    //$data['sidepanel']=["menu"=>2,"submenu"=>7];
                }
            
                $this->load->view('templates/header', $data);
                $this->load->view('pages/newsletter/'.$page, $data);
                $this->load->view('templates/footer', $data);
	        }
	}
	
	
	function limited_warranty_radar_us()
	{
	    $page='limited-warranty-radar-us';
        $data['page_title']='Warranty';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>7,"submenu"=>1];
    
        return view('templates/header', $data)
            .view('pages/'.$page, $data)
            .view('templates/footer', $data);
	}
	
	
	function limited_warranty_radar_us_staging()
	{
	    $page='limited-warranty-radar-us-staging';
        $data['page_title']='Warranty';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>7,"submenu"=>1];
    
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
	
	
	function limited_warranty_radar_eu()
	{
	    $page='pages/limited-warranty-radar-eu';
        $data['page_title']='Warranty';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>7,"submenu"=>6];
    
        return view('templates/header', $data)
        .view($page, $data)
        .view('templates/footer', $data);
	}
	
	
	function limited_warranty_radar_eu_staging()
	{
	    $page='pages/limited-warranty-radar-eu-staging';
        $data['page_title']='Warranty';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>7,"submenu"=>6];
    
        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
	}

    function limited_warranty_patriot_us() {
        print_r('here');
        $page='pages/limited-warranty-patriot-us';
        $data['page_title']='Warranty';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>7,"submenu"=>3];
        return view('templates/header', $data).view($page, $data).view('templates/footer', $data);
    }
	
	
	
	
	function home_staging()
	{
	    $page='home-staging';
        $data['page_title']='Omni United';
        $data['meta_d']="";
        $data['meta_k']="";
        $data['sidepanel']=["menu"=>8,"submenu"=>1];
    
        $this->load->view('templates/header-dist-staging', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer-dist-staging', $data);
	}



    public function createdate($start_date, $end_date)
    {
        $start_time=strtotime($start_date);
        $end_time=strtotime($end_date);
        $date='';
        $date.=date('M j',$start_time);
        $date.='<sup>'.date('S',$start_time).'</sup>';
        $date.=' - ';
        if (date('M',$start_time)===date('M',$end_time)) {
            $date.=date('j',$end_time);
        }else{
            $date.=date('M j',$end_time);
        }
        $date.='<sup>'.date('S',$end_time).'</sup>';
        return $date;
    }
	
	public function not_found()
	{
		$data['page_title']='404 Page Not Found';
    	return view('templates/header', $data).view('pages/err404', $data).view('templates/footer', $data);
	}
}