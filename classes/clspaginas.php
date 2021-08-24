<?php
class paginas {

var $idpagina;
var $idalbuns;
var $titulo;
var $descricao;
var $descricaocompleta;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into paginas(idpagina, idalbuns, titulo, descricao, descricaocompleta, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idpagina, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->idalbuns, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->descricao, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->descricaocompleta, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idpagina = values(idpagina), idalbuns = values(idalbuns), titulo = values(titulo), descricao = values(descricao), descricaocompleta = values(descricaocompleta), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";

$this->idpagina	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from paginas where idpagina = " . $this->idpagina;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from paginas where idpagina = " . $this->idpagina;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
