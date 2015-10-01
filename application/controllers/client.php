<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
        if(!$this->session->userdata("id")){ redirect(base_url());}
    }

    public function addclient(){


    	if($this->input->post())
		{
			if($this->form_validation->run("addclient"))
			{
				die("validado");
			}#end validation
		}#end post

    	$this->layout->setTitle("Crear Cliente");
    	$this->layout->view("addclient");
    } 

    public function clients(){
    	$this->layout->view("clients");
    }

}#end