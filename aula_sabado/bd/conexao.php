<?php
/* Connect to a MySQL database using driver invocation */
try{
    $dsn = 'mysql:dbname=aula_sabado;host=localhost';
    $user = 'root';
    $password = 'usbw';
    
    $dbh = new PDO($dsn, $user, $password);
}catch(PDOException $e){
    echo "Erro de conexao com o banco de dados";
}
?>