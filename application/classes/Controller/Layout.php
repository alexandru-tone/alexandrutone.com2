<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Layout extends Controller {
	
    protected $template;
    protected $page_title;
	protected $page_keywords;
	protected $page_description;
    protected $_errors = array();
    protected $_errorModelValidation = null;
    protected $daysOfTheWeek;

    public function before() {
        parent::before();
		
        View::bind_global('page_title', $this->page_title);
        View::set_global('directory', $this->request->directory());
        View::set_global('controller', $this->request->controller());
        View::set_global('action', $this->request->action());

        if (!is_null(Session::instance()->get('errors'))) {
            $errors = Session::instance()->get('errors');
            if (isset($errors['_external'])) {
                $errors += $errors['_external'];
            }
            View::set_global('errors', $errors);
        }

        $this->template = View::factory("template");

        $this->template->head = View::factory('template/head')->set(array(
            'styles' => array(),
            'scripts' => array(),
            'custom_scripts' => array(),
            'custom_styles' => array()
        ));

        $this->addCSS('admin/bootstrap.min');
        $this->addCSS('admin/bootstrap-theme.min');
        $this->addCSS('admin/style');
        $this->addJS('admin/jquery.min');
        $this->addJS('admin/bootstrap.min');
		

        $this->template->footer = View::factory('template/footer');
    }

    protected function addJS($script) {
        $this->template->head->scripts[] = $script;
    }

    protected function addCSS($css) {
        $this->template->head->styles[] = $css;
    }

    protected function addCustomJS($file, $vars = array()) {
        $this->template->head->custom_scripts[] = View::factory($file, $vars);
    }

    protected function addCustomCSS($file, $vars = array()) {
        $this->template->head->custom_styles[$file] = View::factory($file);

        foreach ($vars as $index => $value) {
            $this->template->head->custom_styles[$file]->set($index, $value);
        }
    }

    protected function error($code = 0) {
        echo Request::factory("/error/" . $code)
                ->execute()
                ->send_headers()
                ->body();
        exit;
    }

    public function after() {

        if (sizeof($this->_errors)) {
            $errors = $this->_errors;
            if (isset($errors['_external'])) {
                $errors += $errors['_external'];
            }
            View::set_global('errors', $errors);
        }

        if (!is_null($this->_errorModelValidation)) {
            View::set_global('errorModelValidation', $this->_errorModelValidation);
        }

        if ($this->request->is_ajax()) {
            $this->template = $this->template->content;
        }

        if ($this->template instanceof View) {
            $this->response->body($this->template->render());
        } else {
            $this->response->body($this->template);
        }

        parent::after();
    }

    public function is_set($var) {
        return (isset($var) && (!empty($var) || strlen($var) > 0));
    }

    protected function ajax() {
        if (!$this->request->is_ajax()) {
            exit;
        }
    }

//    protected function error($code = 404) {
//        $HTTP_Exception = "HTTP_Exception_" . $code;
//        throw new $HTTP_Exception();
//    }

    protected function view($file, $data = array()) {
        return View::factory($file, $data);
    }

}
