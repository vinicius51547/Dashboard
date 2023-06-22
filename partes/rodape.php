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

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col">
				<h4>Nagevagação</h4>
				<ul>
					<li><a href="categoria-exibir.php">categorias</a></li>
					<li><a href="produto-exibir.php">produtos</a></li>
					<li><a href="api-cep.php">Cep</a></li>
					<li><a href="mapa.php">Mapa local</a></li>
					<li><a href="index.php">sair</a></li>
				</ul>
			</div>
			<div class="footer-col">
				<h4>Informações diarias</h4>
				<ul>
					<li><a href="#">Categorias dispo. <span><?php echo $rowCat[0]; ?></span></a></li>
					<li><a href="#">Produtos dipo. <span><?php echo $row[0]; ?></span></a></li>
					<li><a href="#">Ganhos em vendas R$<span><?php echo $row2[0]; ?></span></a></li>
					<li><a href="#">Comentarios <span>264</span></a></li>
					<li><a href="#">payment options</a></li>
				</ul>
			</div>
			<div class="footer-col">
				<h4>Siga-nos</h4>
				<div class="social-links">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-linkedin-in"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>

<!--ion icons(melhor figurinhas)-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
 
<!--links internos-->
<script src="js/style.js"></script>
<script src="js/cep.js"></script>

</body>

</html>