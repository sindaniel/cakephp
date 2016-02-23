<?php

class UsersController extends AppController {
    
    public $name = 'Users';
    public $layout = 'admin';
    public $uses = array('User');
    
    public function beforeFilter() {
        if (empty($this->params[Configure::read('Routing.admin')]) || !$this->params[Configure::read('Routing.admin')]) {
            $this->Auth->allow($this->params['action']);
        }
        parent::beforefilter();
    }

    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    
    public function admin_login() {
        // echo $this->Auth->password('admin');
        $this->layout = 'admin_login';
        $usuario = $this->Session->read('Auth.User.id');
        if (!empty($usuario)) {
            $this->redirect(array('controller' => 'sections', 'action' => 'index', 'admin' => true));
        }
        if (!empty($this->request->data)) {
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'sections', 'action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash('Verifica los datos de acceso', 'default', array('class' => 'alert alert-danger'));
            }
        }   
    }
    
    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['password'])) {
                $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Registro creado con exito', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Error en la actualización', 'default', array('class' => 'error'));
                }
            } else {
                $this->Session->setFlash('Error. Todos los campos son obligatorios', 'default', array('class' => 'error'));
            }
        }
    }
    
    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data))
            $this->redirect(array('action' => 'index'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['password1'])) {
                $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password1']);
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Actualización exitosa', 'default', array('class' => 'success'));
            } else {
                $this->Session->setFlash('Error en la actualización', 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->User->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id)
            $this->redirect(array('action' => 'index'));
        if ($this->User->delete($id, true)) {
             $this->Session->setFlash('Elemento borrado', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Error al intentar borrar', 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }
}

?>