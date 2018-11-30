<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Locais
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/locals">Locais</a></li>
      <li class="active"><a href="/admin/locals/create">Cadastrar</a></li>s
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Local</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/locals/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="deslocal">Nome do Local</label>
              <input type="text" class="form-control" id="deslocal" name="deslocal" placeholder="Digite o nome do local">
            </div>
          </div>
          <fieldset class="GRUPO">
           <legend>
            <a href="#" class="mostraClass" onclick="mostra('divInfos')"><i class="fa fa-plus-circle" id="imgInfos"></i><b style="color: #000"> ENDEREÇO</b></a>
          </legend>
          <div id="divInfos" style="display: none;">
            <div class="form-select">
              <div class="form-group" style="float: right; width: 100%">
                <label for="despublicplace">Logradouro</label>
                <input style="width: 99%" class="form-control" id="despublicplace" name="despublicplace" placeholder="Digite o endereço do local" type="text" onkeyup="corrigirValor(this)">
              </div>
              <div class="form-group">
                <label for="nrnumber">Número</label>
                <input type="number" class="form-control" id="nrnumber" name="nrnumber" placeholder="Número"></input>
              </div>
            </div>
            <div class="form-select">
              <div class="form-group" style="float: right; width: 40%; margin-right: 10px;">
                <label for="desregion">Bairro</label>
                <input style="width: 100%" class="form-control" id="desregion" name="desregion" placeholder="Digite o bairro" type="text" onkeyup="corrigirValor(this)">
              </div>
              <div style="float: left; margin-right: 10px; width: 50%" class="">
                <label for="descity">Cidade</label>
                <input type="text" class="form-control" id="descity" name="descity" placeholder="Digite a cidade" onkeyup="corrigirValor(this)">
              </div>
              <div style="float: right; width: 10%; " class="">
                <label for="desstate">UF</label><br>
                <select style="height: 35px; width: 100%" name="desstate" id="desstate">
                  <option value="Null">Selecione</option>
                  <option value="Paraná">PR</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>
            </div>
            <div class="form-select">
              <div style="float: right; width: 100%" class="form-group">
                <label for="complement" class="control-label">Complemento:</label>
                <input name="descomplement" type="text" class="form-control" id="complement" placeholder="Digite um complemento" onkeyup="corrigirValor(this)">
              </div>
            </div>
          </div>
        </fieldset>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">
  function mostra(id){
    if(document.getElementById(id).style.display == 'block'){
      document.getElementById(id).style.display = 'none';
    }else{ document.getElementById(id).style.display = 'block';}
  }

  $('.mostraClass').click(function(){
    $(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
  });
</script>