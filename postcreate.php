<?php
include('header.php');

include('conn.php');

if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] != '1') {
    header('location:news.php');
    die();
}
$uploadImageError="";
$uploadImageSuccess="";
$uploadVideoError="";
$uploadVideoSuccess="";
$imagePath="";
$videoPath='';
$imageType='';
$videoType='';
if (isset($_POST['submit'])) {

    if (!empty(array_filter($_FILES['files']['name']))) {
        // Configure upload directory and allowed file types
        $upload_dir = 'uploads' . DIRECTORY_SEPARATOR;
        $allowed_types = array('jpg', 'png', 'jpeg', 'gif');

        // Define maxsize for files i.e 2MB
        $maxsize = 2 * 1024 * 1024;

        // Checks if user sent an empty form
        if (!empty(array_filter($_FILES['files']['name']))) {

            // Loop through each file in files[] array
            foreach ($_FILES['files']['tmp_name'] as $key => $value) {

                $file_tmpname = $_FILES['files']['tmp_name'][$key];
                $file_name = $_FILES['files']['name'][$key];
                $file_size = $_FILES['files']['size'][$key];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                // Set upload file path
                $filepath = $upload_dir . $file_name;

                // Check file type is allowed or not
                if (in_array(strtolower($file_ext), $allowed_types)) {

                    // Verify file size - 2MB max
                    if ($file_size > $maxsize)
                        $uploadImageError = "Error: File size is larger than the allowed limit.";

                    // If file with name already exist then append time in
                    // front of name of the file to avoid overwriting of file
                    if (file_exists($filepath)) {
                        $filepath = $upload_dir . time() . $file_name;

                        if (move_uploaded_file($file_tmpname, $filepath)) {
                            $uploadImageSuccess = "Successfully uploaded <br />";
                            $imagePath = $file_name;
                            $imageType = $file_ext;
                        } else {
                            $uploadImageError = "Error uploading {$file_name} <br />";
                        }
                    } else {

                        if (move_uploaded_file($file_tmpname, $filepath)) {
                            $uploadImageSuccess = "Successfully uploaded <br />";
                            $imagePath = $file_name;
                            $imageType = $file_ext;
                        } else {
                            $uploadImageError = "Error uploading {$file_name} <br />";
                        }
                    }
                } else {
                    // If file extension not valid
                    $uploadImageError = "Error uploading {$file_name} " . "({$file_ext} file type is not allowed)<br / >";
                }
            }
        } else {
            // If no files selected
            $uploadImageError =  "No files selected.";
        }
    }


    if (!empty(array_filter($_FILES['video']['name']))) {
        // Configure upload directory and allowed file types
        $upload_dir = 'uploads' . DIRECTORY_SEPARATOR;
        $allowed_types = array('mp4', 'mov', 'mkv');

        // Define maxsize for files i.e 5MB
        $maxsize = 5 * 1024 * 1024;

        // Checks if user sent an empty form
        if (!empty(array_filter($_FILES['video']['name']))) {

            // Loop through each file in files[] array
            foreach ($_FILES['video']['tmp_name'] as $key => $value) {

                $file_tmpname = $_FILES['video']['tmp_name'][$key];
                $file_name = $_FILES['video']['name'][$key];
                $file_size = $_FILES['video']['size'][$key];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                // Set upload file path
                $filepath = $upload_dir . $file_name;

                // Check file type is allowed or not
                if (in_array(strtolower($file_ext), $allowed_types)) {

                    // Verify file size - 2MB max
                    if ($file_size > $maxsize)
                        $uploadVideoError = "Error: File size is larger than the allowed limit.";

                    // If file with name already exist then append time in
                    // front of name of the file to avoid overwriting of file
                    if (file_exists($filepath)) {
                        $filepath = $upload_dir . time() . $file_name;

                        if (move_uploaded_file($file_tmpname, $filepath)) {
                            $uploadVideoSuccess = "Successfully uploaded <br />";
                            $videoPath = $file_name;
                            $videoType = 'video/' . $file_ext;
                        } else {
                            $uploadVideoError = "Error uploading {$file_name} <br />";
                        }
                    } else {

                        if (move_uploaded_file($file_tmpname, $filepath)) {
                            $uploadVideoSuccess = "Successfully uploaded <br />";
                            $videoType = 'video/' . $file_ext;
                        } else {
                            $uploadVideoError = "Error uploading {$file_name} <br />";
                        }
                    }
                } else {
                    // If file extension not valid
                    $uploadVideoError = "Error uploading {$file_name} " . "({$file_ext} file type is not allowed)<br / >";
                }
            }
        } else {
            // If no files selected
            $uploadVideoError =  "No file selected.";
        }
    }

    if (isset($_POST['name']) && ($imagePath != "" || $videoPath != "")) {
        if ($imagePath != "") {

            $query = "insert into posts(name,extension,type,path,userId) values('" . $_POST['name'] . "','" . $imageType . "','image','" . $imagePath . "','" . $_SESSION['USER_ID'] . "')";
            $result = mysqli_query($conn, $query);
        }
        if ($videoPath != "") {
            $query = "insert into posts(name,extension,type,path,userId) values('" . $_POST['name'] . "','" . $videoType . "','video','" . $videoPath . "','" . $_SESSION['USER_ID'] . "')";
            $result = mysqli_query($conn, $query);
        }

        header("location:post.php");
    }
}
?>
<html>
<head>
    <style>
        .container {
            border: 2px solid #ccc;
            width: 300px;
            height: 100px;
            overflow-y: scroll;
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
                                    <input type="text" size="50px" name="name" required />
                                </h3>
                                </td>
                            </tr>
                            <tr>
                              
                                <td><h3 class="foc1">
                                Upload Image
                            </h3>
                              
                                    <img src="./images/img1.png" alt="img" class="img1">

                                    <h2 style="font-size: 30px;">Single Image</h2>
                                   
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

                               <h3 class="foc1">
                                Upload Video
                            </h3>
                                    <img src="./images/video4.png" alt="video" class="img2">



                                    <h2  style="font-size: 30px;">Slide Show / Video</h2>
                                
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
                            </tr>

                                            </tbody>
                    </table>
                </div>
            </div>

            <!-- <input type="submit" name="submit" class="about-btn" value="Upload"> -->
            <button class="about-btn" name="submit">Upload</button>
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