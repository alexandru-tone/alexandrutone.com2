<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tutorials extends Controller_Layout {

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
		$this->template->page_title = 'Alexandru Tone - Tutorials';
		$this->template->page_keywords = array('php', 'html', 'css', 'javascript', 'web', 'developer', 'designer', 'mobile', 'sites', 'applications', 'e-commerce');
		$this->template->page_description = 'HTML, CSS, PHP tutorials';
		$this->template->content = View::factory("tutorials");	
	}		

} // End Tutorials
