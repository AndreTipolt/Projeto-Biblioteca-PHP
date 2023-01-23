<?php

    function multar()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];
        $queryselect = "select * from registrocliente where codcliente_fk = $codigo;";
        $sqlselect = mysqli_query($conn, $queryselect);

        $linhasqlselect = mysqli_fetch_array($sqlselect);

        if($linhasqlselect == 0)
        {
            $query = "insert into registroCliente(codcliente_fk, multa, descricao) values ($codigo, $multa, '$descricao');";

            $sql = mysqli_query($conn, $query);
            header('Location: telacomanda.php');
            
        }else{
           echo "Esse cliente já está multado";
        }

      
    }

    if(isset($_POST['btnmultar']))
    {
        multar();
    }


    function pesquisar()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];

        $query = "select codcliente_fk, multa, descricao from registroCliente where codcliente_fk = $codigo;";
        $sql = mysqli_query($conn, $query);

        $linha = mysqli_fetch_array($sql);
        if($linha != 0){
        ?>
        <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecomanda.css">
    <title>Comanda</title>
</head>
<body>
<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Tela Funcionário</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Menu</span>
	        </button>
        </div>
	  		<h1><a href="tmenupadra.php" class="logo">Biblioteca</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="telacadcli.php"><span class="fa fa-home mr-3"></span> Cadastrar Cliente</a>
          </li>
          <li>
              <a href="telacadlivro.php"><span class="fa fa-user mr-3"></span> Cadastrar Livro</a>
          </li>
          <li>
            <a href="telaestoque.php"><span class="fa fa-sticky-note mr-3"></span> Estoque</a>
          </li>
          <li>
            <a href="telacomanda.php"><span class="fa fa-sticky-note mr-3"></span> Comanda</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div id="usuariosenha">
        <header id="dados">
            <h1 id="login">Comanda</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcomanda.php" method="POST">
                <h1>Registro Cliente</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodigo" id="txtcodigo" value="<?php echo $linha['codcliente_fk'];?>"><br/>
            <p>Multa:   (0 ou 1)</p>
            <input type="number" name="txtmulta" id="txtmulta" value="<?php echo $linha['multa'];?>"><br/>
            <p>Descrição:</p>
            <input type="text" name="txtdescricao" id="txtdescricao" value="<?php echo $linha['descricao'];?>"><br/>
           <input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
           <input type="submit" name="btnatualizar" class="input btn btn1" value="Atualizar">
           <input type="submit" name="btnmultar" class="input btn btn1" value="Multar">
           <hr>
        <form action="phpcomanda.php" method="POST">
            <h1>Empréstimo Livro</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodcli" id="txtcodcli" placeholder="Código do Cliente" ><br/>
            <p>Código do Livro:</p>
            <input type="number" name="txtcodlivro" id="txtcodlivro" placeholder="Código do Livro"><br/>
            <p>Data da Saida:</p>
            <input type="date" name="txtsaida" id="txtsaida" placeholder="Data da Saída"><br/>
            <p>Data da Entrada:</p>
            <input type="date" name="txtentrada" id="txtentrada" placeholder="Data da Entrada"><br/>

           <input type="submit" name="btnadicionar" class="input btn btn1" value="Adicionar">
           <input type="submit" name="btnremover" class="input btn btn1" value="Remover">
           <input type="submit" name="btn_emp_pesquisar" class="input btn btn1" value="Pesquisar">

        </form>
        </form>
        </section>
    </div>
  </body>
</html>


        <?php
        }else{
            echo "Cliente não possui pendências";
        }
    }

    if(isset($_POST['btnpesquisar']))
    {
        pesquisar();
    }

    function atualizar()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];
        $queryselect = "select multa from registrocliente where multa = 1;";
        $sqlselect = mysqli_query($conn, $queryselect);

        $linhasqlselect = mysqli_fetch_array($sqlselect);

        if($linhasqlselect != 0)
        {
            $query = "delete from registrocliente where codcliente_fk = $codigo;";

            $sql = mysqli_query($conn, $query);
            header('Location: telacomanda.php');
        }
    }

    if(isset($_POST['btnatualizar']))
    {
        atualizar();
    }
    
    /*------------------------------------------------------------------------------------------------*/

    function adicionar()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];


        $query = "insert into emprestimolivro(codcliente, codlivro, datasaida, dataentrada) values ($codigocli, $codigolivro,'$data_saida', '$data_entrada');";
        $sql = mysqli_query($conn, $query);

        header('Location: telacomanda.php');
    }

    if(isset($_POST['btnadicionar']))
    {
        adicionar();
    }

    function pesquisaremp()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];


        $queryselect = "select * from emprestimolivro where codcliente = $codigocli;";
        $sqlselect = mysqli_query($conn, $queryselect);

        $linha = mysqli_fetch_array($sqlselect);

        if($linha == 0)
        {
       
            echo "Cliente não possui livros pendentes";
        }else{
            ?>
            <!doctype html>
<html lang="pt-br">
  <head>
  	<title>Comanda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Comanda</span>
	        </button>
        </div>
	  		<h1><a href="tmenupadra.php" class="logo">Biblioteca</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="telacadcli.php"><span class="fa fa-home mr-3"></span> Cadastrar Cliente</a>
          </li>
          <li>
              <a href="telacadlivro.php"><span class="fa fa-user mr-3"></span> Cadastrar Livro</a>
          </li>
          <li>
            <a href="telaestoque.php"><span class="fa fa-sticky-note mr-3"></span> Estoque</a>
          </li>
          <li>
            <a href="telacomanda.php"><span class="fa fa-sticky-note mr-3"></span> Comanda</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div id="usuariosenha">
        <header id="dados">
            <h1 id="login">Comanda</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcomanda.php" method="POST">
                <h1>Registro Cliente</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodigo" id="txtcodigo" placeholder="Código do Cliente"><br/>
            <p>Multa:   (0 ou 1)</p>
            <input type="number" name="txtmulta" id="txtmulta" placeholder="Multa"><br/>
            <p>Descrição:</p>
            <input type="text" name="txtdescricao" id="txtdescricao" placeholder="Descricao"><br/>
           <input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
           <input type="submit" name="btnatualizar" class="input btn btn1" value="Atualizar">
           <input type="submit" name="btnmultar" class="input btn btn1" value="Multar"> <br/> <br/> <br/>
        </form>
        <hr>
        <form action="phpcomanda.php" method="POST">
            <h1>Empréstimo Livro</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodcli" id="txtcodcli" value="<?php echo $linha['codcliente'];?>"><br/>
            <p>Código do Livro:</p>
            <input type="number" name="txtcodlivro" id="txtcodlivro" value="<?php echo $linha['codlivro'];?>"><br/>
            <p>Data da Saida:</p>
            <input type="date" name="txtsaida" id="txtsaida" value="<?php echo $linha['datasaida'];?>"><br/>
            <p>Data da Entrada:</p>
            <input type="date" name="txtentrada" id="txtentrada" value="<?php echo $linha['dataentrada'];?>"><br/>

           <input type="submit" name="btnadicionar" class="input btn btn1" value="Adicionar">
           <input type="submit" name="btnremover" class="input btn btn1" value="Remover">
           <input type="submit" name="btn_emp_pesquisar" class="input btn btn1" value="Pesquisar">

        </form>
        </section>
    </div>
            <?php
        }
    }

    if(isset($_POST['btn_emp_pesquisar']))
    {
        pesquisaremp();
    }
    function remover()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];

        $queryselect = "select * from emprestimolivro where codcliente = $codigocli;";
        $sqlselect = mysqli_query($conn, $queryselect);

        $linha = mysqli_fetch_array($sqlselect);
        if($linha == 0)
        {
            echo "O cliente não possui pendências";
        }else{
            $query =  "delete from emprestimolivro where codcliente = $codigocli;";
            header('Location: telacomanda.php');
        }
    }
    if(isset($_POST['btnremover']))
    {
        remover();
    }
?>