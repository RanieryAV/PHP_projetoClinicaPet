<?php 
session_start();
//include "../index.html";
include "../classes/Conexao.php";
$retornoBD;
$conexaoBD;
$objConexao = new Conexao();
$conexaoBD = $objConexao->getConexao();


if (isset($_POST['exampleInputEmail']) && isset($_POST['exampleInputPassword'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['exampleInputEmail']);
    //echo"{$uname}";
    $pass = validate($_POST['exampleInputPassword']);
    //echo"{$pass}";
    if (empty($uname)) {

        header("Location: index.php?error=Email deve ser preenchido");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Senha deve ser preenchida");

        exit();

    }else{

        $sql = "SELECT * FROM `admins` WHERE email_admin='{$uname}' AND senha_admin='{$pass}'";

        $result = mysqli_query($conexaoBD, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email_admin'] === $uname && $row['senha_admin'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: ./produto/admin.php");

                exit();

            }else{

                header("Location: index.php?error=Email ou senha incorretos");

                exit();

            }

        }else{

            header("Location: index.php?error=Email ou senha incorretos");

            exit();

        }

    }

}else{

    //header("Location: ../index.html");

    exit();

}
?>