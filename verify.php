<?php

$server = "localhost";
$username = "root";
$pass = "";
$database = "mypokemons";

$connect = mysqli_connect($server, $username, $pass, $database);
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_error()) :;
    echo "Erro: " . mysqli_connect_error();
endif;
