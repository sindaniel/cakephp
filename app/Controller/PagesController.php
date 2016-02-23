<?php

class PagesController extends AppController {

	public $uses = array();

	public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
    }

	public function home() {
		
	}

	public function productos() {

	}
}
