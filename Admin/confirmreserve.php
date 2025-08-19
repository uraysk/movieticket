<?php
    require("header.php");
    $id = $_GET['id'];
    $row = $reserve->selectreserve($id);
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
            <li class="breadcrumb-item active">Confirming</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Confirming</h2></div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        
                                            <?php
                                            echo "<label>Name</label>";
                                            echo "<p>" . $row['firstname'] . " " . $row['lastname'] . "</p>";
                                            echo "<label>Movie</label>";
                                            echo "<p>" . $row['movie_title'] . "</p>";
                                            echo "<label>Cinema</label>";
                                            echo "<p>" . $row['cinema_name'] . "</p>";
                                            echo "<label>Quantity</label>";
                                            echo "<p>" . $row['quantity'] . "</p>";
                                            echo "<label>Total Price</label>";
                                            echo "<p>" . $row['quantity'] * $row['price'] . "</p>";
                                            echo "<label>Date</label>";
                                            echo "<p>" . $row['schedule'] . "</p>";
                                            echo "<h3> 
                                            <a href='reservations.php' class='btn btn-sm btn-secondary'>Back</a></h3>"
                                        ?>
                                            
                              
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