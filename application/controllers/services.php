<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
         if(!$this->session->userdata("id")){ redirect(base_url());}
    }

    public function managerservices(){
    	$results=$this->services_model->getServicesManager();

    	$this->layout->setTitle("Gestor de Servicios");
    	$this->layout->view("managerservices",compact('results'));
    }

    public function addservices(){
    	
    	if($this->input->post())
		{
			$querySave=array(
					"name"=>$this->input->post("name",true),
					"name_manager"=>$this->input->post("encargado",true),
					"price"=>$this->input->post("precio",true),
					"itbis"=>$this->input->post("itbis",true),
					"phone_one"=>$this->input->post("telefono1",true),
					"phone_two"=>$this->input->post("telefono2",true),
					"fax"=>$this->input->post("fax",true),
					"email"=>$this->input->post("email",true),
					"web"=>$this->input->post("web",true),
					"description"=>$this->input->post("descripcion",true),
					"date_added"=>date("Y-m-d h:i:s"),
			);

			$this->services_model->addServices($querySave);

				$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
				redirect(base_url()."services/addservices");
		}#end post
    	$this->layout->setTitle("Crear Servicio");
    	$this->layout->view("addservices");
    }

    public function updateservices($id=null){

    	if (!$id) {show_404();} #si no existen parametros via get

    	$result=$this->services_model->getServicesForId($id);

    	if (sizeof($result)==0) { show_404();}

    	$this->layout->setTitle("Editar Servicio");
    	$this->layout->view("updateservices",compact('result'));
    }#end

    public function delete(){
    	 	if($this->input->post("delete"))
            {                               
                 $this->services_model->delete();              
            }else{
                $this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Tiene que selecionar un registro a eliminar.</div>");
                redirect(base_url()."client/clients");             
        }
    }#end

}#end class