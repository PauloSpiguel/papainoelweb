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
                <th style="width: 190px">Local de Entrega</th>
                <th style="width: 60px">Data</th>
                <th style="width: 170px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($demands) && ( is_array($demands) || $demands instanceof Traversable ) && sizeof($demands) ) foreach( $demands as $key1 => $value1 ){ $counter1++; ?>
              <tr>
                <td><?php echo htmlspecialchars( $value1["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["dtbirthday"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php if( $value1["dessex"] == 1 ){ ?>Feminino<?php }else{ ?>Masculino<?php } ?></td>
                <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                  <td><?php echo htmlspecialchars( $value1["deslocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td><?php echo htmlspecialchars( $value1["dtregister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                      <td>
                       <a href="#" onclick="alert('Imprimindo...')" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
                       <a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                       <a href="/admin/deliveries/<?php echo htmlspecialchars( $value1["iddemand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                     </td>
                   </tr>
                   <?php } ?>
                 </tbody>
               </table>
             </div>
             <!-- /.box-body -->
           </div>
         </div>
       </div>

     </section>
     <!-- /.content -->
   </div>
<!-- /.content-wrapper -->