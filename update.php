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
                <h2>Update Data</h2>
            </div>
            <div class="w3-threequarter">
                <div class="w3-card w3-white">
                    <div class="w3-container">
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Update"])) {
                                if($_POST['Update'] == $_SESSION['code']){
                                    $link = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link, "artgallery");
                                    $sql ="UPDATE artist SET ";
                                    if($_POST['NAME']) $sql.="Name='".$_POST["NAME"]."',";
                                    if($_POST['ADDRESS']) $sql.="Address='".$_POST["ADDRESS"]."',";
                                    if($_POST['PHONE']) $sql.="Phone='".$_POST["PHONE"]."',";
                                    if($_POST['SOCSECNOO']) $sql.="SocSecNo='".$_POST["SOCSECNOO"]."',";
                                    if($_POST['USUALTYPE']) $sql.="UsualType='".$_POST["USUALTYPE"]."',";
                                    if($_POST['USUALMEDIUM']) $sql.="UsualMedium='".$_POST["USUALMEDIUM"]."',";
                                    if($_POST['USUALSTYLE']) $sql.="UsualStyle='".$_POST["USUALSTYLE"]."',";
                                    if($_POST['LASTYEAR']) $sql.="Sales_Last_Year='".$_POST["LASTYEAR"]."',";
                                    if($_POST['THISYEAR']) $sql.="Sales_Year_To_Date='".$_POST["THISYEAR"]."',";
                                    $sql = trim($sql, ',');
                                    $sql.=" WHERE SocSecNo = '".$_POST["SOCSECNO"]."'";
                                    echo "<b>SQL指令: $sql</b><br/>";
                                    mysqli_query($link, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link, $sql) )
                                        echo "資料庫更新記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link) . "<br/>";
                                    else
                                        die("資料庫更新記錄失敗<br/>");
                                    mysqli_close($link);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>UPDATE ARTIST</h3>
                        <form action="update.php" method="post">
                        SocSecNo: <input type="text" name="SOCSECNO" size ="6"/>
                        <table border="1">
                        <tr><td>Name:</td>
                            <td><input type="text" name="NAME" size ="25"/></td>
                        </tr><tr><td>Address:</td>
                            <td><input type="text" name="ADDRESS" size ="25"/></td>
                        </tr><tr><td>Phone:</td>
                            <td><input type="text" name="PHONE" size ="25"/></td>
                        </tr><tr><td>SocSecNo:</td>
                            <td><input type="text" name="SOCSECNOO" size ="25"/></td> 
                        </tr><tr><td>Usual Type:</td>
                            <td><input type="text" name="USUALTYPE" size ="25"/></td>
                        </tr><tr><td>Usual Medium:</td>
                            <td><input type="text" name="USUALMEDIUM" size ="25"/></td>
                        </tr><tr><td>Usual Style:</td>
                            <td><input type="text" name="USUALSTYLE" size ="25"/></td>
                        </tr><tr><td>Sales Last Year:</td>
                            <td><input type="text" name="LASTYEAR" size ="25"/></td>
                        </tr><tr><td>Sales This Year:</td>
                            <td><input type="text" name="THISYEAR" size ="25"/></td>
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Update"
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
                            if (isset($_POST["Update2"])) {
                                if($_POST['Update2'] == $_SESSION['code2']){
                                    $link2 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link2, "artgallery");
                                    $sql2 ="UPDATE customer SET ";
                                    if($_POST['CUSTNAMEE']) $sql2.="Cust_Name='".$_POST["CUSTNAMEE"]."',";
                                    if($_POST['CUSTADDRESS']) $sql2.="Cust_Add='".$_POST["CUSTADDRESS"]."',";
                                    if($_POST['CUSTPHONE']) $sql2.="Cust_Phone='".$_POST["CUSTPHONE"]."',";
                                    if($_POST['AMTLASTYEAR']) $sql2.="Amt_Bought_Last_Year='".$_POST["AMTLASTYEAR"]."',";
                                    if($_POST['AMTTHISYEAR']) $sql2.="Amt_bought_Year_To_Date='".$_POST["AMTTHISYEAR"]."',";
                                    $sql2 = trim($sql2, ',');
                                    $sql2.=" WHERE Cust_Name = '".$_POST["CUSTNAME"]."'";
                                    echo "<b>SQL指令: $sql2</b><br/>";
                                    mysqli_query($link2, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link2, $sql2) )
                                        echo "資料庫更新記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link2) . "<br/>";
                                    else
                                        die("資料庫更新記錄失敗<br/>");
                                    mysqli_close($link2);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>UPDATE CUSTOMER</h3>
                        <form action="update.php" method="post">
                        Customer Name: <input type="text" name="CUSTNAME" size ="6"/>
                        <table border="1">
                        <tr><td>Custoemr Name:</td>
                            <td><input type="text" name="CUSTNAMEE" size ="25"/></td>
                        </tr><tr><td> Custoemr Address:</td>
                            <td><input type="text" name="CUSTADDRESS" size ="25"/></td>
                        </tr><tr><td>Custoemr Phone:</td>
                            <td><input type="text" name="CUSTPHONE" size ="25"/></td>
                        </tr><tr><td>Dollar Amount of Last Year's Purchases:</td>
                            <td><input type="text" name="AMTLASTYEAR" size ="25"/></td> 
                        </tr><tr><td>Dollar Amount of This Year's Purchases:</td>
                            <td><input type="text" name="AMTTHISYEAR" size ="25"/></td>
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Update2"
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
                            if (isset($_POST["Update3"])) {
                                if($_POST['Update3'] == $_SESSION['code3']){
                                    $link3 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link3, "artgallery");
                                    $sql3 ="UPDATE sale SET ";
                                    if($_POST['TITLEE']) $sql3.="Title='".$_POST["TITLEE"]."',";
                                    if($_POST['ARTIST']) $sql3.="Artist='".$_POST["ARTIST"]."',";
                                    if($_POST['CUSTNAME']) $sql3.="Cust_Name='".$_POST["CUSTNAME"]."',";
                                    if($_POST['CUSTADDRESS']) $sql3.="Cust_Add='".$_POST["CUSTADDRESS"]."',";
                                    if($_POST['DATESOLD']) $sql3.="Date_Sold='".$_POST["DATESOLD"]."',";
                                    if($_POST['SALESPERSON']) $sql3.="Salesperson='".$_POST["SALESPERSON"]."',";
                                    if($_POST['SELLINGPRICE']) $sql3.="Selling_Price='".$_POST["SELLINGPRICE"]."',";
                                    $sql3 = trim($sql3, ',');
                                    $sql3.=" WHERE Title = '".$_POST["TITLE"]."'";
                                    echo "<b>SQL指令: $sql3</b><br/>";
                                    mysqli_query($link3, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link3, $sql3) )
                                        echo "資料庫更新記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link3) . "<br/>";
                                    else
                                        die("資料庫更新記錄失敗<br/>");
                                    mysqli_close($link3);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>UPDATE SALE</h3>
                        <form action="update.php" method="post">
                        Title: <input type="text" name="TITLE" size ="6"/>
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLEE" size ="25"/></td>
                        </tr><tr><td>Artist:</td>
                            <td><input type="text" name="ARTIST" size ="25"/></td>
                        </tr><tr><td>Customer Name:</td>
                            <td><input type="text" name="CUSTNAME" size ="25"/></td>
                        </tr><tr><td>Customer Address:</td>
                            <td><input type="text" name="CUSTADDRESS" size ="25"/></td> 
                        </tr><tr><td>Date Sold:</td>
                            <td><input type="text" name="DATESOLD" size ="25"/></td>
                        </tr><tr><td>Salesperson:</td>
                            <td><input type="text" name="SALESPERSON" size ="25"/></td>
                        </tr><tr><td>Selling Price:</td>
                            <td><input type="text" name="SELLINGPRICE" size ="25"/></td>
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Update3"
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
                            if (isset($_POST["Update4"])) {
                                if($_POST['Update4'] == $_SESSION['code4']){
                                    $link4 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link4, "artgallery");
                                    $sql4 ="UPDATE unsold_work SET ";
                                    if($_POST['TITLEEE']) $sql4.="Title='".$_POST["TITLEEE"]."',";
                                    if($_POST['ARTIST']) $sql4.="Artist='".$_POST["ARTIST"]."',";
                                    if($_POST['TYPE']) $sql4.="Type='".$_POST["TYPE"]."',";
                                    if($_POST['MEDIUM']) $sql4.="Medium='".$_POST["MEDIUM"]."',";
                                    if($_POST['STYLE']) $sql4.="Style='".$_POST["STYLE"]."',";
                                    if($_POST['SIZE']) $sql4.="Size='".$_POST["SIZE"]."',";
                                    if($_POST['ASKINGPRICE']) $sql4.="Asking_price='".$_POST["ASKINGPRICE"]."',";
                                    if($_POST['DATESHOW']) $sql4.="Date_Of_Show='".$_POST["DATESHOW"]."',";
                                    $sql4 = trim($sql4, ',');
                                    $sql4.=" WHERE Title = '".$_POST["TITLE"]."'";
                                    echo "<b>SQL指令: $sql4</b><br/>";
                                    mysqli_query($link4, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link4, $sql4) )
                                        echo "資料庫更新記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link4) . "<br/>";
                                    else
                                        die("資料庫更新記錄失敗<br/>");
                                    mysqli_close($link4);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>UPDATE UNSOLD WORK</h3>
                        <form action="update.php" method="post">
                        Title: <input type="text" name="TITLE" size ="6"/>
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLEEE" size ="25"/></td>
                        </tr><tr><td>Artist:</td>
                            <td><input type="text" name="ARTIST" size ="25"/></td>
                        </tr><tr><td>Type:</td>
                            <td><input type="text" name="TYPE" size ="25"/></td>
                        </tr><tr><td>Medium:</td>
                            <td><input type="text" name="MEDIUM" size ="25"/></td> 
                        </tr><tr><td>Style:</td>
                            <td><input type="text" name="STYLE" size ="25"/></td>
                        </tr><tr><td>Size:</td>
                            <td><input type="text" name="SIZE" size ="25"/></td>
                        </tr><tr><td>Asking Price:</td>
                            <td><input type="text" name="ASKINGPRICE" size ="25"/></td>
                        </tr><tr><td>Date Of Show:</td>
                            <td><input type="text" name="DATESHOW" size ="25"/></td>
                        </tr>
                        </table><hr/>
                        <input type="hidden" name="Update4"
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