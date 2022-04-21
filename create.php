<?php
// CONEXÃO COM BD
require_once 'verify.php';

if (isset($_POST['cadastrar'])) :
    $name = mysqli_escape_string($connect, $_POST['name']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $sql = "INSERT INTO usuario (name, senha) VALUES ('$name', '$senha')";

    if (mysqli_query($connect, $sql)) :
        header('Location: index.php?sucess');
    else :
        header('Location: index.php?erro');
    endif;
endif;
