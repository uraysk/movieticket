<?php
    require("header.php");

    if(isset($_POST['submit'])){
        $title = $_POST['movietitle'];
        $cinema = $_POST['cinema'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $schedule = $_POST['schedule'];
        $picture = $_FILES['picture']['name'];
        $directory = "upload/" . basename($picture);
        $fileTopUpload = $_FILES['picture']['tmp_name'];
      
        move_uploaded_file($tmpfile, $file);
        $updatemovie = $movie->update($id,$title,$cinema,$category,$price,$release,$picture.$directory,$fileTopUpload);
        echo $updatemovie;
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
                <a href="movies.php">Movies</a>
            </li>
            <li class="breadcrumb-item active">Edit Movie</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Edit Movie</h2></div>
                            <div class="card-body">
                                <form action="" method="post">
                                    
                                        <div class="form-group">
                                            <label><b>Title</b></label>
                                            <input type="text" class="form-control" name="movietitle" value="<?php echo $row['movie_title'];?>">
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
                                            <label><b>Price</b></label>
                                            <input type="number" class="form-control" name="price" value="<?php echo $row['price'];?>">
                                        </div> 
                                        <div class="form-group">
                                            <label><b>Schedule</b></label>
                                            <input type="date" class="form-control" name="schedule" value="<?php echo $row['release_date'];?>">
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