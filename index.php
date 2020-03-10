<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "minifb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO media (typeMedia, nomMedia, idPost) VALUES ";
//Code pour ajouter les photos dans le dossier
extract($_POST);
$error=array();
$extension=array("jpeg","jpg","JPG","png","gif");
$extensionV=array("mp4","webm","ogg");
$extensionA=array("mp3","ogg");
if(isset($_FILES["fileControl"])){
    foreach($_FILES["fileControl"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["fileControl"]["name"][$key];
        $file_tmp=$_FILES["fileControl"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $strName = uniqid();
        if(in_array($ext,$extension) or in_array($ext , $extensionV) or in_array($ext, $extensionA)) {
            if(!file_exists("upload/".$file_name)) {
                move_uploaded_file($file_tmp=$_FILES["fileControl"]["tmp_name"][$key],"upload/" . $strName . '.' . explode('.', $file_name)[count(explode('.', $file_name)) - 1]);
                $sql .= "('" . explode('.', $file_name)[count(explode('.', $file_name)) - 1]."', '".$strName."', 1),";
                echo "b";
            }
            else {
                $filename=basename($file_name,$ext);
                $newFileName=$filename.time().".".$ext;
                move_uploaded_file($file_tmp=$_FILES["fileControl"]["tmp_name"][$key],"upload/". $strName . '.' . explode('.', $file_name)[count(explode('.', $file_name)) - 1]);
                $sql .= "('".'.' . explode('.', $file_name)[count(explode('.', $file_name)) - 1]."', '".$strName."', 1),";
                
         }
        }
        else {

            array_push($error,"$file_name, ");
        }
    }
}


$sql = substr($sql, 0, -1);

$conn->query($sql);

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
            <?php 
           
            $sql = "SELECT idPost, nomMedia, typeMedia FROM media ORDER BY creationDate DESC";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<div class="col-md-5">
                    <div class="card mt-2">';
                    if(in_array( $row['typeMedia'], $extension)){
                        echo '<img class="img-fluid"
                                src="./upload/'.$row["nomMedia"].'.'.$row["typeMedia"].'">';
                    }
                    if(in_array( $row['typeMedia'], $extensionV)){
                        echo '<video controls loop src="./upload/'.$row["nomMedia"].'.'.$row["typeMedia"].'">pp</video>';
                    }
                    if(in_array( $row['typeMedia'], $extensionA)){
                        echo '<audio controls loop src="./upload/'.$row["nomMedia"].'.'.$row["typeMedia"].'">pp</audio>';
                    }
                            echo '<div class="card-body">
                                <h1 class="card-title">Social good</h1>
                                <p class="card-text">1,200 followers, 83 Posts</p>
                            </div>
                                
                    </div>
                </div>';
                }
            }
            ?>
        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/1f3067fe48.js" crossorigin="anonymous"></script>

</body>

</html>