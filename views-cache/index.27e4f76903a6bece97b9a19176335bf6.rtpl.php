<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="myDiv">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Página Inicial
			<small>Resumo geral dos dados lançados</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Início</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Your Page Content Here -->
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

						<p>Senhas entregues</p>
					</div>
					<div class="icon">
						<i class="icon ion-ios-people"></i>
					</div>
					<a href="/admin/info-geral" class="small-box-footer" onclick="myFunction()">Mais info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>0<sup style="font-size: 20px">%</sup></h3>

						<p>Presentes entregues</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer" onclick="myFunction()">Mais info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo htmlspecialchars( $male, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

						<p>Masculino</p>
					</div>
					<div class="icon">
						<i class="icon ion-man"></i>
					</div>
					<a href="/admin/info-male" class="small-box-footer" onclick="myFunction()">Mais info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo htmlspecialchars( $female, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

						<p>Feminino</p>
					</div>
					<div class="icon">
						<i class="icon ion-woman"></i>
					</div>
					<a href="/admin/info-famale" class="small-box-footer" onclick="myFunction()">Mais info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->
		<!-- DONUT CHART -->
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Gráfico por Local</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div id="loader"></div><!--Responsável pelo carregamento de espera de página-->
			<div class="box-body chart-responsive">
				<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->