<?php

class Sale extends Unsoldwork{
    private $title;
    private $artist;
    private $custname;
    private $custadd;
    private $date_sold;
    private $salesperson;
    private $selling_price;



    function set_Title($title){
            $this->title = $title;
        }
    function set_Artist($artist){
            $this->artist = $artist;
        }
    function set_CustName($custname){
            $this->custname = $custname;
        }
    function set_CustAddress($custadd){
            $this->custadd = $custadd;
        }
    function set_DateSold($date_sold){
            $this->date_sold = $date_sold;
        }
    function set_Salesperson($salesperson){
            $this->salesperson = $salesperson;
        }
    function set_SellingPrice($selling_price){
            $this->selling_price = $selling_price;
        }

    function get_Title(){
            return $this->title;
        }
    function get_Artist(){
            return $this->artist;
        }
    function get_CustName(){
            return $this->custname;
        } 
    function get_CustAddress(){
            return $this->custadd;
        }
    function get_DateSold(){
            return $this->date_sold;
        } 
    function get_Salesperson(){
            return $this->salesperson;
        } 
    function get_SellingPrice(){
            return $this->selling_price;
        }
}
?>