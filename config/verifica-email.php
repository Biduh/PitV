<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    include_once "conexao.php";

if(isset($_POST["env_cod"])){
    $email =  $conn->real_escape_string(mb_strtoupper(trim($_POST['email']), "utf-8"));
    $consultarEmail = "SELECT * FROM usuario WHERE email='$email'";
    $resultConsultarEmail = mysqli_query($conn, $consultarEmail);

    if (mysqli_num_rows($resultConsultarEmail) == 0){?>
        <script type="text/javascript">
                alert('E-MAIL NÃO CADASTRADO NO SISTEMA! VERIFIQUE SEU E-MAIL E TENTE NOVAMENTE');
                window.location.href="recuperar-senha.php";
            </script><?php
            exit;

    }else{


        $usuario = mysqli_fetch_assoc($resultConsultarEmail);
        $id_usuario = $usuario["id_usuario"];
        if($usuario["cod_conf"]==null){
            $verificacao_cod = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        }else{
            $verificacao_cod = $usuario["cod_conf"];
        }

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION["id_usuario"] = $id_usuario;


        if (isset($_POST["env_cod"])){

            $mail = new PHPMailer(true);
    
            try {

                $mail->CharSet = "UTF-8";
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
    
                //Send using SMTP
                $mail->isSMTP();
    
                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';
    
                //Enable SMTP authentication
                $mail->SMTPAuth = true;
    
                //SMTP username
                $mail->Username = 'email da cafeteria';
    
                //SMTP password
                $mail->Password = 'senha do email da cafeteria';
    
                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;
    
                //Recipients
                $mail->setFrom('email da cafeteria', 'Cafeteria Gourmet');
    
                //Add a recipient
                $mail->addAddress($email, '');
    
                //Set email format to HTML
                $mail->isHTML(true);
    
    
                $mail->Subject = 'Código de confirmação - Recuperação de senha';
                $mail->Body    = '<p>Seu código de confirmação para a recuperação da senha é: <b style="font-size: 30px;">' . $verificacao_cod . '</b></p>';
    
                $mail->send();

                // connect with database
                /**$conn = mysqli_connect("localhost:8889", "root", "root", "test");**/
                
                 if($usuario["cod_conf"]==null){
                    $sql = "UPDATE usuario SET cod_conf = $verificacao_cod WHERE id_usuario = $id_usuario";
                    $resultado = mysqli_query($conn, $sql);
                 }
    
                /**header("Location: ../view/pages/confirmar-identidade.php");
                exit();**/
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
     
    }

    


} else {
    header("Location: ../../public_html/index.php");
    exit(); 
    

    
}

    


?>