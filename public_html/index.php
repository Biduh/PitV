<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Login - Cafeteria Gourmet</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css" media="screen" />
    <link href="https://fonts.cdnfonts.com/css/inknut-antiqua" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-black navbar-dark">
        <div class="container">
            <!--<a class="navbar-brand" href="#">Navbar</a>-->
            <a class="navbar-brand" href="public_html/index.php">
                <h1 class="m-0"><img src="../assets/img/logo.png" class="d-block" alt="Logo da Cafeteria Gourmet"></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="me-auto"></div>

              


            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:120px" >            <h4 class="text-center">Login</h4>
        <h6 class="pb-3 text-center">Preencha seus dados para entrar na sua conta</h6>       
        <form class="text-center" data-formulario method="POST" action="../config/login.php">
            <div class="row mb-2">
                <input type="email" class="form-control col-sm-2 w-25 col-form-label mx-auto mb-1" placeholder="Seu e-mail" autocomplete="off" aria-describedby="emailHelp" id="email" name="email" minlength="5" required>
                <span class="mensagem-erro"></span>
            </div>
            <div class="row mb-2">
                <input type="password" class="form-control col-sm-2 w-25 col-form-label mx-auto mb-1" placeholder="Sua senha" id="senha" name="senha" required>
                <span class="mensagem-erro"></span>

                <div id="esqueceuSenha" class="form-text">
                    <a href="../view/pages/recuperar-senha.php" class="ps-0 ">Esqueceu sua senha?</a>
                </div>
                
            </div>

            <button type="submit" class="btn btn-success w-25">Entrar</button>
            <div id="esqueceuSenha" class="form-text text-center"><a href="../view/pages/cadastre-se.php">Registre-se</a></div>
        </form>
    </div>



    <footer class="footer fixed-bottom text-center bg-dark text-light mt-4">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        </div>
    </footer>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js" type="module"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script type="text/javascript" src="../assets/js/mascaras.js"></script>
    <script type="text/javascript" src="../assets/js/endereco.js"></script>
</body>

</html>