<?php if(!class_exists('Rain\Tpl')){exit;}?>	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Detalhamento
				<small>por local</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Detalhamento por Local</li>
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
								<i class="icon ion-ios-location" style="font-size: 6em"></i>
							</div>

							<h3 class="profile-username text-center">Lançamentos por Local</h3>

							<p class="text-muted text-center">Detalhamento</p>

							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Detalhamento de lançamento por local</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body no-padding">
									<table class="table table-striped">
										<tr>
											<th style="width: 10px">#</th>
											<th>Locais</th>
											<th></th>
											<th style="width: 40px">Quantidade</th>
										</tr>
										<?php $counter1=-1;  if( isset($counts) && ( is_array($counts) || $counts instanceof Traversable ) && sizeof($counts) ) foreach( $counts as $key1 => $value1 ){ $counter1++; ?>
										<tr>
											<td></td>
											<td><?php echo htmlspecialchars( $value1["local"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
											<td>
												<div class="progress progress-xs">
												<!--<div class="progress-bar progress-bar-danger" style="width: 55%">
												</div>-->
											</div>
										</td>
										<td><span class="badge bg-green"><?php echo htmlspecialchars( $value1["count"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
									</tr>
									<?php } ?>
									
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
<script type="text/javascript">

	
</script>
</body>