<?php

class PagesController extends AppController {

	public $uses = array('Car');

	public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
    }

	public function home() {
			
		$carros = $this->Car->find('all');
		$this->set('carros', $carros);

		$this->set('welcome', 'Hola desde el controlador');		



	}

	public function ampliacion($id = null) {
		

		$carro = $this->Car->Find('first',[
			'conditions' => ['id' => $id]
			]);
		$this->set('carro', $carro);
	}
}
