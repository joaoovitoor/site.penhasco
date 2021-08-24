<?php
if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objalbuns->$key						= $value;
	
$Objalbuns->dataultimaatualizacao			= date('Y-m-d H:i:s');

if(empty($Objalbuns->datacadastro))
	$Objalbuns->datacadastro					= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	if(is_array($_POST['idimagemalbum'])){
		$ArrImagens									= array_unique($_POST['idimagemalbum']);
		$Objalbuns->idimagens						= implode(',', $ArrImagens);
	}

	$Objalbuns->Insere();
	
	if(empty($Objalbuns->idalbum))
		$Objalbuns->idalbum					= RecebeParametro('idalbum');
	
	$Msg									= 'Álbum salvo com sucesso !';
	$Direciona								= 'albuns/';

} else if(RecebeParametro('acao') == 'excluir'){
	if((RecebeParametro('idalbum') != 0) && (RecebeParametro('idalbum') != '')){
		$Objalbuns->idalbum					= RecebeParametro('idalbum');
		$Objalbuns->Excluir();
		
		$Msg								= 'Álbum excluido com sucesso !';
		$Direciona							= 'albuns/';
	} else {
		$Msg								= 'Erro ao excluir Álbum!';
	}
}

if(RecebeParametro('idalbum') > 0){
	$Objalbuns->idalbum						= RecebeParametro('idalbum');
	$Objalbuns->Seleciona();
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>albuns/">Álbuns</a></li>
	<li class="breadcrumb-item active"><?php if(empty($Objalbuns->titulo)) echo 'Novo Álbum'; else echo $Objalbuns->titulo?></li>
</ol>

<?php
if(!empty($Msg)){?>
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-info"><?php echo $Msg?></div>
		</div>
	</div>
	<?php
}?>

<form class="form-horizontal form-label-left" name="form1" method="post" enctype="multipart/form-data">
<input type="hidden" name="idalbum" id="idalbum" value="<?php echo $Objalbuns->idalbum?>">
<div class="card shadow h-100 py-2">
	<div class="card-header">Dados da Álbum</div>
	<div class="card-body">
		Título <i class="fas fa-certificate text-primary"></i>
		<input type="text" name="titulo" id="titulo" value="<?php echo $Objalbuns->titulo?>" class="form-control" placeholder="Título" required>
		
		Status <i class="fas fa-certificate text-primary"></i>
		<select name="status" id="status" class="form-control">
			<option value=""> Selecione </option>
			<?php
			if(is_array($ArrStatusTiposIngressos)){
				foreach($ArrStatusTiposIngressos as $status => $titulo){
					$selected		= '';
					if($status == $Objalbuns->status)
						$selected	= 'selected';
					
					echo '<option value="' . $status . '" ' . $selected . '>' . $titulo . '</option>';
				}
			}?>
		</select>

		Descrição
		<textarea name="descricao" id="descricao" class="form-control" rows="3"><?php echo $Objalbuns->descricao;?></textarea>
	</div>
	<?php
	if(!empty($Objalbuns->idalbum)){?>
		<div class="card-header">Imagens</div>
		<div class="card-body">
			<a class="btn btn-primary btn-block" href="<?php echo $DiretorioVirtualRaiz?>bancodeimagens.php" data-toggle="modal" data-target="#myModal">Abrir Banco de Imagens</a>
			<div class="row mt-2" id="imagensalbum">
			<?php
			if(!empty($Objalbuns->idimagens))
				$ArrRegistros		= SelecionaBanco('select * from imagens where idimagem in(' . $Objalbuns->idimagens . ')');
			
			if(is_array($ArrRegistros)){
				foreach($ArrRegistros as $campo){?>
					<div class="col-sm-2" id="imagem<?php echo $campo['idimagem']?>">
						<input type="hidden" name="idimagemalbum[]" id="idimagemalbum[]" value="<?php echo $campo['idimagem']?>">
						<div class="card">
							<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=300&height=300&imagem=' . $DiretorioImg . $campo['arquivo']?>" class="card-img-top">
							<div class="card-body text-center">
								<a href="Javascript:void(0);" onclick="RemoverAlbum(<?php echo $campo['idimagem']?>)" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i> remover</a>
							</div>
						</div>
					</div>
					<?php
				}
			}?>
			</div>
		</div>
		<?php
	}?>
	<div class="card-footer text-center">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
			<?php
			if(!empty($Objalbuns->idalbum)){?>
				<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
				<button type="submit" name="acao" value="excluir" formnovalidate class="btn btn-danger">excluir</button>
				<?php
			} else {?>
				<button type="submit" name="acao" value="salvar" class="btn btn-warning">continuar</button>
				<?php
			}?>
		</div>
	</div>
</div>
</form>