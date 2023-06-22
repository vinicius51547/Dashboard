<?php
include('partes/cabecalho.php');
include('partes/menu.php');
include("conexao.php");
?>

<?php
$stmt = $pdo->prepare("select * from tbproduto");
$stmt->execute();

?>


<div class="details">
  <div class="recentOrdes">
    <!--grafico de barras-->
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>

  </div>
  <!--grafico de pizzas-->
  <div class="recentOrdesCategoria">
        <div id="chart_div"></div>
  </div>
</div>


<script type="text/javascript">
  // Load the Visualization API and the corechart package.
  google.charts.load('current', {
    'packages': ['corechart']
  });

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
      ['Produtos', <?php echo $row[0]; ?>],
      ['Categoria', <?php echo $rowCat[0]; ?>],

    ]);

    // Set chart options
    var options = {
      'title': 'Produtos e categorias',
      'width': 550,
      'height': 450
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['bar']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Produto', 'id', 'valor', 'categoria'],
      <?php while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        echo "['$row[1]', $row[0], $row[3], $row[2]],";
      } ?>
    ]);

    var options = {
      chart: {
        title: 'WEB TECH',
        subtitle: 'Valor de cada produto cadastrado',
      },
      bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<?php  ?>

<?php
include('partes/rodape.php');
?>