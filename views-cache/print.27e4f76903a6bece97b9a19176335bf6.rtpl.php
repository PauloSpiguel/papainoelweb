<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPN Web | Impressão de Senha</title>
  <!-- Favicon HTML -->
  <link rel="shortcut icon" type="image/png" href="/res/site/img/favicon32x32.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon HTML -->
  <link rel="shortcut icon" type="image/png" href="/res/site/img/favicon32x32.ico">
  <!-- Bootstrap 3.3.6 
    <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <!-- Ionicons 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style   <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">-->

    <style type="text/css" media="screen">

    .text-center {
      text-align: center;
    }
    .ttu {
      text-transform: uppercase;
    }
    .printer-ticket {
      display: table !important;
      width: 100%;
      max-width: 400px;
      font-weight: light;
      line-height: 1.3em;
    }
    .printer-ticket,
    .printer-ticket * {
      font-family: Tahoma, Geneva, sans-serif;
      font-size: 10px;
    }
    .printer-ticket th:nth-child(2),
    .printer-ticket td:nth-child(2) {
      width: 50px;
    }
    .printer-ticket th:nth-child(3),
    .printer-ticket td:nth-child(3) {
      width: 90px;
      text-align: right;
    }
    .printer-ticket th {
      font-weight: inherit;
      padding: 10px 0;
      text-align: center;
      border-bottom: 1px dashed #BCBCBC;
    }
    .printer-ticket tbody tr:last-child td {
      padding-bottom: 10px;
    }
    .printer-ticket tfoot .sup td {
      padding: 10px 0;
      border-top: 1px dashed #BCBCBC;
    }
    .printer-ticket tfoot .sup.p--0 td {
      padding-bottom: 0;
    }
    .printer-ticket .title {
      font-size: 1.5em;
      padding: 15px 0;
    }
    .printer-ticket .top td {
      padding-top: 10px;
    }
    .printer-ticket .last td {
      padding-bottom: 10px;
    }

  </style>

</head>
<body >
  <table class="printer-ticket">
    <thead>
      <tr>
        <th class="title" colspan="3" style="text-align: center">
          <h1 style="font-size: 1.5em; margin-bottom: 0">Governo Municipal </h1></br>
          <h1 style="font-size: 1em; margin-top: 0">Centenário do Sul</h1>
        </th>

      </tr>
      <tr>

      </tr>
      <tr>
        <th colspan="3">
        Emitindo em: </br>
        <?php echo htmlspecialchars( $dateNow, ENT_COMPAT, 'UTF-8', FALSE ); ?>
      </th>
    </tr>
    <tr>
      <th colspan="3" >
        Nome:<br />
        <p style="font-size: 2em"><h1 style="font-size: 3em"><?php echo htmlspecialchars( $data["deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1></p>
      </th>
    </tr>
    <tr>
      <th class="ttu" colspan="3">
        <b>Sua senha é: <h1 style="font-size: 6em"><?php echo htmlspecialchars( $data["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1></b>
      </th>
    </tr>
    <tr>
      <th class="ttu" colspan="3">
        <b>Data emprega presente: <h1 style="font-size: 4em"><?php echo date('d/m/Y', strtotime($data["dtpassword"])); ?></h1></b></br>
        <b><h1 style="font-size: 2em; margin-top: 0"><?php echo htmlspecialchars( $dayW, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1></b>
      </th>
    </tr>
  </thead>
  <tbody>
  <!--<tr class="top">
    <td colspan="3">Dados Adicionais:</td>
  </tr>
  <tr>
    <td>R$7,99</td>
    <td>2.0</td>
    <td>R$15,98</td>

  </tr>
  <tr>
    <td colspan="3">Opcional Adicicional: grande</td>
  </tr>-->
  <tr>
    <td></td>
    <td><img  style="width: 200px" src="/res/admin/dist/img/qrsample.png" alt=""></td>
    <td></td>
  </tr>

</tbody>
<tfoot>
  <tr class="sup ttu p--0">
    <td colspan="3">
      <b>Dados Adicionais:</b>
    </td>
  </tr>
  <tr class="ttu">
    <td colspan="2">Nome Responsável:</td>
    <td align="right"><?php echo htmlspecialchars( $data["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  </tr>
  <tr class="ttu">
    <td colspan="2">Idade:</td>
    <td align="right"><?php echo htmlspecialchars( $data["dtbirthday"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  </tr>
  <tr class="ttu">
    <td colspan="2">Telefone:</td>
    <td align="right">439999999</td>
  </tr>
  <tr class="sup">
    <td colspan="3" align="center">
    Local entrega senha: </br>
    <b>Praça principal - Enfrente a prefeitura</b>
  </td>
</tr>
<tr class="sup">
  <td colspan="3" align="center">
    <b>Desenvolvimento</b>
  </td>
</tr>
<tr class="sup">
  <td colspan="3" align="center">
    Seção de Infomática - Centenário do Sul | P R Spiguel Tecnologia
  </td>
</tr>
</tfoot>
</table>

</body>
</html>
