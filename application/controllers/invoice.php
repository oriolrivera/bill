<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
         if(!$this->session->userdata("id")){ redirect(base_url());}
    }

    public function invoices(){

        $results=$this->invoice_model->getManagerInvoices();
        $this->layout->setTitle("Gestor Facturas");
    	$this->layout->view("invoices",compact('results'));
    }

     public function newinvoice(){

     	if($this->input->post())
		{

        $save=array(

           "client"=>$this->input->post("client",true),
           "date_service"=>date("Y-m-d",strtotime($this->input->post("fecha",true))), 
           "hour"=>$this->input->post("hora",true), 
           "country"=>$this->input->post("codpais",true), 
           "province"=>$this->input->post("provincia",true), 
           "city"=>$this->input->post("ciudad",true),
           "zip_code"=>$this->input->post("codpostal",true), 
           "address"=>$this->input->post("direccion",true), 
           "observation"=>$this->input->post("observaciones",true), 
           "aneto"=>str_replace(" ", "", $this->input->post("aneto_input",true)), 
           "aiva"=>$this->input->post("aiva_input",true), 
           "atotal"=>$this->input->post("atotal",true), 
           "type"=>$this->input->post("tipo",true), 
           "payment_method"=>$this->input->post("forma_pago",true), 
           "date_added"=>date("Y-m-d H:i:s"), 

        );

        $saveId=$this->invoice_model->addInvoice($save);
            
           $referenciaPost=$this->input->post("referencia",true);
            $dataReferencia= implode(',', $referenciaPost);
            $arrayReferencia=preg_split("/,/",$dataReferencia); 

            $descPost=$this->input->post("desc",true);
            $dataDesc= implode(',', $descPost);
            $arrayDesc=preg_split("/,/",$dataDesc); 

            $cantidadPost=$this->input->post("cantidad",true);
            $dataCantidad= implode(',', $cantidadPost);
            $arrayCantidad=preg_split("/,/",$dataCantidad); 

            $precioPost=$this->input->post("precio",true);
            $dataPrecio= implode(',', $precioPost);
            $arrayPrecio=preg_split("/,/",$dataPrecio);            

            $dtoPost=$this->input->post("dto",true);
            $dataDto= implode(',', $dtoPost);
            $arrayDto=preg_split("/,/",$dataDto);       

            $netoPost=$this->input->post("neto",true);
            $dataNeto= implode(',', $netoPost);
            $arrayNeto=preg_split("/,/",$dataNeto);

            $ivaPost=$this->input->post("iva",true);
            $dataIva= implode(',', $ivaPost);
            $arrayIva=preg_split("/,/",$dataIva);

            $totalpPost=$this->input->post("totalp",true);
            $datatotalp= implode(',', $totalpPost);
            $arraytotalp=preg_split("/,/",$datatotalp);


            for($init=0;$init<count($arrayReferencia);$init++) {
                            $querySaveInvoices=array(

                                "reference"=>$arrayReferencia[$init],     
                                "description"=>$arrayDesc[$init],        
                                "quantity"=>$arrayCantidad[$init],       
                                "price"=>$arrayPrecio[$init],        
                                "discount"=>$arrayDto[$init],
                                "neto"=>$arrayNeto[$init],
                                "itbis"=>$arrayIva[$init],
                                "total"=>$arraytotalp[$init],
                                "id_rel"=>$saveId,   
                            );
                            
                            $this->invoice_model->addInvoices($querySaveInvoices);
            }#end for


              $this->session->set_flashdata("mensaje","<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registro creado con éxito.</div>");
              redirect(base_url()."invoice/printer/".$saveId."/");

		}#end post

        $results=$this->client_model->getClients();

        $this->layout->setTitle("Nueva Factura");
    	$this->layout->view("newinvoice",compact('results'));
    }#end

    public function printer($id=null){

      if (!$id) {show_404();}
   
      $results = $this->invoice_model->getInvoicesServicesForId($id);
      $data = $this->invoice_model->getInvoicesForId($id);
      $dataClient = $this->client_model->getClientForId($data->client);

      if (sizeof($results)==0) { show_404();}

      $this->layout->setTitle("Imprimir Factura");
      $this->layout->view("printer", compact('results','data','dataClient'));

    }#end print

    public function pdf()
    {
      $cuerpo=
      '
        <!doctype html>
        <html> 
        <body>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, commodi dicta, a explicabo, et accusantium iusto ducimus magnam ut soluta quidem perferendis. Nisi ab explicabo temporibus animi, ratione, reiciendis optio.
      </body></html>';
    /*  $cuerpo.='
      <h1>Ejemplo de PDF</h1>
      <ol>';

      for ($i=0; $i < 10; $i++) 
      { 
        $cuerpo.='<li>el valor de i es '.$i.' ñandú</li>';
      }

      $cuerpo.='</ol>';
*/
     /* $cuerpo.='
        <img src="'.base_url().'public/assets/images/avtar/user.png" />
      ';*/
#$cuepo.='</body></html>';
      $mpdf=new mPDF(); 
      $nombre="Reporte de Usuarios_".date("Y-m-d H:i:s").".pdf";
      $mpdf->WriteHTML($cuerpo);
      $mpdf->Output($nombre,'I');
      exit;

  
    }#end

    public function delete(){
       
        if($this->input->post("delete"))
            {                               
                 $this->invoice_model->delete();              
            }else{
                $this->session->set_flashdata("mensaje","<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Tiene que selecionar un registro a eliminar.</div>");
                redirect(base_url()."invoice/invoices");             
        }
    
    }#end

}#end class
    