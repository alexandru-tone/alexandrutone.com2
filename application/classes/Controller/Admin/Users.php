<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Users extends Controller_Admin {

    public function action_index() {
        $lista_users = ORM::factory("User")->find_all();
        $user = Auth::instance()->get_user()->email;
        $this->template->content = View::factory("admin/users/index", array(
                    'lista_users' => $lista_users,
                    'user' => $user,
        ));
    }

    public function action_adaugare() {
        $user = ORM::factory("User");
        $errors = array();
        if ($this->request->method() == 'POST') {
            try {
                $user->create_user($_POST);
                $this->redirect("/admin/users");
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('orm-validation');
                if (isset($errors['_external'])) {
                    $errors = array_merge($errors, $errors['_external']);
                }
            }
        }
        $this->template->content = View::factory("admin/users/adaugare", array(
                    'user' => $user,
                    'errors' => $errors
        ));
    }

    public function action_editare() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $user = ORM::factory("User", $id);
        if (!$user->loaded()) {
            die("userul nu exista");
        }
        $errors = array();
        if ($this->request->method() == 'POST') {
            try {
                $user->update_user($_POST);
                $this->redirect("/admin/users");
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('orm-validation');
                if (isset($errors['_external'])) {
                    $errors = array_merge($errors, $errors['_external']);
                }
            }
        }
        $this->template->content = View::factory("admin/users/adaugare", array(
                    'user' => $user,
                    'errors' => $errors
        ));
    }

    public function action_stergere() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $user = ORM::factory("User", $id);
        if (!$user->loaded()) {
            die("userul nu exista");
        }
        $user->delete();

        $this->redirect("/admin/users");
    }

    public function action_vizualizare() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $user = ORM::factory("User", $id);
        if (!$user->loaded()) {
            die("userul nu exista");
        }
        $this->template->content = View::factory("admin/users/vizualizare", array(
                    'user' => $user
        ));
    }

}
