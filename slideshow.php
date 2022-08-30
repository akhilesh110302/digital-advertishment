<?php
include 'conn.php';


$postsShow=[];
$ads="select playlists from ads where id=".$_GET['id'];
$adsData = mysqli_query($conn,$ads);	
if ($adsData->num_rows > 0) {
    
    foreach($adsData as $row) {

        if (isset($row['playlists'])) {

            $playlists1= explode(",",$row['playlists']) ;
            if (count($playlists1)>0) {

                foreach($playlists1 as $playlist) {
                    $playlists="select posts from playlists where id=".$playlist;
                    $playlistsData = mysqli_query($conn,$playlists);	
                    if ($playlistsData->num_rows > 0) {

                        foreach($playlistsData as $row) {

                            if (isset($row['posts'])) {
                    
                                $postss= explode(",",$row['posts']) ;
                                if (count($postss)>0) {
                                    foreach($postss as $post) {

                                        $posts="select path,type from posts where id=".$post;
                                        $postsData = mysqli_query($conn,$posts);	
                                        $row = mysqli_fetch_assoc($postsData);
                                        array_push($postsShow,$row);
                                    }

                                }
                            }
                        }
                    
                    }
                }

            }

        }

    }
}
?>


<html>
	<head>
	<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
	</head>
	<body>




<div class="slideshow-container">
<?php
foreach($postsShow as $single)
{
    if ($single['type']=="image") {
?>
        <div class="mySlides fade">
        <img src="<?php echo './uploads/'.$single['path']; ?>" style="width:1000px">
        </div>
<?php
    }
    if ($single['type']=="video") {
?>
        <div class="mySlides fade">
        <video controls autoplay muted width="1000">
        <source src="<?php echo './uploads/'.$single['path']; ?>" type="video/mp4">
        </video>
        </div>
<?php
    }
}
?>
</div>
	</body>
</html>


<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
 
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 8000); 
}
</script>