<?php
    include('conexao.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if(empty($login) || empty($senha)){
        echo "<script>alert('Campos obrigadorios vazios')</script>";
        //header('location: ../login.php');
    }else{

        try{
            $query = $dbh->prepare("SELECT id_usuario, login, senha, nome FROM usuario WHERE login=:login AND senha=:senha;");
            $query->execute(array(
                ':login' => $login,
                ':senha' => $senha
            ));

            $resultado = $query->fetch();

            if(empty($resultado)){
                echo "<script>alert('Usuarios e/ou senha invalidos')</script>";
            }else{
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $resultado['id_usuario'];
                $_SESSION['nome'] = $resultado['nome'];
                header('location: ../telaprincipal.php');
            }
            
        }catch(PDOException $e){
            echo $e;
        }
    }
?>