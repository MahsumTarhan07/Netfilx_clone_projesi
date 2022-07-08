<?php
@session_start();
@ob_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yakın Zamanda Gelecekler</title>
    <link rel="stylesheet" href="profilim.css">
    <link rel="stylesheet" href="anastyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="all.min.css">
    <script src="script.js"></script>
    <script src="appJs/app.js"></script>

    <style>
          .name{
            font-size:17px;
            color:#fff;
            margin:15px;
        }
    </style>
    
   
</head>
<body>
    <div id="menuKapsama">

            <div class="netflix">
                <a href="anasayfa.php">NETFLİX</a>
            </div>
            <div class="menu">
                <a href="anasayfa.php">Anasayfa</a>
                <a href="dizi.php">Diziler</a>
                <a href="film.php">Film</a>
                <a href="yakin-zamanda-eklenenler.php">Yakın Zamanda Ekleneler</a>
                <a href="#">Listem</a>
                <input type="text" name="search"> <button name="search_go"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="profilim">
                        <a href="#"><i class="fa-solid fa-bell"></i></a>
                    </div>
                    <a href="">
                         <i class="fa-solid fa-bell-plus"></i>
                    </a>
                    <div class="profilim">
                        <a href="profilim.php">
                        <i class="fa-solid fa-user"></i> 
                      </a>
                    </div> 
                    <a href="cikis.php" <?php echo"onclick(cikisyapıldı)"; ?>>
                    <i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
        
    </div>
    
    <!--Kullanici Session İşlemleri -->
     <!--  <div class="name">Kullanici ID Değeriniz <?php   /* echo $_SESSION['user_id']; */?> </div> -->
    <div class="kullanici_name">Merhabalar  <?php 
        if(isset($_SESSION["user_name"])){
            echo  $_SESSION['user_name'] . " Hosgeldiniz";
        }else{
            echo "";
        }
    ?> 
    </div>

    

    
    <!--Anasayfa Filmleri Olacak-->
    <!--Veritabanında Cekilcek Aksiyon Filimleri-->

    <div class="name"><a href="yakin-zamanda-eklenenler.php">Yakin Zamanda Eklenecekler </a></div>
        <?php
            $fragman = $db->query("SELECT * FROM yakın_zamanda_gelecek_filmler ORDER BY id ASC LIMIT 10 ", PDO::FETCH_ASSOC);
            foreach($fragman as $fragman_getir){
        ?>
                    <div class="aksiyon_alanı">
                        <div class="kapsam">
                            <div class="macera_film_alani">
                            <?php  echo "<a href='film.php?id=".$fragman_getir["id"]."'>" . $fragman_getir['video'] ;"</a><br>"; ?> 
                            <div class="socaial_icon"><i class="fa-regular fa-thumbs-up"></i> <button class="socaial_icons"><i class="fa-solid fa-bookmark"></i></button> </div>
                            </div>
                        </div> 
                    </div>
            </div>
        <?php
            }
        ?>

            
            <?php
            include("macerafilm.php");
            foreach($maceraveri as $macera){
            ?>

            <div class="top_kapsama">
                        <div class="macera_top">
                        <div class="">
                            <div class="macera_alanı">
                                <div class="bosluk"></div>
                            <?php  echo "<a href='film.php?id=".$macera["id"]."'>" . $macera['video'] ;"</a><br>"; ?> 
                            <div class="socaial_icon"><i class="fa-regular fa-thumbs-up"></i> <button class="socaial_icons"><i class="fa-solid fa-bookmark"></i></button> </div>
                            </div>
                        </div> 
                    </div>
            </div>
            <?php
            }
        ?>
</body>
</html>