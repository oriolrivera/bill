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
}

