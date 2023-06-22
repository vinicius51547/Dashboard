<?php

    $idCategoria = $_POST['txIdCategoria'];
    $categoria = $_POST['txCategoria'];
     

    include("../conexao.php");

    if($idCategoria>0){
        $stmt = $pdo->prepare("update tbcategoria set 
                             categoria='$categoria'
                            ,idCategoria='$idCategoria'
                            where idCategoria='$idCategoria'");	
    }
    else{
        $stmt = $pdo->prepare("insert into tbcategoria values(null,'$categoria');");
    }

	$stmt ->execute();

    header("location:../categoria-exibir.php");
?>