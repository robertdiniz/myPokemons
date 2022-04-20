<?php
include_once("./templates/header.php");
?>
<div id="black-screen">
    <main class="login-div">
        <div class="container">
            <span class="glyphicon glyphicon-user"></span>
            <a href="index.php" class="logo"><img src="./img/pokeball.svg" alt="Logo pokeball"></a>
            <h1>myPokemons</h1>
            <form action="/pokedex.php" method="get" class="form-login">

            </form>
        </div>
    </main>
</div>
<?php
include_once("./templates/footer.php");
?>