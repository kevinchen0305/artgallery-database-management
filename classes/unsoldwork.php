<?php
class Unsoldwork extends Artist{
    private $title;
    private $artist;
    private $type;
    private $medium;
    private $style;
    private $size;
    private $askingprice;
    private $dateofshow;

    function __constructor($type,$medium,$style,$size,$askingprice,$dateofshow){
        $this->type = $type;
        $this->medium = $medium;
        $this->style = $style;
        $this->size = $size;
        $this->askingprice = $askingprice;
        $this->dateofshow = $dateofshow;
    }

    function set_Title($title){
            $this->title = $title;
        }
    function set_Artist($artist){
            $this->artist = $artist;
        }
    function set_Type($type){
            $this->type = $type;
        }
    function set_Medium($medium){
            $this->medium = $medium;
        }
    function set_Style($style){
            $this->style = $style;
        }
    function set_Size($size){
            $this->size = $size;
        }
    function set_AskingPrice($askingprice){
            $this->askingprice = $askingprice;
        }
    function set_DateOfShow($dateofshow){
            $this->dateofshow = $dateofshow;
        }

    function get_Title(){
            return $this->title;
        }
    function get_Artist(){
            return $this->artist;
        }
    function get_Type(){
            return $this->type;
        } 
    function get_Medium(){
            return $this->medium;
        }
    function get_Style(){
            return $this->style;
        } 
    function get_Size(){
            return $this->size;
        } 
    function get_AskingPrice(){
            return $this->askingprice;
        } 
    function get_DateOfShow(){
            return $this->dateofshow;
        }
}
?>