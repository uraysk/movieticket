<?php
    require_once("Database.php");
   

    class Cinema extends Database{
        public function select(){
            $sql = "SELECT * FROM cinemas";
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
            $sql = "SELECT * FROM cinemas WHERE cinema_id=$id";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return $row;
            }
            else{
                return false;
            }
        }

        public function store($cinemaname){
            $sql = "INSERT INTO cinemas(cinema_name) VALUES('$cinemaname')";
            $result = $this->conn->query($sql);

            if($result){
                echo "<script>window.location.replace('cinemas.php')</script>";
            }

            else{
                return $conn->error;
            }
        }

        public function update($id,$cinemaname){
            $sql = "UPDATE cinemas SET cinema_name='$cinemaname' WHERE cinema_id='$id'";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('cinemas.php')</script>";
                
            }

            else{
                echo $this->conn->error;
            }

            $this->conn->close();
        }

        public function delete($id){
            $sql = "DELETE FROM cinemas WHERE cinema_id = $id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('cinemas.php')</script>";
            }

            else{
                echo $this->conn->error;
            }
            $this->conn->close();
        }

    }
?>