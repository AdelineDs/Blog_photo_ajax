<!DOCTYPE>
<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="" />
        <title><?= $titre ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="Contenu/style.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
                <?php
            if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'Portfolio'||$_GET['action']=='updatePortfolio')
                    {?>
    <body class="bodyPortfolio">
                <?php
            }} else {
                     ?>
                <body>
                <?php
                           }
                     ?>
        <div class="container-fluid">
            <!-- Header -->
            <div class="row header">
                    <div class="col-xs-12 titre">
                        <h1>Mon blog photos</h1>
                    </div>
                    <div class="col-xs-offset-5 col-xs-2">
                        <hr/>
                    </div>
                    <!-- Menu navigation -->
                    <div class="col-xs-12 menu">
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?action=Portfolio">Portfolio</a></li>
                            <li><a href="index.php?action=blog">Blog</a></li>
                            <li><a href="index.php?action=Contact">Contact</a></li>
                            <?php
                             if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                            { ?>
                            <li><a href="index.php?action=Admin">Administration</a></li>
                            <?php
                             }
                            ?>
                        </ul>
                    </div>
            </div>
            <div class="row contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div>
            <div class="row footer">
                <div class="col-lg-4 copyright">
                    <p>Tous droits réservés : Adeline D. - - - 2018
                        <p></p>
                </div>
                <div class="col-lg-offset-6 col-lg-1 admin">
                    <a href="index.php?action=Admin">Administration</a>
                </div>
            </div>
        </div> 
                    <!-- The scroll to top feature -->
    
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>
        <script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
        <script src="./Contenu/script.js"></script>
        <script src="./ajax/Controleur/ajaxController.js"></script>
       </body>
</html>
