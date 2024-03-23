<?php
    include("conexao.php");

    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu email";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha seu senha";
        } else {

            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha' "
            $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

            $quantidade = $sql_query->num_rows;
            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['username'] = $usuario['username'];

            }else {
                echo "Falha ao logar! Dados incorretos";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDProdutos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="main">
        <h1>FAÇA O SEU LOGIN</h1>
        <form action="process_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <a href="esqueci_minha_senha.php">esqueci minha senha</a>
            <button type="submit"><span>Entrar</span></button>
            <a  href="nao_tenho_cadastro.php">não tenho cadastro</a>
        </form>
        </div>
    </div>
</body>
</html>