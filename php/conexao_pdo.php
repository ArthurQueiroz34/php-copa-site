
<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "Copa";

try{
    $conn = new PDO("mysql:host=$host;charset=utf8mb4;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}

?>
