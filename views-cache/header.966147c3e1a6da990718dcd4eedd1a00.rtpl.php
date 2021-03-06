<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<!--
    Hcode Store by hcode.com.br
-->
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>..::Papai Noel Web | Centenário do Sul::..</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../res/site/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../res/site/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="../res/site/css/owl.carousel.css">
    <link rel="stylesheet" href="../res/site/css/style.css">
    <link rel="stylesheet" href="../res/site/css/responsive.css">  
    <link rel="stylesheet" href="../res/site/css/style.css">
    <link rel="stylesheet" href="../res/site/css/style.menu.css">
    <link rel="stylesheet" href="../res/site/scss/style.style.menu.scss">
   <!--<link rel='stylesheet' href='http://seodesigns.com/projects/TD/css/reset.css'>
    <link rel="stylesheet" href="../res/site/css/reset.css">-->
    <link rel="stylesheet" href="../res/site/css/style.form.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> CENTENÁRIO DO SUL</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> PARANÁ</a></li>                       
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Links Úteis: </span><span class="value">Secretaria de Saúde </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Secretaria de Saúde</a></li>
                                    <li><a href="#">Secretaria de Cultura</a></li>
                                    <li><a href="#">Secretaria de Administração</a></li>
                                    <li><a href="#">Secretaria de Educação</a></li>
                                </ul>
                            </li>
                            <?php if( checkLogin(false) ){ ?>
                            <li><a href="/admin"><i class="fa fa-user"></i> <?php echo getUserName(); ?></a></li>
                            <li><a href="/admin/logout"><i class="fa fa-close"></i> Sair</a></li>
                            <?php }else{ ?>
                            <li><a href="/admin/login"><i class="fa fa-lock"></i> Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="#"><img src="../res/site/img/logo.png"></a></h1>
                    </div>
                </div>
                
                <!--<div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="carrinho.html">Carrinho - <span class="cart-amunt">R$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>-->
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <!--<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Produtos</a></li>
                        <li><a href="#">Carrinho</a></li>
                    </ul>                  
                </div>-->
                <ul class="hList">
                  <li>
                    <a href="#click" class="menu">
                      <h2 class="menu-title">animals</h2>
                      <ul class="menu-dropdown">
                        <li>cat</li>
                        <li>dog</li>
                        <li>horse</li>
                        <li>cow</li>
                        <li>pig</li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#click" class="menu">
                  <h2 class="menu-title menu-title_2nd">names</h2>
                  <ul class="menu-dropdown">
                    <li>Kevin</li>
                    <li>Jim</li>
                    <li>Andy</li>
                </ul>
            </a>
        </li>
        <li>
            <a href="#click" class="menu">
              <h2 class="menu-title menu-title_3rd">things</h2>
              <ul class="menu-dropdown">
                <li>bench</li>
                <li>pizza</li>
                <li>Honda CB125</li>
                <li>space</li>
                <li>black matter</li>
                <li>apple</li>
                <li>philodendron</li>
                <li>liver</li>
                <li>brass</li>
            </ul>
        </a>
    </li>
    <li>
        <a href="#click" class="menu">
          <h2 class="menu-title menu-title_4th">Movies</h2>
          <ul class="menu-dropdown">
            <li>Godzilla</li>
            <li>Man on Wire</li>
            <li>Spirited Away</li>
            <li>Interstellar</li>
        </ul>
    </a>
</li>
</ul>                
</div>
</div>
    </div> <!-- End mainmenu area -->