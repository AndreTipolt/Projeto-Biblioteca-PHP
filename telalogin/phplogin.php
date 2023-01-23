<?php

    if($_POST['txtusuario'] == "" || $_POST['txtsenha'] == "")
    {
        header('Location: index.php');
    }else{
        include_once "conexao.php";

        $usuariologin = $_POST['txtusuario'];
        $senhalogin = $_POST['txtsenha'];
        
        $querycli = "select perfil, senha from userCliente where perfil like '$usuariologin' and senha like '$senhalogin';";
        $sqlcli = mysqli_query($conn, $querycli);

        $quantidade = "select userSistema.perfil, usersistema.senha, usercliente.perfil,usercliente.senha from usersistema, usercliente where usersistema.perfil = '$usuariologin' and usersistema.senha = '$senhalogin' or usercliente.perfil = '$usuariologin' and usercliente.senha = '$senhalogin';
        ";
        $sqliquantidade = mysqli_query($conn, $quantidade);


        $quantidadetotal= mysqli_num_rows($sqliquantidade);

        $quantidadecli = "select * from usercliente where perfil = '$usuariologin' and senha = '$senhalogin';";
        $sqliquantidadecli = mysqli_query($conn, $quantidadecli);
        $quantidadeclitamanho = mysqli_num_rows($sqliquantidadecli);



        $quantidadefunc = "select * from usersistema where perfil = '$usuariologin' and senha = '$senhalogin';";
        $sqliquantidadefunc = mysqli_query($conn, $quantidadefunc);
        $quantidadefunctamanho = mysqli_num_rows($sqliquantidadefunc);

        if($quantidadetotal == 0)
        {
            header('Location: index.php');
            
        }else{
            
            $queryfunc = "select perfil, senha from userSistema where perfil like '$usuariologin' and senha like '$senhalogin';";

            $sqlfunc = mysqli_query($conn, $queryfunc);
            
            $linhafunc = mysqli_fetch_array($sqlfunc);

            $perfilbdfunc = $linhafunc['perfil'];
            $senhabdfunc = $linhafunc['senha'];

            if($usuariologin == $perfilbdfunc && $senhalogin == $senhabdfunc)
            {
                // Fazendo a verificação do login do funcionario
                echo "Login Funcionario Efetuado com sucesso !!!!!!";
                header('Location: ../menubiblioteca/tmenupadra.php');
                // Adicionar tela de menu principal !!!!!!!!!!!!!!!!
                
            }

        
        }
        }
    
?>

