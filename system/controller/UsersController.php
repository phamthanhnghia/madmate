<?php
require_once('../system/model/Users.php');
require_once('../system/database/DBClass.php');

class UsersController
{
    public function getListUsers()
    {
        $db = new DBClass();
        $arr = $list = [];
        $result = $db->query("SELECT * FROM `usermeta`");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$row["user_id"]][$row["meta_key"]] = $row["meta_value"];
            }
        }
        $arr['list'] = $list;

        return $arr;
    }

    public function postAddNewUser()
    {
        $mUsers = new Users();
        if (!is_null($_POST) && $mUsers->canInsert()) {
            $this->insertNewUser();
            if (isset($_SESSION["add_user"])) {
                unset($_SESSION["add_user"]);
                header('Location: index.php');
            }
        }
    }

    public function insertNewUser()
    {
        $mUsers = new Users();
        $arr = [];
        if (isset($_POST["first_name"])) {
            $arrPost = $_POST;
            $user_id =  $mUsers->getNewId();

            if(isset($_FILES['avatar'])){
                $name       = $_FILES['avatar']['name'];  
                $temp_name  = $_FILES['avatar']['tmp_name'];  
                if(isset($name)){
                    if(!empty($name)){      
                        $location = '/var/www/html/madmate/system/controller/';   
                        die;
                        if(move_uploaded_file($temp_name, $location.$name)){
                            echo 'File uploaded successfully';
                        }
                    }       
                }  else {
                    echo 'You should select a file to upload !!';
                }
                die;
            }
            $name       = $_FILES['avatar']['name'];  
                $temp_name  = $_FILES['avatar']['tmp_name'];  
            echo $temp_name;
            die;

            foreach ($arrPost as $key => $value) {

                if ($key === 'avatar') {
                    continue;
                }
                $arr[] = [
                    $user_id,
                    "'" . $key . "'",
                    "'" . $value . "'"
                ];
            }
            $string = [];
            foreach ($arr as $key => $value) {
                $string[] = "(" . implode(",", $value) . ")";
            }
            $db = new DBClass();
            $query = "INSERT INTO `usermeta` ( `user_id`, `meta_key`, `meta_value`) VALUES " . implode(",", $string) . ";";
            $result = $db->query($query);
            $_SESSION["add_user"] = 1;
        }
        unset($_POST);
    }

    public function deleteUsers($id)
    {
        $db = new DBClass();
        $query = "DELETE FROM `usermeta` WHERE `user_id` =" . $id . ";";
        // echo $query;
        $result = $db->query($query);
        header('Location: index.php');
    }

    public function getUsers($id)
    {
        $db = new DBClass();
        $arr = $info = [];
        $result = $db->query("SELECT * FROM `usermeta` WHERE `user_id` = " . $id);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $info[$row["meta_key"]] = $row["meta_value"];
            }
        }
        $arr['info'] = $info;

        return $arr;
    }

    public function postEditUser()
    {
        $mUsers = new Users();
        if (!is_null($_POST) && $mUsers->canInsert()) {
            $this->insertEditUser();
            if (isset($_SESSION["add_user"])) {
                unset($_SESSION["add_user"]);
                header('Location: index.php');
            }
        }
    }
    public function insertEditUser()
    {
        $mUsers = new Users();
        $arr = [];
        if (isset($_POST["first_name"])) {
            $arrPost = $_POST;
            $user_id =  $_POST["id"];
            $db = new DBClass();
            $querydelete = "DELETE FROM `usermeta` WHERE `user_id` =" . $id . ";";
            $results= $db->query($querydelete);
            foreach ($arrPost as $key => $value) {
                if ($key === 'id') {
                    continue;
                }
                if ($key === 'avatar') {

                    continue;
                }
                $arr[] = [
                    $user_id,
                    "'" . $key . "'",
                    "'" . $value . "'"
                ];
            }
            $string = [];
            foreach ($arr as $key => $value) {
                $string[] = "(" . implode(",", $value) . ")";
            }
            $db = new DBClass();
            $query = "INSERT INTO `usermeta` ( `user_id`, `meta_key`, `meta_value`) VALUES " . implode(",", $string) . ";";
            $result = $db->query($query);
            $_SESSION["add_user"] = 1;
        }
        unset($_POST);
    }
}
