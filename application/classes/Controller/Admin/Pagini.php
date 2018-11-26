<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Pagini extends Controller_Admin {

    public function action_index() {
        $lista_pagini = ORM::factory("Pagina");
        if (isset($_GET['filtru_nume']) && !empty($_GET['filtru_nume'])) {
            $lista_pagini->where('nume', 'LIKE', '%' . $_GET['filtru_nume'] . '%');
        }
        if (isset($_GET['filtru_activa']) && !empty($_GET['filtru_activa'])) {
            $lista_pagini->where('activa', '=', $_GET['filtru_activa']);
        }
        $pagination = Pagination::factory(array(
                    'total_items' => $lista_pagini->reset(false)->count_all(),
                    'items_per_page' => 10
        ));
        $lista_pagini = $lista_pagini
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->order_by('nume')
                ->find_all();
        $user = $this->user->email;
        $this->template->content = View::factory("admin/pagini/index", array(
                    'lista_pagini' => $lista_pagini,
                    'user' => $user,
                    'pagination' => $pagination,
        ));
    }

    public function action_adaugare() {
//        $errors = $this->request->param('errors');
//        if (isset($errors)) {
//            print_r($errors);
//        }

        $pagina = ORM::factory("Pagina");

        $errors = array();

        if ($this->request->method() == 'POST') {
            try {
                $pagina->values($_POST)->save();
                $this->redirect("/admin/pagini");
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('orm-validation');
//
//                if(!empty($errors['nume'])){
//                    echo "numele este obligatoriu <br/>";
//                }
//                if(!empty($errors['cheie'])){
//                    echo "cheia trebuie sa fie unica <br/>";
//                }
//                if(!empty($errors['continut'])){
//                    echo "continutul este obligatoriu <br/>";
//                }
            }
//            // $this->request->redirect("/admin/pagini");
//            if (empty($errors)) {
//                $this->redirect("/admin/pagini/index/$errors");
//            }
        }

        $this->template->content = View::factory("admin/pagini/adaugare", array(
                    'pagina' => $pagina,
                    'errors' => $errors
        ));
    }

    public function action_editare() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $pagina = ORM::factory("Pagina", $id);
        if (!$pagina->loaded()) {
            die("pagina nu exista");
        }
        if ($this->request->method() == 'POST') {
            $pagina->values($_POST)->save();
            $this->redirect("/admin/pagini");
        }
        $this->template->content = View::factory("admin/pagini/adaugare", array(
                    'pagina' => $pagina
        ));
    }

    public function action_stergere() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $pagina = ORM::factory("Pagina", $id);
        if (!$pagina->loaded()) {
            die("pagina nu exista");
        }
        $pagina->delete();

        $this->redirect("/admin/pagini");
    }

    public function verificaNume() {
        //pentru ca $this este deja ORM::factory("Pagina")
        $pagina = ORM::factory("Pagina")
                ->where('nume', '=', $_POST['nume'])
                ->find();
        if ($pagina) {
            return false;
        }
        return true;
    }

    public function verificaAdaugare() {
        if (!$this->verificaNume()) {
            return false;
        }
        return true;
    }

    public function action_vizualizare() {
        $id = $this->request->param('id');
        if (is_null($id)) {
            die("id-ul este null");
        }
        $pagina = ORM::factory("Pagina", $id);
        if (!$pagina->loaded()) {
            die("pagina nu exista");
        }
        $this->template->content = View::factory("admin/pagini/vizualizare", array(
                    'pagina' => $pagina
        ));
    }

}
