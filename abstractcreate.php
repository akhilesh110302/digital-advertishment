<?php include('header.php') ?>
<?php
include 'conn.php';

if (isset($_POST['brandname'])) {
    $bname = $_POST['brandname'];
    $cm = $_POST['company'];
    $Countryy=$_POST['country'];
    $statee=$_POST['state'];
    $cityy=$_POST['city'];
     $areaa=$_POST['area'];
    $cmp = $_POST['companyproduct'];
    $spe = $_POST['special'];
    $pro = $_POST['provide'];
    $obj = $_POST['objectives'];
    $conver = $_POST['Conversion'];
    $rea = $_POST['Reach'];
   $userId= $_SESSION['USER_ID'];
    $sql = "INSERT INTO `abstract`(`brandname`, `provide`, `company`, `companyproduct`, `special`, `objectives`, `Reach`, `Conversion`,`country`, `state`, `city`, `area`,`userId`) VALUES ('$bname','$pro','$cm','$cmp','$spe','$obj','$rea','$conver','$Countryy','$statee','$cityy','$areaa',$userId)";
    $query = mysqli_query($conn, $sql);
    header('location:abstract.php');
}
?>
<style>
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

    select {
        width: 30%;
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

    h3 {
        font-size: 17px;
    }

    
</style>
<form  method="post">
<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            <span style="font-size: 25px; margin-left:0px;"> Abstract</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <h3 class="foc1">
                                    What is your Brand Name?<span class="red">*</span><br />
                                    <input type="text" class="brand-name" size="50px" name="brandname" required />
                                </h3>

                                <h3 class="foc2">
                                    What are you providing?<span class="red">*</span><br /><br />
                                    <input type="radio" name="provide" value="product" checked />Product
                                    <input type="radio" name="provide" value="service" />Service
                                    <input type="radio" name="provide" value="both" />Both
                                </h3>
                                <h3>Provide breif abstarct about your Company.<span class="red">*</span></h3>
                                <textarea name="company" cols="50" rows="5" required></textarea>
                                <h3>Provide breif abstarct about your Product.<span class="red">*</span></h3>
                                <textarea name="companyproduct" cols="50" rows="5" required></textarea>
                                <h3>What is special about you?<span class="red">*</span></h3>
                                <textarea name="special" cols="50" rows="5" required></textarea>

                                <h3>What is your marketing objectives?</h3>
                                <div id="box">
                                    <span id="leftbox">
                                        <h3>Awarenss</h3>

                                        <?php
                                        $objectivesArr = array('Brand Awareness', 'Reach');
                                        ?>
                                        <select name="objectives">
                                            <option>Select objectives</option>
                                            <?php
                                            foreach ($objectivesArr as $list) {
                                                $isSelected = "";
                                                if ($obj == $list) {
                                                    $isSelected = "selected";
                                                }
                                                echo "<option $isSelected>" . $list . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </span>
                                    <span id="middlebox">
                                        <h3>Consideration</h3>

                                        <?php
                                        $reachArr = array('Messages', 'Lead Generation', 'Traffic', 'Engagement', 'App Installs', 'Video views');
                                        ?>
                                        <select name="Reach">
                                            <option>Select Proper Consideration</option>
                                            <?php
                                            foreach ($reachArr as $list) {
                                                $isSelected = "";
                                                if ($rea == $list) {
                                                    $isSelected = "selected";
                                                }
                                                echo "<option $isSelected>" . $list . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </span>
                                    <span id="rightbox">
                                        <h3>Conversion</h3>
                                        <?php
                                        $ConversionArr = array('Catalog sales', 'Store visits');
                                        ?>
                                        <select name="Conversion">
                                            <option>Select Proper Conversion</option>
                                            <?php
                                            foreach ($ConversionArr as $list) {
                                                $isSelected = "";
                                                if ($conver == $list) {
                                                    $isSelected = "selected";
                                                }
                                                echo "<option $isSelected>" . $list . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </span>
                                </div>
                                <br>
                                <h3>
                                    Location<span class="red">*</span>
                                </h3>
                                <?php
                                $CountryArr = array('india');
                                ?>
                                <select name="country">
                                    <option>Select Country</option>
                                    <?php
                                    foreach ($CountryArr as $list) {
                                        $isSelected = "";
                                        if ($country == $list) {
                                            $isSelected = "selected";
                                        }
                                        echo "<option $isSelected>" . $list . "</option>";
                                    }
                                    ?>
                                </select>
                                <?php
                                $StateArr = array('Gujarat');
                                ?>
                                <select name="state">
                                    <option>Select State</option>
                                    <?php
                                    foreach ($StateArr as $list) {
                                        $isSelected = "";
                                        if ($state == $list) {
                                            $isSelected = "selected";
                                        }
                                        echo "<option $isSelected>" . $list . "</option>";
                                    }
                                    ?>
                                </select> <br>
                                <?php
                                $cityArr = array('surat');
                                ?>
                                <select name="city">
                                    <option>Select City</option>
                                    <?php
                                    foreach ($cityArr as $list) {
                                        $isSelected = "";
                                        if ($city == $list) {
                                            $isSelected = "selected";
                                        }
                                        echo "<option $isSelected>" . $list . "</option>";
                                    }
                                    ?>
                                </select>
                                <?php
                                $areaArr = array('Adajan', 'Katargam', 'Dumas', 'Bhatar', 'Piplod');
                                ?>
                                <select name="area">
                                    <option>Select Area</option>
                                    <?php
                                    foreach ($areaArr as $list) {
                                        $isSelected = "";
                                        if ($area == $list) {
                                            $isSelected = "selected";
                                        }
                                        echo "<option $isSelected>" . $list . "</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <a href="audience.php"> <button class="about-btnn" name="submit">Submit</button>
                                </a>
                            </td></tr></tbody></table></div></div></div></div></form>