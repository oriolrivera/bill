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
				
				
					$querySave=array(
							"name"=>$this->input->post("name",true),
							"razon_social"=>$this->input->post("razonsocial",true),
							"cif_nif"=>$this->input->post("cifnif",true),
							"phone_one"=>$this->input->post("telefono1",true),
							"phone_two"=>$this->input->post("telefono2",true),
							"fax"=>$this->input->post("fax",true),
							"email"=>$this->input->post("email",true),
							"web"=>$this->input->post("web",true),
							"observation"=>$this->input->post("observaciones",true),
							"date_added"=>date("Y-m-d h:i:s"),
					);

					$saveIde=$this->client_model->addClient($querySave);

					if ($this->input->post("dirfact",true)==true) {
						$dirFact=1;
					}else{
						$dirFact=0;
					}
					
					$querySaveClientBank=array(
							"country"=>$this->input->post("pais",true),
							"province"=>$this->input->post("provincia",true),
							"city"=>$this->input->post("ciudad",true),
							"address"=>$this->input->post("direccion",true),
							"code_zip"=>$this->input->post("codpostal",true),
							"town"=>$this->input->post("municipio",true),
							"billing_address"=>$dirFact,
							"description"=>$this->input->post("descripcion",true),
							"id_rel"=>$saveIde,
							"date_added"=>date("Y-m-d h:i:s"),
						);

					$this->client_model->addClientBank($querySaveClientBank);
					
					if ($this->input->post("banco",true)) {
				
						$querySaveClientBankAccount=array(
								"back"=>$this->input->post("banco",true),
								"no_account"=>$this->input->post("nocuenta",true),
								"id_rel_bank_account"=>$saveIde,
							);

						$this->client_model->addClientBankAccount($querySaveClientBankAccount);
					}

					$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
					redirect(base_url()."client/addclient");
			}#end validation
		}#end post

    	$this->layout->setTitle("Crear Cliente");
    	$this->layout->view("addclient");
    } 

    public function clients(){

     	$results=$this->client_model->getClients();

    	$this->layout->setTitle("Gestor Clientes");
    	$this->layout->view("clients", compact('results'));
    }

    public function editclient($id=null){

    	if (!$id) {show_404();}

    	$result=$this->client_model->getClientForId($id);

    	if (sizeof($result)==0) { show_404();}

    	if($this->input->post())
		{
			if($this->form_validation->run("addclient"))
			{
				#die("validado");
				
				
					$querySave=array(
							"name"=>$this->input->post("name",true),
							"razon_social"=>$this->input->post("razonsocial",true),
							"cif_nif"=>$this->input->post("cifnif",true),
							"phone_one"=>$this->input->post("telefono1",true),
							"phone_two"=>$this->input->post("telefono2",true),
							"fax"=>$this->input->post("fax",true),
							"email"=>$this->input->post("email",true),
							"web"=>$this->input->post("web",true),
							"observation"=>$this->input->post("observaciones",true),
							"date_added"=>date("Y-m-d h:i:s"),
					);

					$this->client_model->editClient($querySave,$id);

					if ($this->input->post("dirfact",true)==true) {
						$dirFact=1;
					}else{
						$dirFact=0;
					}
					
					$querySaveClientBank=array(
							"country"=>$this->input->post("pais",true),
							"province"=>$this->input->post("provincia",true),
							"city"=>$this->input->post("ciudad",true),
							"address"=>$this->input->post("direccion",true),
							"code_zip"=>$this->input->post("codpostal",true),
							"town"=>$this->input->post("municipio",true),
							"billing_address"=>$dirFact,
							"description"=>$this->input->post("descripcion",true),
							"id_rel"=>$id,
							"date_added"=>date("Y-m-d h:i:s"),
						);

					$this->client_model->editClientBank($querySaveClientBank,$id);
					
					if ($this->input->post("banco",true)) {
				
						$querySaveClientBankAccount=array(
								"back"=>$this->input->post("banco",true),
								"no_account"=>$this->input->post("nocuenta",true),
								"id_rel_bank_account"=>$id,
							);

						$this->client_model->editClientBankAccount($querySaveClientBankAccount,$id);
					}

					$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro editado con éxito.</div>");
					redirect(base_url()."client/editclient/".$id."/");
			}#end validation
		}#end post

    	$this->layout->setTitle("Editar Cliente");
    	$this->layout->view("editclient",compact('result'));
    }#end

    public function invoiceclient($id=null){
		if (!$id) {show_404();}
			$results=$this->invoice_model->getManagerInvoicesForClient($id);
		if (sizeof($results)==0) { show_404();}

    	$this->layout->setTitle("Facturas de Cliente");
    	$this->layout->view("invoiceclient",compact('results'));
    }#end



    public function delete(){
    	if($this->input->post("delete"))
            {                               
                 $this->client_model->delete();              
            }else{
                $this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Tiene que selecionar un registro a eliminar.</div>");
                redirect(base_url()."client/clients");             
        }
    }#end
}#end