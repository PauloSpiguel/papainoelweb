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
        Governo Municipal </br>
        <p>Centenário do Sul</p>
      </th>
        
      </tr>
      <tr>
        
      </tr>
      <tr>
        <th colspan="3"><?php echo htmlspecialchars( $dateNow, ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
      </tr>
      <tr>
        <th colspan="3" >
          Nome:<br />
          <p style="font-size: 2em"><?php echo htmlspecialchars( $data["$deskid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </th>
      </tr>
      <tr>
        <th class="ttu" colspan="3">
          <b>Sua senha é: <h1 style="font-size: 5em"><?php echo htmlspecialchars( $value["nrpassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1></b>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr class="top">
        <td colspan="3">Doce de brigadeiro</td>
      </tr>
      <tr>
        <td>R$7,99</td>
        <td>2.0</td>
        <td>R$15,98</td>
      </tr>
      <tr>
        <td colspan="3">Opcional Adicicional: grande</td>
      </tr>
      <tr>
        <td>R$0,33</td>
        <td>2.0</td>
        <td>R$0,66</td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="sup ttu p--0">
        <td colspan="3">
          <b>Totais</b>
        </td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Sub-total</td>
        <td align="right">R$43,60</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Taxa de serviço</td>
        <td align="right">R$4,60</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Desconto</td>
        <td align="right">5,00%</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Total</td>
        <td align="right">R$45,56</td>
      </tr>
      <tr class="sup ttu p--0">
        <td colspan="3">
          <b>Pagamentos</b>
        </td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Voucher</td>
        <td align="right">R$10,00</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Dinheiro</td>
        <td align="right">R$10,00</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Total pago</td>
        <td align="right">R$10,00</td>
      </tr>
      <tr class="ttu">
        <td colspan="2">Troco</td>
        <td align="right">R$0,44</td>
      </tr>
      <tr class="sup">
        <td colspan="3" align="center">
          <b>Pedido:</b>
        </td>
      </tr>
      <tr class="sup">
        <td colspan="3" align="center">
          www.site.com
        </td>
      </tr>
    </tfoot>
  </table>

</body>
</html>
