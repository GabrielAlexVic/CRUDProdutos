<?php 
require_once ("../PDOs/pdoUser.php");

$q = $_REQUEST["q"];

$pdo = new usePDO();
$pdo->createDb();
$pdo->createTable();

switch ($q) {
    case "login":
        $userName = $_REQUEST["userName"];
        $password = $_REQUEST["password"];

        $result = $pdo->login($userName, sha1($password));
        break;

    case "readUsers":
    	$result = $pdo->select();

		print(json_encode($result->fetchAll()));
        break;

    case "update":
    	$id = $_REQUEST["id"];
    	$userName = $_REQUEST["userName"];
    	$fullName = $_REQUEST["fullName"];
    	$email = $_REQUEST["email"];

    	$result = $pdo->update($userName, $fullName, $email, $id);
        echo "Registro id $id atualizado com sucesso";
        break;

    case "signUp":
		$userName = $_REQUEST["userName"];
    	$fullName = $_REQUEST["fullName"];
    	$email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $passwordConfirm = $_REQUEST["passwordConfirm"];

        if($password != $passwordConfirm) {
            echo("<script>alert('O campo password confirm precisar ser igual ao campo password'); window.location='../components/signup.html';</script>");
            break;
        }

        if($pdo->exist("SELECT * FROM user where email='$email'")){
            echo("<script>alert('Já existe um usuario cadastrado com este email'); window.location='../components/signup.html';</script>");
            break;
        }

        if($pdo->exist("SELECT * FROM user where userName='$userName'")){
            echo("<script>alert('Já existe um usuario cadastrado com este user name'); window.location='../components/signup.html';</script>");
            break;
        }

    	$message = $pdo->insert($userName, $fullName, $email, sha1($password));

        if ($message != NULL)
            echo("<script>alert('Erro ao inserir registro: " . $message . "'); window.location='../components/signup.html';</script>");

        else
            echo("<script>alert('Registro inserido com sucesso!'); window.location='../components/login.php';</script>");

        break;
        
    case "delete":
    	$id = $_REQUEST["id"];
    	$pdo->delete($id);
    	echo "Registro deletado com sucesso";
    	break;
}

?>