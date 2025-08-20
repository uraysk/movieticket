<?php
require("header.php");

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
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        

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