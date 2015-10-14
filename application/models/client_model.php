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

	public function addClientBankAccount($data=array()){
		$this->db->insert('client_bank_account',$data);
		return true;
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