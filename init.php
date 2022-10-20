<?php

error_reporting(E_ERROR | E_WARNING);

include("classes/artist.php");
include("classes/collector.php");
include("classes/customer.php");
include("classes/unsoldwork.php");
include("classes/sale.php");

$databaseURL;
$databaseUName;
$databasePWord;
$databaseName;

function initDB(){
    if ( ! isset($_SESSION['databaseURL']) ){
        include("conf/conf.php");

        $dbConf = new AGConf();
        $databaseURL = $dbConf->get_databaseURL();
        $databaseUName = $dbConf->get_databaseUName();
        $databasePWord = $dbConf->get_databasePWord();
        $databaseName = $dbConf->get_databaseName();
            
        $_SESSION['databaseURL']=$databaseURL; 
        $_SESSION['databaseUName']=$databaseUName; 
        $_SESSION['databasePWord']=$databasePWord; 
        $_SESSION['databaseName']=$databaseName;        
        
        $connection = mysqli_connect($databaseURL,$databaseUName,
                                    $databasePWord,$databaseName)
                        or die ("錯誤: 連接伺服器或資料庫錯誤!");
      
        mysqli_query($connection,'SET CHARACTER SET utf8');
        mysqli_query($connection,"SET collation_connection = 'utf8_general_ci'");
          
        mysqli_close($connection);
    }
    
    $databaseURL = $_SESSION['databaseURL'];
    $databaseUName = $_SESSION['databaseUName'];
    $databasePWord = $_SESSION['databasePWord'];
    $databaseName = $_SESSION['databaseName']; 

    $connection = mysqli_connect($databaseURL,$databaseUName,
                                $databasePWord,$databaseName)
                    or die ("錯誤: 連接伺服器或資料庫錯誤!");
    
    mysqli_query($connection,'SET CHARACTER SET utf8');
    mysqli_query($connection,"SET collation_connection = 'utf8_general_ci'");
    
    return $connection;
}


function closeDB($connection){
    mysqli_close($connection);
}


function getArtistinfo(){
    $connection = initDB();
    $query = "SELECT * FROM artist";          

    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $artistData;
    $artistID = 0;

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $Name = $row['Name'];
        $Address = $row['Address'];
        $Phone = $row['Phone'];
        $UsualType = $row['UsualType'];
        $UsualMedium = $row['UsualMedium'];
        $UsualStyle = $row['UsualStyle'];
        $Sales_Last_Year = $row['Sales_Last_Year'];
        $Sales_Year_To_Date = $row['Sales_Year_To_Date'];
                
        $artist = new Artist();        
        $artist->set_Name($Name);
        $artist->set_Address($Address);
        $artist->set_Phone($Phone);
        $artist->set_UsualType($UsualType);
        $artist->set_UsualMedium($UsualMedium);
        $artist->set_UsualStyle($UsualStyle);
        $artist->set_SaleLastYear($Sales_Last_Year);
        $artist->set_SaleThisYear($Sales_Year_To_Date);
           
        $artistData[$artistID] = $artist;
        $artistID = $artistID +1;              
    }
    closeDB($connection);

    return $artistData;
}

function getCustomerinfo(){
    $connection = initDB();
    $query = "SELECT * FROM customer ORDER BY Cust_Name";          

    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $customerData;
    $customerID = 0;

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   
        $Cust_Name = $row['Cust_Name'];
        $Cust_Add = $row['Cust_Add'];
        $Cust_Phone = $row['Cust_Phone'];
        $Amt_Bought_Last_Year = $row['Amt_Bought_Last_Year'];
        $Amt_bought_Year_To_Date = $row['Amt_bought_Year_To_Date'];
                
        $customer = new Customer();        
        $customer->set_CustName($Cust_Name);
        $customer->set_CustAddress($Cust_Add);
        $customer->set_CustPhone($Cust_Phone);
        $customer->set_BoughtLastYear($Amt_Bought_Last_Year);
        $customer->set_BoughtThisYear($Amt_bought_Year_To_Date);
           
        $customerData[$customerID] = $customer;
        $customerID = $customerID +1;              
    }
    closeDB($connection);

    return $customerData;
}

function getWorkinfo(){
    $connection = initDB();
    $query = "SELECT * FROM unsold_work";          

    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $workData;
    $workID = 0;

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   
        $Title = $row['Title'];
        $Artist = $row['Artist'];
        $Type = $row['Type'];
        $Medium = $row['Medium'];
        $Style = $row['Style'];
        $OwnerName = $row['Artist'];
        $Asking_price = $row['Asking_price'];
        $Date_Of_Show = $row['Date_Of_Show'];
                
        $work = new Unsoldwork();        
        $work->set_Title($Title);
        $work->set_Artist($Artist);
        $work->set_Type($Type);
        $work->set_Medium($Medium);
        $work->set_Style($Style);
        $work->set_Artist($OwnerName);
        $work->set_AskingPrice($Asking_price);
        $work->set_DateOfShow($Date_Of_Show);
           
        $workData[$workID] = $work;
        $workID = $workID +1;              
    }
    closeDB($connection);

    return $workData;
}

