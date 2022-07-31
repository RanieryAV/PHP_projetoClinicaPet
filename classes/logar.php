<?php
include "../classes/Conexao.php";

$objConexao = new Conexao();
$conexaoBD = $objConexao->getConexao();
//if (isset($_POST['exampleInputEmail']) && $_POST['exampleInputEmail'] != "" && isset($_POST['exampleInputPassword']) && $_POST['exampleInputPassword'] != ""){
    $uname = $_REQUEST['exampleInputEmail'];
    $pass = $_REQUEST['exampleInputPassword'];
    
    $sql = "SELECT * FROM `admins` WHERE email_admin='{$uname}' AND senha_admin='{$pass}'";

        $result = mysqli_query($conexaoBD, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email_admin'] === $uname && $row['senha_admin'] === $pass) {
                header("Location: ./produto/admin.php");

                exit();

            }else{

                header("Location: index.php?error=Email ou senha incorretos");

                exit();

            }

        }
//}else{
    echo "Erro";
//}
?>