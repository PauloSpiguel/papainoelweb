<?php if(!class_exists('Rain\Tpl')){exit;}?> <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Entrega de Senhas
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="/admin/deliveries">Entrega de Senhas</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     <div class="col-md-12">
      <div class="box box-primary">

        <div class="box-header">
          <a href="/admin/deliveries/create" class="btn btn-success">Entregar Senha</a>
          <div class="box-tools">
            <form action="/admin/deliveries">
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
          <table class="table table-striped" id="myTable">
            <thead>
              <tr style="background-color: #b8c7ce">
                <th style="width: 15px">Senha</th>
                <th style="width: 260px">Nome da Criança</th>
                <th style="width: 120px">Data Nasc.</th>
                <th>Sexo</th>
                <th>Responsável</th>
                <th style="width: 160px">Escola</th>
                <th style="width: 70px">Data</th>
                <th style="width: 100px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($demands) && ( is_array($demands) || $demands instanceof Traversable ) && sizeof($demands) ) foreach( $demands as $key1 => $value1 ){ $counter1++; ?>
              <tr style="background-color: ">
                <td>
                  <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"
                  data-whateverdeskid="<?php echo htmlspecialchars( $value1["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverperson="<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                </td>
                <td><?php echo htmlspecialchars( $value1["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo date('d/m/Y', strtotime($value1["dtbirthday"])); ?></td>
                <td><?php if( $value1["dessex"] == 1 ){ ?>Feminino<?php }else{ ?>Masculino<?php } ?></td>
                <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                  <td><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo date('d/m/Y', strtotime($value1["dtpassword"])); ?></td/>
                      <td>
                       <a href="/admin/deliveries/print/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
                       <a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
                       <a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
            <div class="form-group">
              <label for="deskid" class="control-label">Responsável:</label>
              <input name="deskid" type="text" class="form-control" id="deskid" onkeyup="corrigirValor(this)">
            </div>
            <div class="form-group">
              <label for="nrphone" class="control-label">Telefone:</label>
              <input name="nrphone" type="text" class="form-control" id="nrphone">
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email:</label>
              <input name="desemail" type="email" class="form-control" id="email" style="text-transform: lowercase;">
            </div>
            <div class="form-group">
              <label for="deskid" class="control-label">Escola:</label>
              <input name="deskid" type="text" class="form-control" id="deskid" onkeyup="corrigirValor(this)">
            </div>
            <fieldset class="GRUPO">
              <legend class="GroupTitle">Endereço:</legend>
              <div class="form-select">
                <div class="form-group" style="float: right; width: 100%; margin-right: 5px">
                  <label for="publicplace" class="control-label">Logradouro:</label>
                  <input style="width: 100%" name="despublicplace" type="text" class="form-control" id="publicplace" onkeyup="corrigirValor(this)">
                </div>
                <div class="form-group">
                  <label for="nrnumber" class="control-label">Número:</label>
                  <input name="nrnumber" type="text" class="form-control" id="nrnumber">
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
            <!--<button id="updateButton" type="submit" class="btn btn-danger">Alterar</button>
              <button id="printButton" type="button" class="btn btn-primary">Imprimir</button>-->

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Fim Modal -->
  
  <script type="text/javascript">


    ################ TECLAS DE ATALHO #####################

    shortcut.add("Right",function() 
    {
      alert("Foi pressionado a seta para a direita!");
    });

    shortcut.add("CTRL+X",function() 
    {
      alert("Foi pressionado a sequencia de teclas CTRL+X!");
    });
    ################ MODAL #####################
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var recipientdeskid = button.data('whateverdeskid')  
    var recipientdtbirthday = button.data('whateverdtbirthday')
    var recipientperson = button.data('whateverperson')
    var recipientnrphone = button.data('whatevernrphone')
    var recipientemail = button.data('whateveremail')
    var recipientpublicplace = button.data('whateverpublicplace')
    var recipientnrnumber = button.data('whatevernrnumber')
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
    modal.find('#deskid').val(recipientdeskid)
    modal.find('#dtbirthday').val(recipientdtbirthday)
    modal.find('#recipient-person').val(recipientperson)
    modal.find('#nrphone').val(recipientnrphone)
    modal.find('#email').val(recipientemail)
    modal.find('#publicplace').val(recipientpublicplace)
    modal.find('#nrnumber').val(recipientnrnumber)
    modal.find('#region').val(recipientregion)
    modal.find('#city').val(recipientcity)
    modal.find('#state').val(recipientstate)
    modal.find('#country').val(recipientcountry)
    modal.find('#complement').val(recipientcomplement)
    /*FUNÇÃO PARA ALTER O ACTION DO FORMULARIO*/
    $('#updateButton').click(function(){
      $('#modalForm').attr('action', '/admin/deliveries/' + recipient);
    });
  })

</script>