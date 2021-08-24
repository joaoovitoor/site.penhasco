<?php
class popups {

var $idpopup;
var $titulo;
var $imagem;
var $status;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into popups(idpopup, titulo, imagem, status, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idpopup, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->imagem, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->status, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idpopup = values(idpopup), titulo = values(titulo), imagem = values(imagem), status = values(status), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idpopup	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from popups where idpopup = " . $this->idpopup;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from popups where idpopup = " . $this->idpopup;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
