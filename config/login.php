<?php
include_once "conexao.php";


if(!isset($POST['email']) || !isset($_POST['senha'])) {
    
    $email = $conn->real_escape_string($_POST['email']);
    $pass = md5($conn->real_escape_string($_POST['senha']));


    $sqlUsuario = "SELECT u.id_usuario, c.id_cliente, e.id_endereco, c.nome, c.data_nasc, c.cpf, c.tel_1, c.tel_2, e.rua, e.numero, e.bairro, e.cidade, e.uf, u.status FROM usuario as u, cliente as c, endereco as e WHERE u.email = '$email' AND u.senha = '$pass' AND u.id_cliente = c.id_cliente AND u.id_cliente = e.id_cliente";
    $consultaUsuario = mysqli_query($conn, $sqlUsuario);

    if($consultaUsuario == false){
        ?>
        <script type="text/javascript">
            alert('ERRO DE CONEXÃO. POR FAVOR, TENTE NOVAMENTE');
            history.back();
        </script>

        <?php
    }else {
        $qtdUsuario = mysqli_num_rows($consultaUsuario);

        if($qtdUsuario == 0){
            ?>
            <script type="text/javascript">
                alert('USUÁRIO NÃO ENCONTRADO! TENTE NOVAMENTE.');
                history.back();
            </script>
    
            <?php
            exit;
        }else{
            $usuario = mysqli_fetch_assoc($consultaUsuario);
            var_dump($usuario);

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['id_cliente'] = $usuario['id_cliente'];
            $_SESSION['id_endereco'] = $usuario['id_endereco'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['data_nasc'] = $usuario['$data_nasc'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['tel1'] = $usuario['tel_1'];
            $_SESSION['tel2'] = $usuario['tel_2'];
            $_SESSION['rua'] = $usuario['rua'];
            $_SESSION['numero'] = $usuario['numero'];
            $_SESSION['bairro'] = $usuario['bairro'];
            $_SESSION['cidade'] = $usuario['cidade'];
            $_SESSION['uf'] = $usuario['uf'];
            $_SESSION['status'] = $usuario['status'];

            header("Location: ../view/pages/fazer-pedido.php");
        }

    }

   

    

}

?>