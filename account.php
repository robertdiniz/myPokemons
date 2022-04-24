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

// ALTERAÇÃO DE DADOS
if (isset($_POST['alterar'])) :
    $newname = mysqli_escape_string($connect, $_POST['newname']);
    $newsenha = mysqli_escape_string($connect, $_POST['newsenha']);
    $sql = "UPDATE usuario SET name = '$newname' WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);

    // SE A SENHA TIVER SIDO MODIFICADA ALTERA...
    if (isset($newsenha)) :
        $sql = "UPDATE usuario SET senha = '$newsenha' WHERE id = '$id'";
        $resultado = mysqli_query($connect, $sql);
    endif;
    // SE ACONTECEU UMA QUERY REDIRECIONE...
    if (isset($resultado)) :
        header('Location: pokedex.php');
    endif;
endif;

// DELETAR CONTA
if (isset($_POST['delet'])) :
    $sql = "DELETE FROM usuario WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    // SE ACONTECEU UMA QUERY REDIRECIONE...
    if (isset($resultado)) :
        header('Location: index.php');
    endif;
endif;

mysqli_close($connect);
?>
<div id="black-screen">
    <main class="login-div">
        <div class="container">
            <nav>
                <ul>
                    <li class="pokedex-nav"><a href="pokedex.php">Pokédex</a></li>
                    <li class="pokedex-nav"><a href="account.php">Minha conta</a></li>
                </ul>
            </nav>

            <form action="" method="post">
                <h1>Minha conta</h1>
                <h2>Meu usuário</h2>
                <div class="mb-3 mt-3">
                    <input type="text" name="newname" value="<?= $dados['name'] ?>">
                </div>
                <h2>Minha senha</h2>
                <div class="mb-3 mt-3">
                    <input type="password" name="newsenha" placeholder="Nova senha...">
                </div>
                <button name="alterar">Alterar dados</button>
                <button name="delet" class="bdnova btn btn-danger mb-3 mt-3 ">Apague minha conta</button>
            </form>
            <a href="logout.php" class="btn btn-danger mb-3 mt-3">Sair</a>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>