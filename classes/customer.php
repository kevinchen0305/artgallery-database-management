<?php
class Customer{
    private $custname;
    private $custadd;
    private $custphone;
    private $bought_last_year;
    private $bought_this_year;

    function set_CustName($custname){
            $this->custname = $custname;
        }
    function set_CustAddress($custadd){
            $this->custadd = $custadd;
        }
    function set_CustPhone($custphone){
            $this->custphone = $custphone;
        }
    function set_BoughtLastYear($bought_last_year){
            $this->bought_last_year = $bought_last_year;
        }
    function set_BoughtThisYear($bought_this_year){
            $this->bought_this_year = $bought_this_year;
        }

    function get_CustName(){
            return $this->custname;
        }
    function get_CustAddress(){
            return $this->custadd;
        }
    function get_CustPhone(){
            return $this->custphone;
        } 
    function get_BoughtLastYear(){
            return $this->bought_last_year;
        }
    function get_BoughtThisYear(){
            return $this->bought_this_year;
        }
}
?>