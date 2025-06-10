<?php
  $servername = "localhost";//servidor web local
  $username = "user";//usuario padrao do mysql / php
  $password = "password"; //senha padrao
  $dbname = "clerivaldo"; //nome do banco de dados que iremos criar
  //criar conexao com o banco de dados
  $conexao = new mysqli($servername, $username, $password, $dbname); //linha de conexao com o banco de dados
 
  //Verificar conexao
  if ($conexao->connect_error){//acontecer = true
    die("Conexao falhou" . $conexao->connect_error);//usa o ponto para concatenar textos
  }
?>

