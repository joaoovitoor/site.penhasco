<?php
class configuracoes {

var $idconfiguracao;
var $titulo;
var $meta;
var $description;
var $telefone1;
var $telefone2;
var $telefone3;
var $endereco;
var $numero;
var $bairro;
var $cidade;
var $uf;
var $cep;
var $email;
var $emailgrupo;
var $logo;
var $youtube;
var $facebook;
var $instagram;
var $servicos_descricao1;
var $servicos_imagem1;
var $servicos_descricao2;
var $servicos_imagem2;
var $servicos_descricao3;
var $servicos_imagem3;
var $servicos_descricao4;
var $servicos_imagem4;
var $servicos_descricao5;
var $servicos_imagem5;
var $servicos_descricao6;
var $servicos_imagem6;
var $instagram_link;
var $instagram_imagem;
var $mapa_imagem;
var $apousada;
var $aviso;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into configuracoes(idconfiguracao, titulo, meta, description, telefone1, telefone2, telefone3, endereco, numero, bairro, cidade, uf, cep, email, emailgrupo, logo, youtube, facebook, instagram, servicos_descricao1, servicos_imagem1, servicos_descricao2, servicos_imagem2, servicos_descricao3, servicos_imagem3, servicos_descricao4, servicos_imagem4, servicos_descricao5, servicos_imagem5, servicos_descricao6, servicos_imagem6, instagram_link, instagram_imagem, mapa_imagem, apousada, aviso, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idconfiguracao, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->titulo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->meta, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->description, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->telefone1, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->telefone2, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->telefone3, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->endereco, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->numero, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->bairro, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->cidade, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->uf, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->cep, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->email, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->emailgrupo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->logo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->youtube, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->facebook, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->instagram, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao1, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem1, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao2, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem2, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao3, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem3, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao4, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem4, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao5, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem5, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_descricao6, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->servicos_imagem6, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->instagram_link, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->instagram_imagem, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->mapa_imagem, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->apousada, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->aviso, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idconfiguracao = values(idconfiguracao), titulo = values(titulo), meta = values(meta), description = values(description), telefone1 = values(telefone1), telefone2 = values(telefone2), telefone3 = values(telefone3), endereco = values(endereco), numero = values(numero), bairro = values(bairro), cidade = values(cidade), uf = values(uf), cep = values(cep), email = values(email), emailgrupo = values(emailgrupo), logo = values(logo), youtube = values(youtube), facebook = values(facebook), instagram = values(instagram), servicos_descricao1 = values(servicos_descricao1), servicos_imagem1 = values(servicos_imagem1), servicos_descricao2 = values(servicos_descricao2), servicos_imagem2 = values(servicos_imagem2), servicos_descricao3 = values(servicos_descricao3), servicos_imagem3 = values(servicos_imagem3), servicos_descricao4 = values(servicos_descricao4), servicos_imagem4 = values(servicos_imagem4), servicos_descricao5 = values(servicos_descricao5), servicos_imagem5 = values(servicos_imagem5), servicos_descricao6 = values(servicos_descricao6), servicos_imagem6 = values(servicos_imagem6), instagram_link = values(instagram_link), instagram_imagem = values(instagram_imagem), mapa_imagem = values(mapa_imagem), apousada = values(apousada), aviso = values(aviso), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idconfiguracao	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from configuracoes where idconfiguracao = " . $this->idconfiguracao;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from configuracoes where idconfiguracao = " . $this->idconfiguracao;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 
