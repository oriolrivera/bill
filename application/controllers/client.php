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
				#die("validado");
				#`phone_one`,`phone_two`,`fax`,`email`,`web`,`buy`,`emplead_asigne`,`observation`
					$querySave=array(
							"name"=>$this->input->post("name",true),
							"razon_social"=>$this->input->post("razonsocial",true),
							"cif_nif"=>$this->input->post("cifnif",true),
							"phone_one"=>$this->input->post("telefono1",true),
							"phone_one"=>$this->input->post("telefono1",true),
								
							"date_added"=>date("Y-m-d h:i:s"),
					);

					$saveIde=$this->client_model->addClient($querySave);
					$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
					redirect(base_url()."client/clients");
			}#end validation
		}#end post

    	$this->layout->setTitle("Crear Cliente");
    	$this->layout->view("addclient");
    } 

    public function clients(){
    	$this->layout->view("clients");
    }

}#end