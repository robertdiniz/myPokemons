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
            <h1 class="pokedex-title">Seja bem vindo <span class="pokedex-name"><?= $dados['name']  ?></span></h1>
            <!-- NAV POKÉDEX -->
            <nav>
                <ul>
                    <li class="pokedex-nav"><a href="pokedex.php">Pokédex</a></li>
                    <li class="pokedex-nav"><a href="account.php">Minha conta</a></li>
                </ul>
            </nav>

            <div class="pokedex-container">
                <div class="pokedex-pokemon">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/258.png" width="100px" class="pokedex-poke">
                    <h3>Pokémon</h3>
                    <p>TIPO</p>
                </div>
            </div>

            <a href="logout.php">Sair</a>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>