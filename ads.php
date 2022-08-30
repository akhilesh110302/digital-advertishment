<?php include('header.php');

include('conn.php');
$ads="";

$qr="select * from ads where userId=".$_SESSION['USER_ID']." ORDER BY createAt DESC";
$result = mysqli_query($conn,$qr);	
if ($result->num_rows > 0) {
	$ads=true;
}
else
{
	$ads=false;
}
?>

<style>
	
.noDataFound{
  font-size: 20px;
    font-weight: 500;
    margin: auto;
    padding: 10px;
}
            .container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll;}
       
			.about-btn {
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

	.about-btn:hover {
		background: darkviolet;
		color: whitesmoke;

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
		background: darkviolet;
		color: white;
		text-decoration: none;
	}

	.about-btnn:hover {
		background: none;
		color: black;

	}
	.noDataFound{
  font-size: 20px;
    font-weight: 500;
    margin: auto;
    padding: 10px;
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
	

<div class="container-fluid">
   <div class="card mb-3">
	  <div class="card-header">
	  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

		 <span style="font-size: 25px; margin-left:0px;">Ads</span>  
		 <a href="adscreate.php" style="text-decoration: none;"> <button style="float:right; " class="about-btnn">Insert</button></a>
	  </div>
	  <?php
		if ($ads == true) { ?>

	  <div class="card-body">
		 <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			  
			  
			   <tbody>
			   <?php
							foreach ($result as $row) {

							?>

			   <tr>
			   <td style="font-size: 30px;
    text-transform: capitalize;"><?php echo $row['name'] ?></td>

							<td style="width: 100px;">
							<a href="delete.php?table=ads&returnUrl=ads.php&id=<?php echo $row['id']; ?>" style="color: black;
		text-decoration: none;"> <button class="about-btn">Delete</button></a></td>
							<td style="width: 100px;"><button class="about-btn"><a href="adsupdate.php?action=update&id=<?php echo $row['id']; ?>" style=" color: black;
		text-decoration: none;">Update</button></a></td>
		<td style="width: 100px;"><button class="about-btn"><a target="_BLANK" href="slideshow.php?id=<?php echo $row['id']; ?>" style=" color: black;
		text-decoration: none;">Preview</button></a></td>
						</tr>
						<?php
							}
							?>
			   </tbody>
			</table>
		 </div>
	  </div>
	  <?php
		}
		if ($ads == false) { ?>
			<div  class="noDataFound">
				No post found

			</div>
		<?php
		}
		?>
   </div>
</div>
