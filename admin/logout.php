<?php
include("../php/conexao.php");
if(!isset($_SESSION)) {
    session_start();
}

session_unset();
session_destroy();
//unset($_SESSION["nome"]);

header("location:../index.html");
exit();
?>