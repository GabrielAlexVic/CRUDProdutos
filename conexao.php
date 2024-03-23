<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "ecommerce"; 


$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_errno) {
    die("Conexão falhou: " . $conn->connect_errno);
} else {
    echo "Conexão bem-sucedida!";
}

// Se você deseja executar consultas, você pode usar esta conexão
// Por exemplo:
// $sql = "SELECT * FROM sua_tabela";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo "Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
//     }
// } else {
//     echo "0 resultados";
// }

// Não se esqueça de fechar a conexão quando terminar de usar
// $conn->close();
?>