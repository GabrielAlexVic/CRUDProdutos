<?php 
require_once ("../DbContext/PDO.php");

$q = $_REQUEST["q"];

$pdo = new usePDO();
$pdo->createDb();
$pdo->createTable();

switch ($q) {
    case "readUsers":
    	$result = $pdo->select("SELECT * FROM user");

		print(json_encode($result->fetchAll()));
        break;

    case "update":
    	$id = $_REQUEST["id"];
    	$userName = $_REQUEST["userName"];
    	$fullName = $_REQUEST["fullName"];
    	$email = $_REQUEST["email"];

    	$result = $pdo->update("UPDATE user SET userName='$userName', fullName='$fullName', email='$email' WHERE id='$id'");
        echo "Registro id $id atualizado com sucesso";
        break;

    case "insert":
		$userName = $_REQUEST["userName"];
    	$fullName = $_REQUEST["fullName"];
    	$email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $passwordConfirm = $_REQUEST["passwordConfirm"];

        if($password != $passwordConfirm) {
            echo("<script>alert('O campo password confirm precisar ser igual ao campo password'); window.location='../components/signup.html';</script>");
            break;
        }

    	$message = $pdo->insert("INSERT INTO  user (userName, fullName, email, passwordHash) 
    		VALUES ('$userName', '$fullName', '$email','".sha1($password)."')");

        if ($message != NULL) {
            //var_dump($message);
            echo("<script>alert('Erro ao inserir registro: " . $message . "'); window.location='../components/signup.html';</script>");
            //header("location: /components/signup.html");
        }else{
            echo("<script>alert('Registro inserido com sucesso!'); window.location='../components/login.php';</script>");
        }
        break;
        
    case "delete":
    	$id = $_REQUEST["id"];
    	$pdo->delete("DELETE FROM user WHERE id='$id'");
    	echo "Registro deletado com sucesso";
    	break;
}

?>