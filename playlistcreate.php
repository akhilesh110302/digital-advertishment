<?php
include('header.php');
include('conn.php');
$posts="";

$qr="select * from posts";
$postResult = mysqli_query($conn,$qr);	
if ($postResult->num_rows > 0) {
	$posts=true;
}
else
{
	$posts=false;
}
if (isset($_POST['submit'])) {
if (isset($_POST['name']) && isset($_POST['posts'])) {
    
        $query = "insert into playlists(name,posts,userId) values('" . $_POST['name'] . "','" . $_POST['posts'] . "','" . $_SESSION['USER_ID'] . "')";
        $result = mysqli_query($conn, $query);
   
    header("location:playlist.php");
}
}

?>
<html>

<head>
    <style>
        .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll;
        }
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: none;
            padding: 20px;
           
        }
        


	
	.about-btnn {
		font-family: "Raleway", sans-serif;
		font-weight: 500;
		font-size: 14px;
		letter-spacing: 1px;
		display: inline-block;
		padding: 12px 32px;
		border-radius: 50px;
		transition: 0.5s;
		line-height: 1;
		margin: 10px;
		color: #fff;
		-webkit-animation-delay: 0.8s;
		animation-delay: 0.8s;
		border: 2px solid darkviolet;
		background: none;
		color: black;
		text-decoration: none;
	}

	.about-btnn:hover {
		background: darkviolet;
		color: black;

	}

    
    input[type=text],
textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    h3 {
        font-size: 17px;
    }

    .img-div{position:relative; display: inline-block;border: 1px solid #2125294a;}
    </style>


</head>

<body>
    <div class="container-fluid">
    <form method="POST">

        <div class="card mb-3">
            <div class="card-header"><script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                Playlist
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                        <tr>
                                <td colspan="2">
                                <h3 class="foc1">
                                    What is your Playlist Name?<span class="red">*</span><br />
                                    <input type="text" size="50px" name="name" required />
                                </h3>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                <h3 class="foc1">Select posts</h3>
                                <input type="hidden" id='posts' name="posts"></div>
                                <?php
                                if($posts==true)
                                {

                                    ?>
                                  
                                                            <?php
                                    	foreach($postResult as $row) {

                                          
                                            
                                           
				   ?>
                              <tr> 
                              <td>
                                  <input type="checkbox" value="<?php echo $row['id']; ?>"  onchange="addToList(this, <?php echo $row['id']; ?>)"></td>
                                  <td>

                                 
                                   <div class="img-div">
    
<?php   if ($row['type']=="image") { ?>

                    <img width="150" height="150" id=" <?php echo $row['id']; ?>" src="<?php echo 'uploads/'.$row['path'];  ?>" alt="<?php echo $row['name'];  ?>"/>
<?php  } if ($row['type']=="video") { ?>



<video width="150" height="150" id=" <?php echo $row['id']; ?>" src="<?php echo 'uploads/'.$row['path'];  ?>" alt="<?php echo $row['name'];  ?>" />
<?php  } ?>

                </div>   
            </td>
        </tr>
              

        <?php
         

         
}?>

<?php
                                }
if($posts==false)
{?>
<div>
No post found

</div>
<?php	
}
?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        <button class="about-btnn" name="submit">Create Playlist</button>
</form>
</div>

</body>

</html>


<script>
        var posts=[];

function addToList(checkbox,id) {
    if(checkbox.checked == true){
        posts.push(id);

    }
    else
    {
        posts.pop(id);

    }

    console.log(posts);
    document.getElementById("posts").value = posts;

 return;
}
</script>
