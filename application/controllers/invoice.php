<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
    }

    public function invoices(){
    	$this->layout->view("invoices");
    }

     public function newinvoice(){
    	$this->layout->view("newinvoice");
    }


}#end class
    