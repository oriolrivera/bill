<?php
class client_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getClients(){
		#SELECT `id`,`name`,`razon_social`,`cif_nif`,`phone_one`,`phone_two`,`fax`,`email`,`web`,`buy`,`emplead_asigne` FROM `client`,`observation`
		$query=$this->db
			->select("`id`,`name`,`razon_social`,`cif_nif`,`phone_one`,`phone_two`,`fax`,`email`,`web`,`buy`,`emplead_asigne`,`observation`")
			->from("client")
			->get();
			//echo $this->db->last_query();exit;
			return $query->result();
	}#end

}#end