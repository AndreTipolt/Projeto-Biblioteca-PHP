<?php


  function cadastrar()
  {
    if($_POST['txtcodigo'] == "" && $_POST['txtnome'] != "" && $_POST['txtendereco'] != "" && $_POST['txtemail'] != "" && $_POST['txttelefone'] != "" && $_POST['txtsenha'] != "" && $_POST['txtusuario'] != "")
    {
      include_once "../telalogin/conexao.php";
     $nome = $_POST['txtnome'];
     $endereco = $_POST['txtendereco'];
     $email = $_POST['txtemail'];
     $telefone = $_POST['txttelefone'];
     $senha = $_POST['txtsenha'];
     $usuario = $_POST['txtusuario'];
     $codigo = $_POST['txtcodigo'];


      $query = "insert into usercliente (cliente, endereco, email, telefone, senha, perfil) values ('$nome','$endereco', '$email', $telefone, '$senha', '$usuario') ";
      $sql = mysqli_query($conn, $query);

      header('Location: telacadcli.php');

    }
  }
if(isset($_POST['btnLogin']))
{
  cadastrar();
}

  function pesquisar()
  {
    include_once "../telalogin/conexao.php";
     $codigo = $_POST['txtcodigo'];
    if($_POST['txtcodigo'] != "")
    {
        $query = "select * from usercliente where codcliente = $codigo;";
        $sql = mysqli_query($conn, $query);

        $linha = mysqli_fetch_array($sql);
        ?>

<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Cadastro Cliente</title>
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
	          <span class="sr-only">Cadastrar Cliente</span>
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
            <h1 id="login">Cadastro Cliente</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcadcli.php" method="POST">
            <p>Código:</p>
            <input type="number" name="txtcodigo" id="txtcodigo" value="<?php echo $linha['codcliente']; ?>" class="input">
            <p>Cliente:</p>
            <input type="text" name="txtnome" id="txtnome" value="<?php echo $linha['cliente']; ?>" class="input">
            <p>Endereço:</p>
            <input type="text" name="txtendereco" id="txtendereco" value="<?php echo $linha['endereco']; ?>" class="input">
            <p>Email:</p>
            <input type="text" name="txtemail" id="txtemail" value="<?php echo $linha['email']; ?>" class="input">
            <p>Telefone:</p>
            <input type="text" name="txttelefone" id="txttelefone" value="<?php echo $linha['telefone']; ?>" class="input">
            <p>Senha:</p>
            <input type="text" name="txtsenha" id="txtsenha" value="<?php echo $linha['senha']; ?>" class="input">
            <p>Nome do Perfil:</p>
            <input type="text" name="txtusuario" id="txtusuario" value="<?php echo $linha['perfil']; ?>" class="input"><br/>

            <input type="submit" name="btnLogin" class="input btn btn1" value="Cadastrar" onclick="">
            <input type="submit" name="btnPesquisar" class="input btn btn1" value="Pesquisar" onclick="">
   
            <input type="submit" name="btnAtualizar" class="input btn btn1" value="Atualizar" onclick="">
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

<script src="javascript.js">
</script>
</body>
</html>
        
      <?php
    } 
  }
  if(isset($_POST['btnPesquisar']))
  {
    pesquisar();
  }
    
  function atualizar()
  {
    include_once "../telalogin/conexao.php";
     $nome = $_POST['txtnome'];
     $endereco = $_POST['txtendereco'];
     $email = $_POST['txtemail'];
     $telefone = $_POST['txttelefone'];
     $senha = $_POST['txtsenha'];
     $usuario = $_POST['txtusuario'];
     $codigo = $_POST['txtcodigo'];


      $query = "update usercliente set cliente = '$nome', endereco = '$endereco', email = '$email', telefone = $telefone, senha = '$senha', perfil = '$usuario' where codcliente = $codigo;
      ";
      $sql = mysqli_query($conn, $query);
  }

  if(isset($_POST['btnAtualizar']))
  {
    atualizar();
    
    header('Location: telacadcli.php');
  }
    
?>

