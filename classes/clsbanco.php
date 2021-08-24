<?php
require_once('variavelglobal.php');

$comandoexecutado = '';

function CriaConexao(){
	global $servidor;
	global $usuario;
	global $senha;
	global $banco;
	
	$conexaobanco = mysqli_connect($servidor, $usuario, $senha) or die ('I cannot connect to the database because: ' . mysqli_error());;
	$db = mysqli_select_db ($conexaobanco, $banco);

	return $conexaobanco;
}

function FechaConexao($idconexao){
	mysqli_close($idconexao);
}
 
function SelecionaBanco($comandoexecutar){
	
	$conexaobanco = CriaConexao();
	global $comandoexecutado;	
	$comandoexecutado = mysqli_query($conexaobanco, $comandoexecutar);

	if($err=mysqli_errno($conexaobanco)){
		exit("Comando: " . $comandoexecutar . "<br> Erro: " . mysqli_error($conexaobanco));
	}

	if(mysqli_num_rows($comandoexecutado))
		while($row = mysqli_fetch_array($comandoexecutado, MYSQLI_ASSOC)){
			$resultado[] = $row;
		}
			
	FechaConexao($conexaobanco);

	return $resultado;
}

function RetornaTotal($comandoexecutar){
	
	$conexaobanco = CriaConexao();
	global $comandoexecutado;	
	$comandoexecutado = mysqli_query($conexaobanco, $comandoexecutar);

	if($err=mysqli_errno($conexaobanco)){
		exit("Comando: " . $comandoexecutar . "<br> Erro: " . mysqli_error($conexaobanco));
	}

	$resultado			= mysqli_num_rows($comandoexecutado);
			
	FechaConexao($conexaobanco);

	return $resultado;
}

function InsereBanco($comandoexecutar){
	
	$conexaobanco = CriaConexao();
	mysqli_query($conexaobanco, $comandoexecutar);
	if($err=mysqli_errno($conexaobanco)){
		echo("Erro: " . mysqli_error($conexaobanco));
	}

	$resultado = mysqli_insert_id($conexaobanco);
	FechaConexao($conexaobanco);
	return $resultado;
}

function AlteraBanco($comandoexecutar){

	$conexaobanco = CriaConexao();
	mysqli_query($conexaobanco, $comandoexecutar);
	if($err=mysqli_errno($conexaobanco)){
		exit("Comando: " . $comandoexecutar . "<br> Erro: " . mysqli_error($conexaobanco)); 
	}

	FechaConexao($conexaobanco);
	return 1;
}

function DeletaBanco($comandoexecutar){

	$conexaobanco = CriaConexao();
	mysqli_query($conexaobanco, $comandoexecutar);
	if($err=mysqli_errno($conexaobanco)){
		exit("Comando: " . $comandoexecutar . "<br> Erro: " . mysqli_error($conexaobanco));
	}

	FechaConexao($conexaobanco);
	return 1;
}
?>
