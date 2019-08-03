<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini-Crud com Bootstrap e CodeIgniter 3.0</title>   
     <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script>

     	var base_url = '<? echo base_url() ?>';

     	function buscaCampos(id_estado){

     		$.post(base_url+"index.php/welcome/buscaCidadeEstado", {
     			id_estado : id_estado
     		}, function(data){
     			$('#id_cidade').html(data);
     		});
     	}

     </script>	

<div class="container">
	<div class="page-header">
		<h1>Bem Vindo ao Cadastro de Usuários</h1>
	</div>
	

	<form method="post" action="<?=base_url()?>home/Salvar" enctype="multipart/form-data">
      
		<div class="col-md-4">
			    <label>Nome:</label>
				<input type="text" name="nome" class="form-control" value="<?=$usuarios->getNome() ? $usuarios->getNome(): '' ?>" required/>
				<label>Email:</label>
				<input type="text" name="email" class="form-control" value="<?=$usuarios->getEmail()?>" required/>
				
				<label>Cellular:</label>
				<input type="text" name="celular" class="form-control" value="<?=$usuarios->getCelular()?>" required/>
				
				<div id="container">
					<div id="body">
						<p>
							<label>Escolha o Estado:</label><br />
							<select name="id_estado" id="id_estado" onchange="buscaCampos($(this).val())">
								<? echo $selecionaEstado; ?>
							</select>
						</p>
						<p>
							<label>Escolha a Cidade:</label><br />
							<select name="id_cidade" id="id_cidade">
							</select>
						</p>
					</div>
				</div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		
		</div>
		<div class="col-md-4">
			<label><em>Todos os campos são obrigatórios.</em></label>
			<div class="clearfix"></div>
			<!--<input type="" name="id" value="<?=$usuarios->getId()?>"/>-->
			<input type="submit" value="Salvar" class="btn btn-success" />
		</div>
	</form>
</div>


