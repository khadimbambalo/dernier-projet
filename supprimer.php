<html>
<head>
    <title>Page d'inscription</title>
    <meta charget="uft-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <!--<link rel="stylesheet" href="mycss.css"> -->
    
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="accueil.php">Accueil</a>
              <a class="nav-item nav-link active" href="produit.php">Produits</a>
              <a class="nav-item nav-link active" href="ajouterproduit.php">Ajouter produit</a>
              <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </div>
          </div>
        </nav>
        
        
        <?php
        
        $serveur="localhost";
        $login="root";
        $pass="";
        
                try{
                          $connexion=new PDO("mysql:host=$serveur;dbname=visiteurs", $login, $pass);
                           $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                           
                       }
                       catch(PDOException $e){
                           echo 'Erreur'.$e->getMessage();
                       }
                    
                $supp=$connexion->prepare("DELETE FROM produits WHERE id=:num LIMIT 1");
                $supp->bindValue(':num', $_GET['numpro']);
                $supp->execute();
                  if($supp->execute())
                     { ?>
                        <div style="width: 50%; margin-left: 25%; margin-top: 5%; height: 10%;" class="alert alert-success">
                        <div><strong>Votre produit a ete supprime avec succes !</strong></div>
                        </div>  <?php
        
                     }
                
               
           
    ?>
        
</body>
</Html>