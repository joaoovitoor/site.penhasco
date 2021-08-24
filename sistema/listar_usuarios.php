<?php
$NumeroRegistros				= 10;

$condicao		= '';
$comp			= '';

if(RecebeParametro('busca') != ''){
	$condicao	.= '(';
	
	$condicao	.= $comp . '(usuarios.nome like "%' . RecebeParametro('busca') . '%")';
	$comp		= ' or ';
	
	$condicao	.= ')';
	$comp		= ' and ';
}

if(!empty($condicao))
	$condicao				= ' where ' . $condicao;

$sql						= 'select * from usuarios ' . $condicao;

$NumeroPagina				= RecebeParametro('NumeroPagina');
if(empty($NumeroPagina))
	$NumeroPagina			= 0;
 
$TotalRegistros				= RetornaTotal($sql);
 
$ApartirRegistro			= $NumeroPagina * $NumeroRegistros;
$Paginas					= $TotalRegistros / $NumeroRegistros; 

$ArrRegistros				= SelecionaBanco($sql . ' limit ' . $ApartirRegistro . ',' . $NumeroRegistros); 

if($TotalRegistros > $NumeroPagina)
	$paginacao				= Paginacao($NumeroPagina, $NumeroRegistros, $TotalRegistros);
?>
<script type="text/javascript">
function Paginacao(NumeroPagina){
	document.form1.NumeroPagina.value		= NumeroPagina;
	document.form1.submit();
}
</script>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item active"><a href="<?php echo $DiretorioVirtualRaiz?>usuarios/<?php if(!empty($Objusuarios->idcliente)) echo $Objusuarios->idcliente; else echo RecebeParametro('idcliente');?>">Usuários</a></li>
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

<form class="form-horizontal form-label-left" name="form1" novalidate method="post" enctype="multipart/form-data" onsubmit="document.form1.NumeroPagina.value=0">
<input type="hidden" name="NumeroPagina" id="NumeroPagina" value="<?php echo $NumeroPagina?>">

<div class="row">
	<div class="col-sm-4">
		<a href="<?php echo $DiretorioVirtualRaiz?>usuarios/novo/" class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Adicionar</a>
	</div>

	<div class="col-sm-8">
		<div class="input-group">
			<input type="text" name="busca" id="busca" value="<?php echo RecebeParametro('busca')?>" class="form-control" placeholder="Nome">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="clearfix" style="height: 10px"></div>

<div class="list-group shadow h-100">
<?php
if(is_array($ArrRegistros)){
	foreach($ArrRegistros as $campo){?>
		<div class="list-group-item list-group-item-action flex-column align-items-start ">
			<div class=" w-100 justify-content-between">
				<h5 class="mb-1"><?php echo $campo['nome']?> <span class="badge badge-warning"><?php echo $campo['nivel']?></span></h5>
			</div>
			<small class="float-right text-right">
				<br><br>
				<a href="<?php echo $DiretorioVirtualRaiz?>usuarios/alterar/<?php echo $campo['idusuario']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
			</small>
			<p class="mb-1">
				CPF: <?php echo $campo['cpf']?>
			</p>
			<small>
				Telefone: <?php echo $campo['telefone']?><br>
				E-mail: <?php echo $campo['email']?>
			</small>
		</div>
		<?php
	}
}?>
</div>

<?php echo $paginacao?>
</form>