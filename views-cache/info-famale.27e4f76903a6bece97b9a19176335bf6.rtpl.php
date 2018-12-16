<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detalhamento
			<small>por Sexo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Detalhamento por sexo - Feminino</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-3" style="width: 100%">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<div class="icon" style="text-align: center;">
							<i class="icon ion-woman" style="font-size: 6em"></i>
						</div>

						<h3 class="profile-username text-center">Feminino</h3>

						<p class="text-muted text-center">Detalhamento</p>

						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Detalhamento entrega senha - Feminino <small>por Idade</small></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<table class="table table-striped">
									<tr>
										<th>Faixa</th>
										<th></th>
										<th style="width: 40px">Quantidade</th>
									</tr>
									<tr>
										<td>0 a 6 anos</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
											</div>
										</td>
										<td><span class="badge bg-red"><?php echo htmlspecialchars( $countAgeSix, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<tr>
										<td>7 a 10 anos</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
											</div>
										</td>
										<td><span class="badge bg-yellow"><?php echo htmlspecialchars( $countAgeTen, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<tr>
										<td>Maior 10 anos</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
											</div>
										</td>
										<td><span class="badge bg-light-blue"><?php echo htmlspecialchars( $countAgeBigger, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<tr>
										<td>Total a entregar dia 16/12/2018</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
											</div>
										</td>
										<td><span class="badge bg-light-blue"><?php echo htmlspecialchars( $countDayOne, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<tr>
										<td>Total a entregar dia 17/12/2018</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
											</div>
										</td>
										<td><span class="badge bg-light-blue"><?php echo htmlspecialchars( $countDayTwo, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<tr>
										<td>Total a entregar dia 18/12/2018</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
											</div>
										</td>
										<td><span class="badge bg-green"><?php echo htmlspecialchars( $countDayThree, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->