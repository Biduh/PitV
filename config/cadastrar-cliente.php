<?php
    $nome =mb_strtoupper(trim($_POST['nome']), "utf-8");
    $aniversario = trim($_POST['aniversario']);
    $email = mb_strtoupper(trim($_POST['email']), "utf-8");
    $cpf = trim(preg_replace('/[^0-9]/','',$_POST['cpf']));
    $pass = md5($_POST['senha']);
    $tel1 =  preg_replace('/[^0-9]/','',$_POST['tel1']);
    $tel2 = preg_replace('/[^0-9]/','',$_POST['tel2']);
    $cep = preg_replace('/[^0-9]/','',$_POST['cep']);
    $rua = mb_strtoupper(trim($_POST['rua']), "utf-8");
    $numero = mb_strtoupper(trim($_POST['numero']), "utf-8");
    $bairro = mb_strtoupper(trim($_POST['bairro']), "utf-8");
    $cidade = mb_strtoupper(trim($_POST['cidade']), "utf-8");
    $uf = mb_strtoupper(trim($_POST['uf']), "utf-8");

    include_once "conexao.php";

    $consultarEmail = "SELECT * FROM usuario WHERE email='$email'";
    $consultarCPF = "SELECT * FROM cliente WHERE cpf = '$cpf'";

    $inserirCliente = "INSERT INTO cliente (nome, data_nasc, cpf, tel_1, tel_2) VALUES ('$nome', '$aniversario', '$cpf', '$tel1', '$tel2')";

    $resultConsultarEmail = mysqli_query($conn, $consultarEmail);
    $resultConsultarCPF = mysqli_query($conn, $consultarCPF);

    if (mysqli_num_rows($resultConsultarEmail) > 0){ 
    ?>
        <script type="text/javascript">
            alert('EMAIL JA CADASTRADO PARA OUTRO CLIENTE!');
            history.back();
        </script>
        
    <?php
        exit;
    }

    if (mysqli_num_rows($resultConsultarCPF) > 0){?>
        <script type="text/javascript">
            alert('CPF JA CADASTRADO PARA OUTRO CLIENTE!');
            history.back();
        </script><?php
        exit;
    }

    $resultInserir = mysqli_query($conn, $inserirCliente);

    if ($resultInserir === false) {
        echo mysqli_error($conn);
    } else { 
        $inserirEndereco = "INSERT INTO endereco (cep, rua, numero, bairro, cidade, uf, id_cliente) VALUES ('$cep','$rua', $numero, '$bairro', '$cidade', '$uf', LAST_INSERT_ID())";
        $resultInserirEndereco = mysqli_query($conn, $inserirEndereco);
        if ($resultInserirEndereco === false) {
            echo mysqli_error();
        } else {
             $inserirUsuario = "INSERT INTO usuario (email, senha, id_cliente) VALUES ('$email','$pass', LAST_INSERT_ID())"; 
             $resultInserirUsuario = mysqli_query($conn, $inserirUsuario);

             if ($resultInserirUsuario === false) {
                echo mysqli_error();
            }else{
                ?>
                    <script type="text/javascript">
                        alert('CLIENTE CADASTRADO COM SUCESSO! VOCÊ SERÁ REDIRECIONADO PARA A PÁGINA DE LOGIN.');
                        window.location.href="../public_html/index.php";
                    </script><?php
                exit();

            }
        } 
    
    }

   


?>