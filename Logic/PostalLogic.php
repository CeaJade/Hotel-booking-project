<?php

include_once "Data/PostalCodeData.php";
class PostalManager {

    public function City($postal){
        echo PostalCodeData::GetCityName($postal);
    }
}