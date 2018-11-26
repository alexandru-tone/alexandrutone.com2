<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Pagina extends ORM {

    protected $_table_name = 'pagini';
    protected $_belongs_to = array(
    );
    protected $_has_many = array(
    );
    protected $_has_one = array(
    );

    public function seteazaPaginaPrincipala() {
      //initiez model Pagina
        $pagini = ORM::factory("Pagina")
                ->find_all();

        foreach ($pagini as $pagina){
            //pentru inregistrarea curenta
            if($pagina->id == $this->id){
                // updatez pagina curenta cu principala = 1
                $pagina->values(array(
                            'principala' => '1'
                    ))->save();
            }else{
                // updatez toate paginile cu principala = 0
                $pagina->values(array(
                            'principala' => '0'
                    ))->save();                
            }
        }          
    }
    
    //functie care returneaza pagina principala
    public function returneazaPaginaPrincipala(){
        //incarc modelul Pagina, gol si aduc doar o inregistrare cu principala1
        $pagina_principala = ORM::factory("Pagina")
                ->where('principala', '=', '1')
		->find();
        return $pagina_principala;
    }
    
    public function returneazaMeniuHeader(){
        //pentru ca $this este deja ORM::factory("Pagina")
        return $this->where('meniu', '=', '1')
		->find_all();
    }
    public function returneazaMeniuLeft(){
        //pentru ca $this este deja ORM::factory("Pagina")
        return $this->where('meniu', '=', '2')
		->find_all();
    }
    public function returneazaMeniuRight(){
        //pentru ca $this este deja ORM::factory("Pagina")
        return $this->where('meniu', '=', '3')
		->find_all();
    }
    public function returneazaMeniuFooter(){
        //pentru ca $this este deja ORM::factory("Pagina")
        return $this->where('meniu', '=', '4')
		->find_all();
    }
    
    public function returneazaPagini(){
        //pentru ca $this este deja ORM::factory("Pagina")
        return $this->find_all();
    }
    
    public function returneazaContinut(){
        //pentru ca $this este deja ORM::factory("Pagina")
        $pagina = ORM::factory("Pagina")
                //->where('meniu', '=', '4')
                ->where('cheie', '=' , $this->cheie)
                ->find();
        return $pagina;  
    }
    
    public function rules()
	{
		return array(
                        'nume' => array(
				array('not_empty'),
                        ),
                        'cheie' => array(
				array('not_empty'),
                                array(array($this, 'unique'), array('cheie', ':value')),
                        ),
                        'continut' => array(
				array('not_empty'),
                        ),
		);
	}
    
    
}
