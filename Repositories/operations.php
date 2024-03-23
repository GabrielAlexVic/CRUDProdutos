<?php 
require_once ("../DbContext/PDO.php");

$q = $_REQUEST["q"];

$pdo = new usePDO();
$pdo->createDb();
$pdo->createTable();

// switch ($q) {
//     case "readPessoas":
//     	$result = $pdo->select("SELECT * FROM pessoa");
// 		print(json_encode($result->fetchAll()));
//         break;
//     case "update":
//     	$id = $_REQUEST["id"];
//     	$nome = $_REQUEST["nome"];
//     	$idade = $_REQUEST["idade"];
//     	$sexo = $_REQUEST["sexo"];
//     	$estado_civil = $_REQUEST["estado_civil"];
//     	$result = $pdo->update("UPDATE pessoa SET nome='$nome', idade='$idade', sexo='$sexo', estado_civil='$estado_civil' WHERE id='$id'");
//         echo "Registro id $id atualizado com sucesso";
//         break;
//     case "insert":
// 		$nome = $_REQUEST["nome"];
//     	$idade = $_REQUEST["idade"];
//     	$sexo = $_REQUEST["sexo"];
//     	$estado_civil = $_REQUEST["estado_civil"];
//     	$message = $pdo->insert("INSERT INTO pessoa (nome, idade, sexo, estado_civil, endereco, usuario, senha) 
//     		VALUES ('$nome', $idade, '$sexo', '$estado_civil', 'rua B no 02', 'jose_vieira','".sha1(456789)."')");
//     		//outros campos são ficticios somente para evitarmos de redesenhar o banco 

//         if ($message != NULL) {
//             //var_dump($message);
//             header("location: inserir.php?mensagem=$message");
//         }else{
//             header("location: inserir.php?mensagem=Registro inserido com sucesso");
//         }
//         break;
//     case "delete":
//     	$id = $_REQUEST["id"];
//     	$pdo->delete("DELETE FROM pessoa WHERE id='$id'");
//     	echo "Registro deletado com sucesso";
//     	break;
//}

?>