<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout("backend");
		
	
	}

	public function managerusersystem(){

		if($this->session->userdata("id") and $this->session->userdata('role')==1)
		{

			if($this->uri->segment("4"))
			{
				$pagina=$this->uri->segment("4");	
			}else
			{
				$pagina=0;
			}
			$porpagina=10;

			$results = $this->users_model->getManagerUserSystem($pagina,$porpagina,"limit");
			$count = $this->users_model->getManagerUserSystem($pagina,$porpagina,"count");

				//parámetros generales de la paginación
			$config["base_url"]=base_url()."users/managerusersystem";
			$config["total_rows"]=$count;
			$config["per_page"]=$porpagina;
			$config["uri_segment"]="4";
			$config["num_links"]="4";
			//parámetros de diseño de la paginación
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'Primero';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Último';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt&gt';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt&lt';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li><a><strong>';
			$config['cur_tag_close'] = '</strong></a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			//inicializamos la paginación
			$this->pagination->initialize($config);

			$this->layout->setTitle('Gestor usuarios');
			$this->layout->view('managerusersystem', compact('results','count'));
		}else{
			show_404();
		}#end rederict


	}#end

	public function profile(){
		if($this->session->userdata("id"))
		{

			$result=$this->users_model->getDataProfile($this->session->userdata("id"));
			if ($this->input->post()) {
			  if ($this->input->post("passact")=="") {
				  $validate =  $this->form_validation->run("updateProfile");
			  }else{
			 	  $validate = $this->form_validation->run("updateProfilepass");
			  }

			  if ($validate) {
			  	//die("ok");
							if ($this->input->post("passact")=="") {	
							#die("ver");

							$querySave=array(
									"name"=>$this->input->post("name",true),
									"lastname"=>$this->input->post("lastname",true),
									"email"=>$this->input->post("email",true),
									"user"=>$this->input->post("login",true),					
									"details"=>$this->input->post("details",true),							
									"modified_at"=>date("Y-m-d h:i:s"),

								
								);
								$save=$this->users_model->updateUserProfile($querySave,$this->session->userdata("id"));
								$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro actualizado con éxito.</div>");
								redirect(base_url()."users/profile");
					}#end

					
					
					 if ($result->password==sha1($this->input->post("passact",true))) {
					 	
					 			 	
					 	
							 if ($this->input->post("pass")==$this->input->post("confirpass")) {
								#die("ok");
								$querySave=array(
									"name"=>$this->input->post("name",true),
									"lastname"=>$this->input->post("lastname",true),
									"email"=>$this->input->post("email",true),
									"user"=>$this->input->post("login",true),
									"password"=>sha1($this->input->post("pass",true)),							
									"details"=>$this->input->post("details",true),							
									"modified_at"=>date("Y-m-d h:i:s"),

								
								);
								$save=$this->users_model->updateUserProfile($querySave,$this->session->userdata("id"));
								$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro actualizado con éxito.</div>");
								redirect(base_url()."users/profile");
						}else{
							#die("pass no coinciden");
								$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Password no coinciden.</div>");
								redirect(base_url()."users/profile");
						}#end valid confir pass
					}else{
						#die("pass actual ingresado no es correcto ");
						$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Password actual ingresado no es correcto	.</div>");
						redirect(base_url()."users/profile");
					}#end valid pass

				
				

				}#end validate
			}#end post
				$this->layout->js
				(
					array
					(
						base_url()."public/js/ckeditor.js"
						
					)
				);
			
			$this->layout->setTitle("Mi Perfil");
			$this->layout->view("profile", compact('result'));
		}else{
			show_404();
		}#end rederict
	}#end

	public function addusersystem(){
    	if($this->session->userdata("id")  and $this->session->userdata('role')==1)
		{

			if($this->input->post())
			{
				#die("post");
				if($this->form_validation->run("addusersystem"))
				{
					$valid=$this->users_model->validateIssetUserSystem($this->input->post("username",true));
					if ($valid) {
						$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Ha intentado crear un registro con un nombre de usario que ya existe.</div>");
						redirect(base_url()."users/addusersystem",301);
					}else{

						if ($this->input->post("password",true)==$this->input->post("confirmpassword",true)) {
							$password = sha1($this->input->post("password",true));
							$querySave=array(
								"name"=>$this->input->post("name",true),
								"lastname"=>$this->input->post("lastname",true),
								"email"=>$this->input->post("email",true),
								"user"=>$this->input->post("username",true),
								"password"=> $password,
								"status"=>$this->input->post("estatus",true),			
								"role"=>$this->input->post("usergroup",true),			
								"details"=>$this->input->post("details",true),					
								"created_at"=>date("Y-m-d h:i:s"),
							);
						
							$save=$this->users_model->addUserSystem($querySave);
							$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
						    redirect(base_url()."users/addusersystem",301);
						}else{
							$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Las contraseñas no coinciden.</div>");
						    redirect(base_url()."users/addusersystem",301);
						}
						
						
					}
				}#end validation
			}#end post

	    	$this->layout->js
			(
				array
				(
					base_url()."public/js/ckeditor.js"
					
				)
			);	
			$this->layout->setTitle("Crear usuario");
	    	$this->layout->view('addusersystem');
	    }else{
			 show_404();
		}#end rederict
    }#end

    public function updateusersystem($id=null){

    	if($this->session->userdata("id") and $this->session->userdata('role')==1)
		{

    		if (!$id) {show_404();} 

    		$result=$this->users_model->getUsersForId($id);
			if (sizeof($result)==0) { show_404();}

			if($this->input->post())
			{
				#die("post");
				if($this->form_validation->run("updateusersystem"))
				{
					$valid=$this->users_model->validateIssetUserSystem($this->input->post("username",true));
					if ($valid) {
						$querySave=array(
								"name"=>$this->input->post("name",true),
								"lastname"=>$this->input->post("lastname",true),
								"email"=>$this->input->post("email",true),								
								"status"=>$this->input->post("estatus",true),			
								"role"=>$this->input->post("usergroup",true),			
								"details"=>$this->input->post("details",true),					
								"modified_at"=>date("Y-m-d h:i:s"),
						);

						$passc=$this->input->post("password",true);
						if (!empty($passact)) {					

							if ($this->input->post("password",true)==$this->input->post("confirmpassword",true)) {
									$password = sha1($this->input->post("password",true));

								$querySavePassword=array(
									"password"=>$password,
									
								);

									$updatePasswd=$this->users_model->updateUserPasswordSystem($querySavePassword,$this->input->post("ide",true));
							}else{
								$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Las contraseñas no coinciden.</div>");
							    redirect(base_url()."users/updateusersystem/".$this->input->post("ide",true));
							}
						}

						$update=$this->users_model->updateUserSystem($querySave,$this->input->post("ide",true));
						$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
						redirect(base_url()."users/updateusersystem/".$this->input->post("ide",true));
					}else{

						
							
							$querySave=array(
								"name"=>$this->input->post("name",true),
								"lastname"=>$this->input->post("lastname",true),
								"email"=>$this->input->post("email",true),
								"user"=>$this->input->post("username",true),
								"status"=>$this->input->post("estatus",true),			
								"role"=>$this->input->post("usergroup",true),			
								"details"=>$this->input->post("details",true),					
								"modified_at"=>date("Y-m-d h:i:s"),
							);
						
							

						$passc=$this->input->post("password",true);
						if (!empty($passact)) {						

							if ($this->input->post("password",true)==$this->input->post("confirmpassword",true)) {
									$password = sha1($this->input->post("password",true));

								$querySavePassword=array(
									"password"=>$password,
									
								);

									$updatePasswd=$this->users_model->updateUserPasswordSystem($querySavePassword,$this->input->post("ide",true));
							}else{
								$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Las contraseñas no coinciden.</div>");
							    redirect(base_url()."users/updateusersystem/".$this->input->post("ide",true));

							}
						}

						$update=$this->users_model->updateUserSystem($querySave,$this->input->post("ide",true));
						$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
						redirect(base_url()."users/updateusersystem/".$this->input->post("ide",true));
						
						
					}
				}#end validation
			}#end post

			$this->layout->js
			(
				array
				(
					base_url()."public/js/ckeditor.js"
					
				)
			);	

    		$this->layout->view("updateusersystem", compact("result"));
    	    }else{
			 show_404();
		}#end rederict

    }#end

    public function deleteusersystem(){
    	if($this->session->userdata("id") and $this->session->userdata('role')==1)
		{
	    	if($this->input->post("delete"))
			{
			     $del=$this->users_model->deleteUserSystem();
				 #print_r($this->input->post());
			}else{
				$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Tiene que selecionar un registro a eliminar.</div>");
				redirect(base_url()."users/managerusersystem");
			 
			}
		}else{
			 show_404();
		}#end rederict
    }#end

}#end class