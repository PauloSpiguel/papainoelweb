<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Locais
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Local</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/locals/<?php echo htmlspecialchars( $local["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="deslocal">Nome da categoria</label>
              <input type="text" class="form-control" id="deslocal" name="deslocal" placeholder="Digite o nome do local" value="<?php echo htmlspecialchars( $local["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <fieldset class="GRUPO">
            <legend class="GroupTitle">Endereço:</legend>
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
          </fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->