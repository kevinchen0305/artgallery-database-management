<?php
class AGConf{
    private $databaseURL = "localhost";
    private $databaseUName = "";
    private $databasePWord = "";
    private $databaseName = "artgallery";

    function get_databaseURL(){
            return $this->databaseURL;
        }
    function get_databaseUName(){
            return $this->databaseUName;
        }
    function get_databasePWord(){
            return $this->databasePWord;
        } 
    function get_databaseName(){
            return $this->databaseName;
        } 
}
?>