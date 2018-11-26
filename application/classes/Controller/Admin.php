<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Layout {

    protected $user;

    public function before() {
        parent::before();

        if (!Auth::instance()->logged_in()) {
            $this->redirect("/admin/login");
        }
		
		$this->template->module_name = 'Alexandru Tone';
		$this->template->action_name = 'Tutorials';

        $this->user = Auth::instance()->get_user();

        $this->template = View::factory("admin/template", array(
                    'header' => View::factory("admin/template/header", array(
                        'user' => $this->user,
                    )),
                    'left' => View::factory("admin/template/left")
        ));
    }

}
