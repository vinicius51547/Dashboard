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
            <h2>Visualização de Cep</h2>
        </div>
        <!--formularios-->
        <div id="containerForm">
            <h1>&bull;Digite seu cep, e tire o foco do campo&bull;</h1>
            <div class="underline"></div>
            <form method="post" id="contact_form">
                <div class="name">
                    <label for="name"></label>
                    <input name="cep" type="text" id="cep" placeholder="cep" size="10" maxlength="9" />
                </div>
                <div class="email">
                    <label for="email"></label>
                    <input name="rua" type="text" id="rua" placeholder="Localidade" />
                </div>
                <div class="email">
                    <label for="email"></label>
                    <div>
                        <input name="bairro" type="text" id="bairro" placeholder="Bairro" size="40" />
                    </div>
                </div>
                <div class="name">
                    <label for="name"></label>
                    <input name="cidade" type="text" id="cidade" placeholder="cidade" size="40" />
                </div>
                <div class="email">
                    <label for="email"></label>
                    <input name="uf" type="text" id="uf" placeholder="uf" size="2" />
                </div>

                <div class="submit">
                    <input type="submit" value="Limpar" id="form_button">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('partes/rodape.php');
?>