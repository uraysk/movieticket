<?php
    require_once("Database.php");

    class Reserve extends Database{
        public function select(){

            $sql = "SELECT * FROM reservations INNER JOIN users ON reservations.user_id=users.user_id
                                               INNER JOIN moviecinema ON reservations.moci_id=moviecinema.moci_id
                                               INNER JOIN movies ON moviecinema.movie_id=movies.movie_id
                                               INNER JOIN cinemas ON moviecinema.cinema_id=cinemas.cinema_id";
                                               

            $result = $this->conn->query($sql);
            $rows = array();
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

        public function selectOnce($id){
            $sql = "SELECT * FROM moviecinema INNER JOIN reservations ON moviecinema.movie_id=reservations.movie_id WHERE cinema_id= $cinema";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }

        public function selectOne($id){
            $sql = "SELECT * FROM reservations WHERE reserve_id=$id";
            
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }
        public function selectStatus(){
            $sql = "SELECT * FROM reservations INNER JOIN users ON reservations.user_id=users.user_id
                                               INNER JOIN moviecinema ON reservations.moci_id=moviecinema.moci_id
                                               INNER JOIN movies ON moviecinema.movie_id=movies.movie_id
                                               INNER JOIN cinemas ON moviecinema.cinema_id=cinemas.cinema_id WHERE reservestatus='pending'";
            $result = $this->conn->query($sql);

            $rows = array();
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
        
        public function selectreserve($id){
            $sql = "SELECT * FROM reservations INNER JOIN users ON reservations.user_id=users.user_id
                                               INNER JOIN moviecinema ON reservations.moci_id=moviecinema.moci_id
                                               INNER JOIN movies ON moviecinema.movie_id=movies.movie_id
                                               INNER JOIN cinemas ON moviecinema.cinema_id=cinemas.cinema_id WHERE reserve_id=$id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }
        public function getMoviesByDate($schedule,$cinemaid){
            $sql = "SELECT * FROM reservations INNER JOIN moviecinema ON reservetions.moci_id =moviecinema.moci_id 
                                               WHERE (start_date >= $redate OR end_date >= $redate)
                                               and moviecinema.moci_id=$id";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }
            else{
                return false;
            }
        }

        public function store($id,$movie,$cinema,$quantity,$schedule){
            $sql = "SELECT * FROM moviecinema WHERE cinema_id=$cinema AND movie_id=$movie";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            $moci = $row['moci_id'];
            $mc_quantity =$row['mc_quantity'];
            $new_quantity = $mc_quantity - $quantity;
            $price = $row['price'];
            $total = $price * $quantity;

            $sql="UPDATE moviecinema SET mc_quantity=$new_quantity WHERE moci_id=$moci";
            $result = $this->conn->query($sql);
            $schedule = strtotime($schedule);
            $date = date("Y/m/d",$schedule);
            
            if($result){
                $sql = "INSERT INTO reservations(user_id,moci_id,reservestatus,quantity,total,schedule) VALUES($id,$moci,'pending','$quantity',$total,'$date')";
                $result = $this->conn->query($sql);

                if($result){
                   $reserve_id= mysqli_insert_id($this->conn);
                   header("location:confirmreserve.php?id=$reserve_id");

                }

                else{
                    echo $this->conn->error;
                }
            }

            $this->conn->close();
        }
        

        

        // public function update($rid,$id,$movie,$cinema,$moci){
        //     $sql = "UPDATE reservations SET user_id='$user', movie_id='$movie', cinema_id='$cinema', moci_id='$moci' WHERE reserve_id=$id";
        //     $result = $this->conn->query($sql);
        //     if($result){
        //         echo "<script>window.location.replace('reservations.php')</script>";
        //     }

        //     else{
        //         echo $this->conn->error;
        //     }
            
        //     echo $this->conn->error;
        // }
        public function update($id){
            $sql = "UPDATE reservations SET reservestatus='confirm' WHERE reserve_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('pendingreserve.php')</script>";
            }

            else{
                echo $this->conn->error;
            }
            
            echo $this->conn->close();
        }

         

        public function delete($id){
            $sql = "DELETE FROM reservations WHERE reserve_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('reservations.php')</script>";
            }
            else{
                echo $this->conn->error;
            }
            $this->conn->close();
        }

    }