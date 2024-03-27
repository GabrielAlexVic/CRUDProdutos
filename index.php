<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDProdutos</title>
</head>

<body>
<?php
      session_start();
      if((!isset ($_SESSION['userName']) == true) and (!isset ($_SESSION['password']) == true))
      {
        unset($_SESSION['userName']);
        unset($_SESSION['password']);
        header('location:Components\login.php');
      }
      
      $logado = $_SESSION['userName'];
    ?>
    <meta charset="utf-8">
    <title>SISTEMA WEB</title>
  </head>
  
  <body>
    <?php
      echo" Bem vindo $logado"."<br>";
    ?>
    <?php
      print_r($_SESSION);
    ?>
    <br>
    <a href="Authentication\logout.php"><button>Sair</button></a>
</body>

</html>