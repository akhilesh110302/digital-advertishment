<?php
include('header.php');

include 'conn.php';

$posts="";

$qr="select * from playlists";
$postResult = mysqli_query($conn,$qr);	
if ($postResult->num_rows > 0) {
    $posts=true;
}
else
{
    $posts=false;
}


$qr = "select * from ads where id='" . $_GET['id'] . "'";
$playlistResult = mysqli_query($conn, $qr);
$row = mysqli_fetch_assoc($playlistResult);

$row['posts1']= explode(",",$row['playlists']) ;

if (isset($_POST['submit'])) {
if (isset($_POST['name']) && isset($_POST['playlists'])) {
    
        $query = "insert into ads(name,playlists,userId) values('" . $_POST['name'] . "','" . $_POST['playlists'] . "','" . $_SESSION['USER_ID'] . "')";
        $result = mysqli_query($conn, $query);
   
    header("location:ads.php");
}
}

?>
<html>

<head>
    <style>
        .containerr {
            border: 2px solid #ccc;
            width: 100%;
            height: 300px;
            margin: 0 ;
            overflow-y: scroll;
           
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

        /* input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        } */

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
		color: white;

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

    </style>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="card mb-3">
                <div class="card-header">
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                    Ads
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    

                                    <h3 class="foc1">
                                    What is your Ad Name?<span class="red">*</span><br />
                                    <input type="text" size="50px" name="name" required value="<?php echo $row['name']; ?>" />
                                </h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                <h3 class="foc1">
                                    Select Playlist
                                </h3>         
                                <input type="hidden" id='playlists' name="playlists"></div>
 
                                <?php
                                if($posts==true)
                                {

                                    ?>
                                  
                                                            <?php
                                    	foreach($postResult as $row1) {

                                          
                                            
                                           
				   ?>
                              <tr> 
                              <td>
                              <input type="checkbox" <?php echo ((in_array($row1['id'], $row['posts1']))) ? "checked":"" ?> value="<?php echo $row1['id']; ?>"  onchange="addToList(this, <?php echo $row1['id']; ?>)">
                                </td>
                                  <td>

                                  <?php echo $row1['name']; ?>
                              
            </td>
        </tr>
              

        <?php
         

         
}?> 

<?php
                                }
if($posts==false)
{?>
<div>
No playlist found

</div>
<?php	
}
?></td>

</tr>
                               
                        </tbody>
                    </table>
                </div>
                <button class="about-btnn" name="submit">Create</button>
            </form>


    </div>
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
    document.getElementById("playlists").value = posts;

 return;
}
</script>
