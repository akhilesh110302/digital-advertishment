<?php
include('header.php');
include('conn.php');

if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] != '1') {
    header('location:news.php');
    die();
}

$qr = "select * from posts where id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $qr);
$row = mysqli_fetch_assoc($result);

// Check if form was submitted
if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {

        $qr = "update posts set name='" . $_POST['name'] . "' where id=" . $_GET['id'] . "";
        $result = mysqli_query($conn, $qr);

        header("location:post.php");
    }
}
?>
<html>

<head>

    <!-- <link rel="stylesheet" href="loginform.css"> -->
    <style>
        .container {
            border: 2px solid #ccc;
            width: 300px;
            height: 100px;
            overflow-y: scroll;
        }

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
            border: 2px solid #9400d3;
            background: white;
            color: darkviolet;
        }

        .about-btn:hover {
            background: black;

        }

        #dataTable {
            background-color: #fff;
        }

        .img1 {
            vertical-align: super;
            border-style: none;
            margin-left: 154px;
        }

        .img2 {
            vertical-align: super;
            border-style: none;
            margin-left: 171px;
        }

        h2 {
            margin-left: 186px;
        }

        .p1 {
            margin-left: 76px;
        }

        .p2 {
            margin-left: 148px;
        }

        .img11 {
            vertical-align: super;
            border-style: none;
            margin-left: 225px;

        }

        .img21 {
            vertical-align: super;
            border-style: none;
            margin-left: 247px;

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
        <form method="POST" enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header">
                    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            
                    Post
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2">

                                <h3 class="foc1">
                                    What is your Post Name?<span class="red">*</span><br />
                                    <input type="text" size="50px" name="name" required value="<?php echo $row['name']; ?>" />
                                </h3>

                                   
                                </td>
                            </tr>
                            <tr>

                                <?php if ($row['type'] == 'image') {  ?>
                                    <td colspan="2">
                                    <h3 class="foc1">
                                   Uploaded Image
                                </h3>
                                        <img style="width: 525px;" src="<?php echo 'uploads/' . $row['path'];  ?>" alt="<?php echo $row['name'];  ?>">


                                    </td>
                                <?php
                                }
                                ?>
                                <?php

                                if ($row['type'] == 'video') {  ?>
                                    <td colspan="2">
                                    <h3 class="foc1">
                                   Uploaded Video
                                </h3>
                                        <video width="525" controls muted>
                                            <source src="<?php echo 'uploads/' . $row['path'];  ?>" type="video/mp4">
                                        </video>
                                    </td>
                                <?php
                                }
                                ?>

                            </tr>
                            <!-- <tr>
                                <td>
                                    <img src="img1.png" alt="img" class="img1">

                                    <h2>Single Image</h2>
                                    <p class="p1">Create upto 6 ads with one image each at no extra charge</p>
                                    <input type="file" name="files[]" class="img11" onchange="Filevalidation()" />

                                    <?php
                                    if ($uploadImageError != "") {
                                    ?>
                                        <div style="color:red;">
                                            <?php echo $uploadImageError; ?>
                                        </div>
                                    <?php }
                                    ?>

                                    <?php
                                    if ($uploadImageSuccess != "") {
                                    ?>
                                        <div style="color:green;">
                                            <?php echo $uploadImageSuccess; ?>
                                        </div>
                                    <?php }
                                    ?>

                                </td>
                                <td>
                                    <img src="video4.png" alt="video" class="img2">



                                    <h2>Slide Show / Video</h2>
                                    <p class="p2">Create a looping video ad with up to 10 images</p>
                                    <input type="file" name="video[]" class="img21" onchange="Filevalidation()" />


                                    <?php
                                    if ($uploadVideoError != "") {
                                    ?>
                                        <div style="color:red;">
                                            <?php echo $uploadVideoError; ?>
                                        </div>
                                    <?php }
                                    ?>

                                    <?php
                                    if ($uploadVideoSuccess != "") {
                                    ?>
                                        <div style="color:green;">
                                            <?php echo $uploadVideoSuccess; ?>
                                        </div>
                                    <?php }
                                    ?>

                                </td>
                            </tr> -->

                            <!-- <tr>
                                <td>
                                    <img src="img1.png" alt="img" class="img1">

                                    <h2>Single Image</h2>
                                    <p class="p1">Create upto 6 ads with one image each at no extra charge</p>
                                    <input type="file" name="files[]" class="img11" onchange="Filevalidation()" />
                                </td>
                                <td>
                                    <img src="video4.png" alt="video" class="img2">



                                    <h2>Slide Show / Video</h2>
                                    <p class="p2">Create a looping video ad with up to 10 images</p>

                                    <input type="file" name="files[]" class="img21" onchange="Filevalidation()" />

                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- <input type="submit" name="submit" class="about-btn" value="Upload"> -->
            <button class="about-btn" name="submit">Update</button>
    </div>
    </div>
    </form>
    <script>
        Filevalidation = () => {
            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {

                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 4096) {
                        alert(
                            "File too Big, please select a file less than 4mb");
                    } else if (file < 2048) {
                        alert(
                            "File too small, please select a file greater than 2mb");
                    } else {
                        document.getElementById('size').innerHTML = '<b>' +
                            file + '</b> KB';
                    }
                }
            }
        }
    </script>
</body>

</html>