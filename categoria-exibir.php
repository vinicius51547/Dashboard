<?php
include('partes/cabecalho.php');
include('partes/menu.php');
include("conexao.php");
?>

<?php

$stmt = $pdo->prepare("select * from tbcategoria");
$stmt->execute();

?>
<div class="details">
	<div class="recentOrdesCategoria">
		<div class="cardHeader">
			<h2>Exibir Categorias</h2>
			<h3><a href="./categoria-json.php">Ver formato json</a></h3>
		</div>
		<table>
			<thead>
				<tr class="filtro">
					<td>codigo</td>
					<td>Categoria</td>
				</tr>
			</thead>
			<tbody>

				<?php
				while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
					echo "<tr>";
					echo "<td>" . $row[0] . "</td>";
					echo "<td>" . $row[1] . "</td>";

					//modal exclusao
					echo  "<td>	
					<a href='#m1-o' id='m1-c'><span class='status return'>excluir</span></a></td>
                 <div class='box'>
                    <div class='modal-container' id='m1-o' style='--m-background: transparent;'>
                        <div class='modal'>
                            <h1 class='modal__title'>Tem certeza ?</h1>
                            <p class='modal__text'>Essa exclusão será feita permanentemente. Tem certeza ?</p>
                            <a href='#m1-c' class='link-2'></a>
                           <a href='crud/categoria-exclusao.php?id=$row[0]' class='link-1'>Excluir Categoria</a> 
                        </div>
                    </div>
                </div>";
					echo "<td><a href='?idCategoria=$row[0]&categoria=$row[1] #m2-o' id='m2-c'><span class='status delivered'>alterar</span></a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

		<!--modal Alteração-->
		<div class="box">
			<div class="modal-container" id="m2-o" style="--m-background: transparent;">
				<div class="modal">
					<div id="containerForm">
						<h1>&bull;Alteração de Categoria&bull;</h1>
						<div class="underline"></div>
						<form action="./crud/categoria-salvar.php" method="post" id="contact_form">
							<div class="name">
								<label for="email"></label>
								<input type="text" readonly placeholder="codigo" name="txIdCategoria" value="<?php echo @$_GET['idCategoria']; ?>">
							</div>
							<div class="email">
								<label for="name"></label>
								<input type="text" placeholder="Produto" name="txCategoria" id="txCategoria" value="<?php echo @$_GET['categoria']; ?>" required>
							</div>
							<div class="submit">
								<input type="submit" value="Atualizar" id="form_button">
							</div>
						</form>
					</div>
					<a href="#m2-c" class="link-2"></a>
				</div>
			</div>
		</div>
	</div>

	<!--formularios-->
	<div id="containerForm">
		<h1>&bull;adicione mais Categorias&bull;</h1>
		<div class="underline"></div>

		<form action="./crud/categoria-salvar.php" method="post" id="contact_form">
			<div class="name">
				<input type="hidden" placeholder="codigo" name="txIdCategoria" required>
			</div>
			<div class="emailCat">
				<label for="name"></label>
				<input type="text" placeholder="nome da Categoria" name="txCategoria" id="txCategoria" required>
			</div>
			<div class="submit">
				<input type="submit" value="Cadastrar" id="form_button">
			</div>
		</form>
	</div>
</div>

<?php
include('partes/rodape.php');
?>