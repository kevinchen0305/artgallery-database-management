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
                <h2>Insert Data</h2>
            </div>
            <div class="w3-threequarter">
                <div class="w3-card w3-white">
                    <div class="w3-container">
                        <?php
                            error_reporting(0);
                        ?>
                        <?php
                            session_start();
                            if (isset($_POST["Insert"])) {
                                if($_POST['Insert'] == $_SESSION['code']){
                                    $link = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link, "artgallery");
                                    $sql ="INSERT INTO artist (Name, Address, Phone, SocSecNo, UsualType, UsualMedium, UsualStyle, Sales_Last_Year, ";
                                    $sql.="Sales_Year_To_Date) VALUES ('";
                                    $sql.=$_POST["NAME"]."','".$_POST["ADDRESS"]."','";
                                    $sql.=$_POST["PHONE"]."','".$_POST["SOCSECNO"]."','";
                                    $sql.=$_POST["USUALTYPE"]."','".$_POST["USUALMEDIUM"]."','";
                                    $sql.=$_POST["USUALSTYLE"]."','".$_POST["SALESLASTYEAR"]."','";
                                    $sql.=$_POST["SALESTHISYEAR"]."')";
                                    echo "<b>SQL指令: $sql</b><br/>";
                                    mysqli_query($link, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link, $sql) )
                                        echo "資料庫新增記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link) . "<br/>";
                                    else
                                        die("資料庫新增記錄失敗<br/>");
                                    mysqli_close($link);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>INSERT ARTIST</h3>
                        <form action="insert.php" method="post">
                        <table border="1">
                        <tr><td>Name:</td>
                            <td><input type="text" name="NAME" size ="25"/></td>
                        </tr><tr><td>Address:</td>
                            <td><input type="text" name="ADDRESS" size="25"/></td>
                        </tr><tr><td>Phone:</td>
                            <td><input type="text" name="PHONE" size="25"/></td>
                        </tr><tr><td>SocSecNo:</td>
                            <td><input type="text" name="SOCSECNO" size="25"/></td>
                        </tr><tr><td>UsualType:</td>
                            <td><input type="text" name="USUALTYPE" size="25"/></td>
                        </tr><tr><td>UsualMedium:</td>
                            <td><input type="text" name="USUALMEDIUM" size="25"/></td>
                        </tr><tr><td>UsualStyle:</td>
                            <td><input type="text" name="USUALSTYLE" size="25"/></td>
                        </tr><tr><td>Sales Last Year:</td>
                            <td><input type="text" name="SALESLASTYEAR" size="25"/></td>  
                        </tr><tr><td>Sales This Year:</td>
                            <td><input type="text" name="SALESTHISYEAR" size="25"/>
	                            </td></tr>
                        </table><hr/>
                        <input type="hidden" name="Insert"
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
                            if (isset($_POST["Insert2"])) {
                                if($_POST['Insert2'] == $_SESSION['code2']){
                                    $link2 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link2, "artgallery");
                                    $sql2 ="INSERT INTO customer (Cust_Name, Cust_Add, Cust_Phone, Amt_Bought_Last_Year, ";
                                    $sql2.="Amt_bought_Year_To_Date) VALUES ('";
                                    $sql2.=$_POST["CUSTOMERNAME"]."','".$_POST["CUSTOMERADDRESS"]."','";
                                    $sql2.=$_POST["CUSTOMERPHONE"]."','".$_POST["CUSTOMERLAST"]."','";
                                    $sql2.=$_POST["CUSTOMERTHIS"]."')";
                                    echo "<b>SQL指令: $sql2</b><br/>";
                                    mysqli_query($link2, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link2, $sql2) )
                                        echo "資料庫新增記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link2) . "<br/>";
                                    else
                                        die("資料庫新增記錄失敗<br/>");
                                    mysqli_close($link2);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>INSERT CUSTOMER</h3>
                        <form action="insert.php" method="post">
                        <table border="1">
                        <tr><td>Customer Name:</td>
                            <td><input type="text" name="CUSTOMERNAME" size ="25"/></td>
                        </tr><tr><td>Customer Address:</td>
                            <td><input type="text" name="CUSTOMERADDRESS" size="25"/></td>
                        </tr><tr><td>Customer Phone:</td>
                            <td><input type="text" name="CUSTOMERPHONE" size="25"/></td>
                        </tr><tr><td>Dollar Amount of Last Year's Purchases:</td>
                            <td><input type="text" name="CUSTOMERLAST" size="25"/></td>
                        </tr><tr><td>Dollar Amount of This Year's Purchases:</td>
                            <td><input type="text" name="CUSTOMERTHIS" size="25"/>
	                            </td></tr>
                        </table><hr/>
                        <input type="hidden" name="Insert2"
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
                            if (isset($_POST["Insert3"])) {
                                if($_POST['Insert3'] == $_SESSION['code3']){
                                    $link3 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link3, "artgallery");
                                    $sql3 ="INSERT INTO sale (Title, Artist, Cust_Name, Cust_Add, Date_Sold, Salesperson, ";
                                    $sql3.="Selling_Price) VALUES ('";
                                    $sql3.=$_POST["TITLE"]."','".$_POST["ARTIST"]."','";
                                    $sql3.=$_POST["CUSTNAME"]."','".$_POST["CUSTADD"]."','";
                                    $sql3.=$_POST["DATESOLD"]."','".$_POST["SALESPERSON"]."','";
                                    $sql3.=$_POST["SELLINGPRICE"]."')";
                                    echo "<b>SQL指令: $sql3</b><br/>";
                                    mysqli_query($link3, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link3, $sql3) )
                                        echo "資料庫新增記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link3) . "<br/>";
                                    else
                                        die("資料庫新增記錄失敗<br/>");
                                    mysqli_close($link3);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>INSERT SALE</h3>
                        <form action="insert.php" method="post">
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLE" size ="25"/></td>
                        </tr><tr><td>Artist:</td>
                            <td><input type="text" name="ARTIST" size="25"/></td>
                        </tr><tr><td>Customer Name:</td>
                            <td><input type="text" name="CUSTNAME" size="25"/></td>
                        </tr><tr><td>Customer Address:</td>
                            <td><input type="text" name="CUSTADD" size="25"/></td>
                        </tr><tr><td>Date Sold:</td>
                            <td><input type="text" name="DATESOLD" size="25"/></td>
                        </tr><tr><td>Salesperson:</td>
                            <td><input type="text" name="SALESPERSON" size="25"/></td>
                        </tr><tr><td>Selling Price:</td>
                            <td><input type="text" name="SELLINGPRICE" size="25"/>
	                            </td></tr>
                        </table><hr/>
                        <input type="hidden" name="Insert3"
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
                            if (isset($_POST["Insert4"])) {
                                if($_POST['Insert4'] == $_SESSION['code4']){
                                    $link4 = @mysqli_connect("localhost","root","12345678") or die("無法開啟MySQL資料庫連接!<br/>");
                                    mysqli_select_db($link4, "artgallery");
                                    $sql4 ="INSERT INTO unsold_work (Title, Artist, Type, Medium, Style, Size, Asking_price, ";
                                    $sql4.="Date_Of_Show) VALUES ('";
                                    $sql4.=$_POST["TITLE"]."','".$_POST["ARTIST"]."','";
                                    $sql4.=$_POST["TYPE"]."','".$_POST["MEDIUM"]."','";
                                    $sql4.=$_POST["STYLE"]."','".$_POST["SIZE"]."','";
                                    $sql4.=$_POST["ASKING"]."','".$_POST["DATEOFSHOW"]."')";
                                    echo "<b>SQL指令: $sql4</b><br/>";
                                    mysqli_query($link4, 'SET NAMES utf8'); 
                                    if ( mysqli_query($link4, $sql4) )
                                        echo "資料庫新增記錄成功, 影響記錄數: ". 
                                        mysqli_affected_rows($link4) . "<br/>";
                                    else
                                        die("資料庫新增記錄失敗<br/>");
                                    mysqli_close($link4);
                                }
                                else{
                                    echo "請不要重新整理本頁面或重複提交!";
                                } 
                            }
                        ?>
                        <h3>INSERT UNSOLD WORK</h3>
                        <form action="insert.php" method="post">
                        <table border="1">
                        <tr><td>Title:</td>
                            <td><input type="text" name="TITLE" size ="25"/></td>
                        </tr><tr><td>Artist:</td>
                            <td><input type="text" name="ARTIST" size="25"/></td>
                        </tr><tr><td>Type:</td>
                            <td><input type="text" name="TYPE" size="25"/></td>
                        </tr><tr><td>Medium:</td>
                            <td><input type="text" name="MEDIUM" size="25"/></td>
                        </tr><tr><td>Style:</td>
                            <td><input type="text" name="STYLE" size="25"/></td>
                        </tr><tr><td>Size:</td>
                            <td><input type="text" name="SIZE" size="25"/></td>
                        </tr><tr><td>Asking Price:</td>
                            <td><input type="text" name="ASKING" size="25"/></td>
                        </tr><tr><td>Date Of Show:</td>
                            <td><input type="text" name="DATEOFSHOW" size="25"/>
	                            </td></tr>
                        </table><hr/>
                        <input type="hidden" name="Insert4"
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