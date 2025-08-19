<?php
    require("header.php");
    $row = $user->selectOne($id);
  
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
            <li class="breadcrumb-item active">SELECT CINEMA</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Add Reservation</h2></div>
                            <div class="card-body">
                                <form action="reservemovie.php" method="get">
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        <div class="form-group">
                                            <label>Cinema</label>
                                            <select class="form-control" name="cinema" id="cinema" >
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