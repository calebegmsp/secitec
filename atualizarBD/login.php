<?php
session_start();
if(isset($_SESSION['usuario'])){
    header("Location: gerenciadorMinicursos.php");
}
?>

     <!-- Bootstrap -->
     <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="shortcut icon" href="img/faicon.png">

     <link rel="stylesheet" type="text/css" href="estilo.css">

     <meta charset="utf-8">

     <!------ Include the above in your HEAD tag ---------->
<!------ Include the above in your HEAD tag ---------->

<body class="body-class">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="autenticar.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group"><br>
                                <input type="submit" name="submitLogin" class="btn btn-info btn-md" value="Entrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Bootstrap JS -->

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>

<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>