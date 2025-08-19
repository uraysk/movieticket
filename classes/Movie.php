<?php
    require_once("Database.php");

    class Movie extends Database{

       public function select(){
            $sql = "SELECT * FROM movies";
            $result = $this->conn->query($sql);
            $rows = array();
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
       public function selectMovieCinema($cid,$mid){
            $sql = "SELECT * FROM moviecinema INNER JOIN cinemas ON moviecinema.cinema_id=cinemas.cinema_id
                                             INNER JOIN movies ON moviecinema.movie_id=movies.movie_id
                                             WHERE moviecinema.cinema_id=$cid AND moviecinema.movie_id=$mid";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }

       }

       public function selectMoviesix(){
           $sql = "SELECT * FROM movies ORDER BY movie_id DESC LIMIT 6";
           $result = $this->conn->query($sql);
           $rows = array();
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
       public function selectMovieAll(){
        $sql = "SELECT * FROM movies ORDER BY movie_id DESC ";
        $result = $this->conn->query($sql);
        $rows = array();
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
     

        public function selectMovies($id){
            $sql =  "SELECT * FROM moviecinema INNER JOIN movies ON moviecinema.movie_id=movies.movie_id WHERE moviecinema.cinema_id=$id";
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
        public function movieCate($id){
            $sql = "SELECT * FROM moviecate INNER JOIN categories ON moviecate.category_id=categories.category_id
                                            INNER JOIN movies ON moviecate.movie_id=movies.movie_id WHERE moviecate.movie_id=$id";
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
            $sql =  "SELECT * FROM moviecinema INNER JOIN cinemas ON moviecinema.cinema_id=cinemas.cinema_id
                                               INNER JOIN movies ON moviecinema.movie_id=movies.movie_id WHERE moviecinema.movie_id=$id";
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
        public function selectOne($id){
            $sql = "SELECT * FROM movies WHERE movie_id=$id";

            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }



        public function store($title, $cinemaid,$categoryid,$mc_quantity,$price,$sdate,$edate,$picture,$file,$tmpfile){
            $sql = "INSERT INTO movies(movie_title,directory) VALUES('$title','$file')";
            $result = $this->conn->query($sql);
            
            if ($result){
                $movie_id = mysqli_insert_id($this->conn);
                foreach($cinemaid as $index => $cinema_id){
                    $sql = "INSERT INTO moviecinema(movie_id,cinema_id,price,mc_quantity,start_date,end_date) VALUES($movie_id,$cinema_id,$price,$mc_quantity,'$sdate','$edate')";
                    $res = $this->conn->query($sql);
                }

                if($res){
                    echo "<script>window.location.replace('movies.php')</script>";
                }
                else{
                    echo $this->conn->error;
                }
                $this->conn->close();
            }
        }
        public function update($id,$title,$cinema,$category,$price,$release,$directory,$fileTopUpload){
            $sql = "UPDATE movies SET movie_title='$title', cinema_id='$cinema', category_id='$category', price='$price', release_date='$release',directory='$directory' WHERE movie_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('movies.php')</script>";
            }

            else{
                echo $this->conn->error;
            }
            $this->conn->error;
        }

        public function delete($id){
            $sql = "DELETE FROM movies WHERE movie_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                echo "<script>window.location.replace('movies.php')</script>";

            }
            else{
                echo $this->conn->error;
            }
            $this->conn->close();
        }

    }