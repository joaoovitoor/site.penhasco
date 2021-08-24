<?php
class albuns {

var $idalbum;
var $idimagens;
var $titulo;
var $descricao;
var $status;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into albuns(idalbum, idimagens, titulo, descricao, status, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idalbum, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->idimagens, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->descricao, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->status, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idalbum = values(idalbum), idimagens = values(idimagens), titulo = values(titulo), descricao = values(descricao), status = values(status), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idalbum	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from albuns where idalbum = " . $this->idalbum;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from albuns where idalbum = " . $this->idalbum;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
