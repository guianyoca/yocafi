<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $sql2 = "SELECT tipo_socio, COUNT(*) as cantidad
    FROM afiliado_titular
    GROUP BY tipo_socio;";
    $resultado2 = $mysqli->query($sql2);
	
?>

<?php
    include "header.php";
?>
<script>
    $(document).ready(function(){
      // Desactivar el autocompletado para todos los inputs
      $('input').attr('autocomplete', 'off');
    });

    function mayus(e) {
    e.value = e.value.toUpperCase();
}
  </script>
    <body class="sb-nav-fixed">
    <?php
    include "nav_principal.php";
    ?>
        <div id="layoutSidenav">
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container mt-4"> 
                    <h1 class="text-center">Cantidad de Tipos de afiliados</h1>
                </div>
                
<div class="container mt-5">
    <div style="width: 500px">
        <canvas id="grafica"></canvas>
    </div>
</div>
<?php
$labels = array();
$datos = array();
$total = 0;
while($row = $resultado2->fetch_assoc()) {
    $labels[] = $row['tipo_socio'];
    $datos[] = $row['cantidad'];
    $total += $row['cantidad'];
}
    // Calcular porcentajes de colores
    $colors = array('rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)');
    $porcentajes = array();
    
    foreach ($datos as $cantidad) {
        $porcentajes[] = round(($cantidad / $total) * 100);
    }

    // Convertir porcentajes a valores RGB
    function percentageToRgb($percentage) {
        return round(($percentage / 100) * 255);
    }

    $rgbColors = array_map(function($color) use ($porcentajes) {
        $rgb = sscanf($color, 'rgb(%d,%d,%d)');
        $rgb = array_map(function($value) use ($porcentajes) {
            return percentageToRgb($value);
        }, $porcentajes);
        return 'rgb(' . implode(',', $rgb) . ')';
    }, $colors);
?>
<script>
    const labels = <?php echo json_encode($labels); ?>;
    const colors = <?php echo json_encode($rgbColors); ?>;
    
    const graph = document.querySelector("#grafica");
    
    const data = {
        labels: labels,
        datasets: [{
            data: <?php echo json_encode($datos); ?>,
            backgroundColor: colors
        }]
    };
    
    const config = {
        type: 'pie',
        data: data,
    };
    
    new Chart(graph, config);
</script>
				</main>
                <?php
                    include "footer.php";
                ?>
			</div>
		</div>
        <?php
           include "scripts_pie.php";
        ?>
	</body>
</html>