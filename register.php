<?php
include_once("./templates/header.php");
include_once('./create.php');
?>
<div id="black-screen">
    <main class="login-div">
        <div class="container">
            <span class="glyphicon glyphicon-user"></span>
            <a href="index.php" class="logo"><img src="./img/pokeball.svg" alt="Logo pokeball"></a>
            <h1>myPokemons</h1>
            <form action="create.php" method="post" class="form-login">
                <div class="mb-3 mt-3">
                    <input type="text" name="name" id="name" placeholder="Nome de usuário...">
                </div>
                <div class="mb-3 mt-3">
                    <input type="password" name="senha" id="name" placeholder="Sua senha...">
                </div>
                <button type="submit" name="cadastrar">Criar conta</button>
            </form>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>