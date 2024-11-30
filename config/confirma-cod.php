<?php
include_once "conexao.php";

if(!isset($_SESSION)){
    session_start();
}


if(isset($_POST["bt_conf_cod"]) && isset($_SESSION["id_usuario"])){
    $codigo_conf =  $conn->real_escape_string(trim($_POST['codigo']));
    $consultarCodigo = "SELECT id_usuario FROM usuario WHERE cod_conf='$codigo_conf'";
    $resultConsultarCodigo = mysqli_query($conn, $consultarCodigo);

    if (mysqli_num_rows($resultConsultarCodigo) == 0){?>
    <script type="text/javascript">
            alert('CÓDIGO DE CONFIRMAÇÃO INCORRETO! TENTE NOVAMENTE.');
            window.location.href="recuperar-senha.php";
        </script><?php
        session_destroy();
        exit;
    } 

}else {
    session_destroy();
    header("Location: ../../public_html/index.php");
    exit();    
}




?>
