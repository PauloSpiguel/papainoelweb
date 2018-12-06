<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>Lista de Entrega de Senha</h1>
  <ol class="breadcrumb">
   <li>
    <a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
    <li>
     <a href="/admin/deliveries">Entrega de Senha</a></li><li class="active">
      <a href="/admin/deliveries/create">Cadastrar</a>
    </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">

        <div class="box-header with-border">
          <h3 class="box-title">Lançar Entrega de Senha</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/deliveries/create" method="post">
          <div class="box-body">
            <fieldset style="margin-bottom: 10px">
              <legend>Data/Senha</legend>
              <div class="form-select">
                <div class="form-group" style="float: left; width: 30%">
                  <label  style="font-size: 1.6em" for="dtpassword">Data Senha:</label>
                  <input class="form-control" id="dtpassword" name="dtpassword" type="date" min="2018-12-19" max="2018-12-26" required style="height: 70px; font-size: 2em;  background:#d2d6de"></input>
                </div>
                <div class="form-group" style="float: right; width: 20%; margin-left: 5px">
                  <label style="font-size: 1.6em" for="passDelivery">Senha Entregues:</label>
                  <input class="form-control" disabled style=" height: 70px; font-size: 3em; background:#d2d6de; cursor: default; text-align: center;" id="passDelivery" name="passDelivery" type="number"></input>
                </div>
                <div class="form-group" style="float: right; width: 50%; margin-left: 5px">
                  <label id="msg" style="font-size: 1.6em" for="nrpassword">Número da Senha:</label>
                  <input class="form-control" style=" height: 70px; font-size: 2em; background:#d2d6de; cursor: default" id="nrpassword" name="nrpassword" type="number" disabled></input>
                </div>
              </div>
            </fieldset>
            <div class="form-group">
              <label for="deskid"><span class="important">* </span>Nome da criança</label>
              <input type="text" class="form-control" id="deskid" name="deskid" placeholder="Digite o nome da criança" onkeyup="corrigirValor(this)" required></input>
            </div>
            <div class="form-select">
              <div class="form-group" style="float: right; width: 30%">
                <label for="dtbirthday"><span class="important">* </span>Data Nascimento</label>
                <input style="width: 100%" class="form-control" id="dtbirthday" name="dtbirthday" type="date" required>
              </div>
              <div class="form-group" style="margin-left: 5px; width: 10%;">
                <label for="calcYear">Idade</label>
                <input style="width: 100%; cursor: default;" disabled class="form-control" id="calcYear" type="text">
              </div>
              <div class="form-group" style="float: right; width: 60%; margin-left: 5px">
                <label for="dessex"><span class="important">* </span>Sexo</label>
                <select id="dessex" name="dessex" style="height: 34px; width: 100%" required>
                 <option value="" disabled selected>Sexo</option>
                 <option value="1">Feminino</option>
                 <option value="2">Masculino</option>
               </select>
             </div>
           </div>
           <div class="form-group">
            <label for="desperson"><span class="important">* </span>Nome do responsável:</label>
            <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome" onkeyup="corrigirValor(this)"></input>
          </div>
          <div class="form-group" style=" width: 100%">
            <label for="nrcpf">CPF:</label>
            <input class="form-control" id="nrcpf" name="nrcpf" placeholder="Digite o Nº do Doumento" type="text" maxlength="12"></input>
          </div>
          <div class="form-select">
            <div class="form-group" style="float: left; width: 30%">
              <label for="nrphone">Telefone:</label>
              <input class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone" type="tel"></input>
            </div>
            <div class="form-group" style="float: right; width: 70%; margin-left: 5px">
              <label for="desemail">E-mail:</label>
              <input class="form-control" style="text-transform: lowercase;" id="desemail" name="desemail" placeholder="Digite o e-mail" type="email"></input>
            </div>
          </div>

          <div class="form-select" style="display: flex;">        
           <div class="form-group" style="float: left; width: 70%">
            <label for="idlocal"><span class="important">* </span>Local</label>
            <select style="height: 34px; width: 100%" name="idlocal" id="idlocal" required>
              <option value="" disabled selected>Selecione um Local</option>
              <?php $counter1=-1;  if( isset($locals) && ( is_array($locals) || $locals instanceof Traversable ) && sizeof($locals) ) foreach( $locals as $key1 => $value1 ){ $counter1++; ?>
              <option value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" style="float: right; width: 30%; margin-left: 5px">
            <label for="nrmatriculation">Matricula:</label>
            <input class="form-control" id="nrmatriculation" name="nrmatriculation" placeholder="Matrícula" type="text"></input>
          </div>     
        </div>

        <fieldset class="GRUPO">
          <legend class="GroupTitle">Endereço:</legend>
          <div class="form-select">
            <div class="form-group" style="float: right; width: 90%">
              <label for="desaddress"><span class="important">* </span>Logradouro:</label>
              <input class="form-control" id="desaddress" name="desaddress" placeholder="Digite seu Endereço" type="text" onkeyup="corrigirValor(this)">
            </div>
            <div class="form-group" style="float: right; width: 10%; margin-left: 5px">
              <label for="desnumber"><span class="important">* </span>Número:</label>
              <input class="form-control" type="text" id="desnumber" name="desnumber" placeholder="Número"></input>
            </div>
          </div>
          <div class="form-select">
            <div class="form-group" style="float: right; width: 40%; margin-right: 10px;">
              <label for="desregion"><span class="important">* </span>Bairro:</label>
              <input style="width: 100%" class="form-control" id="desregion" name="desregion" placeholder="Digite seu Bairro" type="text" onkeyup="corrigirValor(this)">
            </div>
            <div style="float: right; width: 65%" class="form-group">
              <label for="complement" class="control-label">Complemento:</label>
              <input name="descomplement" type="text" class="form-control" id="complement" placeholder="Digite um Complemento" onkeyup="corrigirValor(this)">
            </div>
          </div>
          <fieldset class="GRUPO">
           <legend>
            <a href="#" class="mostraClass" onclick="mostra('divInfos')"><i class="fa fa-plus-circle" id="imgInfos"></i><b style="color: #000; font-size: 0.8em"> Outra Cidade</b></a></legend>
            <div class="form-select" id="divInfos" style="display: none; font-size: 14px">
              <div class="form-group">
                <label for="zipcoce">CEP:</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Código Postal" onkeyup="corrigirValor(this)">
              </div>
              <div class="form-group" style="width: 60%; margin-left: 5px" >
                <label for="descity">Cidade:</label>
                <input type="text" class="form-control" id="descity" name="descity" placeholder="Digite sua Cidade" onkeyup="corrigirValor(this)">
              </div>
              <div class="form-group" style="width: 20%; margin-left: 5px">
                <label for="desstate">UF:</label><br>
                <select style="height: 34px; width: 100%" name="desstate" id="desstate">
                  <option value="Null">Selecione</option>
                  <option value="Paraná">PR</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>
              <div class="form-group" style="float: right; width: 40%; margin-left: 5px;  margin-right: 5px">
                <label for="country" class="control-label">Pais:</label>
                <input name="descountry" type="text" class="form-control" id="country" placeholder="Digite o Pais" onkeyup="corrigirValor(this)">
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
            </textarea>
          </div>        
        </fieldset>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>  
      </form>                 
    </div>
  </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" DEFER="DEFER">
  // INICIO FUNÇÃO BUSCA REPETIDOS
  $("#deskid").blur(function(){
    var busca = $("#deskid").val();
    if (busca.length < 4){
      swal({
          title: "Atenção?",
          text: "Nome digitado é inválido ou vázio!",
          type: "warning",
          showCancelButton: false,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'OK',
          cancelButtonText: "No, cancel operação!",
          closeOnConfirm: true,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            document.getElementById('deskid').focus();
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    }else{
      $.post('../../vendor/hcodebr/php-classes/src/DB/Double.php', {busca: busca}, function(data){
        if(data != 'não cadastrado'){
          var datetime = data;
          swal({
          title: "Atenção? Nome informado já contem registrado.",
          text: datetime + " Deseja continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Sim',
          cancelButtonText: "Não, Cancelar e sair!",
          closeOnConfirm: true,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            document.getElementById('dtbirthday').focus();
          } else {
            window.location.href="/admin/deliveries";
          }
        });
        }
        
      });

    } 
    
  });
  

  // INICIO FUNÇÃO CALCULA IDADE
  $("#dtbirthday").on('blur', function() {
    calcular_idade();
  });

  function calcular_idade() {
    if ($('#dtbirthday').val() != '') {
      var dataInput = new Date($("#dtbirthday").val());
      if (!isNaN(dataInput)) {
        var dataAtual = new Date();
        var diferenca = dataAtual.getFullYear() -
        dataInput.getFullYear();
        $("#calcYear").val(diferenca);
        if(diferenca > 11){       
          var r=confirm("Idade acima do permitido! Deseja continuar mesmo assim?");
          if (r==true)
          {
            $("#calcYear").val(diferenca);
            return true;
          }
          else
          {
            $("#calcYear").val('Data inválida');
            window.location.href="/admin/deliveries";
            return false; 
          }
        }
      }
    }
  }
// INICIO FUNÇÃO DE PERQUISA REGISTROS NO BANCO DEMANDS
$(document).ready( function() {
  $('#dtpassword').change(function(){
    var dados = $(this).serialize();
    $.ajax({
      url : '../../vendor/hcodebr/php-classes/src/DB/Search.php',
      method : 'POST',
      data: dados,
      dataType: 'html',
      deforeSend: function(){
        $("#passDelivery").val('Aguarde...');
      },
      success: function(data){
        if(data.passDelivery = true) {
         $("#passDelivery").empty().val(data);
       }else{
        alert(data);
      }
    }
  });
    return false;    
  })
});
// INICIO FUNÇÃO DE MOSTRA ORGÃO EMISSOR
window.onload=function(){
  var campoRG = document.getElementById('destypedoc').value;
  var display = campoRG == 'RG' ? 'block' : 'none';
  document.getElementById('hidden_div').style.display = display;


  document.getElementById('destypedoc').addEventListener('change', function () {
    var style = this.value == 'RG' ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
  });
}
  // INICIO FUNÇÃO DE MASCARA MAIUSCULA
  var ignorar = ["das", "dos", "e", "é", "do", "da", "de"];

  function caixaAlta(string) {
    return String(string).toLowerCase().replace(/([^A-zÀ-ú]?)([A-zÀ-ú]+)/g, function(match, separator, word) {
      if (ignorar.indexOf(word) != -1) return separator + word;
      return separator + word.charAt(0).toUpperCase() + word.slice(1);
    });
  }
  function corrigirValor(el) {
    el.value = caixaAlta(el.value);
  }
  // INICIO FUNÇÃO DE MASCARA MAIUSCULA
  function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
  }

  function mostra(id){
    if(document.getElementById(id).style.display == 'flex'){
      document.getElementById(id).style.display = 'none';
    }else{ document.getElementById(id).style.display = 'flex';}
  }

  $('.mostraClass').click(function(){
    $(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
  });
</script>

