<?php
include('partes/cabecalho.php');
include('partes/menu.php');
include("conexao.php");
?>

<?php
$stmtCat = $pdo->prepare("select * from tbCategoria");
$stmtCat->execute();

$stmtCat2 = $pdo->prepare("select * from tbCategoria");
$stmtCat2->execute();

$stmt = $pdo->prepare("select p.idProduto,p.produto,c.categoria,p.valor 
	from tbproduto p 
	inner join tbcategoria c 
	on p.idCategoria = c.idCategoria");
$stmt->execute();

?>
<?php
$cat = @$_GET['categoria'];
?>

<div class="details">
    <div class="recentOrdes">
        <div class="cardHeader">
            <h2>Exibir Produto</h2>
            <h3><a href="./produto-json.php">Ver formato json</a></h3>
        </div>
        <table>
            <thead>
                <tr class="filtro">
                    <td>produto</td>
                    <td>Categoria</td>
                    <td>Valor</td>
                    <td> &nbsp; </td>
                    <td> &nbsp;</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

                    echo "<tr>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td> R$" . $row[3] . "</td>";

                    //modal exclusao
                    echo  "<td   
                 <div class='box'>
                    <div class='modal-container' id='m1-o' style='--m-background: transparent;'>
                        <div class='modal'>
                            <h1 class='modal__title'>Tem certeza ?</h1>
                            <p class='modal__text'>Essa exclusão será feita permanentemente. Tem certeza ?</p>
                            <a href='#m1-c' class='link-2'></a>
                           <a href='crud/produto-exclusao.php?id=$row[0]' class='link-1'>Excluir Produto</a> 
                        </div>
                    </div>
                </div>
                <a href='?#m1-o' id='m1-c'><span class='status return'>excluir</span></a></td>";
                    echo "<td><a href='?idProduto=$row[0]&produto=$row[1]&categoria=$row[2]&valor=$row[3] #m2-o' id='m2-c'><span class='status delivered'>alterar</span></a></td>";
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
                        <h1>&bull;Alteração de produtos&bull;</h1>
                        <div class="underline"></div>
                        <form action="./crud/produto-salvar.php" method="post" id="contact_form">
                            <div class="name">
                                <label for="name"></label>
                                <input type="text" placeholder="Produto" name="txProduto" id="txProduto" value="<?php echo @$_GET['produto']; ?>" required>
                            </div>
                            <div class="email">
                                <label for="email"></label>
                                <input type="text" placeholder="Valor" name="txValor" id="txValor" value="<?php echo @$_GET['valor']; ?>" required>
                            </div>
                            <div class="email">
                                <label for="email"></label>
                                <div>
                                    <input type="hidden" placeholder="idProduto" name="txIdProduto" value="<?php echo @$_GET['idProduto']; ?>" />
                                </div>
                            </div>
                            <div class="subject">
                                <label for="subject"></label>
                                <select placeholder="Categoria" name="txIdCategoria" required>
                                    <option selected value="0">Escolha a categoria:</option>
                                    <?php

                                    while ($rowCat = $stmtCat->fetch(PDO::FETCH_BOTH)) {
                                        if ($cat == $rowCat[1]) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                        echo "<option value='$rowCat[0]' $sel> $rowCat[1] </option>";
                                    }
                                    ?>
                                </select>

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
        <h1>&bull;adicione mais produtos&bull;</h1>
        <div class="underline"></div>
        <form action="./crud/produto-salvar.php" method="post" id="contact_form">
            <div class="name">
                <label for="name"></label>
                <input type="text" placeholder="Produto" name="txProduto" id="txProduto" required>
            </div>
            <div class="email">
                <label for="email"></label>
                <input type="text" placeholder="Valor" name="txValor" id="txValor" required>
            </div>
            <div class="email">
                <label for="email"></label>
                <div>
                    <input type="hidden" placeholder="idProduto" name="txIdProduto" />
                </div>
            </div>
            <div class="subject">
                <label for="subject"></label>
                <select placeholder="Categoria" name="txIdCategoria" required>
                    <option selected value="0">Escolha a categoria:</option>
                    <?php
                    while ($rowCat2 = $stmtCat2->fetch(PDO::FETCH_BOTH)) {
                        if ($cat == $rowCat2[1]) {
                            $sel = "selected";
                        } else {
                            $sel = "";
                        }
                        echo "<option value='$rowCat2[0]' $sel> $rowCat2[1] </option>";
                    }
                    ?>
                </select>
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