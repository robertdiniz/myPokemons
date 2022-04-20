<?php
include_once("./templates/header.php");

// CONEXÃO COM BD
require_once("verify.php");

// SESSÃO
session_start();

// VERIFICAÇÃO
if (!isset($_SESSION['logado'])) :
    header('Location: index.php');
endif;

// DADOS
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<div id="black-screen">
    <main class="login-div">
        <div class="container">
            <h1>Seja bem vindo <?= $dados['name']  ?></h1>

            <a href="logout.php">Sair</a>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>