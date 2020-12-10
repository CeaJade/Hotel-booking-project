<?php
class PostalCodeData{
    public $postalCode;
    public $cityName;
    
    public function GetCityName($postalCode){
        
        $sql = "SELECT * FROM postalcode WHERE postal_code = '".$postalCode."'";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $row = $result->fetch_assoc();
            return $row["city_name"];
        } else{
            return false;
        }
    }
}