<?php 

if(isset($_POST['submit'])){
    
  //API LYRICS.OVH DARI APIARY--> MENGAMBIL LIRIK LAGU
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $newartist = str_replace(' ', '%20', $artist);
    $newsong = str_replace(' ', '%20', $song);
    $newsong = str_replace('&', '&amp;', $newsong);

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    
    if(get_http_response_code("https://api.lyrics.ovh/v1/".$newartist."/".$newsong) != "200"){
        
    }else{
        $url ="https://api.lyrics.ovh/v1/".$newartist."/".$newsong;
        $json=file_get_contents($url);

        $data=json_decode($json, true);

        //PECAHKAN DATA LIRIK SETIAP HURUF KAPITAL BUAT LINE BARU
        $s = $data['lyrics'];
        $i = 0;
        $j = 0;
        $phrases = array();
        $cap_bit = pow(2, 5);
        while($j < strlen($s))
        {
            $n = ord($s{$j});
            if(($n & $cap_bit) == 0 && 
            ($j == 0 || (
                    ord($s{$j - 1}) & $cap_bit) > 0 && 
                    $s{$j - 1} != ' ') && 
            $j > 0)
            {
                $phrases[] = substr($s, $i, $j - $i);
                $i = $j;
            }
            $j++;
        }
        $phrases[] = substr($s, $i);

        
    }

    //API YOUTUBE --> MENGAMBIL MUSIC VIDEO DARI YOUTUBE
    $API_key    = 'AIzaSyC5OQ6-eNfHhZ-7HNK3M2zRL0x6d45Cxy4';
    $maxResults = 3;
    $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$newartist.'+'.$newsong.'&type=video&videoDefinition=high&key='.$API_key.''));

    //API DEEZER --> MENGAMBIL DATA  DARI DEEZER
    
    $url = 'https://api.deezer.com/search?q=artist:"'.$newartist.'"%20track:"'.$newsong.'"&limit=1';
    $jsonStr = file_get_contents($url);
    $jsonArr = json_decode($jsonStr, true);

    $coverXlCollection = array();

    foreach ($jsonArr['data'] as $row) {
        $coverXlCollection[] = $row['album']['cover_xl'];
    }
    foreach ($jsonArr['data'] as $row1) {
        $albumtitle[] = $row1['album']['title'];
    }
    foreach ($jsonArr['data'] as $row2) {
        $songtitle[] = $row2['title'];
    }
    foreach ($jsonArr['data'] as $row3) {
        $artistname[] = $row3['artist']['name'];
    }
    foreach ($jsonArr['data'] as $row4) {
        $artistpic[] = $row4['artist']['picture_xl'];
    }
    foreach ($jsonArr['data'] as $row5) {
        $artisttracklist[] = $row5['artist']['tracklist'];
    }
    foreach ($jsonArr['data'] as $row7) {
        $artistid[] = $row7['artist']['id'];
    }
    $url2 = $artisttracklist[0];
    $jsonStr2 = file_get_contents($url2);
    $jsonArr2 = json_decode($jsonStr2, true);
    $tracklist = array();

    foreach ($jsonArr2['data'] as $row6) {
        $tracklist[] = $row6['title'];
    }

}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="css/style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>LSTN</title>
</head>