function getPaymentinfo(){
    $connection = initDB();
    $query = "SELECT * FROM sale";          

    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $paymentData;
    $paymentID = 0;

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   
        $OwnerName = $row['Artist'];
        $Title = $row['Title'];
        $Artist = $row['Artist'];
        $Salesperson = $row['Salesperson'];
        $Selling_Price = $row['Selling_Price'];
        $Amount_remitted = $row['Selling_Price'];

        $query2 = "SELECT * FROM artist WHERE Name='".$Artist."'";
        $result2 = mysqli_query($connection,$query2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $Address = $row2['Address'];
        $SocSecNo = $row2['SocSecNo'];

        $query3 = "SELECT * FROM unsold_work WHERE Title='".$Title."'";
        $result3 = mysqli_query($connection,$query3);
        if(!$result3)
	    {
		    echo ("Error: ".mysqli_error($connection));
		    exit();
	    }
        $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
        $Type = $row3['Type'];
        $Medium = $row3['Medium'];
        $Style = $row3['Style'];
        $Size = $row3['Size'];
                
        $payment = new Sale();        
        $payment->set_Artist($OwnerName);
        $payment->set_Address($Address);
        $payment->set_Artist($Artist);
        $payment->set_Socsecno($SocSecNo);
        $payment->set_Title($Title);
        $payment->set_Type($Type);
        $payment->set_Medium($Medium);
        $payment->set_Style($Style);
        $payment->set_Size($Size);
        $payment->set_Salesperson($Salesperson);
        $payment->set_SellingPrice($Selling_Price);
        $payment->set_SellingPrice($Amount_remitted);
           
        $paymentData[$paymentID] = $payment;
        $paymentID = $paymentID +1;
    }
    closeDB($connection);

    return $paymentData;
}

function getThisweekinfo(){
    $connection = initDB();
    $query = "SELECT * FROM sale WHERE Date_Sold> now() -  interval 7 day";          

    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $thisweekData;
    $thisweekID = 0;

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $Salesperson = $row['Salesperson'];
        $Selling_Price = $row['Selling_Price'];
        $Cust_Name = $row['Cust_Name'];
        $Cust_Add = $row['Cust_Add'];
        $Date_Sold = $row['Date_Sold'];
        $Title = $row['Title'];
        $Artist = $row['Artist'];
        $Ownername = $row['Artist'];
                
        $thisweek = new Sale();        
        $thisweek->set_Salesperson($Salesperson);
        $thisweek->set_SellingPrice($Selling_Price);
        $thisweek->set_CustName($Cust_Name);
        $thisweek->set_CustAddress($Cust_Add);
        $thisweek->set_DateSold($Date_Sold);
        $thisweek->set_Title($Title);
        $thisweek->set_Artist($Artist);
        $thisweek->set_Artist($Ownername);
                  
        $thisweekData[$thisweekID] = $thisweek;
        $thisweekID = $thisweekID +1;              
    }
    closeDB($connection);

    return $thisweekData;
}

function getSalespersoninfo($year){
    $connection = initDB();

    $query = "SELECT * FROM sale WHERE year(Date_Sold) = $year ORDER BY Salesperson";          
    $result = mysqli_query($connection,$query);
        // or die ("查詢失敗: ".mysqli_error($connection));

    $salespersonData;
    $salespersonID = 0;
    $total = 0;
    $symbol = "$";

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        if(strpos($Salesperson, $row['Salesperson']) !== false){
            $Salesperson = '';
        } else{
            $Salesperson = $row['Salesperson'];
        }
        //$Salesperson = $row['Salesperson'];
        $Selling_Price = $row['Selling_Price'];
        $Title = $row['Title'];
        $Artist = $row['Artist'];

        $query2 = "SELECT * FROM unsold_work WHERE Title='".$Title."'";
        $result2 = mysqli_query($connection,$query2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $Asking_price = $row2['Asking_price'];
       
        $query3 = "SELECT Title, Artist, Cust_Name, Cust_Add, Date_Sold, Salesperson, SUM(REPLACE(Selling_Price,'$','')) AS total_sale
                   FROM sale WHERE year(Date_Sold)= $year AND Salesperson='".$Salesperson."'";
        $result3 = mysqli_query($connection,$query3);
        $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
        $total = $row3['total_sale'];
        //echo "$total";
       
           
        $salesperson = new Sale();
        $salesperson->set_CustName($total);
        $salesperson->set_Salesperson($Salesperson);      
        $salesperson->set_Salesperson($Salesperson);
        $salesperson->set_SellingPrice($Selling_Price);
        $salesperson->set_Title($Title);
        $salesperson->set_Artist($Artist);
        $salesperson->set_AskingPrice($Asking_price);
        
        $salespersonData[$salespersonID] = $salesperson;
        $salespersonID = $salespersonID +1;              
    }

    closeDB($connection);

    return $salespersonData;
}

?>