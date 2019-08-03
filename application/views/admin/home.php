<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" meta http -equiv="pragma" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini Crud Codgniter Doctrine</title>   
	<link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">	
</head>
<body>
<div class="container">
		<div class="page-header">
			<h1>Criando um CRUD com CodeIgniter</h1>
		</div>
		<h1 class="text-center"></h1>
		<div class="col-md-12">
		<div class="row">
			<a class="btn btn-success btn-xs" href="<?php echo site_url('home/Cadastrar')?>">Novo Cadastro</a>
			<a class="btn btn-danger btn-xs" href="<?php echo site_url('/restserver/rest')?>">JSON</a>
			<a class="btn btn-info btn-xs"    href="<?php echo base_url() . 'report/ImprimeAll/' ?>">ImprimeUsuarios</a> 
			<a class="btn btn-warning btn-xs" href="<?php echo base_url()?>login/logout">Sair</a>
		</div>	
		<style>				
			.tdEspaco { 
				display: table; 
				float:center; 
				margin-right:10px

			}				
		</style>	
			
<table class="table table-striped table-hover table-bordered">
	<caption>Cadastros:</caption>
	<thead>
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Cellular</th>
			<th>Cidade/UF</th>			
			<th>Ações</th>	
								
		</tr>
	</thead>
	<tbody>	
		<?php foreach($usuarios as $item): ?>					
			<tr>

				<td><?= $item->getId() ?></td>
				<td><?= $item->getNome() ?></td>
				<td><?= $item->getEmail() ?></td>
				<td><?= $item->getCelular() ?></td>					
				
				<td class="tdEspaco">					
					<?php $resp="";
					$respCid="";							
					foreach ($resultCidade as $value){ 
						$resp=explode(" ",$item->getId_cidade());?>						 						  
						<?= in_array($value->getId_cidade(),$resp) ? $value->getNom_cidade().' /' : ''?>	

					<? } ?>						
											
					<?php foreach ($result as $value){ 
						$respCid=explode(" ",$item->getId_estado());?>
						<?= in_array($value->getId_Estado(),$respCid) ? $value->getSgl_estado() : ''?>						 
					<? } ?>					
				</td>

				<td class="actions">

					<a class="btn btn-info btn-xs"    href="<?php echo base_url() . 'report/Imprime/' . $item->getId(); ?>">Imprime</a>   
										 
					<a href="#" id="confirma_exclusao" class='btn btn-danger btn-xs' data-id="<?= $item->getId() ?>" data-nome="" />Excluir</a>   
				</td>
				
			</tr>	
		<?php endforeach; ?>						
	</tbody>
</table>


</div>
</div>	
</div>
<div class="modal fade" id="modal_confirmation">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirmação de Exclusão</h4>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><< Voltar</button>
				<button type="button" class="btn btn-danger" id="btn_excluir">OK</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>	
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script>
	
	var base_url = "<?= base_url(); ?>";
	
	$(function(){
		$('#confirma_exclusao').on('click', function(e) {
			e.preventDefault();

			var nome = $(this).data('nome');
			var id = $(this).data('id');

			$('#modal_confirmation').data('nome', nome);
			$('#modal_confirmation').data('id', id);
			$('#modal_confirmation').modal('show');
		});

		$('#modal_confirmation').on('show.bs.modal', function () {
			var nome = $(this).data('nome');
			$('#nome_exclusao').text(nome);
		});	

		$('#btn_excluir').click(function(){
			var id = $('#modal_confirmation').data('id');
			document.location.href = base_url + "index.php/home/Excluir/"+id;
		});					
	});
</script>
</body>
</html>