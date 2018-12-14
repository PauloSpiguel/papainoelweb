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
          <a href="/admin/deliveries/create" class="btn btn-success">Entregar Senha (F9)</a>
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
                  <a type="button" style="cursor: pointer;" data-toggle="modal" data-target="#infoModal" whatever="<?php echo htmlspecialchars( $value1["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverdeskid="<?php echo htmlspecialchars( $value1["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-whateverperson="<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
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
  <!-- Modal -->
  <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">ENTREGA DE SENHAS PAPAI NOEL <?php echo date('Y'); ?></h4>
        </div>
        <div class="modal-body">

          <section class="invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header">
                  <img src="../../res/admin/dist/img/logo.png" alt="Logo" style="width: 60%">
                  <small class="pull-right">Data: <?php echo date('d/m/Y h:i:s'); ?></small>
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row">
              <div class="col-xs-12">
                Senha: <h1 id="nrpassword">Nº</h1>
                Data da Senha: <h3 style="display: inline;" id="dtpassword">00/00/0000</h3>        
                <div>
                  Nome:
                  <h2 id="deskid"><b>Nome da Criança</b></h2><br>
                  Responsável: <h4 id="recipient-person" style="display: inline;"></h4><br>
                  Escola: <h4 id="" style="display: inline;"></h4><br>
                  Matricula: <h4 id="" style="display: inline;"></h4><br> 
                  Endereço: <h4 id="" style="display: inline;"></h4><br>
                  Telefone: <h4 id="" style="display: inline;"></h4><br>
                </div> 
              </div>
              <!-- /.row -->
              <div class="row" >
               <div class="col-xs-12 table-responsive" style="margin: 15px">
                <h4 class="lead">Detalhamento</h4>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Senha</th>
                      <th>Emitido</th>
                      <th>Usuário</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->

        </section>

        <div class="clearfix"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary pull-right" onclick="print()" style="margin-right: 5px;" data-dismiss="modal">
          <i class="fa fa-print"></i> Imprimir
        </button>
      </div>
    </div>
  </div>
</div>
  <!-- Fim Modal -->