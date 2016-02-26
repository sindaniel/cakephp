<?php

class Car extends AppModel {

	public $name = 'Car';

	public $actsAs = array(
        'MeioUpload.MeioUpload' => array('picture')
    );

}