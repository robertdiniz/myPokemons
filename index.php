<?php
// CONEXÃO COM BD
require_once("verify.php");

// SESSÃO
session_start();

// BUTTON 
if (isset($_POST['entrar'])) :
    $erros = [];
    $login = mysqli_escape_string($connect, $_POST['user']);
    $senha = mysqli_escape_string($connect, $_POST['password']);

    if (empty($login) or empty($senha)) :
        $erros[] = "<li> Erro: Login ou senha incorreta. </li>";
    else :
        $sql = "SELECT name FROM usuario WHERE name = '$login' ";
        $resultado = mysqli_query($connect, $sql);

        if (mysqli_num_rows($resultado) > 0) :
            $sql = "SELECT * FROM usuario WHERE name = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if (mysqli_num_rows($resultado) == 1) :
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                $_SESSION['name'] = $dados['name'];
                header('Location: pokedex.php');
            else :
                $erros[] = "<li> Usuário e senha não confere. </li>";
            endif;


        else :
            $erros[] = "<li> Usuário não existente. </li>";
        endif;

    endif;

endif;

// Incluindo HEAD
include_once("./templates/header.php");
?>
<div id="black-screen">
    <main class="login-div">
        <div class="container">
            <a href="index.php" class="logo"><img src="./img/pokeball.svg" alt="Logo pokeball"></a>
            <h1>myPokemons</h1>

            <?php
            if (!empty($erros)) :
                foreach ($erros as $erro) {
                    echo $erro;
                }
            endif;
            ?>

            <form action="" method="post" class="form-login">
                <div class="mb-3 mt-3">
                    <input type="text" name="user" id="user" placeholder="Seu usuário...">
                </div>
                <div class="mb-3 mt-3">
                    <input type="password" name="password" id="password" placeholder="Sua senha...">
                </div>
                <button name="entrar">Logar</button>
                <p class="mb-3 mt-3 text-muted">Não tem uma conta? <a href="create.php">Crie uma aqui!</a></p>
            </form>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>