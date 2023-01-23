<?php

    function atualizar($qtd, $cod)
    {

        include_once "../telalogin/conexao.php";

        $query = "update estoquelivro set qtde_atual = $qtd where codlivro_fk = $cod;";

        $sql = mysqli_query($conn, $query);

    }
	function adicionar($qtd, $cod)
    {
        $qtd = $_POST['txtquantidade'];
        $cod = $_POST['txtcod'];
        include_once "../telalogin/conexao.php";

        $query = "insert into estoquelivro(qtde_atual, codlivro_fk) values ($qtd, $cod);";

        $sql = mysqli_query($conn, $query);
    }

    function pesquisar($cod)
    {

        include_once "../telalogin/conexao.php";

        $query = "select  codlivro_fk, qtde_atual from estoquelivro where codlivro_fk = $cod;";

        $sql = mysqli_query($conn, $query);

        $linha = mysqli_fetch_array($sql);

        ?>

<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Estoque</title>
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
	          <span class="sr-only">Estoque</span>
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
            <h1 id="login">Estoque</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phptelaestoque.php" method="POST">
            <p>Código do Livro:</p>
            <input type="number" name="txtcod" id="txtcod" value="<?php echo $linha['codlivro_fk']; ?>" class="input" ><br/>
            <p>Quantidade:</p>
            <input type="number" name="txtquantidade" id="txtquantidade" value="<?php echo $linha['qtde_atual']; ?>" class="input" ><br/>
           <input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
           <input type="submit" name="btnatualizar" class="input btn btn1" value="Atualizar">
           <input type="submit" name="btnadicionar" class="input btn btn1" value="Adicionar"> 
            
            
        </form>
        </section>
    </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
        <?php
    }


    if(isset($_POST['btnpesquisar']))
    {
        pesquisar($_POST['txtcod']);

    }
    

    if(isset($_POST['btnatualizar'])){
        
        atualizar($_POST['txtquantidade'], $_POST['txtcod']);
        header('Location: telaestoque.php');
    }
if(isset($_POST['btnadicionar'])){
        
        adicionar($_POST['txtquantidade'], $_POST['txtcod']);
        header('Location: telaestoque.php');
    }
?>