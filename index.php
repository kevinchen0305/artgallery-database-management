<!DOCTYPE html>
<html>
    <head>
        <title>Art Gallery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="myPage">
<!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
                <a href="list/artistlist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Artist</a>
                <a href="list/worklist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
                <a href="list/salelist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sale</a>
                <a href="list/customerlist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Customer</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Operation <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="insert.php#gallerydb" class="w3-bar-item w3-button">Insert</a>
                        <a href="delete.php#gallerydb" class="w3-bar-item w3-button">Delete</a>
                        <a href="update.php#gallerydb" class="w3-bar-item w3-button">Update</a>
                    </div>
                </div>
            </div>
        </div>

<!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img src="image/artgallery.jpg" alt="art" style="width:100%;min-height:350px;max-height:150px;">
        </div>

<!-- Work Row -->
        <div class="w3-row-padding w3-padding-64 w3-theme-l1" id="gallerydb">
            <div class="w3-quarter">
                <h2>Art Gallery Database Management System</h2>
            </div>
            <div class="w3-threequarter">
                <div class="w3-card w3-white">
                    <div class="w3-container">
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            $msg = "";
                            if(isset($_POST['upload'])){
                                if($_POST['upload'] == $_SESSION['code']){
                                    $filename = $_FILES["uploadfile"]["name"];
                                    $tempname = $_FILES["uploadfile"]["tmp_name"];   
                                    $folder = "dbimage/".$filename;
                                    $db = mysqli_connect("localhost", "root", "12345678", "artgallery");
                                    $sql = "INSERT INTO artistimage (filename) VALUES ('$filename')";
                                    mysqli_query($db, $sql);
                                    if(move_uploaded_file($tempname, $folder)){
                                        $msg = "Image uploaded successfully";
                                    }else{
                                        $msg = "Failed to upload image";
                                    }
                                }else{
                                    echo "請不要重新整理本頁面或重複提交表單!";
                                }
                            }
                            $result = mysqli_query($db, "SELECT * FROM artistimage");
                        ?>
                        <h3>ARTIST IMAGE UPLOAD</h3>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="uploadfile" value="" />
                            <div>
                                <button type="submit" name="upload"
                                    <?php
                                        session_start();
                                        $code = mt_rand(0,1000000);
                                        $_SESSION['code'] = $code;
                                    ?>
                                value="<?=$code?>">UPLOAD</button>    
                            </div>
                        </form>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            $msg2 = "";
                            if(isset($_POST['upload2'])){
                                if($_POST['upload2'] == $_SESSION['code2']){
                                    $filename2 = $_FILES["uploadfile2"]["name"];
                                    $tempname2 = $_FILES["uploadfile2"]["tmp_name"];   
                                    $folder2 = "customerimage/".$filename2;
                                    $db2 = mysqli_connect("localhost", "root", "12345678", "artgallery");
                                    $sql2 = "INSERT INTO customerimage (filename) VALUES ('$filename2')";
                                    mysqli_query($db2, $sql2);
                                    if(move_uploaded_file($tempname2, $folder2)){
                                        $msg2 = "Image uploaded successfully";
                                    }else{
                                        $msg2 = "Failed to upload image";
                                    }
                                }else{
                                    echo "請不要重新整理本頁面或重複提交表單!";
                                }
                            }
                            $result2 = mysqli_query($db2, "SELECT * FROM customerimage");
                        ?>
                        <h3>CUSTOMER IMAGE UPLOAD</h3>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="uploadfile2" value="" />
                            <div>
                                <button type="submit" name="upload2"
                                    <?php
                                        session_start();
                                        $code2 = mt_rand(0,1000000);
                                        $_SESSION['code2'] = $code2;
                                    ?>
                                value="<?=$code2?>">UPLOAD</button>    
                            </div>
                        </form>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            $msg3= "";
                            if(isset($_POST['upload3'])){
                                if($_POST['upload3'] == $_SESSION['code3']){
                                    $filename3 = $_FILES["uploadfile3"]["name"];
                                    $tempname3 = $_FILES["uploadfile3"]["tmp_name"];   
                                    $folder3 = "workimage/".$filename3;
                                    $db3 = mysqli_connect("localhost", "root", "12345678", "artgallery");
                                    $sql3 = "INSERT INTO workimage (filename) VALUES ('$filename3')";
                                    mysqli_query($db3, $sql3);
                                    if(move_uploaded_file($tempname3, $folder3)){
                                        $msg3 = "Image uploaded successfully";
                                    }else{
                                        $msg3 = "Failed to upload image";
                                    }
                                }else{
                                    echo "請不要重新整理本頁面或重複提交表單!";
                                }
                            }
                            $result3 = mysqli_query($db3, "SELECT * FROM workimage");
                        ?>
                        <h3>WORK IMAGE UPLOAD</h3>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="uploadfile3" value="" />
                            <div>
                                <button type="submit" name="upload3"
                                    <?php
                                        session_start();
                                        $code3 = mt_rand(0,1000000);
                                        $_SESSION['code3'] = $code3;
                                    ?>
                                value="<?=$code3?>">UPLOAD</button>    
                            </div>
                        </form>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            $msg4= "";
                            if(isset($_POST['upload4'])){
                                if($_POST['upload4'] == $_SESSION['code4']){
                                    $filename4 = $_FILES["uploadfile4"]["name"];
                                    $tempname4 = $_FILES["uploadfile4"]["tmp_name"];   
                                    $folder4 = "salespersonimage/".$filename4;
                                    $db4 = mysqli_connect("localhost", "root", "12345678", "artgallery");
                                    $sql4 = "INSERT INTO salespersonimage (filename) VALUES ('$filename4')";
                                    mysqli_query($db4, $sql4);
                                    if(move_uploaded_file($tempname4, $folder4)){
                                        $msg4 = "Image uploaded successfully";
                                    }else{
                                        $msg4 = "Failed to upload image";
                                    }
                                }else{
                                    echo "請不要重新整理本頁面或重複提交表單!";
                                }
                            }
                            $result4 = mysqli_query($db4, "SELECT * FROM salespersonimage");
                        ?>
                        <h3>SALESPERSON IMAGE UPLOAD</h3>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="uploadfile4" value="" />
                            <div>
                                <button type="submit" name="upload4"
                                    <?php
                                        session_start();
                                        $code4 = mt_rand(0,1000000);
                                        $_SESSION['code4'] = $code4;
                                    ?>
                                value="<?=$code4?>">UPLOAD</button>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
        // Script for side navigation
            function w3_open() {
                var x = document.getElementById("mySidebar");
                x.style.width = "300px";
                x.style.paddingTop = "10%";
                x.style.display = "block";
            }

        // Close side navigation
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }

        // Used to toggle the menu on smaller screens when clicking on the menu button
            function openNav() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else { 
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
    </body>
</html>