<?php
class Artist{
    private $name;
    private $address;
    private $phone;
    private $socsecno;
    private $usualtype;
    private $usualmedium;
    private $usualstyle;
    private $salelastyear;
    private $salethisyear;

    function set_Name($name){
            $this->name = $name;
        }
    function set_Address($address){
            $this->address = $address;
        }
    function set_Phone($phone){
            $this->phone = $phone;
        }
    function set_Socsecno($socsecno){
            $this->socsecno = $socsecno;
        }
    function set_UsualType($usualtype){
            $this->usualtype = $usualtype;
        }
    function set_UsualMedium($usualmedium){
            $this->usualmedium = $usualmedium;
        }
    function set_UsualStyle($usualstyle){
            $this->usualstyle = $usualstyle;
        }
    function set_SaleLastYear($salelastyear){
            $this->salelastyear = $salelastyear;
        }
    function set_SaleThisYear($salethisyear){
            $this->salethisyear = $salethisyear;
        }

    function get_Name(){
            return $this->name;
        }
    function get_Address(){
            return $this->address;
        }
    function get_Phone(){
            return $this->phone;
        } 
    function get_Socsecno(){
            return $this->socsecno;
        }
    function get_UsualType(){
            return $this->usualtype;
        } 
    function get_UsualMedium(){
            return $this->usualmedium;
        } 
    function get_UsualStyle(){
            return $this->usualstyle;
        } 
    function get_SaleLastYear(){
            return $this->salelastyear;
        } 
    function get_SaleThisYear(){
            return $this->salethisyear;
        } 
}
?>