<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'DebugKit.Toolbar',
		'Session',
        'Auth',
        'Email'
	);

	public $helpers = array(
        'Session',
        'Html',
        'Text',
        'Form',
        'Js',
        'Help'
    );

    public function beforeFilter() {
        // Configuración de mensajes de error de login
        $this->Auth->loginError = "Error: Verifica los datos de acceso";
        $this->Auth->authError = "No está autorizado para acceder a esta sección";
        $this->isAuthorized();
        $this->setConfigurations();
        // $this->getLanguage();
    }
    
    /*
     * Función usada para verificar si el usario tiene permisos de accesos
     */
    private function isAuthorized() {
        $value = strpos($this->request->action, "admin_");
        if ($value == 0 && $value !== false) {
            if ($this->request->action != 'admin_login') {
                $user = $this->Auth->user('username');
                if (empty($user)) {
                    $this->redirect(array('controller' => 'users', 'action' => 'login', 'admin' => true));
                }
            }
        }
    }

    /*
     * Carga el idioma de la pagina
     */
    private function getLanguage() {
        if (isset($this->params['lang'])) {
            Configure::write('Config.lang', $this->params['lang']);
            $this->set('lang', $this->params['lang']);
        } else {
            $value = $this->request->action;
            if ($value == 'home')
                $this->redirect('/en');
        }
        // cargamos el archivo que contiene las traducciones segun el idioma
        App::import('Vendor', 'language/' . Configure::read('Config.lang'));
    }

    private function setConfigurations() {
        Configure::write(
            'Site',
            array(
                'title' => 'Base'
            )
        );
    }

}
