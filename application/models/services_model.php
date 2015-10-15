<?php
class services_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getServicesManager(){

		$query=$this->db
			->select("`id_service`,`name`,`name_manager`,`price`,`email`")
			->from("service")
			->order_by("id_service","desc")
			->get();
			return $query->result();
	}#end
	public function addServices($data=array()){
		$this->db->insert('service',$data);
		return true;
	}#end

	public function updateServices($data=array(),$id=null){
			$this->db->where('id_service', $id);
			$this->db->update('service', $data); 
			return true;
	}#end

	public function getServicesForId($id=null){
		#SELECT  FROM `` WHERE 1
			$query=$this->db
			->select("`id_service`,`name`,`name_manager`,`price`,`itbis`,`phone_one`,`phone_two`,`fax`,`email`,`web`,`description`")
			->from("service")
			->where(array("id_service"=>$id))
			->get();
			//echo $this->db->last_query();exit;
			return $query->row();
	}#end

		public function delete(){
 				$idsToDelete=$_POST["delete"];

			    $delete = array('service');
				$this->db->where('id_service IN ('.implode(',',$idsToDelete).')', NULL, FALSE);
				$this->db->delete($delete);


				$this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Selección eliminada con éxito.</div>");
				redirect(base_url()."services/managerservices");
	}#end

}#end


