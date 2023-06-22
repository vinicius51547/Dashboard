<?php

header("location:../categoria-exibir.php");
   
   sleep(3);

  $id = $_GET['id'];
    
    include("../conexao.php");
   

    $stmtEx = $pdo->prepare("delete from tbproduto where idCategoria='$id'");
    $stmtEx -> execute();
 

    $stmt = $pdo->prepare("delete from tbcategoria where idCategoria='$id'");
    $stmt -> execute();
 
?>