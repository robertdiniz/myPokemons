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

// API
$url = "https://www.canalti.com.br/api/pokemons.json";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$pokemons = json_decode(curl_exec($ch));
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

            <div class="pokedex-container d-flex flex-column justify-content-center align-items-center">
                <?php
                // SE HOUVER BUSCA...
                if (isset($_GET['search'])) :
                    $poke = $_GET['poke'];
                    // FAZER UM FOREACH PARA MOSTRAR O RESULTADO
                    foreach ($pokemons->pokemon as $Pokemon) {
                        if ($poke == $Pokemon->name) { ?>
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <img src="<?= $Pokemon->img ?>" alt="<?= $Pokemon->name ?>" width="120px">
                                <h4 class="card-title text-center"><?= $Pokemon->name ?></h2>
                            </div>
                <?php }
                    }
                endif; ?>
                <form action="" method="get" class="mb-3">
                    <input type="text" placeholder="Busque seu Pokémon..." name="poke">
                    <button name="search">Buscar</button>
                </form>
            </div>
            <a href=" logout.php" class="btn btn-danger">Sair</a>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>