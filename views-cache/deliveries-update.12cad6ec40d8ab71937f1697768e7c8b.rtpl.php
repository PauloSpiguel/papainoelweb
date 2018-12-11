<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Lista de Pessoas
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					<div class="box-header with-border">
						<h3 class="box-title">Editar Senha</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="/admin/deliveries/<?php echo htmlspecialchars( $delivery["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
						<div class="box-body">
							<fieldset style="margin-bottom: 10px">
								<legend>Data/Senha</legend>
								<div class="form-select">
									<div class="form-group" style="float: left; width: 30%">
										<label  style="font-size: 1.6em" for="dtpassword">Data Senha:</label>
										<input class="form-control" id="dtpassword" name="dtpassword" type="date" min="2018-12-16" max="2018-12-18" style="height: 70px; font-size: 2em;  background:#d2d6de" value="<?php echo htmlspecialchars( $delivery["dtpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
									</div>
									<div class="form-group" style="float: right; width: 20%; margin-left: 5px">
										<label style="font-size: 1.6em" for="passDelivery">Senha Entregues:</label>
										<input class="form-control" disabled style=" height: 70px; font-size: 3em; background:#d2d6de; cursor: default; text-align: center;" id="passDelivery" name="passDelivery" type="number"></input>
									</div>
									<div class="form-group" style="float: right; width: 50%; margin-left: 5px">
										<label id="msg" style="font-size: 1.6em" for="nrpassword">Número da Senha:</label>
										<input class="form-control" style=" height: 70px; font-size: 2em; background:#d2d6de" id="nrpassword" name="nrpassword" type="number" value="<?php echo htmlspecialchars( $delivery["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
									</div>
								</div>
							</fieldset>
							<div class="form-group">
								<label for="deskid"><span class="important">* </span>Nome da criança</label>
								<input type="text" class="form-control" id="deskid" name="deskid" placeholder="Digite o nome da criança" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
							</div>
							<div class="form-select">
								<div class="form-group" style="float: right; width: 30%">
									<label for="dtbirthday"><span class="important">* </span>Data Nascimento</label>
									<input style="width: 100%" class="form-control" id="dtbirthday" name="dtbirthday" type="date" max="2018-12-18" value="<?php echo htmlspecialchars( $delivery["dtbirthday"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>
								<div class="form-group" style="margin-left: 5px; width: 10%;">
									<label for="calcYear">Idade</label>
									<input style="width: 100%; cursor: default;" disabled class="form-control" id="calcYear" type="text">
								</div>
								<div class="form-group" style="float: right; width: 60%; margin-left: 5px">
									<label for="dessex"><span class="important">* </span>Sexo</label>
									<select id="dessex" name="dessex" style="height: 34px; width: 100%" >
										<option value="" disabled selected>Sexo</option>
										<option value="1" <?php if( $delivery["dessex"] == 1 ){ ?>selected<?php } ?>>Feminino</option>
										<option value="2" <?php if( $delivery["dessex"] == 2 ){ ?>selected<?php } ?>>Masculino</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="desperson"><span class="important">* </span>Nome do responsável:</label>
								<input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
							</div>
							<div class="form-group" style=" width: 100%">
								<label for="nrcpf">CPF:</label>
								<input class="form-control" id="nrcpf" name="nrcpf" placeholder="Digite o Nº do Documento" type="text" maxlength="12" value="<?php echo htmlspecialchars( $delivery["nrcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
							</div>
							<div class="form-select">
								<div class="form-group" style="float: left; width: 30%">
									<label for="nrphone">Telefone:</label>
									<input class="form-control" type="tel" id="nrphone" name="nrphone" placeholder="Digite o telefone" value="<?php echo htmlspecialchars( $delivery["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
								</div>
								<div class="form-group" style="float: right; width: 70%; margin-left: 5px">
									<label for="desemail">E-mail:</label>
									<input class="form-control" type="email" style="text-transform: lowercase;" id="desemail" name="desemail" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $delivery["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
								</div>
							</div>
							<div class="form-select" style="display: flex;">        
								<div class="form-group" style="float: left; width: 70%">
									<label for="idlocal"><span class="important">* </span>Local</label>
									<select style="height: 34px; width: 100%" name="idlocal" id="idlocal">
										<option value="" disabled selected>Selecione um Local</option>
										<?php $counter1=-1;  if( isset($locals) && ( is_array($locals) || $locals instanceof Traversable ) && sizeof($locals) ) foreach( $locals as $key1 => $value1 ){ $counter1++; ?>
										<option value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["deslocal"] == $delivery["deslocal"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group" style="float: right; width: 30%; margin-left: 5px">
									<label for="nrmatriculation">Matricula:</label>
									<input class="form-control" type="text" id="nrmatriculation" name="nrmatriculation" placeholder="Matrícula" value="<?php echo htmlspecialchars( $delivery["nrmatriculation"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
								</div>     
							</div>
							<fieldset class="GRUPO">
								<legend class="GroupTitle">Endereço:</legend>
								<div class="form-select">
									<div class="form-group" style="float: right; width: 90%">
										<label for="desaddress"><span class="important">* </span>Logradouro:</label>
										<input class="form-control" id="desaddress" name="desaddress" placeholder="Digite seu Endereço" type="text" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
									</div>
									<div class="form-group" style="float: right; width: 10%; margin-left: 5px">
										<label for="desnumber"><span class="important">* </span>Número:</label>
										<input class="form-control" type="text" id="desnumber" name="desnumber" placeholder="Número" value="<?php echo htmlspecialchars( $delivery["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>
									</div>
								</div>
								<div class="form-select">
									<div class="form-group" style="float: right; width: 40%; margin-right: 10px;">
										<label for="desregion"><span class="important">* </span>Bairro:</label>
										<input style="width: 100%" class="form-control" id="desregion" name="desregion" placeholder="Digite seu Bairro" type="text" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["desregion"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>
									<div style="float: right; width: 65%" class="form-group">
										<label for="complement" class="control-label">Complemento:</label>
										<input name="descomplement" type="text" class="form-control" id="descomplement" placeholder="Digite um Complemento" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</div>
								</div>
								<fieldset class="GRUPO">
									<legend>
										<a href="#" class="mostraClass" onclick="mostra('divInfos')"><i class="fa fa-plus-circle" id="imgInfos"></i><b style="color: #000; font-size: 0.8em"> Outra Cidade</b></a></legend>
										<div class="form-select" id="divInfos" style="display: none; font-size: 14px">
											<div class="form-group">
												<label for="zipcoce">CEP:</label>
												<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Código Postal" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["zipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>
											<div class="form-group" style="width: 60%; margin-left: 5px" >
												<label for="descity">Cidade:</label>
												<input type="text" class="form-control" id="descity" name="descity" placeholder="Digite sua Cidade" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>
											<div class="form-group" style="width: 20%; margin-left: 5px">
												<label for="desstate">UF:</label><br>
												<select style="height: 34px; width: 100%" name="desstate" id="desstate">
													<option value="Null">Selecione</option>
													<option value="PR" <?php if( $delivery["desstate"] == 'PR' ){ ?>selected<?php } ?>>Paraná</option>
													<option value="Outro" <?php if( $delivery["desstate"] == 'Outro' ){ ?>selected<?php } ?>>Outro</option>
												</select>
											</div>
											<div class="form-group" style="float: right; width: 40%; margin-left: 5px;  margin-right: 5px">
												<label for="country" class="control-label">Pais:</label>
												<input name="descountry" type="text" class="form-control" id="country" placeholder="Digite o Pais" onkeyup="corrigirValor(this)" value="<?php echo htmlspecialchars( $delivery["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>
										</div> 
									</fieldset>
								</fieldset>
								<fieldset class="GRUPO" style="margin-top: 10px">
									<legend>
										<a href="#" class="mostraClass" onclick="mostra('desobservation')"><i class="fa fa-plus-circle" id="imgInfos"></i><b style="color: #000; font-size: 0.8em"> Observações</b></a>
									</legend>
									<label for ="observation"></label>
									Campo reservado a observações adicionais: <br>
									<div class="" id="desobservation" style="display: none; font-size: 1.2em">
										<textarea cols=120 id="desobservation" rows="5" name="desobservation" maxlength="400" wrap="hard">
										<?php echo utf8_encode($delivery["desobservation"]); ?>
										</textarea>
									</div>        
								</fieldset>
								<!-- /.box-body -->
								<div class="box-footer">
									<button class="btn btn-primary" type="submit">Salvar</button>
								</div>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<script type="text/javascript" DEFER="DEFER">
		//AO CARREGAR A PAGINA
		$(document).ready(function(){
			calcular_idade();
			contaRegistros();
		});
	</script>