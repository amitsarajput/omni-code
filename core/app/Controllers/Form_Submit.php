<?php

namespace App\Controllers;
use App\Models\Submission_Model ;
use App\Controllers\BaseController;
/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Form_Submit extends BaseController {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	protected $helpers = ['url','form','recaptcha'];

	private $result=array();
	
	//Google captcha secret key
	private $secretKey;

	public function __construct()
	{
		$this->secretKey=env('RECAPTCHA_SECRET_KEY');
		$this->session 			= 			service('session');
		$this->submission 		=			model(Submission_Model::class);
	}
	
	function clean_input($input)
	{
	    $clean=trim($input);
	    $clean=htmlspecialchars($clean, ENT_QUOTES);
	    return $clean;
	}
	
	function check_captcha($captcha)
	{
        if (!$captcha || !verifyRecaptcha($captcha)) {
            return redirect()->back()->with('error', 'reCAPTCHA verification failed.');
        }else{
			return true;
		}
	}
	
	
	function check_captcha_OLD($captcha , $receive_all=false)
	{

            // Google reCAPTCHA verification API Request  
            $api_url = 'https://www.google.com/recaptcha/api/siteverify';  
            $resq_data = array(  
                'secret' => $this->secretKey,  
                'response' => $captcha,  
                'remoteip' => $_SERVER['REMOTE_ADDR']  
            );  
  
            $curlConfig = array(  
                CURLOPT_URL => $api_url,  
                CURLOPT_POST => true,  
                CURLOPT_RETURNTRANSFER => true,  
                CURLOPT_POSTFIELDS => $resq_data  
            );  
  
            $ch = curl_init();  
            curl_setopt_array($ch, $curlConfig);  
            $response = curl_exec($ch);  
            curl_close($ch); 
  
            // Decode JSON data of API response in array  
            $responseData = json_decode($response); 
            
            if ($receive_all==false){
                $responseData=$responseData->success;
            }
            return $responseData;
	    
	}
	
	public function contact_form_google_captcha()
	{
	    $cap_responce=$this->check_captcha($this->input->post('g-recaptcha'));
	   //$this->result=['status'=>'success','message'=>'Message sent successfully.'.$cap_responce];
				    //$this->show_result();exit;
	    
	    if ($cap_responce) {
    		$validation->setRule('name', 'Name', 'trim');
        	$validation->setRule('email', 'Email', 'trim');
			if ($this->form_validation->run()==false) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post=$this->input->post();
				unset($post['submit']);
				$config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['mailtype'] = 'html';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
				$this->load->library('email',$config);
				
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				
                $message.='<br><br><br><br><br><br><br>This message was sent from https://www.omni-united.com/contact-us';

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$to='amit@lopamudracreative.com';
				
				$email->setTo($to);
				
				$email->setSubject('Enquiry from '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Message sent successfully.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.'];
    		$this->show_result();exit;
    	}
    	//$this->show_result();
	}
	
	public function contact_form()
	{	
		$validation = service('validation');
	    $cap_responce=$this->check_captcha($this->request->getPost('g-recaptcha'));
	    
	    if ($cap_responce) {
    		$validation->setRule('name', 'Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required');
        	$validation->setRule('region', 'Region', 'trim|required|min_length[3]');
        	$validation->setRule('country', 'Country', 'trim|required|alpha_dash|min_length[3]');
        	$validation->setRule('message', 'Message', 'trim');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');
				$regionoptions = array(
                            ''         => 'REGION*',
                            'NorthAmerica'         => 'North America',
                            'SouthAmerica'         => 'South America',
                            'Europe'         => 'Europe',
                            'Asia'         => 'Asia',
                            'MiddleEastandAfrica'         => 'Middle East and Africa',
                    );
                
                //Saving in database
                $datasql['name']=$post['name'];
				$datasql['email']=$post['email'];
				$datasql['region']=$regionoptions[$post['region']];
				$datasql['country']=$post['country'];
				$datasql['message']=$post['message'];
				$datasql['campaign']='contact';
				$datasql['date']=date('Y-m-d');
				
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='contact_enquiry';
				$indata['status']=true;
				$this->submission->insert($indata);
                //Saving in database end
				
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Region:</b> '.$regionoptions[$post['region']].'<br>';
				$message.='<b>Country:</b> '.$post['country'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
                $message.='<br><br><br><br><br><br><br>This message was sent from https://www.omni-united.com/contact-us';

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$to=['manavsuri@omni-united.com'];
				//amitsarajput@gmail.com
				if($post['region']==='NorthAmerica'){
				   //$to[]='caseyrobinson@omni-united.com';
				} elseif($post['region']==='Asia'){ 
				    $to[]='john@omni-united.com'; 
				}
				$email->setTo($to);
				//$bcc=['manav484@gmail.com'];
				//$bcc[]='amit@lopamudracreative.com';
				//$this->email->bcc($bcc);

				$email->setSubject('Enquiry from '.$post['name']);
				$email->setMessage($message);
				
				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Message sent successfully.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
    	//$this->show_result();
	}


	public function sponsorship_form()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
    		$validation->setRule('name', 'Name', 'trim|required|min_length[3]');
    		$validation->setRule('company', 'Company', 'trim|required');
    		$validation->setRule('phone', 'Phone', 'trim|required');
    		$validation->setRule('email', 'Email', 'trim|required');
    		$validation->setRule('website', 'Website', 'trim|valid_url');
    		$validation->setRule('address', 'Address', 'trim|required');
    		$validation->setRule('appartment', 'Appartment', 'trim');
    		$validation->setRule('city', 'City', 'trim|required');
    		$validation->setRule('state', 'State', 'trim|required');
    		$validation->setRule('zipcode', 'Zipcode', 'trim|required');

    		$validation->setRule('vehicle-owner-name', 'Vehicle Owner Name', 'trim|required');
    		$validation->setRule('vehicle-year', 'Vehicle Year', 'trim|required|numeric');
    		$validation->setRule('vehicle-make', 'Vehicle Make', 'trim|required');
    		$validation->setRule('vehicle-model', 'Vehicle Model', 'trim|required');
    		$validation->setRule('vehicle-applicable-info', 'Vehicle Applicable Info', 'trim');
    		$validation->setRule('vehicle-modifications', 'Vehicle Modifications', 'trim');
    		$validation->setRule('vehicle-sponsors', 'Vehicle Sponsors', 'trim');
    		$validation->setRule('vehicle-planned-modifications', 'Vehicle Planned Modifications', 'trim');

    		$validation->setRule('sponsorship-request', 'Sponsorship Request', 'trim|required');
    		$validation->setRule('sponsorship-promotions', 'Sponsorship Promotions', 'trim');
    		$validation->setRule('sponsorship-social', 'Personal Social Media Plans', 'trim');
    		$validation->setRule('sponsorship-other-info', 'Sponsorship Other Info', 'trim');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');		

				$file=$_FILES;
				
				//vehicle-photo checks
				if ($file['vehicle-photo']['error']) {
				    $this->result=['status'=>'error','message'=>'Please upload photo of your vehicle.'];
					$this->show_result();exit;  
				}
				if(!($file['vehicle-photo']['type'] =='image/png' || $file['vehicle-photo']['type'] =='image/jpeg' || $file['vehicle-photo']['type'] =='image/jpg')){
				    $this->result=['status'=>'error','message'=>'Please upload photo of your vehicle in JPG or PNG format.'];
			        $this->show_result();exit;
				}
				if($file['vehicle-photo']['size'] > 10485760){
				    $this->result=['status'=>'error','message'=>'Please upload photo of your vehicle under 10MB.'];
			        $this->show_result();exit;
				}
				
				//proposal-submission checks
				if ($file['proposal-submission']['error']){
				    $this->result=['status'=>'error','message'=>'Please upload proposal.'];
					$this->show_result();exit;
				}
				if (!($file['proposal-submission']['type'] =='application/pdf' || $file['proposal-submission']['type'] =='application/msword' || $file['proposal-submission']['type'] =='application/vnd.openxmlformats-officedocument.wordprocessingml.document')){
				    $this->result=['status'=>'error','message'=>'Please upload proposal in PDF or Word DOC format.'];
					$this->show_result();exit;
				}
				if ($file['proposal-submission']['size'] > 10485760) {
				    $this->result=['status'=>'error','message'=>'Please upload proposal under 10MB.'];
					$this->show_result();exit;
				}
				
				//sponsorship-promotion-plans not required checks
				if (!$file['sponsorship-promotion-plans']['error']){
				    if($file['sponsorship-promotion-plans']['type'] !='application/pdf'){
				        $this->result=['status'=>'error','message'=>'Please upload promotional plans for the vehicle in PDF format.'];
    					$this->show_result();exit;
				    }
				    if($file['sponsorship-promotion-plans']['size'] > 10485760){
				        $this->result=['status'=>'error','message'=>'Please upload promotional plans for the vehicle under 10MB.'];
    					$this->show_result();exit;
				    }
				}
				
					
					$message='<b>Name:</b><br> '					                            .$post['name'].'<br><br>';
					$message.='<b>Company:</b><br> '				                            .$post['company'].'<br><br>';
					$message.='<b>Phone:</b><br> '					                            .$post['phone'].'<br><br>';
					$message.='<b>Email:</b><br> '					                            .$post['email'].'<br><br>';
					$message.='<b>Website:</b><br> '				                            .$post['website'].'<br><br>';
					$message.='<b>Address:</b><br> '				                            .$post['address'].'<br><br>';
					$message.='<b>Appartment:</b><br> '				                            .$post['appartment'].'<br><br>';
					$message.='<b>City:</b><br> '					                            .$post['city'].'<br><br>';
					$message.='<b>State:</b><br> '					                            .$post['state'].'<br><br>';
					$message.='<b>Zipcode:</b><br> '				                            .$post['zipcode'].'<br><br>';

					$message.='<b>Vehicle Owner Name:</b><br> '		                            .$post['vehicle-owner-name'].'<br><br>';
					$message.='<b>Vehicle Year:</b><br> '			                            .$post['vehicle-year'].'<br><br>';
					$message.='<b>Vehicle Make:</b><br> '			                            .$post['vehicle-make'].'<br><br>';
					$message.='<b>Vehicle Model:</b><br> '			                            .$post['vehicle-model'].'<br><br>';
					$message.='<b>Vehicle Applicable Info:</b><br> '                            .$post['vehicle-applicable-info'].'<br><br>';
					$message.='<b>Vehicle Modifications:</b><br> '	                            .$post['vehicle-modifications'].'<br><br>';
					$message.='<b>Vehicle Sponsors:</b><br> '		                            .$post['vehicle-sponsors'].'<br><br>';
					$message.='<b>Vehicle Planned Modifications:</b><br> '                      .$post['vehicle-planned-modifications'].'<br><br>';
					$message.='<b>Upload Photo of your Vehicle:</b><br> '                       .$file['vehicle-photo']['name'].'<br><br>';
					if (!$file['vehicle-photo']['error']) {
					    $this->email->attach($file['vehicle-photo']['tmp_name'], 'attachment',$file['vehicle-photo']['name']);
					}

				    $message.='<b>Sponsorship Request:</b><br> '					            .$post['sponsorship-request'].'<br><br>';
					$message.='<b>Sponsorship Promotions:</b><br> '					            .$post['sponsorship-promotions'].'<br><br>';
					$message.='<b>Personal Social Media Plans:</b><br> '				        .$post['sponsorship-social'].'<br><br>';
					$message.='<b>List of promotional plans for the vehicle:</b><br> '          .$file['sponsorship-promotion-plans']['name'].'<br><br>';
					if (!$file['proposal-submission']['error']){
					    $this->email->attach($file['sponsorship-promotion-plans']['tmp_name'], 'attachment',$file['sponsorship-promotion-plans']['name']);
					}

					$message.='<b>Sponsorship Other Info:</b><br> '					            .$post['sponsorship-other-info'].'<br><br>';
					$message.='<b>ListProposal Submission:</b><br> '					        .$file['proposal-submission']['name'].'<br><br>';
					if (!$file['proposal-submission']['error']){
					    $this->email->attach($file['proposal-submission']['tmp_name'], 'attachment',$file['proposal-submission']['name']);
					}

	                $message.='<br><br><br><br><br><br><br>This message was sent from https://omni-united.com/vehicle-sponsorship-us/';

					//$this->result=['status'=>'error','message'=>$message];
					//$this->show_result();

					//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
					$email->setTo('manavsuri@omni-united.com');//amitsarajput@gmail.com,casey.j.robinson1@gmail.com,manav484@gmail.com

					$email->setSubject('Sponsorship Enquiry from '.$post['name']);
					$email->setMessage($message);

					if ($email->send()) {
					    $this->result=['status'=>'success','message'=>'Message sent successfully.','type'=>'mail_error'];
					    $this->show_result();exit;
					}else{
					    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.'];
					    $this->show_result();exit;
					}
			}
    	}else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
	}
	
	
	public function tire_registration()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
    		$validation->setRule('purchase_date', 'Purchase Date', 'trim|required|min_length[8]|max_length[8]');
        	$validation->setRule('first_name', 'First Name', 'trim|required');
        	$validation->setRule('last_name', 'Last Name', 'trim|required');
        	$validation->setRule('email', 'Email', 'trim|required');
        	$validation->setRule('address_1', 'Street Address 1', 'trim');
        	$validation->setRule('address_2', 'Street Address 2', 'trim');
        	$validation->setRule('city', 'City', 'trim|required');
        	$validation->setRule('state', 'State', 'trim|required');
        	$validation->setRule('zipcode', 'Zipcode', 'trim|required|alpha_dash');
        	$validation->setRule('dealer_name', 'Dealer Name', 'trim|required');
        	$validation->setRule('dealer_address_1', 'Dealer Street Address 1', 'trim');
        	$validation->setRule('dealer_address_2', 'Dealer Street Address 2', 'trim');
        	$validation->setRule('dealer_city', 'Dealer City', 'trim|required');
        	$validation->setRule('dealer_state', 'Dealer State', 'trim|required');
        	$validation->setRule('dealer_zipcode', 'Dealer Zipcode', 'trim|required|alpha_dash');
        	$validation->setRule('brand', 'Brand', 'trim|required|alpha_numeric_spaces');
        	$validation->setRule('pattern', 'Pattern', 'trim|required');
        	$validation->setRule('quantity[]', 'Quantity', 'trim|required|numeric');
        	$validation->setRule('dot[]', 'Dot', 'trim|required|alpha_numeric');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');		

				$post['name']=$post['first_name'].' '.$post['last_name'];
				unset($post['submit']);
				
				$datasql=[];
					$datasql['customer-information']['first-name']=$post['first_name'];
					$datasql['customer-information']['last-name']=$post['last_name'];
					$datasql['customer-information']['email']=$post['email'];
					$datasql['customer-information']['address-1']=$post['address_1'];
					$datasql['customer-information']['address-2']=$post['address_2'];
					$datasql['customer-information']['city']=$post['city'];
					$datasql['customer-information']['state']=$post['state'];
					$datasql['customer-information']['zipcode']=$post['zipcode'];

					$datasql['dealer-information']['name']=$post['dealer_name'];
					$datasql['dealer-information']['address_1']=$post['dealer_address_1'];
					$datasql['dealer-information']['address_2']=$post['dealer_address_2'];
					$datasql['dealer-information']['city']=$post['dealer_city'];
					$datasql['dealer-information']['state']=$post['dealer_state'];
					$datasql['dealer-information']['zipcode']=$post['dealer_zipcode'];

					$datasql['tyre-information']['brand']=$post['brand'];
					$datasql['tyre-information']['pattern']=$post['pattern'];
					$datasql['tyre-information']['quantity']=$post['quantity'];
					$datasql['tyre-information']['dot']=$post['dot'];
					$datasql['tyre-information']['purchase-date']=$post['purchase_date'];
					$datasql['date']=date('Y-m-d');
					$indata['post_meta']=json_encode($datasql);
					$indata['post_type']='tyre-registration';
					$indata['status']=true;
					$this->submission->insert($indata);
				
				$message='<b>CUSTOMER INFORMATION</b><br>';
				$message.='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Street Address 1:</b> '.$post['address_1'].'<br>';
				$message.='<b>Street Address 2:</b> '.$post['address_2'].'<br>';
				$message.='<b>City:</b> '.$post['city'].'<br>';
				$message.='<b>State:</b> '.$post['state'].'<br>';
				$message.='<b>Zipcode:</b> '.$post['zipcode'].'<br>';
				
				$message.='<b>DEALER INFORMATION</b><br>';
				$message.='<b>Name:</b> '.$post['dealer_name'].'<br>';
				$message.='<b>Street Address 1:</b> '.$post['dealer_address_1'].'<br>';
				$message.='<b>Street Address 2:</b> '.$post['dealer_address_2'].'<br>';
				$message.='<b>City:</b> '.$post['dealer_city'].'<br>';
				$message.='<b>State:</b> '.$post['dealer_state'].'<br>';
				$message.='<b>Zipcode:</b> '.$post['dealer_zipcode'].'<br>';
				
				$message.='<b>TIRE INFORMATION</b><br>';
				$message.='<b>Brand:</b> '.$post['brand'].'<br>';
				$message.='<b>Pattern:</b> '.$post['pattern'].'<br>';
				$message.='<b>DOT#:</b> '.implode(", ", $post['dot']).'<br>';
				$message.='<b>QUANTITY:</b> '.implode(", ", $post['quantity']).'<br>';
				$message.='<b>Purchase Date:</b> '.$post['purchase_date'].'<br>';
                $message.='<br><br><br><br><br><br><br>This message was sent from https://omni-united.com/tire-registration/';

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$email->setTo('manavsuri@omni-united.com,manav484@gmail.com');//amitsarajput@gmail.com 

				$email->setSubject('Tire Registration from '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Tire has been registered successfully.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Tire could not be registered, Please try after some time.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Tire could not be registered.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}

	}
	
	
	public function dealerlocatorform()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    if ($cap_response) {
    		$validation->setRule('name', 'Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required|valid_email');
        	$validation->setRule('location', 'Location', 'trim|required');
        	$validation->setRule('message', 'Message', 'trim');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');			
				
                //Saving in database
                $datasql['name']=$post['name'];
				$datasql['email']=$post['email'];
				$datasql['location']=$post['location'];
				$datasql['message']=$post['message'];
				$datasql['region']='US';
				$datasql['campaign']='dealerlocator';
				$datasql['date']=date('Y-m-d');
				
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='dealerlocator';
				$indata['status']=true;
				$this->submission->insert($indata);
                //Saving in database end
				

				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Location:</b> '.$post['location'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
                $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$email->setTo('manavsuri@omni-united.com', 'prekshadale@omnisourceusa.com');//manavsuri@omni-united.com, manav484@gmail.com, 
				//$email->bcc('manav484@gmail.com,');

				$email->setSubject(ucfirst($post['name']).' is looking for a dealer');
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Thank you for your inquiry. We will get back to you shortly.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Message can\'t be sent, Please try after sometime.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Message can\'t be sent, Please try after sometime.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}

	}
	
	public function dealerlocatorformeurope()
	{
		$validation = service('validation');
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    if ($cap_response) {
    		$validation->setRule('name', 'Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required|valid_email');
        	$validation->setRule('location', 'Location', 'trim|required');
        	$validation->setRule('message', 'Message', 'trim');

			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');
				
                //Saving in database
                $datasql['name']=$post['name'];
				$datasql['email']=$post['email'];
				$datasql['location']=$post['location'];
				$datasql['message']=$post['message'];
				$datasql['region']='EU';
				$datasql['campaign']='dealerlocator';
				$datasql['date']=date('Y-m-d');
				
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='dealerlocator';
				$indata['status']=true;
				$this->submission->insert($indata);
                //Saving in database end
                $message='';
				$message.='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Location:</b> '.$post['location'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
                $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$email->setTo('manavsuri@omni-united.com');//manavsuri@omni-united.com, manav484@gmail.com, 
				//$this->email->bcc('manav484@gmail.com');

				$email->setSubject(ucfirst($post['name']).' is looking for a dealer');
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Thank you for your inquiry. We will get back to you shortly.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Message can\'t be sent, Please try after sometime. Mail send error.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Message can\'t be sent, Please try after sometime.Captcha Error.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}

	}

	public function subscribe()
	{
		$validation = service('validation');
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
			$validation->setRule('name', 'Name', 'trim|alpha_numeric_spaces');
	    	$validation->setRule('email', 'Email', 'trim|required|valid_email');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$datasql['name']=$post['name'];
				$datasql['email']=$post['email'];
				$datasql['campaign']='radarlanding2';
				
				if($this->submission->where_json($datasql['email'], 'subscriber')){
					$res=$this->submission->where_json($datasql['email'], 'subscriber');
					$exist=false;
					foreach($res as $el){
						if(strpos($el, $datasql['email'])){
							$exist=true;
						}
						break;
					}
					if($exist){
						$this->result=['status'=>'success','message'=>'Email already exist.'];
				    	$this->show_result();exit;
					}
				}
				
				$datasql['date']=date('Y-m-d');
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='subscriber';
				$indata['status']=true;
				$this->submission->insert($indata);
				
				$email = service('email');
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
	            $message.='<br><br><br><br><br><br><br>This message was sent from https://omni-united.com';

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$email->setTo('manavsuri@omni-united.com,manav484@gmail.com');//amitsarajput@gmail.com

				$email->setSubject('New subscriber '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Thank you for subscribing.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Could not subscribe please try after some time..','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
		}else{
    		$this->result=['status'=>'error','message'=>'Error','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
	}

	public function subscribe_tnt()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
			$validation->setRule('name', 'Name', 'trim|required|alpha_numeric_spaces');
	    	$validation->setRule('email', 'Email', 'trim|required|valid_email');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');

				$datasql['name']=$post['name'];
				$datasql['email']=$post['email'];
				$datasql['wholesaler']=isset($post['wholesaler']) && $post['wholesaler']==='on'? true : false;
				$datasql['retailer']=isset($post['retailer']) && $post['retailer']==='on'? true : false;
				$datasql['campaign']='radar-us-campaign';
				
				if($this->submission->where_json($datasql['email'], 'subscriber-tnt')){
					$res=$this->submission->where_json($datasql['email'], 'subscriber-tnt');
					$exist=false;
					foreach($res as $el){
						if(strpos($el, $datasql['email'])){
							$exist=true;
						}
						break;
					}
					if($exist){
						$this->result=['status'=>'success','message'=>'Email already exist.'];
				    	$this->show_result();exit;
					}
				}
				
				$datasql['date']=date('Y-m-d');
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='subscriber-tnt';
				$indata['status']=true;
				$this->submission->insert($indata);
				
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				if($datasql['wholesaler'] || $datasql['retailer']){
				    $message.='<b>I am a:</b>';
				    $datasql['wholesaler']?$message.=' Wholesaler':'';
				    $datasql['retailer']?$message.=' Retailer':'';
				    $message.='<br>';
				}
	            $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$to=['manavsuri@omni-united.com'];
				//$to[]='caseyrobinson@omni-united.com';
				$to[]='sayeed@omni-united.com';
				//$to[]='amycoleman@omni-united.com';
				//$to[]='manav484@gmail.com';
				//$to[]='casey.j.robinson1@gmail.com';
                //$to[]='Caseyjrobinson1@gmail.com';
				//$to[]='amit@lopamudracreative.com';
				//$bcc=['manav484@gmail.com','casey.j.robinson1@gmail.com'];
				$email->setTo($to);//amitsarajput@gmail.com
				//$this->email->bcc($bcc);

				$email->setSubject('New TNT subscriber '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $this->result=['status'=>'success','message'=>'Thank you for subscribing.'];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Could not subscribe please try after some time..','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
		}else{
    		$this->result=['status'=>'error','message'=>'Error','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
	}
	
	public function order_inquiry()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));	    
	    if ($cap_response) {
	        $validation->setRule('name', 'Name', 'trim|required|min_length[3]');
    		$validation->setRule('companyname', 'Company Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required|valid_email');
        	$validation->setRule('mobile', 'Phone', 'trim|min_length[3]');
        	$validation->setRule('addresslocation', 'ADDRESS/LOCATION', 'trim|min_length[3]');
        	$validation->setRule('message', 'Inquiry', 'trim');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
				$email = service('email');
				
				//Database Insert 
				$datasql=[];
				$datasql['name']=$post['name'];
				$datasql['companyname']=$post['companyname'];
				$datasql['email']=$post['email'];
				$datasql['mobile']=$post['mobile'];
				$datasql['addresslocation']=$post['addresslocation'];
				$datasql['message']=$post['message'];
				$datasql['wholesaler']=isset($post['wholesaler']) && $post['wholesaler']==='on'? true : false;
				$datasql['retailer']=isset($post['retailer']) && $post['retailer']==='on'? true : false;
				$datasql['campaign']='radar-us-campaign';
				
				$datasql['date']=date('Y-m-d');
				$indata['post_meta']=json_encode($datasql);
				$indata['post_type']='radar-us-campaign-order-inquiry';
				$indata['status']=true;
				$this->submission->insert($indata);	
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Company Name:</b> '.$post['companyname'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Phone:</b> '.$post['mobile'].'<br>';
				$message.='<b>Address/Locaiton:</b> '.$post['addresslocation'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
				if($datasql['wholesaler'] || $datasql['retailer']){
				    $message.='<b>I am a:</b>';
				    $datasql['wholesaler']?$message.=' Wholesaler':'';
				    $datasql['retailer']?$message.=' Retailer':'';
				    $message.='<br>';
				}
                $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				$to=['manavsuri@omni-united.com'];
				//$to[]='caseyrobinson@omni-united.com';
				$to[]='nadiarodriguez@omni-united.com';
				$to[]='sayeed@omni-united.com';
				$to[]='prekshadale@omnisourceusa.com';
				//$to[]='manav484@gmail.com';
				//$to[]='amycoleman@omni-united.com';
				//$to[]='casey.j.robinson1@gmail.com';
                //$to[]='Caseyjrobinson1@gmail.com';
				//$to[]='amit@lopamudracreative.com';
				//$to[]='info@omni-united.com';
				//$bcc=['manav484@gmail.com','casey.j.robinson1@gmail.com'];
				$email->setTo($to);//amitsarajput@gmail.com
				//$this->email->bcc($bcc);

				$email->setSubject('Order Inquiry from '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $helpid='info@omni-united.com';
				    $this->result=['status'=>'success','message'=>"Thank you for your inquiry. One of our sales representative will reach out to you within a business day. Alternatively you can reach out to us at ".$helpid];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
    	//$this->show_result();
	}
	
	public function renegade_x_inquiry()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
	        $validation->setRule('name', 'Name', 'trim|required|min_length[3]');
    		$validation->setRule('companyname', 'Company Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required|valid_email');
        	$validation->setRule('mobile', 'Phone', 'trim|min_length[3]');
        	$validation->setRule('addresslocation', 'ADDRESS/LOCATION', 'trim|min_length[3]');
        	$validation->setRule('message', 'Inquiry', 'trim|required');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();				
				$email = service('email');			
				
				//Database Insert 
				$datasql=[];
				$datasql['name']=$post['name'];
				$datasql['companyname']=$post['companyname'];
				$datasql['email']=$post['email'];
				$datasql['mobile']=$post['mobile'];
				$datasql['addresslocation']=$post['addresslocation'];
				$datasql['message']=$post['message'];
				$datasql['wholeseller']=isset($post['wholeseller']) && $post['wholeseller']==='on'? true : false;
				$datasql['retailer']=isset($post['retailer']) && $post['retailer']==='on'? true : false;
				$datasql['consumer']=isset($post['consumer']) && $post['consumer']==='on'? true : false;
				$datasql['campaign']='renegade-x-inquiry';
				$datasql['date']=date('Y-m-d');
				$indata['post_meta']=json_encode($datasql);
        				$indata['post_type']='radar-us-renegade-x-inquiry';
				$indata['status']=true;
				$this->submission->insert($indata);
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Company Name:</b> '.$post['companyname'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Phone:</b> '.$post['mobile'].'<br>';
				$message.='<b>Address/Locaiton:</b> '.$post['addresslocation'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
				if($datasql['wholesaler'] || $datasql['retailer']){
				    $message.='<b>I am a:</b>';
				    $datasql['wholesaler']?$message.=' Wholesaler':'';
				    $datasql['retailer']?$message.=' Retailer':'';
				    $datasql['consumer']?$message.=' Consumer':'';
				    $message.='<br>';
				}
                $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				/*$to=['manavsuri@omni-united.com'];
				$to[]='caseyrobinson@omni-united.com';
				$to[]='amycoleman@omni-united.com';
				$to[]='nadiarodriguez@omni-united.com';
				$to[]='manav484@gmail.com';
				$to[]='casey.j.robinson1@gmail.com';
				$to[]='sayeed@omni-united.com';
                $to[]='Caseyjrobinson1@gmail.com';*/
				$to=['info@omni-united.com'];
				// $to[]='prekshadale@omnisourceusa.com';
				//$bcc=['manav484@gmail.com','casey.j.robinson1@gmail.com'];
				$email->setTo($to);//amitsarajput@gmail.com
				
				//$bcc=['amit@lopamudracreative.com'];
				//$this->email->bcc($bcc);

				$email->setSubject('Renegade X Contact Inquiry from '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $helpid='info@omni-united.com';
				    $this->result=['status'=>'success','message'=>"Thank you for your inquiry. One of our sales representative will reach out to you within a business day. Alternatively you can reach out to us at ".$helpid];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'recaptcha'];
    		$this->show_result();exit;
    	}
    	//$this->show_result();
	}
	
	
	public function radartires_premium_inquiry()
	{
		$validation = service('validation');	    
	    $cap_response=$this->check_captcha($this->input->post('g-recaptcha'));
	    
	    if ($cap_response) {
	        $validation->setRule('name', 'Name', 'trim|required|min_length[3]');
    		$validation->setRule('companyname', 'Company Name', 'trim|required|min_length[3]');
        	$validation->setRule('email', 'Email', 'trim|required|valid_email');
        	$validation->setRule('mobile', 'Phone', 'trim|min_length[3]');
        	$validation->setRule('addresslocation', 'ADDRESS/LOCATION', 'trim|min_length[3]');
        	$validation->setRule('message', 'Inquiry', 'trim|required');
			$post=$this->request->getPost();
			unset($post['submit']);
			if (!$validation->run($post)) {
				$this->result=['status'=>'error','message'=>validation_errors(),'type'=>'validation'];
				$this->show_result();exit;
			}else{
				$post = $validation->getValidated();
                $email = service('email');		
				
				//Database Insert 
				$datasql=[];
				$datasql['name']=$post['name'];
				$datasql['companyname']=$post['companyname'];
				$datasql['email']=$post['email'];
				$datasql['mobile']=$post['mobile'];
				$datasql['addresslocation']=$post['addresslocation'];
				$datasql['message']=$post['message'];
				$datasql['wholeseller']=isset($post['wholeseller']) && $post['wholeseller']==='on'? true : false;
				$datasql['retailer']=isset($post['retailer']) && $post['retailer']==='on'? true : false;
				$datasql['consumer']=isset($post['consumer']) && $post['consumer']==='on'? true : false;
				
				$current_page_split=explode("/", $post['current_page']);
				if(in_array("radartyres",$current_page_split)){
				    $datasql['campaign']='radartyres-premium-inquiry-campaign';}
				else{
				    $datasql['campaign']='radartires-premium-inquiry-campaign';}
				
				$datasql['date']=date('Y-m-d');
				
				$indata['post_meta']=json_encode($datasql);
				
				if(in_array("radartyres",$current_page_split)){
				$indata['post_type']='radartyres-premium-inquiry';}
				else{$indata['post_type']='radartires-premium-inquiry';}
				
				$indata['status']=true;
				$this->submission->insert($indata);
				
				$message='<b>Name:</b> '.$post['name'].'<br>';
				$message.='<b>Company Name:</b> '.$post['companyname'].'<br>';
				$message.='<b>Email:</b> '.$post['email'].'<br>';
				$message.='<b>Phone:</b> '.$post['mobile'].'<br>';
				$message.='<b>Address/Locaiton:</b> '.$post['addresslocation'].'<br>';
				$message.='<b>Message:</b> '.$post['message'].'<br>';
				if($datasql['wholesaler'] || $datasql['retailer']||$datasql['consumer']){
				    $message.='<b>I am a:</b>';
				    $datasql['wholesaler']?$message.=' Wholesaler':'';
				    $datasql['retailer']?$message.=' Retailer':'';
				    $datasql['consumer']?$message.=' Consumer':'';
				    $message.='<br>';
				}
                $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page'];

				//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
				
				$to=['manavsuri@omni-united.com'];
				if(in_array("radartyres",$current_page_split)){
				    $to[]='emilnakov@omni-united.com';
                    $to[]='michaelcati@omni-united.com';}
				else{
				    $to[]='nadiarodriguez@omni-united.com';
                    $to[]='hanut@omni-united.com';
                    $to[]='lbartula@omnisourceusa.com';
				}
				
				$email->setTo($to);//amitsarajput@gmail.com
				
				//$bcc=['amit@lopamudracreative.com'];
				//$this->email->bcc($bcc);

				$email->setSubject('Inquiry from '.$post['name']);
				$email->setMessage($message);

				if ($email->send()) {
				    $helpid='info@omni-united.com';
				    $this->result=['status'=>'success','message'=>"Thank you for your inquiry. One of our sales representatives will contact you soon. Alternatively, you can reach out to us at ".$helpid];
				    $this->show_result();exit;
				}else{
				    $this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'mail_error'];
				    $this->show_result();exit;
				}
			}
    	}
    	else{
    		$this->result=['status'=>'error','message'=>'Error, Message could not be sent.','type'=>'recaptcha'];
    		$this->show_result();
    		exit;
    	}
    	//$this->show_result();
	}
	
	public function send_error_to_admin($result=[] , $form_data=[])
	{
	    $to_admin=["amit@lopamudracreative.com"];
		$config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
		$this->load->library('email',$config);
		$email->setTo($to_admin);
		//$email->setFrom('<info@omni-united.com>', 'Omni Enquiry');
		
	    if($result->status=="error" && $result->type!=="validation"){
            $message='<b>Name:</b> '.$form_data['name'].'<br>';
			$message.='<b>Email:</b> '.$form_data['email'].'<br>';
			$message.='<b>Phone:</b> '.$form_data['mobile'].'<br><br>';
			
			$message.='<b>Error Type:</b> '.$result->type.'<br>';
			
			
			
            $message.='<br><br><br><br><br><br><br>This message was sent from '.$post['current_page']==null?current_url():'';
                
            $email->setSubject($form_data['name'].' is facing problem in form submiting');
			$email->setMessage($message);
			$email->send();
	    }
	    
	    
	    
	}
	
	public function show_result()
	{
		echo json_encode($this->result);
	}
}