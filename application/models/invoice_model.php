<?php
class invoice_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getManagerInvoices(){
		
		$query=$this->db
			->select("`id_invoice`,`client`,`atotal`,status,`date_added`,`date_service`")
			->from("invoice")
			->order_by("id_invoice","desc")
			->get();
			//echo $this->db->last_query();exit;
			return $query->result();
	}#end

	public function billReceivable(){
		
		$query=$this->db
			->select("`id_invoice`,`client`,`atotal`,status,`date_added`,`date_service`")
			->from("invoice")
			->order_by("id_invoice","desc")
			->where("status = 2")
			->get();
			return $query->result();
	}#end

	public function getManagerInvoicesForClient($id=null){
		
		$query=$this->db
			->select("`id_invoice`,`client`,`atotal`,status,`date_added`,`date_service`")
			->from("invoice")
			->order_by("id_invoice","desc")
			->where(array("client"=>$id))
			->get();
			return $query->result();
	}#end

	public function getInvoicesForId($id=null){
		
		$query=$this->db
			->select("`id_invoice`,`client`,`date_service`,`hour`,`country`,`province`,
				`city`,`zip_code`,`address`,`observation`,`aneto`,`aiva`,`atotal`,
				`type`,`payment_method`,status,`date_added`")
			->from("invoice")
			->where(array("id_invoice"=>$id))
			->get();
			//echo $this->db->last_query();exit;
			return $query->row();
	}#end

	public function getInvoicesServicesForId($id=null){
		
		$query=$this->db
			->select("`id_invoice_services`,`reference`,`description`,`quantity`,`price`,`discount`,`neto`,`itbis`,`total`,`id_rel`")
			->from("invoice_services")
			->where(array("id_rel"=>$id))
			->get();
			return $query->result();
	}#end

	 
	public function addInvoice($data=array()){
		$this->db->insert('invoice',$data);
		return $this->db->insert_id();
	}#end

	public function addInvoices($data=array()){
		$this->db->insert('invoice_services',$data);
		return true;
	}#end

	public function editInvoice($data=array(),$id=null){
		$this->db->where('id_invoice', $id);
		$this->db->update('invoice', $data); 
		return true;
	}#end


	public function delete(){
		$idsToDelete=$_POST["delete"];

			    $delete = array('invoice');
				$this->db->where('id_invoice IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($delete);

				$deleteInvoiceServices = array('invoice_services');
				$this->db->where('id_rel IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($deleteInvoiceServices);

				$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Selección eliminada con éxito.</div>");
				redirect(base_url()."invoice/invoices");
	}#end



}