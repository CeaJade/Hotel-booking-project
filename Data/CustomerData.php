<?php
class CustomerData{
    public $cusID;
    public $name;
    public $address;
    public $postalcode;
    public $phoneNumber;
    public $email;

    public function StoreCustomerData($name, $address, $postalcode, $phoneNumber, $email){
        $mysqli = OpenCon();
        $name = $mysqli->real_escape_string($name);
        $address = $mysqli->real_escape_string($address);
        $postalcode = $mysqli->real_escape_string($postalcode);
        $phoneNumber = $mysqli->real_escape_string($phoneNumber);
        $email = $mysqli->real_escape_string($email);

        $sql = "INSERT INTO customer VALUES ('$name', '$address', '$postalcode', '$phoneNumber', '$email')";
        $mysqli->query($sql);
    }

    public function ReadCustomerData(){

        $sql = "SELECT * FROM customer";
        $result = OpenCon()->query($sql);

        if ($result->num_rows > 0){
            //outputs city from postal code row
            $customers = array();
            while($row = $result->fetch_assoc()) {
                $customer = new CustomerData;
                $customer->cusID = $row['cus_id'];
                $customer->name = $row['name'];
                $customer->address = $row['address'];
                $customer->postalCode = $row['postal_code'];
                $customer->phoneNumber = $row['phone_number'];
                $customer->email = $row['email'];
                $customers[] = $customer;
            }
            return $customers;
        } else{
            return false;
        }

    }

    public function DeleteCustomerData(){
        $mysqli = OpenCon();

        $sql = "DELETE FROM customer WHERE cus_id = '$this->cusID'";
        $mysqli->query(sql);
    }
}