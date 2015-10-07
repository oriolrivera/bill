<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
    }

    public function managerservices(){
    	$this->layout->view("managerservices");
    }

}#end class