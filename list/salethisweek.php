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
    <?php
        include("../init.php");
    ?>
    <body id="myPage">
<!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="../index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
                <a href="artistlist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Artist</a>
                <a href="worklist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
                <a href="salelist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sale</a>
                <a href="customerlist.php#gallerydb" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Customer</a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button" title="Notifications">Operation <i class="fa fa-caret-down"></i></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                        <a href="../insert.php#gallerydb" class="w3-bar-item w3-button">Insert</a>
                        <a href="../delete.php#gallerydb" class="w3-bar-item w3-button">Delete</a>
                        <a href="../update.php#gallerydb" class="w3-bar-item w3-button">Update</a>
                    </div>
                </div>
             </div>
        </div>

<!-- Image Header -->
        <div class="w3-display-container w3-animate-opacity">
            <img src="../image/artgallery.jpg" alt="art" style="width:100%;min-height:350px;max-height:150px;">
        </div>

<!-- Work Row -->
        <div class="w3-row-padding w3-padding-64 w3-theme-l1" id="gallerydb">
            <div class="w3-quarter">
                <h2>Sales This Week</h2>
                <p>The data about all sales of works during the current week</p>
            </div>

            <div class="w3-threequarter">
                <div class="w3-card w3-white">
                    <div class="w3-container">
                        <table border = 5, class="saleweektable">
                            <tr>
                                <th>Salesperson Name</th>
                                <th>Selling Price</th>
                                <th>Title</th>
                                <th>Artist</th>  
                                <th>Owner</th>
                                <th>Customer Name</th>       
                                <th>Customer Address</th>
                                <th>Date of Sale</th>
                            </tr>
                            <?php
                            $thisweekData = getThisweekinfo();
                            for($index=0;$index < count($thisweekData);$index++){
                                $thisweek = $thisweekData[$index];
                                echo "<tr>";
                                echo "<td>".$thisweek->get_Salesperson()."</td>";
                                echo "<td>".$thisweek->get_SellingPrice()."</td>";
                                echo "<td>".$thisweek->get_Title()."</td>";
                                echo "<td>".$thisweek->get_Artist()."</td>";
                                echo "<td>".$thisweek->get_Artist()."</td>";
                                echo "<td>".$thisweek->get_CustName()."</td>";
                                echo "<td>".$thisweek->get_CustAddress()."</td>";     
                                echo "<td>".$thisweek->get_DateSold()."</td>";
                                echo "</tr>";
                                
                            }
                            ?>
                        </table>
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