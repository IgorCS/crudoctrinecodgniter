<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 
/**
 * @property usuario $usuario Classe de usuário
 * @property Doctrine $doctrine Biblioteca ORM
 */

/**
* Método principal do mini-crud
* 
*/
/**
 * Método principal do mini-crud
 * @param nenhum
 * @return view
 */	
class Home extends MY_Controller {


	public function index()	{
		require_once "application/controllers/login.php";
		$us = new Login();
		$sessao = $us->logar = $this->session->userdata('usuario');
		$chamar['us'] = $sessao;

		$result = $this->doctrine->em->getRepository("Entity\Estado")->createQueryBuilder('m');
		$result->select("m");		
		$query = $result->getQuery();		
		$chamar['result'] = $query->getResult(); 

		$result = $this->doctrine->em->getRepository("Entity\Cidade")->createQueryBuilder('m');
		$result->select("m");		
		$query = $result->getQuery();		
		$chamar['resultCidade'] = $query->getResult();

		//$chamar['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll();
		$chamar['usuarios'] = $this->doctrine->em->getRepository("usuario")->findBy(array(), array('id' => 'DESC'));
		$this->load->view('admin/home', $chamar);
	}


	public function restserver(){
		$list = array();
		$list[0]['userId'] = 1;
		$list[0]['title'] = "Vamos pegar este rest e botar na API!!![-_-]";  
		$list[0]['body'] = "TESTE DO REST com JSON!!!"; 
		echo $myJSON = json_encode($list[0]) . "<br/>";
		exit();
		$this->load->view('admin/restserver', $dados);
	}



	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 	 
	public function Cadastrar(){

		$this->load->model("estadoCidade");
		
		$departamentos = $this->estadoCidade->retornaEstado();
		
		$option = "<option value=''></option>";
		foreach($departamentos -> result() as $linha) {
			$option .= "<option value='$linha->id_estado'>$linha->sgl_estado</option>";			
		}
		
		$usuario['selecionaEstado'] = $option;		

		$usuario['usuarios'] = new usuario();        			
		
		$this->load->view('admin/cadastro' ,$usuario);				

	}

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
	public function Salvar(){

		$post = $_POST;
		
		$usuario['usuarios'] = new usuario();
		$usuario['usuarios']->setNome($post['nome']);
		$usuario['usuarios']->setEmail($post['email']);  
		$usuario['usuarios']->setCelular($post['celular']);
		$usuario['usuarios']->setId_estado($post['id_estado']);
		$usuario['usuarios']->setId_cidade($post['id_cidade']);  
		$usuario['usuarios']->setDatacadastro(date('Y-m-d h:i:s')); 
		$usuario['usuarios']->setActive(1);                             

		$this->doctrine->em->persist($usuario['usuarios']);
		$this->doctrine->em->flush(); 
		redirect();
		redirect(site_url('admin/home',$usuario)); 
	} 



 /**
  * Processa o formulário para salvar os dados
  */
    /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
    public function Editar($id){

    	if(is_null($id))
    		redirect();		

    	$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));

    	if ($usuario['usuarios'] instanceof usuario)
    	{

    	}
    	else
    	{
    		echo 'Usuário não localizado';
    	}

    	$this->load->view('admin/editar',$usuario);

    }


	 /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
	 public function Atualizar(){
	 	$post = $_POST;

	 	$users=$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$post['id']));

	 	$users ->setNome($post['nome']);
	 	$users ->setEmail($post['email']);
	 	$users ->setTelefone($post['telefone']);
	 	$users ->setCelular($post['celular']);
	 	$users ->setIdade($post['idade']);
		//$usuario = new usuario();          
	 	$this->doctrine->em->persist($usuario['usuarios']);
	 	$this->doctrine->em->flush(); 

	 	if(!$post['id']){
	 		echo 'Não foi possivel editar usuario';
	 	}else{
	 		echo 'OK.Usuário Editado com sucesso!!!!';
				// Redireciona o usuário para a home
	 		redirect();
	 	}		
		// Carrega a view para edição
	 	$this->load->view('editar',$usuario);
	 }



	 /**
     * Localiza o usuário para ser excluído
     *
     * @param int $id
     */
	 public function Excluir($id){		

	 	$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));	
	 	$this->doctrine->em->remove($usuario['usuarios']);
	 	$this->doctrine->em->flush(); 
		// Checa o status da operação gravando a mensagem na seção
	 	if(!$usuario!=null){
	 		echo 'Não foi possivel excluir o usuario';
	 	}else{
	 		echo 'Usuário Excluído com sucesso!!!!';
				// Redireciona o usuário para a home
	 		redirect();
	 	}	

	 }


 	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
 	*/
	// public function delete($id = null) {
	// 	if ($this->m_cadastros->delete($id)) {
	// 		$variaveis['mensagem'] = "Registro excluído com sucesso!";
	// 		$this->load->view('v_sucesso', $variaveis);
	// 	}
	// }


}


   





	





