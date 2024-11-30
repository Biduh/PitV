<?php

session_start();


$idProduto = $_POST['id_prd'];
foreach ($_SESSION['itens'] as $chave => $subchave) {
    if($_SESSION['itens'][$chave]["id_produto"] == $idProduto){
        unset($_SESSION['itens'][$chave]);
    
    }

}

echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0,URL=carrinho.php"/>';



?>