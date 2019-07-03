<?php
require_once('../system/database/DBClass.php');

class Users
{
    var $id;
    var $user_login;
    var $user_pass;
    var $created_at;
    var $status;
    public function getArrayRoles()
    {
        return [
            'Admin', 'Author', 'Manager', 'Employee', 'Staff'
        ];
    }

    public function getArrayCountry()
    {
        return [
            'Vietnam', 'Singapore', 'Canada', 'Thailand', 'Malaysia'
        ];
    }
    
    public function getArrayMarriage()
    {
        return [
            'Married', 'Single', 'Divorced',  'Widowed'
        ];
    }

    public function getArrayGender()
    {
        return [
            'Men','Women'
        ];
    }

    public function getNewId(){
        $db = new DBClass();
        $max = 0;
        $result= $db->query("SELECT MAX(user_id) as max FROM `usermeta`");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $max = $row["max"];
            }
        } 
        return $max+1;
    }

    public function canInsert(){
        return true;
    }
}
