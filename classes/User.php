<?php 
require_once("Database.php");

class User extends Database{

    public function login($email, $pass,$cid){
        $sql = "SELECT * FROM users WHERE email='$email' AND password = '$pass'";

        $result = $this->conn->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            $_SESSION['userid'] = $row['user_id'];

            if($row['status'] == "admin"){
                echo "<script>window.location.replace('Admin/admintop.php')</script>";
            }
            elseif($row['status']== "user"){
                if($cid == FALSE){
                    echo "<script>window.location.replace('Web/toppage.php')</script>";
                }
                else if($cid == TRUE){
                    echo "<script>window.location.replace('Web/reserve1.php?cid=$cid')</script>";
                }
                else{
                    echo "<script>window.location.replace('Web/toppage.php')</script>";
                }
            }

        }
        else{
            return false;
        }
    }

    public function select(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        $row = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }

            return $rows;
        }
        
        else{
            return false;
        }
    }

    public function selectOne($id){
        $sql = "SELECT * FROM users WHERE user_id=$id";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }

        else{
            return false;
        }
    }
    public function store($fname,$lname,$pass,$email,$status){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return false;
        }
        else{
            $pass = md5($pass);
            $sql = "INSERT INTO users(firstname,lastname,password,email,status) VALUES('$fname','$lname', '$pass','$email','$status')";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('users.php')</script>";

            }
            else{
                return $conn->error;
            }
        
        }
        $this->conn->close();
    }

    public function update($id,$fname,$lname,$email,$status){
        $sql = "SELECT * FROM users WHERE email = '$email' AND user_id != $id";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return false;
        }

        else{
            $sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email', status='$status' WHERE user_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('users.php')</script>";

            }
            else{
                echo $this->conn->error;
            }

        }
        $this->conn->close();
    }

    public function delete($id){

        $sql = "DELETE FROM users WHERE user_id=$id";
        $result = $this->conn->query($sql);
        if($result){
            echo "<script>window.location.replace('users.php')</script>";

        }
        else{
            echo $this->conn->error;
        }

        $this->conn->close();
    } 

}

?>