<body style="background-color: #f7f7f7;">

    <header class="masthead1" style="background-image: url('img/bgd.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12" align="center" style="margin-top:110px;">
                    <i class="fas fa-podcast fa-3x" style="color: white;"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12" align="center">
                    <a href="index.php" style="color: white;" class="user">LSTN</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12" align="center">
                    <p style="color: white; margin-bottom:50px;">
                        Musics for everyone <br> Millions of songs you can find here!
                    </p>
                </div>
            </div>


        </div>

    </header>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-8" style="bottom: 0;">
                <form style="background-color: white; ">
                    <br>
                    <br>
                    <div class="row">

                        <div class="col-1">
                        </div>
                        <div class="col-3">
                            <img src="<?php echo $coverXlCollection[0];?>" width="160px" height="160px" alt="Album">
                        </div>
                        <div class="col-8">
                            <table class="table" style="width:90%; margin-top:auto;">
                                <tr>
                                    <td style="font-weight: bold;" colspan="3">
                                        <?php echo strtoupper("".$artist." - ".$song."");?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;" colspan="2">Title
                                    </td>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;">:
                                        <?php echo $songtitle[0]; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;" colspan="2">Album
                                    </td>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;">:
                                        <?php echo $albumtitle[0]; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;" colspan="2">Artist
                                    </td>
                                    <td style="text-align: left; font-weight: bold; font-size: 10pt;">:
                                        <?php 
                                        echo $artistname[0]; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-12" style="text-align: center">
                            <h6 style="margin-top: 10px; font-weight: bold;">LYRICS</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-6" style="text-align: justify; margin-top:20px;">
                            <?php
                                if(get_http_response_code("https://api.lyrics.ovh/v1/".$newartist."/".$newsong) != "200"){
                                echo "We're sorry,, we've no idea!!<br> no lyrics found...<br>";
                                echo "or maybe you type the artist/song wrong :(";
                                }else{
                                $panjang = count($phrases); 
                                for ($x = 0; $x <= $panjang-1; $x++) {
                                    echo $phrases[$x];
                                    ?>
                                        <br>
                                        <?php    
                                }
                            }
                             ?>
                        </div>
                    </div>

                    <hr>

                </form>


            </div>
            <div class="col-4">
                <div class="row">
                    <form align="center" style="background-color: white; width: 100%;" method="post">
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h6 style="margin-top: 20px; font-weight: bold;">SEARCH</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input
                                    style="width: 250px; text-align: center; height: 25px; margin-top:20px; font-size: 10pt;"
                                    type="text" name="artist" placeholder="Artist/Band" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input style="width: 250px; text-align: center; height:25px; font-size: 10pt;"
                                    type="text" name="song" placeholder="Song Title" required>
                            </div>
                        </div>
                        <input
                            style="border: solid 1px rgb(255, 255, 255); font-size: 10pt; width: 250px; text-align: center; height:30px; color: white; background-color: #1db954; margin-bottom:40px;"
                            type="submit" name="submit" value="Search Song" />
                    </form>
                </div>

                <div class="row">
                    <form style="background-color: white; margin-top: 20px; width: 100%;">
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h6 style="margin-top: 20px; font-weight: bold;">LISTEN NOW</h6>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12" align="center" style=" margin-top: 20px;">
                                <?php
                                    foreach($videoList->items as $item){
                                    //Embed video
                                    if(isset($item->id->videoId)){
                                        echo '<div>
                                                <iframe width="250" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                                                <div class="col-10">
                                                <h6>'. $item->snippet->title .'</h6>
                                                </div>
                                            </div>';
                                    }
                                }
                                    ?>
                            </div>
                        </div>
                
                </form>
                </div>

                <div class="row">
                    <form align="center" style="margin-top:20px; background-color: white; width: 100%;" method="post">
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h6 style="margin-top: 20px; font-weight: bold;">ABOUT ARTIST</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <img style="border-radius:50%" width="80" height="80" src="<?php echo $artistpic[0];?>"
                                    alt="<?php echo $artistname[0];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h6 style="margin-top: 20px; font-weight: bold;"><?php echo $artistname[0];?></h6>
                                <h6>the most popular songs</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10" style="margin-left: 40px;">
                                <table class="table" style="width:100%;">
                                    <?php
                            for ($x = 0; $x <= 4;) {
                            ?>
                                    <tr>
                                        <td style="text-align: left; font-size: 10pt;">
                                            <?php echo $tracklist[$x]; $x++ ?></td>
                                        <td style="text-align: left; font-size: 10pt;"><?php echo $tracklist[$x]; $x++?>
                                        </td>
                                    </tr>
                                    <?php    
                        }
                        ?>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>