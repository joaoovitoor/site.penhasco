<?php
class mapas {

var $idmapa;
var $titulo;
var $area;
var $conteudo;
var $imagem;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into mapas(idmapa, titulo, area, conteudo, imagem, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idmapa, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->area, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->conteudo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->imagem, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idmapa = values(idmapa), titulo = values(titulo), area = values(area), conteudo = values(conteudo), imagem = values(imagem), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idmapa	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from mapas where idmapa = " . $this->idmapa;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from mapas where idmapa = " . $this->idmapa;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
