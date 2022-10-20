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
                <h2>Delete Data</h2>
            </div>
            <div class="w3-threequarter">
                <div class="w3-card w3-white">
                    <div class="w3-container">
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Delete"])) {
                                if($_POST['Delete'] == $_SESSION['code']){
                                    $link = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link, "artgallery");
                                    $sql ="DELETE FROM artist ";
                                    $sql.=" WHERE SocSecNo = '".$_POST["SOCSECNO"]."'";
                                    echo "<b>SQL指令: $sql</b><br/>";
                                    mysqli_query($link, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link, $sql) )
                                        echo "資料庫刪除記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link) . "<br/>";
                                    else
                                        die("資料庫刪除記錄失敗<br/>");
                                    mysqli_close($link);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>DELETE ARTIST</h3>
                        <form action="delete.php" method="post">
                        <table border="1">
                        <tr><td>SocSecNo:</td>
                            <td><input type="text" name="SOCSECNO" size ="25"/></td> 
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Delete"
                            <?php
                                session_start();
                                $code = mt_rand(0,1000000);
                                $_SESSION['code'] = $code;
                            ?>
                            value="<?=$code?>"/>
                        <input type="submit">
                        </form>
                        <?php
                            echo "---------------------------------------------------------------------------------------------------------------------------------";
                        ?>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Delete2"])) {
                                if($_POST['Delete2'] == $_SESSION['code2']){
                                    $link2 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link2, "artgallery");
                                    $sql2 ="DELETE FROM customer ";
                                    $sql2.=" WHERE Cust_Name = '".$_POST["CUSTNAME"]."'";
                                    echo "<b>SQL指令: $sql2</b><br/>";
                                    mysqli_query($link2, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link2, $sql2) )
                                        echo "資料庫刪除記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link2) . "<br/>";
                                    else
                                        die("資料庫刪除記錄失敗<br/>");
                                    mysqli_close($link2);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>DELETE CUSTOMER</h3>
                        <form action="delete.php" method="post">
                        <table border="1">
                        <tr><td>Customer Name:</td>
                            <td><input type="text" name="CUSTNAME" size ="25"/></td> 
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Delete2"
                            <?php
                                session_start();
                                $code2 = mt_rand(0,1000000);
                                $_SESSION['code2'] = $code2;
                            ?>
                            value="<?=$code2?>"/>
                        <input type="submit">
                        </form>
                        <?php
                            echo "---------------------------------------------------------------------------------------------------------------------------------";
                        ?>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Delete3"])) {
                                if($_POST['Delete3'] == $_SESSION['code3']){
                                    $link3 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link3, "artgallery");
                                    $sql3 ="DELETE FROM sale ";
                                    $sql3.=" WHERE Title = '".$_POST["TITLE"]."'";
                                    echo "<b>SQL指令: $sql3</b><br/>";
                                    mysqli_query($link3, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link3, $sql3) )
                                        echo "資料庫刪除記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link3) . "<br/>";
                                    else
                                        die("資料庫刪除記錄失敗<br/>");
                                    mysqli_close($link3);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>DELETE SALE</h3>
                        <form action="delete.php" method="post">
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLE" size ="25"/></td> 
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Delete3"
                            <?php
                                session_start();
                                $code3 = mt_rand(0,1000000);
                                $_SESSION['code3'] = $code3;
                            ?>
                            value="<?=$code3?>"/>
                        <input type="submit">
                        </form>
                        <?php
                            echo "---------------------------------------------------------------------------------------------------------------------------------";
                        ?>
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Delete4"])) {
                                if($_POST['Delete4'] == $_SESSION['code4']){
                                    $link4 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link4, "artgallery");
                                    $sql4 ="DELETE FROM unsold_work ";
                                    $sql4.=" WHERE Title = '".$_POST["TITLE"]."'";
                                    echo "<b>SQL指令: $sql4</b><br/>";
                                    mysqli_query($link4, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link4, $sql4) )
                                        echo "資料庫刪除記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link4) . "<br/>";
                                    else
                                        die("資料庫刪除記錄失敗<br/>");
                                    mysqli_close($link4);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>DELETE UNSOLD WORK</h3>
                        <form action="delete.php" method="post">
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLE" size ="25"/></td> 
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Delete4"
                            <?php
                                session_start();
                                $code4 = mt_rand(0,1000000);
                                $_SESSION['code4'] = $code4;
                            ?>
                            value="<?=$code4?>"/>
                        <input type="submit">
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