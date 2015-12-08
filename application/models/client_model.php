<?php
class client_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getClients(){

		$query=$this->db
			->select("`id`,`name`,`cif_nif`,`phone_one`,`email`,observation")
			->from("client")
			->order_by("id","desc")
			->get();
			//echo $this->db->last_query();exit;
			return $query->result();
	}#end

	public function addClient($data=array()){
		$this->db->insert('client',$data);
		return $this->db->insert_id();
	}#end

	public function addClientBank($data=array()){
		$this->db->insert('client_bank',$data);
		return true;
	}#end

	public function editClient($data=array(),$id=null){
		$this->db->where('id', $id);
		$this->db->update('client', $data); 
		return true;
	}#end

	public function editClientBank($data=array(),$id=null){
		$this->db->where('id_rel', $id);
		$this->db->update('client_bank', $data); 
		return true;
	}#end	

	public function editClientBankAccount($data=array(),$id=null){
		$this->db->where('id_rel_bank_account', $id);
		$this->db->update('client_bank_account', $data); 
		return true;
	}#end

	public function addClientBankAccount($data=array()){
		$this->db->insert('client_bank_account',$data);
		return true;
	}#end

	public function getClientForId($id=null){
   			$query=$this->db
			->select("`id`, `name`, `razon_social`, `cif_nif`, `phone_one`, `phone_two`, `fax`, `email`, `web`, `observation`,
				`id_client_bank`, `country`, `province`, `city`, `code_zip`, `address`, `town`, `billing_address`, `description`,
				 `id_rel`,
				`id_bank_account`, `back`, `no_account`, `id_rel_bank_account`")
			->from("client, client_bank, client_bank_account")
			->where(array("id"=>$id))
			->where("id = id_rel")
			->where("id = id_rel_bank_account")
			->get();
			return $query->row();
    }#end

	public function delete(){
		$idsToDelete=$_POST["delete"];

			    $delete = array('client');
				$this->db->where('id IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($delete);

				$deleteBank = array('client_bank');
				$this->db->where('id_rel IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($deleteBank);

				$deleteBankAccount = array('client_bank_account');
				$this->db->where('id_rel_bank_account IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($deleteBankAccount);

			

				$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Selección eliminada con éxito.</div>");
				redirect(base_url()."client/clients");
	}#end


	public function getClientForIdInvoice($id=null){

		$query=$this->db
			->select("`id`,`name`")
			->from("client")
			->where(array("id"=>$id))
			->get();
			return $query->row();
	}#end


}#end