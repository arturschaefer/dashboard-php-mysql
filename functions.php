<?php
  $pdo = new PDO('mysql:host=localhost;dbname=database', 'usuario', 'senha');
 
  function buscaPorNome(String $nome){
    $query = "SELECT * FROM Pessoa WHERE NOME=:nome";
 
    $statement = $pdo->prepare($query);
    $statement->bindValue(":nome",$nome);
    $statement->execute();
 
    $pessoaArray = $stm->fetch(\PDO::FETCH_ASSOC);
 
    return $pessoaArray;
  }
?>