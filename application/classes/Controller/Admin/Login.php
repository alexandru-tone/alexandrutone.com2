<?php

defined('SYSPATH') or die('No direct script access.');

// de asemenea, rulez in phpmyadmin scriptul sql din:
// modules/orm/aut-schema-mysql.sql (pentru a crea acele tabele
// in configul auth.php trebuie definita o cheie de criptare
class Controller_Admin_Login extends Controller_Layout {

    public function action_index() {
        $this->template = View::factory("admin/login");
        
        if ($this->request->method() == 'POST') {
            $success = Auth::instance()->login($_POST['email'], $_POST['password']);
            if (Auth::instance()->logged_in()) {
                $this->redirect("/admin");
            } else {

            }
        }
    }

}