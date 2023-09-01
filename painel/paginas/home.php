<?php 

$data_atual = date('Y-m-d');
$mes_atual = Date('m');
$ano_atual = Date('Y');
$data_mes = $ano_atual."-".$mes_atual."-01";
$data_ano = $ano_atual."-01-01";

//totalizando livros
$query = $pdo->query("SELECT * from livros");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_livros = @count($res);

//totalizando leitores
$query = $pdo->query("SELECT * from leitores");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_leitores = @count($res);

$query = $pdo->query("SELECT * from livros where status = 'Emprestado'");
$res = $query->fetchAll(PDO::FETCH_ASSOC); 
$total_emprestados = @count($res);

$query = $pdo->query("SELECT * from emprestimos where data_devolucao = curDate() and devolvido = 'Não'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_hoje = @count($res);

$query = $pdo->query("SELECT * from emprestimos where data_devolucao = curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_entregas_hoje = @count($res);

$query = $pdo->query("SELECT * from emprestimos where data_devolucao < curDate() and devolvido = 'Não'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_atraso = @count($res);

$query = $pdo->query("SELECT * from livros where status = 'Disponível'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_disponiveis = @count($res);


$query = $pdo->query("SELECT * from emprestimos where data_emprestimo >= '$data_mes' and data_emprestimo <= curDate()");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_emprestimos_mes = @count($res);

$query = $pdo->query("SELECT * from emprestimos where data_emprestimo >= '$data_mes' and data_emprestimo <= curDate() and devolvido = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_devolvidos_mes = @count($res);


if($total_disponiveis > 0 and $total_livros > 0){
    $porcentagemDisponiveis = ($total_disponiveis / $total_livros) * 100;
}else{
    $porcentagemDisponiveis = 0;
}


if($total_hoje > 0 and $total_entregas_hoje > 0){
    $porcentagemHoje = ($total_hoje / $total_entregas_hoje) * 100;
}else{
    $porcentagemHoje = 0;
}


if($total_emprestimos_mes > 0 and $total_devolvidos_mes > 0){
    $porcentagemMes = ($total_devolvidos_mes / $total_emprestimos_mes) * 100;
}else{
    $porcentagemMes = 0;
}


 ?>
<div class="main-page">
	<div class="col_3">

		<a href="index.php?pagina=livros">
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-file icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $total_livros ?></strong></h5>
					<span>Livros</span>
				</div>
			</div>
		</div>
		</a>
		<a href="index.php?pagina=emprestimos">
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-file-o user1 icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $total_emprestados ?></strong></h5>
					<span>Emprestados</span>
				</div>
			</div>
		</div>
		</a>
		<a href="index.php?pagina=devolucoes_hoje">
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-file icon-rounded" style="background: green"></i>
				<div class="stats">
					<h5><strong><?php echo $total_hoje ?></strong></h5>
					<span>Entregas Hoje</span>
				</div>
			</div>
		</div>
		</a>
		<a href="index.php?pagina=devolucoes_atraso">
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-file dollar1 icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $total_atraso ?></strong></h5>
					<span>Entregas Atraso</span>
				</div>
			</div>
		</div>
		</a>
		<a href="index.php?pagina=leitores">
		<div class="col-md-3 widget">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $total_leitores ?></strong></h5>
					<span>Leitores</span>
				</div>
			</div>
		</div>
		</a>
		<div class="clearfix"> </div>
	</div>
	
	<!-- <div class="row-one widgettable">
		<!-- <div class="col-md-8 content-top-2 card">
			<div class="agileinfo-cdr">
				<div class="card-header">
					<h3>Livros Emprestados</h3>
				</div>
				
				<div id="Linegraph" style="width: 98%; height: 350px">
				</div>
				
			</div>
		</div>
		<div class="col-md-4">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Livros Disponíveis</h5>
					<label><?php echo $total_disponiveis ?></label>
				</div>
				<div class="col-md-6 top-content">	   
					<div id="demo-pie-1" class="pie-title-center" data-percent="<?php echo $porcentagemDisponiveis ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Entregas Pendentes Hoje</h5>
					<label><?php echo $total_entregas_hoje ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo $porcentagemHoje ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Empréstimos Entregues Mês</h5>
					<label><?php echo $total_emprestimos_mes ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-3" class="pie-title-center" data-percent="<?php echo $porcentagemMes ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		


		<div class="clearfix"> </div>
	</div>-->

	<!-- <div class="row-one widgettable">
	<div class="col_2">
			<div class="col-md-3">
				<div class="col-md-6 top-content">
					<h5>Livros Disponíveis</h5>
					<label><?php echo $total_disponiveis ?></label>
				</div>
				<div class="col-md-6 top-content">	   
					<div id="demo-pie-1" class="pie-title-center" data-percent="<?php echo $porcentagemDisponiveis ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3">
				<div class="col-md-6 top-content">
					<h5>Entregas Pendentes Hoje</h5>
					<label><?php echo $total_entregas_hoje ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo $porcentagemHoje ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3">
				<div class="col-md-6 top-content">
					<h5>Empréstimos Entregues Mês</h5>
					<label><?php echo $total_emprestimos_mes ?></label>
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-3" class="pie-title-center" data-percent="<?php echo $porcentagemMes ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		<div class="clearfix"> </div>
	</div>
	</div> -->

	
	
	
	

	
</div>




<!-- for index page weekly sales java script -->
<script src="js/SimpleChart.js"></script>
<script>
	var graphdata1 = {
		linecolor: "#CCA300",
		title: "Monday",
		values: [
		{ X: "6:00", Y: 10.00 },
		{ X: "7:00", Y: 20.00 },
		{ X: "8:00", Y: 40.00 },
		{ X: "9:00", Y: 34.00 },
		{ X: "10:00", Y: 40.25 },
		{ X: "11:00", Y: 28.56 },
		{ X: "12:00", Y: 18.57 },
		{ X: "13:00", Y: 34.00 },
		{ X: "14:00", Y: 40.89 },
		{ X: "15:00", Y: 12.57 },
		{ X: "16:00", Y: 28.24 },
		{ X: "17:00", Y: 18.00 },
		{ X: "18:00", Y: 34.24 },
		{ X: "19:00", Y: 40.58 },
		{ X: "20:00", Y: 12.54 },
		{ X: "21:00", Y: 28.00 },
		{ X: "22:00", Y: 18.00 },
		{ X: "23:00", Y: 34.89 },
		{ X: "0:00", Y: 40.26 },
		{ X: "1:00", Y: 28.89 },
		{ X: "2:00", Y: 18.87 },
		{ X: "3:00", Y: 34.00 },
		{ X: "4:00", Y: 40.00 }
		]
	};
	var graphdata2 = {
		linecolor: "#00CC66",
		title: "Tuesday",
		values: [
		{ X: "6:00", Y: 100.00 },
		{ X: "7:00", Y: 120.00 },
		{ X: "8:00", Y: 140.00 },
		{ X: "9:00", Y: 134.00 },
		{ X: "10:00", Y: 140.25 },
		{ X: "11:00", Y: 128.56 },
		{ X: "12:00", Y: 118.57 },
		{ X: "13:00", Y: 134.00 },
		{ X: "14:00", Y: 140.89 },
		{ X: "15:00", Y: 112.57 },
		{ X: "16:00", Y: 128.24 },
		{ X: "17:00", Y: 118.00 },
		{ X: "18:00", Y: 134.24 },
		{ X: "19:00", Y: 140.58 },
		{ X: "20:00", Y: 112.54 },
		{ X: "21:00", Y: 128.00 },
		{ X: "22:00", Y: 118.00 },
		{ X: "23:00", Y: 134.89 },
		{ X: "0:00", Y: 140.26 },
		{ X: "1:00", Y: 128.89 },
		{ X: "2:00", Y: 118.87 },
		{ X: "3:00", Y: 134.00 },
		{ X: "4:00", Y: 180.00 }
		]
	};
	var graphdata3 = {
		linecolor: "#FF99CC",
		title: "Wednesday",
		values: [
		{ X: "6:00", Y: 230.00 },
		{ X: "7:00", Y: 210.00 },
		{ X: "8:00", Y: 214.00 },
		{ X: "9:00", Y: 234.00 },
		{ X: "10:00", Y: 247.25 },
		{ X: "11:00", Y: 218.56 },
		{ X: "12:00", Y: 268.57 },
		{ X: "13:00", Y: 274.00 },
		{ X: "14:00", Y: 280.89 },
		{ X: "15:00", Y: 242.57 },
		{ X: "16:00", Y: 298.24 },
		{ X: "17:00", Y: 208.00 },
		{ X: "18:00", Y: 214.24 },
		{ X: "19:00", Y: 214.58 },
		{ X: "20:00", Y: 211.54 },
		{ X: "21:00", Y: 248.00 },
		{ X: "22:00", Y: 258.00 },
		{ X: "23:00", Y: 234.89 },
		{ X: "0:00", Y: 210.26 },
		{ X: "1:00", Y: 248.89 },
		{ X: "2:00", Y: 238.87 },
		{ X: "3:00", Y: 264.00 },
		{ X: "4:00", Y: 270.00 }
		]
	};
	var graphdata4 = {
		linecolor: "Random",
		title: "Thursday",
		values: [
		{ X: "6:00", Y: 300.00 },
		{ X: "7:00", Y: 410.98 },
		{ X: "8:00", Y: 310.00 },
		{ X: "9:00", Y: 314.00 },
		{ X: "10:00", Y: 310.25 },
		{ X: "11:00", Y: 318.56 },
		{ X: "12:00", Y: 318.57 },
		{ X: "13:00", Y: 314.00 },
		{ X: "14:00", Y: 310.89 },
		{ X: "15:00", Y: 512.57 },
		{ X: "16:00", Y: 318.24 },
		{ X: "17:00", Y: 318.00 },
		{ X: "18:00", Y: 314.24 },
		{ X: "19:00", Y: 310.58 },
		{ X: "20:00", Y: 312.54 },
		{ X: "21:00", Y: 318.00 },
		{ X: "22:00", Y: 318.00 },
		{ X: "23:00", Y: 314.89 },
		{ X: "0:00", Y: 310.26 },
		{ X: "1:00", Y: 318.89 },
		{ X: "2:00", Y: 518.87 },
		{ X: "3:00", Y: 314.00 },
		{ X: "4:00", Y: 310.00 }
		]
	};
	var Piedata = {
		linecolor: "Random",
		title: "Profit",
		values: [
		{ X: "Monday", Y: 50.00 },
		{ X: "Tuesday", Y: 110.98 },
		{ X: "Wednesday", Y: 70.00 },
		{ X: "Thursday", Y: 204.00 },
		{ X: "Friday", Y: 80.25 },
		{ X: "Saturday", Y: 38.56 },
		{ X: "Sunday", Y: 98.57 }
		]
	};
	$(function () {
		$("#Bargraph").SimpleChart({
			ChartType: "Bar",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata4, graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
		$("#sltchartype").on('change', function () {
			$("#Bargraph").SimpleChart('ChartType', $(this).val());
			$("#Bargraph").SimpleChart('reload', 'true');
		});
		$("#Hybridgraph").SimpleChart({
			ChartType: "Hybrid",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata4],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
		$("#Linegraph").SimpleChart({
			ChartType: "Line",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: false,
			data: [graphdata4, graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
		$("#Areagraph").SimpleChart({
			ChartType: "Area",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata4, graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
		$("#Scatterredgraph").SimpleChart({
			ChartType: "Scattered",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata4, graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
		$("#Piegraph").SimpleChart({
			ChartType: "Pie",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			showpielables: true,
			data: [Piedata],
			legendsize: "250",
			legendposition: 'right',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});

		$("#Stackedbargraph").SimpleChart({
			ChartType: "Stacked",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});

		$("#StackedHybridbargraph").SimpleChart({
			ChartType: "StackedHybrid",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: true,
			data: [graphdata3, graphdata2, graphdata1],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
	});

</script>
<!-- //for index page weekly sales java script -->
