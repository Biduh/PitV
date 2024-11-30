<?php

if(!isset($_SESSION["id_usuario"])){
    session_start();
}

if(!isset($_SESSION['itens'])){
    $_SESSION['itens'] = array();
}


$idProduto = $_POST['id_produto'];
$nomeProduto = $_POST['nome_produto'];
$descricaoProduto = $_POST['desc_produto'];
$qtdProduto = $_POST['qtd_produto'];
$preco = $_POST['preco'];
$total = $qtdProduto * $preco;

foreach ($_SESSION['itens'] as $chave => $subchave) 
{
    if($_SESSION['itens'][$chave]["id_produto"] == $idProduto)
    {
        $_SESSION['itens'][$chave]["quantidade"] = $qtdProduto;
        $_SESSION['itens'][$chave]["total"] = $total;
        exit();
        
    }
   
}


array_push($_SESSION['itens'], 
array(
    'id_produto' => $idProduto,
    'nome' => $nomeProduto,
    'descricao' => $descricaoProduto,
    'quantidade' => $qtdProduto,
    'total' => $total,
    'precoUnit' => $preco
)
);



?>

