<?php
   require("header.php");
  

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $movie = $_POST['movie'];
        $cinema = $_POST['cinema'];
        $quantity = $_POST['quantity'];
        $date = $_POST['reservedate'];

        $updatereserve = $reserve->update($id,$user,$movie,$cinema,$quantity,$date);
        echo $updatereserve;
    }
    $row = $movie->selectOne($id);

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
            <li class="breadcrumb-item active">Edit Reservations</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Edit Reservations</h2></div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        <div class="form-group">
                                            <label>User</label>
                                            <select class="form-control" name="user"  >
                                               <?php
                                               $result= $user->select();
                                               if($result){
                                                   foreach($result as $key =>$row){
                                                       $userid=$row['user_id'];
                                                       echo "<option value='$userid'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                                                   }
                                               }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Movie</label>
                                            <select class="form-control" name="movie" >
                                               <?php
                                               $result= $movie->select();
                                               if($result){
                                                   foreach($result as $key =>$row){
                                                       $movieid=$row['movie_id'];
                                                       echo "<option value='$movieid'>" . $row['movie_title'] . "</option>";
                                                   }
                                               }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Cinema</label>
                                            <select class="form-control" name="cinema" >
                                               <?php
                                               $result= $cinema->select();
                                               if($result){
                                                   foreach($result as $key =>$row){
                                                       $cinemaid=$row['cinema_id'];
                                                       echo "<option value='$cinemaid'>" . $row['cinema_name'] . "</option>";
                                                   }
                                               }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity" value="<?php echo $row['quantity'];?>">
                                        </div>
                                            
                                        <div class="form-group">
                                            <label> Date</label>
                                            <input type="date" class="form-control" name="reservedate" value="<?php echo $row['date'];?>">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Movie</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
</div>
</body>
</html>