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



}#end