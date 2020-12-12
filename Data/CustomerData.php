<?php
class CustomerData{
    public $cusID;
    public $name;
    public $address;
    public $postalcode;
    public $phoneNumber;
    public $email;

    public function StoreCustomerData(){
        $mysqli = OpenCon();
        $name = $mysqli->real_escape_string($this->name);
        $address = $mysqli->real_escape_string($this->address);
        $postalcode = $mysqli->real_escape_string($this->postalcode);
        $phoneNumber = $mysqli->real_escape_string($this->phoneNumber);
        $email = $mysqli->real_escape_string($this->email);

        $sql = "INSERT INTO customer VALUES (NULL, '$name', '$address', '$email', '$phoneNumber', '$postalcode')";
        $mysqli->query($sql) or die($mysqli->error);
        $this->cusID = $mysqli->insert_id;
    }

    public Static function ReadCustomerData($cusID){

        $sql = "SELECT * FROM customer WHERE cus_id = '$cusID'";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $customer = new CustomerData;
            $customer->cusID = $row['cus_id'];
            $customer->name = $row['name'];
            $customer->address = $row['address'];
            $customer->postalCode = $row['postal_code'];
            $customer->phoneNumber = $row['phone_number'];
            $customer->email = $row['email'];
            
            return $customer;
        } else{
            return false;
        }
    }

    //Function to delete user, not used in the product
    public function DeleteCustomerData(){
        $mysqli = OpenCon();

        $sql = "DELETE FROM customer WHERE cus_id = '$this->cusID'";
        $mysqli->query(sql);
    }
}