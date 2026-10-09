<?php
// src/loja_produto_crud.php

require_once "conecta.php";

function buscarLojasProdutos(PDO $conexao):array 
{
    $sql = "SELECT 
                 produtos.nome AS nome_produto,
                 loja.nome AS nome_loja
            FROM lojas_produtos 
            JOIN produtos ON produtos.id = lojas_produtos.produto_id 
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            ORDER BY nome_loja";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
};

