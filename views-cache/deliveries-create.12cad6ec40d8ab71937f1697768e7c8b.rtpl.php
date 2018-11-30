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
            <div class="form-group">
              <label for="deskid">Nome da criança</label>
              <input type="text" class="form-control" id="deskid" name="deskid" placeholder="Digite o nome da criança" onkeyup="corrigirValor(this)"></input>
            </div>
            <div class="form-select">
              <div class="form-group" style="float: right; width: 30%">
                <label for="dtbirthday">Data Nascimento</label>
                <input style="width: 100%" class="form-control" id="dtbirthday" name="dtbirthday" type="date">
              </div>
              <div class="form-group" style="float: right; width: 70%; margin-left: 5px">
                <label for="dessex">Sexo</label>
                <select id="dessex" name="dessex" style="height: 36px; width: 100%">
                 <option value="" disabled selected>Sexo</option>
                 <option value="1">Feminino</option>
                 <option value="2">Masculino</option>
               </select>
             </div>
           </div>
           <div class="form-group">
            <label for="desperson">Nome do responsável</label>
            <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome" onkeyup="corrigirValor(this)"></input>
          </div>
          <div class="form-group" style=" width: 100%">
            <label for="nrdocument">CPF</label>
            <input class="form-control" id="nrdocument" name="nrdocument" placeholder="Digite o Nº do Doumento" type="number"></input>
          </div>
          <div class="form-select">
            <div class="form-group" style="float: left; width: 30%">
              <label for="nrphone">Telefone</label>
              <input class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone" type="tel"></input>
            </div>
            <div class="form-group" style="float: right; width: 70%; margin-left: 5px">
              <label for="desemail">E-mail</label>
              <input class="form-control" style="text-transform: lowercase;" id="desemail" name="desemail" placeholder="Digite o e-mail" type="email"></input>
            </div>
          </div>
          <fieldset class="GRUPO">
            <legend class="GroupTitle">Endereço:</legend>
            <div class="form-select">
              <div class="form-group" style="float: right; width: 90%">
                <label for="despublicplace">Logradouro</label>
                <input class="form-control" id="despublicplace" name="despublicplace" placeholder="Digite seu Endereço" type="text" onkeyup="corrigirValor(this)">
              </div>
              <div class="form-group" style="float: right; width: 10%; margin-left: 5px">
                <label for="nrnumber">Número</label>
                <input class="form-control" type="number" id="nrnumber" name="nrnumber" placeholder="Número"></input>
              </div>
            </div>
            <div class="form-select">
              <div class="form-group" style="float: right; width: 40%; margin-right: 10px;">
                <label for="desregion">Bairro</label>
                <input style="width: 100%" class="form-control" id="desregion" name="desregion" placeholder="Digite seu Bairro" type="text" onkeyup="corrigirValor(this)">
              </div>
              <div style="float: right; width: 65%" class="form-group">
                <label for="complement" class="control-label">Complemento:</label>
                <input name="descomplement" type="text" class="form-control" id="complement" placeholder="Digite um Complemento" onkeyup="corrigirValor(this)">
              </div>
            </div>
            <div>
              <label class="control-label">Fora desta Cidade?</label>
                <input type="radio" name="" value="0">
                <input type="radio" name="" value="1">
            </div>
            <div class="form-select">
              <div class="form-group" style="float: left; width: 50%" >
                <label for="descity">Cidade</label>
                <input type="text" class="form-control" id="descity" name="descity" placeholder="Digite sua Cidade" onkeyup="corrigirValor(this)">
              </div>
              <div class="form-group" style="width: 10%; margin-left: 5px">
                <label for="desstate">UF</label><br>
                <select style="height: 35px; width: 100%" name="desstate" id="desstate">
                  <option value="Null">Selecione</option>
                  <option value="Paraná">PR</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>
              <div class="form-group" style="float: right; width: 40%; margin-left: 5px;">
                <label for="country" class="control-label">Pais:</label>
                <input name="descountry" type="text" class="form-control" id="country" placeholder="Digite o Pais" onkeyup="corrigirValor(this)">
              </div>
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
<script type="text/javascript" DEFER="DEFER">
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
</script>