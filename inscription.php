<html>
<head>
    <title>Page d'inscription</title>
    <meta charget="uft-8">
    <link rel="stylesheet" href="mycss.css">
    
</head>
<body>
    <div>
    <form action="" method="POST" id="maform" class="inscription">
        <h1 class="tit">Creer un compte</h1>
        <hr class="lign">
        <input name="nom" class="forme" id="myname" type="text" placeholder="Nom" required/></br></br>
        <input name="number" class="forme" id="mynumber"type="number" placeholder="Numero de telephone" required/></br></br>
        <input name="email" class="forme" id="myemail" type="email" placeholder="Adresse mail"required/></br></br>
        <input name="password" class="forme" id="mypass" type="password" placeholder="Mot de passe"/></br></br>
        <input type="checkbox" value=""/><span style="color:white">
        J'accepte les</span> <span style="color:olive">Termes et conditions</span><span style="color:white"> et</span>
        <span style="color:olive">les politiques de confidentialite</span></br></br>
        <input name="soumet" class="valid" type="submit" value="Creer le compte"/><br>
        <blockquote style="color: gray">Create by KBL  @copyright2018</blockquote>
    </form>
    </div>
    <?php
    
        if(isset($_POST['soumet'])){
            if($_POST['email']!=NULL && $_POST['password']!=NULL && $_POST['number']!=NULL && $_POST['nom']!=NULL)
            {
               require('treatins.php');
            }
        }
         
    ?>
</body>
</Html>