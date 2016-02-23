<?php

class SeosController extends AppController {
    
    public $name = 'Seos';
    public $uses = 'Seo';
    public $layout = 'admin';
    
    public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
        $this->set('section', $this->getFunctions());
    }
    
    public function admin_index() {
        $this->Seo->recursive = 0;
        $this->set('seos', $this->paginate());
    }

    public function admin_add() {
        $this->layout = 'admin';
        if (!empty($this->request->data)) {
            $this->Seo->create();
            if ($this->Seo->save($this->request->data)) {
                $this->Session->setFlash('El registro se ha creado exitosamente.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al intentar crear el registro. Por favor, intente nuevamente.', 'default', array('class' => 'error'));
            }
        }
        $f = $this->getFunctions();
        if (empty($f)) {
            $this->Session->setFlash('No existen secciones que necesiten asignación de SEO.', 'default', array('class' => 'error'));
        }
    }

    public function admin_edit($id = null) {
        $this->layout = 'admin';
        if (!$id && empty($this->request->data))
            $this->redirect(array('action' => 'index'));
        if (!empty($this->request->data)) {
            if ($this->Seo->save($this->request->data)) {
                $this->Session->setFlash('Actualización exitosa', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error en la actualización', 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Seo->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válido'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Seo->delete($id)) {
            $this->Session->setFlash(__('El registro ha sido borrado exitosamente.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function getFunctions() {
        $aCtrlClasses = App::objects('controller');

        foreach ($aCtrlClasses as $controller) {
            if ($controller != 'AppController') {
                // Load the controller
                App::import('Controller', str_replace('Controller', '', $controller));

                // Load its methods / actions
                $aMethods = get_class_methods($controller);

                foreach ($aMethods as $idx => $method) {

                    if ($method{0} == '_') {
                        unset($aMethods[$idx]);
                    }
                }

                // Load the ApplicationController (if there is one)
                App::import('Controller', 'AppController');
                $parentActions = get_class_methods('AppController');

                $controllers[$controller] = array_diff($aMethods, $parentActions);
            }
        }
        foreach ($controllers['PagesController'] as $pc) {
            $pages[$pc] = $pc;
        }
        $seos = $this->Seo->find('list', array('fields' => array('section')));   
        foreach ($seos as $seo) {
            unset($pages[$seo]);
        }
        return $pages;
    }
    
}

?>