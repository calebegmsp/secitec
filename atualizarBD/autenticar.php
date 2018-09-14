<?php

if(isset($_POST['submitLogin'])){

    $nome_login = $_POST['username'];
    $senha = $_POST['password'];

    require_once("../DAO/config.php");
    require_once("../DAO/class/sql.php");

    $sql = new Sql();

    if (!$nome_login == "" || !$senha == ""){
        $usuario = $sql->query("SELECT DISTINCT * 
            FROM Usuarios 
            WHERE nome_login = '$nome_login'
            and senha = '$senha'");


        if (!is_null($usuario)) {
            $user = $usuario->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['usuario'] = $user['id_usuario'];
            $_SESSION['nome'] = $user['nome_completo'];
            ?>
            <script type="text/javascript" >
               location.href="gerenciadorMinicursos.php";
            </script>
            <?php
        }

    } else {
        ?>
        <script type="text/javascript" >
            alert("Insira login e senha!");
            location.href="login.php";
        </script>
        <?php
    }



}

if(!empty($_GET['logout'])){
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['nome']);
    header("Location: login.php");
}