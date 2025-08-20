<?php
    require("header.php");
   
    if(isset($_POST['submit'])){
        $title = $_POST['movietitle'];
        $cinemaid = $_POST['cinema'];
        $categoryid = $_POST['category'];
        $mc_quantity = $_POST['mc_quantity'];
        $price = $_POST['price'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $picture = $_FILES['picture']['name'];
        $file = "../upload/" . basename($picture);
        $tmpfile = $_FILES['picture']['tmp_name'];
        move_uploaded_file($tmpfile, $file);
        $addmovie = $movie->store($title,$cinemaid,$categoryid,$mc_quantity,$price,$schedule,$picture,$file,$tmpfile);
        
        
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
                <a href="movies.php">Movies</a>
            </li>
            <li class="breadcrumb-item active">Add Movie</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Add Movie</h2></div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="movietitle">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Cinema</b></label>
                                            <div class="form-check form-check-inline ">
                                                
                                                <?php
                                                    $result= $cinema->select();
                                                    if($result){
                                                        foreach($result as $key =>$row){
                                                            $cinemaid=$row['cinema_id'];
                                                            echo "<input type='checkbox' class='form-check-input' name='cinema[]' value='$cinemaid'>";
                                                            echo  $row['cinema_name'] . " ";
                                                        }
                                                        }

                                                        
                                                ?>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><b>Category</b></label>
                                            <div class="form-check form-check-inline">
                                                
                                                <?php
                                                $result= $category->select();
                                                if($result){
                                                    foreach($result as $key =>$row){
                                                        $cateid=$row['category_id'];
                                                        echo "<input type='checkbox' class='form-check-input' name='category' value='$cateid'>";
                                                        echo  $row['category_name'] . " ";
                                                    }
                                                    }

                                                    
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity of the ticket</label>
                                            <input type="number" class="form-control" name="mc_quantity">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Price</b></label>
                                            <input type="number" class="form-control" name="price">
                                        </div> 
                                        <div class="form-group">
                                            <label><b>Start</b></label>
                                            <input type="date" class="form-control" name="sdate">
                                        </div>
                                        <div class="form-group">
                                            <label><b>End</b></label>
                                            <input type="date" class="form-control" name="edate">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Poster</b></label>
                                            <input type="file" class="form-control" name="picture">
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Movie</button>
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