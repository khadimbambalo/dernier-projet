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
                    
                $supp=$connexion->prepare("SELECT * FROM produits WHERE id=:num");
                $supp->bindValue(':num', $_GET['numpro']);
                $supp->execute();
                $editelelement=$supp->fetch();
                $id=$_GET['numpro'];
        ?>        
                
        <form action="" method="POST">
          <div class="form-group row" style="margin-top: 5%;">  
            <div class="col-sm-10" style="margin-left: 30%;">
              <input type="text" value="<?= $editelelement['nom']?>" name="nom" class="form-control form-control-lg" id="colFormLabelSm" style="width: 50%;" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10" style="margin-left: 30%;">
              <input type="number" value="<?= $editelelement['quantite']?>" name="quantite" class="form-control form-control-lg" id="colFormLabel" style="width: 50%;" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10" style="margin-left: 30%;">
              <input type="number" value="<?= $editelelement['prix']?>" name="prix" class="form-control form-control-lg" id="colFormLabelLg" style="width: 50%;" required>
            </div>
          </div>
          <div class="col-sm-10" style="margin-left: 45%;">
              <input name="soumet" type="submit" class="form-control form-control-lg" id="colFormLabelLg" value="Modifier" style="width: 10%; background-color: gray;">
            </div>
        </form>    
         <?php
                       
        if(isset($_POST['soumet'])){
            
                try { 
                       
                        $supp=$connexion->prepare("UPDATE produits set nom=:nom, quantite=:quantite, prix=:prix WHERE id=:num");
                        $supp->bindValue(':num', $_GET['numpro']);
                        $supp->bindValue(':nom', $_POST['nom']);
                        $supp->bindValue(':quantite', $_POST['quantite']);
                        $supp->bindValue(':prix', $_POST['prix']);
                       
                        if($supp->execute())
                     { ?>
                        <div style="width: 50%; margin-left: 25%;" class="alert alert-success">
                        <div><strong>Votre modification a ete realisée avec succés !</strong></div>
                        </div>  <?php
                        }
                         else{
                        ?>
                        <div style="width: 50%; margin-left: 25%;" class="alert alert-success">
                        <div><strong>Votre modification a echoué !</strong></div>
                        </div>  <?php
                     }
        
                     }
                    
                        catch(PDOException $e){
                            echo "Erreur".$e->getMessage();
                     }
        }
    ?>
        
        
        
         
</body>
</Html>