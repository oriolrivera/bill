<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
    }
    
	public function panel()
	{	
		 if(!$this->session->userdata("id")){ redirect(base_url(),301);}
		$this->layout->setTitle("Panel");
		$this->layout->view('panel');
	}#end

	public function login()
	{	
		if($this->session->userdata("id")){ redirect(base_url()."panel",301);}
		$this->layout->setLayout("login");
		#die("ok");
		if($this->input->post())
		{
		
		#die("post");
		if($this->form_validation->run("login"))
			{
				#die("valido");
				$results =$this->users_model->login($this->input->post("username",true),sha1($this->input->post("password",true)));
				if(sizeof($results)==0)
				{
					$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Los datos ingresados no existen en nuestros registros</div>");
				    redirect(base_url()."login",301);
				}else
				{
					
					$this->session->set_userdata("id",$results->id);
					$this->session->set_userdata("name",$results->name);
					$this->session->set_userdata("role",$results->role);
					$this->session->set_userdata("image",$results->image);
					redirect(base_url()."panel",301);
				}

			}#end validation
	    }

		$this->layout->view("login");
		
	}#end

	public function logout(){

			#$this->session->sess_destroy();
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('image');
			$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Se ha cerrado sesión exitosamente</div>");
			redirect(base_url(),301);

	}#end logout


	/*public function panel(){
		    $this->layout->setLayout("panel");
 			$this->layout->view("panel");
	}*/#end

}#end class