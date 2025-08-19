<?php
    require_once("Database.php");

    class Category extends Database{
        public function select(){

            $sql = "SELECT * FROM categories";
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
            $sql = "SELECT * FROM categories WHERE category_id=$id";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }

        public function store($catename){
            $sql = "INSERT INTO categories(category_name) VALUES('$catename')";
            $result = $this->conn->query($sql);

            if($result){
                echo "<script>window.location.replace('categories.php')</script>";
            }

            else{
                return $conn->error;
            }
        }

        public function update($id, $catename){
            $sql = "UPDATE categories SET category_name='$catename' WHERE category_id = '$id'";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('categories.php')</script>";
            }

            else{
                echo $this->conn->error;
            }
            $this->conn->close();

        }

        public function delete($id){
            $sql = "DELETE FROM categories WHERE category_id = $id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('categories.php')</script>";
            }

            else{
                echo $this->conn->error;
            }
            $this->conn->close();
        }

    }