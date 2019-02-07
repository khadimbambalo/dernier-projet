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
            
                $requete=$connexion->prepare("INSERT INTO customer VALUE(NULL, :nom, :email, :password, :number)");
                $requete->bindValue(':nom', $_POST['nom']);
                $requete->bindValue(':email', $_POST['email']);
                $requete->bindValue(':password', $_POST['password']);
                $requete->bindValue(':number', $_POST['number']);
                $requete->execute();
                echo "Votre inscription a ete accepte";
                "<br><br><br>"
                ?><html><br><a href="connexion.php"><h1>Connecter vous</h1></a></html><?php
                    }
                    
                catch(PDOException $e){
                    echo "Erreur".$e->getMessage();
                }
       
            
        
    ?>