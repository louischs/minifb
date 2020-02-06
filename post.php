<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php include('./includes/header.html');?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <form>
                        <div class="form-group">
                            <label for="txtArea">Commentaire</label>
                            <textarea class="form-control" id="txtArea" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileControl">Média</label>
                            <input type="file" class="form-control-file" id="fileControl" accept = "image/*" multiple>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-5">



            </div>
        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/1f3067fe48.js" crossorigin="anonymous"></script>

</body>

</html>