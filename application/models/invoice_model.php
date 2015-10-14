<?php
class invoice_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getManagerInvoices(){
		
		$query=$this->db
			->select("`id_invoice`,`client`,`observation`,`atotal`,`date_added`,`date_service`")
			->from("invoice")
			->order_by("id_invoice","desc")
			->get();
			//echo $this->db->last_query();exit;
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


	public function deleteProduct(){
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