<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Recuperar senha - Cafeteria Gourmet</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-icons.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/estilo.css" media="screen" />
    <link href="https://fonts.cdnfonts.com/css/inknut-antiqua" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-black navbar-dark">
        <div class="container">
            <!--<a class="navbar-brand" href="#">Navbar</a>-->
            <a class="navbar-brand" href="../../public_html/index.php">
                <h1 class="m-0"><img src="../../assets/img/logo.png" class="d-block" alt="Logo da Cafeteria Gourmet"></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="me-auto"></div>

              


            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 80px; padding-bottom: 400px;">
            <h4 class="text-center">Recuperação da senha</h4>
            <h6 class="pb-3 text-center">Digite seu e-mail para recuperação da senha</h6>
            <form class="text-center"  data-formulario method="POST" action="confirmar-identidade.php">
                <div class="row mb-2">
                    <input type="email" class="form-control w-25 ol-md-2 col-form-label mx-auto mb-1"  placeholder="Seu e-mail" aria-describedby="emailHelp" id="email" name="email" autocomplete="off" minlength="5"  required>
                    <span class="mensagem-erro"></span>
                </div>
                <button type="submit" class="btn btn-success w-25" name="env_cod">Enviar código</button>
            </form>
        </div>
    </div>



    <footer class="container-fluid text-center bg-dark text-light">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        
    </div>    
    </footer>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js" type="module"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script type="text/javascript" src="../../assets/js/mascaras.js"></script>
    <script type="text/javascript" src="../../assets/js/endereco.js"></script>

</body>

</html>