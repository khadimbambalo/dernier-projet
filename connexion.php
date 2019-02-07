<html>
    <head>
        <title>Page de connexion</title>
        <meta charget="utf-8">
        <link rel="stylesheet" href="mycss.css">
    </head>
    <body>
        <div>
    <form action="" method="POST" id="maform" class="connexion">
        <h1 class="tit">Se connecter</h1>
        <hr class="lign">
        <input name="email" class="forme" id="myemail" type="email" placeholder="Adresse mail" required/></br></br>
        <input name="password" class="forme" id="mypass" type="password" placeholder="Mot de passe" required/></br></br>
        <input name="soumet" class="valide" type="submit" value="Connexion"/>
        <p><u>Mot de passe oublié</u></p><br>
         <blockquote style="color: gray">Create by KBL  @copyright2018</blockquote>
    </form>
   
        </div>
    </body>
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
    
        if(isset($_POST['soumet'])){
            if($_POST['email']!=NULL && $_POST['password']!=NULL)
            {
                $email=$_POST['email'];
                $password=$_POST['password'];
                try {
            
                $requete=$connexion->prepare("SELECT email,password FROM customer WHERE email='".$email."' AND password='".$password."'");
                $requete->execute();
               $nb=$requete->rowCount();
                        if($nb>0){ 
                           header('location:accueil.php');
                                 }
                         else{
                         echo "L'adresse mail et le mot de passe ne correspondent pas";
                             } 
                    }
                catch(PDOException $e){
                    echo "Erreur".$e->getMessage();
                }
            }
        }
         
    ?>
</html>