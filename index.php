<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>LSTN</title>
</head>

<body>

    <!-- Header -->
    <header class="masthead" style="background-image: url('img/bgd.jpg');">
        <div class="container d-flex h-100 align-items-center" style="padding-left: 20%;">
            <div class="mx-auto" style="margin-left: 30px;">
                <form align="center" class="formsearch" method="post" action="tampildata.php"
                    style="background-color: white; width: 120%;">
                    <h2 style="padding-top: 20px;"><i class="fas fa-podcast fa-3x"></i></h2>
                    <a style="margin-top:-20px;" style="color: black;" class="user">LSTN</a>
                    <h2>Music is our passion!</h2>
                    <div class="row">
                        <div class="col-12">
                            <input style="width: 400px; text-align: center; font-size: 10pt;" type="text" name="artist"
                                placeholder="Artist/Band" required> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input style="width: 400px; text-align: center; font-size: 10pt;" type="text" name="song"
                                placeholder="Song Title"  required>
                        </div>
                    </div>
                    
                    <input style="width: 400px; color: white; background-color: #1db954; border: solid 1px rgb(255, 255, 255);font-size: 10pt;" type="submit" name="submit" value="Find Song" />
                    <div class="row">
                        <div class="col-12" style="margin-top: -10px;">
                        <a style="font-size:7pt;">Make sure you type the artist/song correctly</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <a style="font-size:7pt;">Powered by</a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 20px;">
                        <img  height="25" src="img/deezer.png">
                        <img  height="25" src="img/apiary.png">
                        <img  height="25" src="img/youtube.png">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>