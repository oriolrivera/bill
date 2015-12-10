<?php
class users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	*login users panel admin
	**/
	public function login($user,$pass)
	{
		$query=$this->db
			->select("`id`,`name`,`user`,image,`password`,`status`,`last_login`,role")
			->from("users")
			->where(array("user"=>$user,"password"=>$pass))
			->where("status = 1")
			->get();
			//echo $this->db->last_query();exit;
			return $query->row();
			#SELECT `id`,`name`,`user`,`password`,`status`,`last_login` FROM `users` WHERE `id` = 1 and `status` =1 
	}

	public function getDataProfile($id){
		$query=$this->db
			->select("`id`,`name`,`lastname`,`email`,`user`,details,password")
			->from("users")
			->where(array("id"=>$id))
			->get();
			return $query->row();
	}#end

	public function updateUserProfile($data=array(),$id){
			$this->db->where('id', $id);
			$this->db->update('users', $data); 
			return true;
	}#end

	public function getManagerUserSystem($page,$forpage,$ido){
			switch ($ido) 
		{

			case 'limit':
				$query=$this->db
				->select("`id`,`user`,status,`created_at`")
				->from("users")
				->limit($forpage,$page)
				->order_by("id","desc")
				->get();
				return $query->result();
			break;
			case 'count':
				$query=$this->db
				->select("`id`,`user`,`status`,`created_at`")
				->from("users")
				->count_all_results();
				return $query;
			
			break;
			
		}
	}#end

	public function validateIssetUserSystem($name){
		
		$query=$this->db
		->select("`id`,`user`")
		->from("users")
		->where(array("user"=>$name))
		->get();
		return $query->row();
	}#end


	public function addUserSystem($data=array()){
		$this->db->insert('users',$data);
		return true;
	}#end

	public function getUsersForId($id){
		$query=$this->db
			->select("`id`,`name`,`lastname`,`email`,`user`,`role`,`status`,`last_login`,`details`,`modified_at`")
			->from("users")
			->where(array("id"=>$id))
			->get();
			return $query->row();
	}#end

	public function updateUserSystem($data=array(),$id){
			$this->db->where('id', $id);
			$this->db->update('users', $data); 
			return true;
	}#end

	public function updateUserPasswordSystem($data=array(),$id){
			$this->db->where('id', $id);
			$this->db->update('users', $data); 
			return true;
	}#end

		public function deleteUserSystem(){
			$idsToDelete=$_POST["delete"];
			//not to delete admin
			if ($this->input->post("adminUser")) {
				$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>No puede borrar el administrador del sistema</div>");
				redirect(base_url()."users/managerusersystem");
			}
			#not to delete user login
			if (implode(",",$idsToDelete)==$this->session->userdata('id')) {
				$this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>No puede borrarse a sí mismo.</div>");
				redirect(base_url()."users/managerusersystem");
				exit;
			}else{
			    $delete = array('users');
				$this->db->where('id IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($delete);
				$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Selección eliminada con éxito.</div>");
				redirect(base_url()."users/managerusersystem");
			}
		
	}#emd

}#end class