<?php

include_once "Data/PostalCodeData.php";
class PostalManager {

    public function city($postal){
        echo PostalCodeData::GetCityName($postal);
    }
}