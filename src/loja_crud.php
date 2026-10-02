<?php
// src/loja_crud.php

// Conectando as funções nesses arquivos

require_once "conecta.php";

// listar.php
function buscarLojas(PDO $conexao): array {

    // Montando
    $sql = "SELECT * FROM lojas ORDER BY nome";

    // Executando e aguardando
    $consulta = $conexao->query($sql);

    // Retorno
    return $consulta->fetchAll();
};

// Usada em lojas/inserir.php
  function inserirLojas(PDO $conexao, string $nome):void {
    /* recebimento do comando SQL */

    $sql = "INSERT INTO lojas (nome) VALUES(:nome)";

    $consulta = $conexao->prepare($sql);

    // a
    $consulta->bindValue(":nome", $nome);

    // 4
    $consulta->execute();
  };

  // lojas/editar.php

  function buscarLojaPorId (PDO $conexao, int $id): array 
  {
    // comando
    $sql = "SELECT * FROM lojas WHERE id = :id";
    // consulta
    $consulta = $conexao->prepare($sql);
    //atribuind valor
    $consulta->bindValue(":id", $id);
    // Exxercução da consulta
    $consulta->execute();

    // Retorno
    // Atenção
    return $consulta-> fetch();
  };

  // Usada em lojas/editar.php
  function atualizarLoja(PDO $conexao, int $id, string $nome):void
  {
    // Comando SQL
    $sql = "UPDATE lojas SET nome = :nome WHERE id = :id";
    // preparar comando
    $consulta = $conexao->prepare($sql);
    
    // Atribuir valor
    $consulta->bindValue(":nome", $nome);
    $consulta-> bindValue(":id", $id);

    // Executar
    $consulta->execute();
  };

  function excluirLoja(PDO $conexao, int $id) {

    $sql = "DELETE FROM lojas WHERE id =  :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindvalue(":id", $id);
    $consulta->execute();
  }