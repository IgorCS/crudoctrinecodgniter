<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model("estadoCidade");
		
		$departamentos = $this->estadoCidade->retornaEstado();
		
		$option = "<option value=''></option>";
		foreach($departamentos -> result() as $linha) {
			$option .= "<option value='$linha->id_estado'>$linha->sgl_estado</option>";			
		}
		
		$variaveis['selecionaEstado'] = $option;
		
		$this->load->view('welcome_message', $variaveis);
	}
	public function buscaCidadeEstado(){
		
		$this->load->model("estadoCidade");
		
		$cidades = $this->estadoCidade->retornaCidadeEstado();
		
		$option = "<option value=''></option>";
		foreach($cidades -> result() as $linha) {
			$option .= "<option value='$linha->id_cidade'>$linha->nom_cidade</option>";			
		}
		
		echo $option;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */