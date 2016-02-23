<?php

class User extends AppModel {

    public $name = 'User';   
    public $validate = array( 
            'username' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo no puede estar vacío.'
            ), 
            'password' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo no puede estar vacío.'
            ),   );
}
      
?>