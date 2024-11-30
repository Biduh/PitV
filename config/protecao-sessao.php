<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_usuario'])){?>
        <script type="text/javascript">
            alert('VOCÊ NÃO PODE ACESSAR ESTA PÁGINA PORQUE NÃO ESTÁ LOGADO.');
            window.location.href="../../public_html/index.php";
            
        </script>
    
<?php
    
        exit;
    }
?>