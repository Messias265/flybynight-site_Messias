<?php
// src/loja_produto_crud.php

require_once "conecta.php";

function buscarLojasProdutos(PDO $conexao):array 
{
    $sql = "SELECT 
                 produtos.nome AS nome_produto,
                 loja.nome AS nome_loja
            FROM lojas_produtos 
             JOIN produto ON produtos.id = lojas_produtos_id 
             JOIN loja ON lojas.id = lojas_produtosid
            ORDER BY nome_loja, nome_produto, estoque";

    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
};

