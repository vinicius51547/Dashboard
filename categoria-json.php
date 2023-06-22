<?php

    include("conexao.php");

    $stmt = $pdo->prepare("select * from tbcategoria");	
    $stmt ->execute();

    $opcao = array();
    while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){        
        $opcao[] = $row;                   					
    }	

    echo json_encode($opcao);

    echo "<br><a href='./categoria-exibir.php'>voltar</a>";
?>
