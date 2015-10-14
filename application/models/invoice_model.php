<?php
class invoice_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	 #SELECT `id_invoice`,`client`,`date_service`,`hour`,`country`,`province`,`city`,`zip_code`,`address`,`observation`,`date_added` FROM `invoice` WHERE 1
	public function addInvoice($data=array()){
		$this->db->insert('invoice',$data);
		return $this->db->insert_id();
	}#end

	public function addInvoices($data=array()){
		$this->db->insert('invoice_services',$data);
		return true;
	}#end



}