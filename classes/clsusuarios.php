<?php
class usuarios {

	var $idusuario;
	var $nome;
	var $email;
	var $telefone;
	var $master;
	var $financeiro;
	var $cpf;
	var $senha;
	var $idusuariocadastro;
	var $dataultimoacesso;
	var $datacadastro;
	var $dataultimaatualizacao;

	function Insere(){
		$Sql  = "insert into usuarios(idusuario, nome, email, telefone, master, financeiro, cpf, senha, idusuariocadastro, dataultimoacesso, datacadastro, dataultimaatualizacao) VALUES (";
		$Sql .= FormataCampoBanco($this->idusuario, 2, 1) . ", ";
		$Sql .= FormataCampoBanco($this->nome, 1, 1) . ", ";
		$Sql .= FormataCampoBanco($this->email, 1, 1) . ", ";
		$Sql .= FormataCampoBanco($this->telefone, 1, 1) . ", ";
		$Sql .= FormataCampoBanco($this->master, 2, 1) . ", ";
		$Sql .= FormataCampoBanco($this->financeiro, 2, 1) . ", ";
		$Sql .= FormataCampoBanco($this->cpf, 1, 1) . ", ";
		$Sql .= FormataCampoBanco($this->senha, 1, 1) . ", ";
		$Sql .= FormataCampoBanco($this->idusuariocadastro, 2, 1) . ", ";
		$Sql .= FormataCampoBanco($this->dataultimoacesso, 3, 1) . ", ";
		$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
		$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
		$Sql .= ") ON DUPLICATE KEY UPDATE idusuario = values(idusuario), nome = values(nome), email = values(email), telefone = values(telefone), master = values(master), financeiro = values(financeiro), cpf = values(cpf), senha = values(senha), idusuariocadastro = values(idusuariocadastro), dataultimoacesso = values(dataultimoacesso), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
		
		$this->idusuario	= InsereBanco($Sql);
	}

	function Seleciona(){
		$Sql  		= "select * from usuarios where idusuario = " . $this->idusuario;
		$ArrSql 	= SelecionaBanco($Sql);
		
		if(is_array($ArrSql[0]))
			foreach($ArrSql[0] as $key => $value)
				$this->$key							= $value;
	}

	function Excluir(){
		$Sql 		= " delete from usuarios where idusuario = " . $this->idusuario;
		$ArrSql 	= DeletaBanco($Sql);
		
		if($ArrSql)
			return true;
		else 
			return false; 
	} 
}?>