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
                       
            
                try { 
                        
                        $requete=$connexion->prepare("SELECT * FROM produits");
                        $requete->execute();
                        if( $requete->execute())
                            { 
                                $tableau=$requete->fetchAll();
                              }
                    }   
                        catch(PDOException $e){
                            echo "Erreur".$e->getMessage();
                     }
                     
                      ?>
                                <center><table class="table table-bordered" style="width: 50%;">
                                    <h1>Liste des produits</h1>
                                    <thead style="text-align: center;">
                                        <tr style="background-color: gray;">
                                            <th style="text-align: center;">NOM</th>
                                            <th style="text-align: center;">QUANTITE</th>
                                            <th style="text-align: center;">PRIX</th>
                                            <th>OPT...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tableau as $element): ?>
                                        <tr style="background-color: lightgray;">
                                            <td style="text-align: center;"><?= $element['nom'] ?></td>
                                            <td style="text-align: center;"><?= $element['quantite'] ?></td>
                                            <td style="text-align: center;"><?= $element['prix'] ?></td>
                                            <td style="width: 10%;">
                                            <a href="modifier.php?numpro=<?=$element['id'] ?>">modifier</a>
                                            <a style="color: red" href="supprimer.php?numpro=<?=$element['id'] ?>">supprimer</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table></center>
                                <?php
           
    ?>
        
</body>
</Html>