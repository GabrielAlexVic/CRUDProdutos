<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDProdutos</title>
</head>
<body>
    <?php
        require_once 'DbContext/PDO.php';

        $pdo = new usePDO();
        $pdo->createDb();
        $pdo->createTable();
    ?>
</body>
</html>