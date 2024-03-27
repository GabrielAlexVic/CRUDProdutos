<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDProdutos</title>

    <!-- imports bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    // require_once 'DbContext/PDO.php';

    // $pdo = new usePDO();
    // $pdo->createDb();
    // $pdo->createTable();
    ?>
    <main class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <form method="post" action="../Authentication/authentication.php?q=login" name="formlogin">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="userName">
                    <label for="floatingUserName">Username</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <input class="btn btn-primary" type="submit" value="Login">
                    <a href="signUp.html" class="btn btn-danger">Sign Up</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>