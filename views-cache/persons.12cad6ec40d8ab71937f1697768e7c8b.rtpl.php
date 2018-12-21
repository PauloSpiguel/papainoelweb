<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Lista de Pessoas
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/persons">Pessoas</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					<div class="box-header">
						<a href="/admin/persons/create" class="btn btn-success">Cadastrar Pessoa</a>
						<div class="box-tools">
							<form action="/admin/persons">
								<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="search" class="form-control pull-right" placeholder="Pesquisar" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					

					<div class="box-body no-padding">
						 <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th style="width: 250px">Nome</th>
									<th>E-mail</th>
									<th>Telefone</th>
									<th>Endereço</th>
									<th>Bairro</th>
									<th style="width: 80px">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php $counter1=-1;  if( isset($persons) && ( is_array($persons) || $persons instanceof Traversable ) && sizeof($persons) ) foreach( $persons as $key1 => $value1 ){ $counter1++; ?>
								<tr>
									<td><?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td><?php echo htmlspecialchars( $value1["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td><?php echo htmlspecialchars( $value1["desregion"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
									<td>
										<!--<button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#exampleModal"
										 data-whatever="<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverperson="<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whatevernrcpf="<?php echo htmlspecialchars( $value1["nrcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevernrphone="<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateveremail="<?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverdesaddress="<?php echo htmlspecialchars( $value1["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whateverdesnumber="<?php echo htmlspecialchars( $value1["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverregion="<?php echo htmlspecialchars( $value1["desregion"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercity="<?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whateverstate="<?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercountry="<?php echo htmlspecialchars( $value1["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercomplement="<?php echo htmlspecialchars( $value1["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i
										 class="fa fa-info"></i></button>-->
										 <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal"
										 data-whatever="<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverperson="<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whatevernrcpf="<?php echo htmlspecialchars( $value1["nrcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevernrphone="<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateveremail="<?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverdesaddress="<?php echo htmlspecialchars( $value1["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whateverdesnumber="<?php echo htmlspecialchars( $value1["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverregion="<?php echo htmlspecialchars( $value1["desregion"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercity="<?php echo htmlspecialchars( $value1["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
										 data-whateverstate="<?php echo htmlspecialchars( $value1["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercountry="<?php echo htmlspecialchars( $value1["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevercomplement="<?php echo htmlspecialchars( $value1["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i
										 class="fa fa-edit"></i></button>
										<!--<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal"
											data-whatever="<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whatevernome="<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverdetalhes="<?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Editar</button>-->
											<!--<a href="/admin/persons/<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>-->
											<a href="/admin/persons/<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
							<?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
							<li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<!-- Inicio Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Detalhes</h4>
				</div>
				<div class="modal-body">
					<form id="modalForm" role="form" method="POST" action="">
						<div class="form-group">
							<label for="recipient-person" class="control-label">Nome:</label>
							<input name="desperson" type="text" class="form-control" id="recipient-person" onkeyup="corrigirValor(this)">
						</div>

						<div class="form-select">
							<div class="form-group" style="float: right; width: 100%; margin-right: 0px;">
								<label for="nrcpf" class="control-label">Número Documento:</label>
								<input style="width: 100%" name="nrcpf" type="text" class="form-control" id="nrcpf">
							</div>					
						</div>
						<div class="form-group">
							<label for="nrphone" class="control-label">Telefone:</label>
							<input name="nrphone" type="text" class="form-control" id="nrphone">
						</div>
						<div class="form-group">
							<label for="email" class="control-label">Email:</label>
							<input name="desemail" type="email" class="form-control" id="email" style="text-transform: lowercase;">
						</div>
						<fieldset class="GRUPO">
							<legend class="GroupTitle">Endereço:</legend>
							<div class="form-select">
								<div class="form-group" style="float: right; width: 100%; margin-right: 5px">
									<label for="desaddress" class="control-label">Logradouro:</label>
									<input style="width: 100%" name="desaddress" type="text" class="form-control" id="desaddress" onkeyup="corrigirValor(this)">
								</div>
								<div class="form-group">
									<label for="desnumber" class="control-label">Número:</label>
									<input name="desnumber" type="text" class="form-control" id="desnumber">
								</div>
							</div>
							<div class="form-select">
								<div class="form-group" style="float: right; width: 40%; margin-right: 5px;">
									<label for="region" class="control-label">Bairro:</label>
									<input style="width: 100%" name="desregion" type="text" class="form-control" id="region" onkeyup="corrigirValor(this)">
								</div>
								<div style="float: left; margin-right: 5px; width: 40%" class="">
									<label for="city" class="control-label">Cidade:</label>
									<input name="descity" type="text" class="form-control" id="city" onkeyup="corrigirValor(this)">
								</div>
								<div div style="float: right; width: 20%; " class="">
									<label for="state" class="control-label">Estado:</label>
									<select style="height: 35px; width: 100%" name="desstate" id="state">
										<option value="Null">Outro</option>
										<option value="Paraná">PR</option>
									</select>
								</div>
							</div>
							<div class="form-select">
								<div style="float: left; margin-right: 5px; width: 35%" class="form-group">
									<label for="country" class="control-label">Pais:</label>
									<input name="descountry" type="text" class="form-control" id="country" onkeyup="corrigirValor(this)">
								</div>
								<div style="float: right; width: 65%" class="form-group">
									<label for="complement" class="control-label">Complemento:</label>
									<input name="descomplement" type="text" class="form-control" id="complement" onkeyup="corrigirValor(this)">
								</div>
							</div>
						</fieldset>
						<input name="id" type="hidden" class="form-control" id="id-curso" value="">

						<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
						<button id="updateButton" type="submit" class="btn btn-danger">Alterar</button>
						<button id="printButton" type="button" class="btn btn-primary">Imprimir</button>

					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Fim Modal -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../../res/admin/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
// FUNÇÃO MODAL BOOTBOX CONFIRMAÇÃO DE EXCLUSÃO
$(document).on("click", ".btn-danger", function(e){
	var link = $(this).attr("href");
	e.preventDefault();
	bootbox.confirm({
		title: "Exclusão de Registro?",
		message:'Confirma a exclusão deste registro?',
		callback: function(confirmacao){

			if (confirmacao)
				bootbox.alert('Registro excluído com sucesso.');
				//else
					//bootbox.alert('Operação cancelada.');

				},
				buttons: {
					cancel: {label: '<i class="fa fa-times"></i> Cancelar',className:'btn-default'},
					confirm: {label: '<i class="fa fa-check"></i> EXCLUIR',className:'btn-danger'}

				}
			});

});

// INICIO FUNÇÃO DE MASCARA MAIUSCULA
var ignorar = ["das", "dos", "e", "é", "do", "da", "de"];

function caixaAlta(string) {
	return String(string).toLowerCase().replace(/([^A-zÀ-ú]?)([A-zÀ-ú]+)/g, function (match, separator, word) {
		if (ignorar.indexOf(word) != -1) return separator + word;
		return separator + word.charAt(0).toUpperCase() + word.slice(1);
	});
}
function corrigirValor(el) {
	el.value = caixaAlta(el.value);
}
   // INICIO FUNÇÃO DE MASCARA MAIUSCULA
   function maiuscula(z) {
   	v = z.value.toUpperCase();
   	z.value = v;
   }
//FIM DA FUNÇÃO MASCARA MAIUSCULA
window.onload = function () {
	var campoRG = document.getElementById('typedoc').value;
	var display = campoRG == 'RG' ? 'block' : 'none';
	document.getElementById('hidden_div').style.display = display;

	document.getElementById('typedoc').addEventListener('change', function () {
		var style = this.value == 'RG' ? 'block' : 'none';
		document.getElementById('hidden_div').style.display = style;
	});
}
$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		var recipientperson = button.data('whateverperson')
		var recipientnrcpf = button.data('whatevernrcpf')
		var recipientnrphone = button.data('whatevernrphone')
		var recipientemail = button.data('whateveremail')
		var recipientdesaddress = button.data('whateverdesaddress')
		var recipientdesnumber = button.data('whateverdesnumber')
		var recipientregion = button.data('whateverregion')
		var recipientcity = button.data('whatevercity')
		var recipientstate = button.data('whateverstate')
		var recipientcountry = button.data('whatevercountry')
		var recipientcomplement = button.data('whatevercomplement')
		//document.write(recipientemail)
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Detalhes: ID ' + recipient)
		modal.find('#id-curso').val(recipient)
		modal.find('#recipient-person').val(recipientperson)
		modal.find('#nrphone').val(recipientnrphone)
		modal.find('#nrcpf').val(recipientnrcpf)
		modal.find('#emitter').val(recipientemitter)
		modal.find('#email').val(recipientemail)
		modal.find('#desaddress').val(recipientdesaddress)
		modal.find('#desnumber').val(recipientdesnumber)
		modal.find('#region').val(recipientregion)
		modal.find('#city').val(recipientcity)
		modal.find('#state').val(recipientstate)
		modal.find('#country').val(recipientcountry)
		modal.find('#complement').val(recipientcomplement)
		/*FUNÇÃO PARA ALTER O ACTION DO FORMULARIO*/
		$('#updateButton').click(function(){
			$('#modalForm').attr('action', '/admin/persons/' + recipient);
		});
	})
</script>