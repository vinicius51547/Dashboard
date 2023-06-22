<?php

    include("conexao.php");

    $stmt = $pdo->prepare("select * from tbproduto");	
    $stmt ->execute();

    $opcao = array();
    while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){        
        $opcao[] = $row;               					
    }	

    echo json_encode($opcao);

    echo "<br><a href='./produto-exibir.php'>voltar</a>";
?>
