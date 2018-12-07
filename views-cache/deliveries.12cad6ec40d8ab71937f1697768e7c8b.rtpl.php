<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
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
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">Senha</th>
                <th>Nome da Criança</th>
                <th>Data Nascimento</th>
                <th>Sexo</th>
                <th>Responsável</th>
                <!--<th style="width: 180px">Local de Entrega</th>-->
                <th style="width: 90px">Data</th>
                <th style="width: 100px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($demands) && ( is_array($demands) || $demands instanceof Traversable ) && sizeof($demands) ) foreach( $demands as $key1 => $value1 ){ $counter1++; ?>
              <tr>
                <td><?php echo htmlspecialchars( $value1["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo date('d/m/Y', strtotime($value1["dtbirthday"])); ?></td>
                <td><?php if( $value1["dessex"] == 1 ){ ?>Feminino<?php }else{ ?>Masculino<?php } ?></td>
                <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                  <!--<td><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>-->
                    <td><?php echo date('d/m/Y', strtotime($value1["dtpassword"])); ?></td/>
                      <td>
                       <a href="/admin/deliveries/print/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
                       <a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                       <!--<a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>-->
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
  
  <script>
    ################ TECLAS DE ATALHO #####################

    shortcut.add("Right",function() 
    {
      alert("Foi pressionado a seta para a direita!");
    });

    shortcut.add("CTRL+X",function() 
    {
      alert("Foi pressionado a sequencia de teclas CTRL+X!");
    });

  </script>