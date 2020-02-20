<?php
if(isset($_FILES['fileControl']))
{ 
     $dossier = 'upload/';
     $fichier = basename($_FILES['fileControl']['name']);
     if(move_uploaded_file($_FILES['fileControl']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
?>
<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php include('./includes/header.html');?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="text-center"><img class="img-fluid"
                            src="https://www.efswiss.ch/sitecore/__~/media/efcom/2019/ils/destinations-v2/ILSU_NewYork/1_Stage/NYCStageMobile.jpg">
                    </h1>
                    <div class="card-body">
                        <h4 class="card-title">NOM DE VOTRE BLOG</h4>
                        <br>
                        <p class="card-text">45 followers, 13 Posts</p>
                        <img style="width: 30px;"
                            src="https://www.simplifai.ai/wp-content/uploads/2019/06/blank-profile-picture-973460_960_720-400x400.png">
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <h1 class=" ml-3 text-left">Welcome</h1>
                </div>
                <div class="card mt-2">
                    <img class="img-fluid"
                            src="https://www.efswiss.ch/sitecore/__~/media/efcom/2019/ils/destinations-v2/ILSU_NewYork/1_Stage/NYCStageMobile.jpg">
                        <div class="card-body">
                            <h1 class="card-title">Social good</h1>
                            <p class="card-text">1,200 followers, 83 Posts</p>
                        </div>
                            
                </div>
            </div>
        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/1f3067fe48.js" crossorigin="anonymous"></script>

</body>

</html>