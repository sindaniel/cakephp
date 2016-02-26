<?php

class CarsController extends AppController {
    
    public $name = 'Cars';   
    public $layout = 'admin';
    public $uses = array('Car');

    
    public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
    }
    
    public function admin_index() {
        

        //aqui hacemos la consulta al modelo Car y este nos retorna toda los registros.
        $carros = $this->Car->Find('all');

        //aqui seteamos en la variable carros todo lo que el modelos de vuelve
        $this->set('carros', $carros);


    }

   public function admin_add() {
        $this->layout = 'admin';
        if (!empty($this->request->data)) {
            $this->Car->create();
            if ($this->Car->save($this->request->data)) {

                $this->Session->setFlash('El registro se ha creado exitosamente.', 'default', array('class' => 'alert alert-micro alert-primary alert-dismissable'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al intentar crear el registro. Por favor, intente nuevamente.', 'default', array('class' => 'error'));
            }
        }
    }


    public function admin_edit($id = null) {
        $this->layout = 'admin';
        if (!$id && empty($this->request->data))
            $this->redirect(array('action' => 'index'));
        
        if (!empty($this->request->data)) {
            if ($this->Car->save($this->request->data)) {
                $this->Session->setFlash('Actualización exitosa', 'default', array('class' => 'alert alert-micro alert-primary alert-dismissable'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error en la actualización', 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Car->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válido'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Car->delete($id)) {
            $this->Session->setFlash(__('El registro ha sido borrado exitosamente.'), 'default', array('class' => 'alert alert-micro alert-primary alert-dismissable    '));
            $this->redirect(array('action' => 'index'));
        }
    }
    
}

?>