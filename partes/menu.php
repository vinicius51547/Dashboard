<?php
include("conexao.php");
?>

<?php
$stmtCat = $pdo->prepare("select * from tbCategoria");
$stmtCat->execute();

$stmt = $pdo->prepare("select p.idProduto,p.produto,c.categoria,p.valor 
	from tbproduto p 
	inner join tbcategoria c 
	on p.idCategoria = c.idCategoria");
$stmt->execute();

$stmt = $pdo->prepare("select count(*) from tbProduto");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_NUM);

?>

<?php
$stmt2 = $pdo->prepare("select sum(valor) from tbProduto");
$stmt2->execute();
$row2 = $stmt2->fetch(PDO::FETCH_NUM);
?>

<?php
$stmtCatCount = $pdo->prepare("select count(*) from tbCategoria");
$stmtCatCount->execute();
$rowCat = $stmtCatCount->fetch(PDO::FETCH_NUM);
?>

<div class="container">

    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-web-component"></ion-icon>
                        </span>
                        <span class="title">WEB TECH</span>
                    </a>
                </li>
                <li>
                    <a href="home.php">
                        <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="categoria-exibir.php">
                        <span class="icon">
                            <ion-icon name="duplicate-outline"></ion-icon>
                        </span>
                        <span class="title">categorias</span>
                    </a>
                </li>
                <li>
                    <a href="produto-exibir.php">
                        <span class="icon">
                            <ion-icon name="pricetag-outline"></ion-icon>
                        </span>
                        <span class="title">Produtos</span>
                    </a>
                </li>
                <li>
                    <a href="api-cep.php">
                        <span class="icon">
                            <ion-icon name="location-outline"></ion-icon>
                        </span>
                        <span class="title">CEP</span>
                    </a>
                </li>
                <li>
                    <a href="mapa.php">
                        <span class="icon">
                            <ion-icon name="locate-outline"></ion-icon>
                        </span>
                        <span class="title">Região local</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>

            <!--digitar aqui dentro -->

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $rowCat[0]; ?></div>
                        <div class="cardName">Categorias disponiveis</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="duplicate-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row[0]; ?></div>
                        <div class="cardName">Total de produtos</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comentarios</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$ $row2[0]"; ?></div>
                        <div class="cardName">Ganhos</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>