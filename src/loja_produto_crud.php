<?php
// src/loja_produto_crud.php

require_once "conecta.php";

function buscarLojasProdutos(PDO $conexao):array 
{
    $sql = "SELECT * FROM lojas_produtos ORDER BY produto_id, loja_id, estoque";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
};

