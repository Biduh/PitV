<?php
include_once "conexao.php";


$sql = "SELECT * FROM produto;";
$buscaProdutos = mysqli_query($conn, $sql);


if($buscaProdutos == false){
    echo "Erro ao realizar a busca de produtos no banco de dados. Tente novamente mais tarde.";
} else if (mysqli_num_rows($buscaProdutos)==0){
    echo "Sem produtos cadastrados no banco de dados";
} else {
    while($produtos = mysqli_fetch_array($buscaProdutos)){
        
    }
        
    echo $produtos["id_produto"] . "</br>";
    

  

}




?>