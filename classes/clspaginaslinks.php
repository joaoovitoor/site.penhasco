<?php
class paginaslinks {

var $idpaginalink;
var $idpagina;
var $titulo;
var $descricao;
var $botao;
var $nomebotao;
var $ordem;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into paginaslinks(idpaginalink, idpagina, titulo, descricao, botao, nomebotao, ordem, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idpaginalink, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->idpagina, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->descricao, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->botao, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->nomebotao, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->ordem, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idpaginalink = values(idpaginalink), idpagina = values(idpagina), titulo = values(titulo), descricao = values(descricao), botao = values(botao), nomebotao = values(nomebotao), ordem = values(ordem), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idpaginalink	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from paginaslinks where idpaginalink = " . $this->idpaginalink;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from paginaslinks where idpaginalink = " . $this->idpaginalink;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
