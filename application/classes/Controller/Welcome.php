<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Layout {

//	public function action_index()
//	{
//		$this->response->body('hello, world!');
//	}	

	public function before() {
		parent::before();
		$this->template->module_name = 'Alexandru Tone';
		$this->template->action_name = 'Web developer';
	}	

	public function action_index() {
		$this->template->page_title = 'Alexandru Tone - Web developer';
		$this->template->page_keywords = array('web', 'developer', 'designer', 'mobile', 'sites', 'mobile sites', 'applications', 'web applications', 'e-commerce', 'e-commerce sites', 'web designer', 'web developer');
		$this->template->page_description = 'Awesome web applications, e-commerce sites and mobile sites';	
		$this->template->content = View::factory("index");	
	}		

	public function action_web_applications() {
		$this->template->page_title = 'Alexandru Tone - Web applications';
		$this->template->page_keywords = array('web', 'applications', 'web applications', 'web designer', 'web developer');
		$this->template->page_description = 'Awesome web applications';	
		$this->template->content = View::factory("web-applications");
	}
	
	public function action_e_commerce() {
		$this->template->page_title = 'Alexandru Tone - E Commerce';
		$this->template->page_keywords = array('web', 'sites', 'e-commerce', 'e-commerce sites', 'web designer', 'web developer');
		$this->template->page_description = 'Awesome e-commerce sites';	
		$this->template->content = View::factory("e-commerce");
	}
	
	public function action_mobile_sites() {
		$this->template->page_title = 'Alexandru Tone - Mobile sites';
		$this->template->page_keywords = array('web', 'sites', 'mobile', 'mobile sites', 'web designer', 'web developer');
		$this->template->page_description = 'Awesome mobile sites';	
		$this->template->content = View::factory("mobile-sites");
	}

	public function action_contact() {
		$this->template->page_title = 'Alexandru Tone - Contact';
		$this->template->page_keywords = array('web', 'developer', 'designer', 'mobile', 'sites', 'mobile sites', 'applications', 'web applications', 'e-commerce', 'e-commerce sites', 'web designer', 'web developer');
		$this->template->page_description = 'Awesome web applications, e-commerce sites and mobile sites';	
		$this->template->content = View::factory("contact");	
	}

} // End Welcome
