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

     	if($this->input->post())
		{
			print_r($_POST);
		}#end post

        $results=$this->client_model->getClients();

        $this->layout->setTitle("Nueva Factura");
    	$this->layout->view("newinvoice",compact('results'));
    }


}#end class
    