<?php
include('partes/cabecalho.php');
include('partes/menu.php');
include("conexao.php");
?>

<?php
$meuCep = @$_POST['txCep'];

$stmt = $pdo->prepare("select * from tbcategoria");
$stmt->execute();

?>

<div class="detailsMap">
    <div class="recentOrdesMap">
        <div class="cardHeader">
            <h2>Mapa da região</h2>
        </div>

        <!--formularios-->
       
            <div id="map" class="map"></div>
            <script type="text/javascript">
                var map = new ol.Map({
                    target: 'map',
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM()
                        })
                    ],
                    view: new ol.View({
                        center: ol.proj.fromLonLat([-46.412170, -23.544190]),
                        zoom: 15
                    })
                });
            </script>
 
    </div>
</div>

<?php
include('partes/rodape.php');
?>