<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myPokemons</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="black-screen">
        <main class="login-div">
            <div class="container">
                <span class="glyphicon glyphicon-user"></span>
                <a href="index.php" class="logo"><img src="./img/pokeball.svg" alt="Logo pokeball"></a>
                <h1>myPokemons</h1>
                <form action="/index.php" method="get" class="form-login">
                    <div class="mb-3 mt-3">
                        <input type="text" name="user" id="password" placeholder="Seu usuário...">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="password" name="password" id="password" placeholder="Sua senha...">
                    </div>
                    <button>Logar</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>