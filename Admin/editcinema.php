<?php
    require("header.php");

    if(isset($_POST['submit'])){
        $cinemaname = $_POST['cinemaname'];

        $updatecinema = $cinema->update($id,$cinemaname);
        echo $updatecinema;
    }
    $id = $_GET['id'];
    $row = $cinema->selectOne($id);
?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Cinema</li>
        </ol>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Edit Cinema</h2></div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group pr-2 pl-2 pt-2">
                                    <div class="form-group">
                                        <label>Cinema</label>
                                        <input type="text" class="form-control" name="cinemaname" value="<?php echo $row['cinema_name'];?>">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Cinema</button>
                                <div>
                            </form>
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