<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
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
						
						<ul class="list-group list-group-unbordered">
							<?php $counter1=-1;  if( isset($locals) && ( is_array($locals) || $locals instanceof Traversable ) && sizeof($locals) ) foreach( $locals as $key1 => $value1 ){ $counter1++; ?>
							<li class="list-group-item"><b id="mylocals"><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b> <a class="pull-right" id="countByLocals">0</a></li>
							<?php } ?>
						</ul>			
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
// CARREGA TABELA INFO POR LOCAL
$(document).ready(function(){
	
	var data = document.getElementById('mylocals').innerHTML;
	//document.getElementById("countByLocals").innerHTML = data;
	countLocals(data);
});
function countLocals(locals) {
	var dados = locals;
	//alert(dados);
	$.ajax({
		url : '../../../../vendor/hcodebr/php-classes/src/Advanced/countLocals.php',
		method : 'POST',
		data: Array(dados),
		dataType: 'html',
		success: function(data){
			if(data.countByLocals = true) {
				document.getElementById('countByLocals').innerHTML = data;
				alert(data);
			}else{
				alert(data);
			}
		}
	});
	return false;   
}
</script>