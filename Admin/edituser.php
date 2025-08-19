<?php
    require("header.php");

    

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $status = $_POST['status'];


        $updateuser= $user->update($id,$fname,$lname,$email,$status);
        echo $updateuser;
    }

    $row = $user->selectOne($id);
?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2>Edit User</h2></div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group pt-2 pl-2 pr-2">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status" value="<?php echo $row['status'];?>">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Update User</button>
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
</body>
</html>
