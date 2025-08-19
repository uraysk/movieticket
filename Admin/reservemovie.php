 <?php
    require("header.php");
  
   
    $cinema= $_GET['cinema'];
     
    if(isset($_POST['submit'])){
       
       
        $movie = $_POST['movie'];
        $quantity = $_POST['quantity'];
        $schedule = $_POST['schedule'];
       

        $addreserve = $reserve->store($id,$movie,$cinema,$quantity,$schedule);
    }
   
 
 ?>
 <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admintop.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="reservations.php">Reservations</a>
            </li>
            <li class="breadcrumb-item">
                <a href="reservecinema.php">SELECT CINEMAS</a>
            </li>

            <li class="breadcrumb-item active">SELECT MOVIES</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Add Reservation</h2></div>
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        
                                        <div class="form-group">
                                            <label>Movie</label>
                                            <select class="form-control" name="movie" >
                                                <?php
                                                    $movieselect = $movie->selectMovies($cinema);
                                                    if($movieselect){
                                                        foreach($movieselect as $key =>$row){
                                                            $movieid=$row['movie_id'];
                                                            echo "<option value='$movieid'>" . $row['movie_title'] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                            
                                        <div class="form-group">
                                            <label> Date</label>
                                            <input type="date" class="form-control" name="schedule">
                                        </div>
                                         <button type="submit" name="submit" class="btn btn-sm btn-primary">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2018</span>
                        </div>
                    </div>
                    </footer>
</div>
</body>
</html>