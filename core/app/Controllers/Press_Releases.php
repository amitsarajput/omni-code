<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\Press_Release ;

class Press_Releases extends BaseController {

	

    public function index(){
		$model = model(Press_Release::class);
		$data['releases'] = $model->where('status', 1)->orderBy('published_on', 'DESC')->paginate(10,  '');
		$data['pager'] = $model->pager;

		$data['page_title']='Press Releases';
        $data['page_url']="press-releases";
        $data['meta_d']="";
        $data['meta_k']="press releases";
		$data['sidepanel']=["menu"=>5,"submenu"=>1];

		return view('templates/header', $data).view('press-releases', $data).view('templates/footer', $data);
    }
	

	public function single($slug){
		$model = model(Press_Release::class);
		$data['press_release'] = $model->where(['slug' => $slug, 'status' => 1])->first();
		if (empty($data['press_release'])) {
			$this->not_found();
		}else{

	    	$data['page_title']=strip_tags(htmlspecialchars_decode($data['press_release']['title']));
	        $data['meta_d']="";
	        $data['meta_k']="press releases";
			$data['sidepanel']=["menu"=>5,"submenu"=>1];

			return view('templates/header', $data).view('press-releases-single', $data).view('templates/footer', $data);
	    }
	}

	public function single_staging($slug){
		$data['press_release'] = $this->press_release->get_press_release($slug, true);
		if (empty($data['press_release'])) {
			$this->not_found();
		}else{
	    	$data['page_title']=strip_tags(htmlspecialchars_decode($data['press_release']['title']));
	        $data['meta_d']="";
	        $data['meta_k']="press releases";
			$data['sidepanel']=["menu"=>5,"submenu"=>1];
			return view('templates/header', $data).view('press-releases-single', $data).view('templates/footer', $data);
	    }
	}


	public function not_found()
	{
		
		$data['page_title']='404 Page Not Found';
    	return view('templates/header', $data).view('pages/err404', $data).view('templates/footer', $data);
	}

}
