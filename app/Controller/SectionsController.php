<?php

class SectionsController extends AppController {
    
    public $name = 'Sections';
    public $uses = 'Section';
    public $layout = 'admin';
    
    public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
    }
    
    public function admin_index() {
        $this->Section->recursive = 0;
        $this->set('sections', $this->paginate());
    }

    public function admin_add() {
        $this->layout = 'admin';
        if (!empty($this->request->data)) {
            $this->Section->create();
            if ($this->Section->save($this->request->data)) {
                
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
            if ($this->Section->save($this->request->data)) {
                $this->Session->setFlash('Actualización exitosa', 'default', array('class' => 'alert alert-micro alert-primary alert-dismissable'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error en la actualización', 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Section->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válido'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Section->delete($id)) {
            $this->Session->setFlash(__('El registro ha sido borrado exitosamente.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
}

?>